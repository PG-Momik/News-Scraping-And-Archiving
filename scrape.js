const mysql = require('mysql');
const puppeteer = require("puppeteer");

var i = 0;
var numberofnews = 0;
var info = [
    {
        title: "",
        article: "",
    },
    {
        title: "",
        article: "",
    }
];
var conn = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "mydbxx"
});

async function scrape() {
    var dbresult = "";
    await conn.connect(function (err) {
        conn.query("SELECT * FROM newsinfotabel", function (err, result, fields) {
            dbresult = result;
            numberofnews = dbresult.length;
        });
    })

    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    const url = dbresult[i].url;
    await page.goto(url);
    console.log("<=====================================>");
    console.log("Started Scraping:" + dbresult[i].name);
    console.log("<=====================================>");
    title_class = dbresult[i].title_class;
    article_link_class = dbresult[i].article_link_class;
    article_class = dbresult[i].article_class;
    const title = await page.evaluate(
        (title_class) => document.querySelector(title_class).innerText, title_class
    );
    const article_link = await page.evaluate(
        (article_link_class) => document.querySelector(article_link_class).href, article_link_class
    );
    const article_page = await browser.newPage();
    await article_page.goto(article_link);
    const article = await article_page.evaluate(
        (article_class) => document.querySelector(article_class).innerText, article_class
    );
    await page.close();
    await browser.close();
    info[i].title = await title;
    info[i].article = await article;
    console.log("TITLE:" + title);
    console.log("<=====================================>");
    console.log("Finished Scraping:" + dbresult[i].name);
    console.log("<=====================================>");
    i++;
}

async function insert() {
    var con = mysql.createConnection({
        host: "localhost",
        user: "root",
        password: "",
        database: "mydbxx"
    });
    var d = new Date();
    var dd = String(d.getDate());
    var mm = String(d.getMonth() + 1);
    if (mm < 10) {
        mm = '0' + mm;
    }
    // if (dd < 10) {
    //     dd = '0' + dd;
    // }
    var yyyy = String(d.getFullYear());
    var date = yyyy + "-" + mm + "-" + dd;
    var hours = String(d.getHours());
    var mins = String(d.getMinutes());
    var secs = String(d.getSeconds());
    var time = hours + ":" + mins + ":" + secs;
    await con.connect(function (err) {
        if (err) {
            console.error("Error connecting:" + err.stack);
            return;
        }
        console.log("Connected!");
        // yo chalena na vaye ** coment vako sab hataide
        sql = insert_content_query_maker(date, time, numberofnews, info);
        con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("2 record inserted");
            i = i - i;
        });
    });

}

function insert_content_query_maker(date, time, numberofnews, info) {
    var part0 = 'INSERT INTO datatable (date, time';
    var part1 = "";
    for (x = 1; x <= numberofnews; x++) {
        part1 = part1 + ', title' + x + ', article' + x;
    }
    var part2 = "\'" + date + "'" + ', ' + "\"" + time + "\"" + ', ';
    var part2 = "\'" + date + "\'" + ", " + "\'" + time + "\'" + ", ";
    for (j = 0; j < numberofnews; j++) {
        if (j == 0) {
            part2 = part2 + "\'" + info[j].title + "\'" + ', ' + "\'" + info[j].article + "\'" + ', ';
        }
        else {
            part2 = part2 + "\'" + info[j].title + "\'" + ', ' + "\'" + info[j].article + "\'";
        }

    }
    var sql = part0 + part1 + ") " + "VALUES (" + part2 + ")";
    return sql;
}
scrape();
setTimeout(scrape, 15000);
setTimeout(insert, 30000);
// for forever
setInterval(function () {

    scrape();
    setTimeout(scrape, 15000);
    setTimeout(insert, 30000);
}, 45000);
//45000 is ffor demo,
// actual ma the delay will be expected time change for article


