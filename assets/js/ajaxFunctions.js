
function fetchUser(page, current) {
    resetPlayground();
    let request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("playground").innerHTML = this.responseText;
        }
    };
    if(page>0){
        page = "?page="+page+"&current="+current;
    }else{
        page="";
    }
    request.open("GET", "getUserAJAX.php"+page, true);
    request.send();
}

function fetchMetaData(){
    resetPlayground();
    let request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("playground").innerHTML = this.responseText;
        };
    }
    request.open("GET", "getMetaAJAX.php", true);
    request.send();
}

function fetchData(){
    resetPlayground();
    let request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("playground").innerHTML = this.responseText;
        };
    }
    request.open("GET", "getDataAJAX.php", true);
    request.send();
}

function resetPlayground() {
    let playground = document.getElementById("playground");
    playground.innerHTML = "";
}

function renderForm(parameter){
    let request = new XMLHttpRequest();
    let url = "renderFormAJAX.php";
    let params = "formType="+parameter;


    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.setRequestHeader("Content-length", params.length);
    request.setRequestHeader("Connection", "close");

    request.onreadystatechange = function() {
        if(request.readyState == 4 && request.status == 200) {
            document.getElementById("playground").innerHTML = this.responseText;
        }
    }
    request.send(params);

}