let date = new Date();
let stat = document.getElementById("status");
const feels = document.getElementById('feelsLike');

showDate(date);
showTime(date);
setInterval(showTime, 1000);

fetch('https://api.openweathermap.org/data/2.5/weather?q=Kathmandu&appid=0ad905346442530e313acd19729ff3d0')
    .then(response => response.json())
    .then(data => {
        let descValue = data['weather'][0]['description'];
        let feels_like = data['main']['feels_like'];
        feels_like = Math.round((Number(feels_like) - 273.15));
        stat.innerHTML = descValue;
        feels.innerHTML = feels_like;
    });

function showTime(date) {
    let hour = date.getHours();
    let min = date.getMinutes();
    let sec = date.getSeconds();
    let am_pm = "AM";

    if (hour > 12) {
        hour -= 12;
        am_pm = " PM";
    }
    if (hour == 0) {
        hour = 12;
        am_pm = " AM";
    }

    hour = hour < 10 ? "0" + hour : hour;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;

    let currentTime = hour + ":" + min + ":" + sec + am_pm;

    document.getElementById("time").innerHTML = currentTime;
}

function showDate(date) {
    let dd = String(date.getDate()).padStart(2, '0');
    let mm = String(date.getMonth() + 1).padStart(2, '0');
    let yyyy = date.getFullYear();
    let today = mm + '/' + dd + '/' + yyyy;
    document.getElementById("date").textContent = today;
}


