
setInterval(showTime, 1000);
function showTime() {
    let time = new Date();
    let hour = time.getHours();
    let min = time.getMinutes();
    let sec = time.getSeconds();
    am_pm = "AM";
  
    if (hour > 12) {
        hour -= 12;
        am_pm = "PM";
    }
    if (hour == 0) {
        hr = 12;
        am_pm = "AM";
    }
  
    hour = hour < 10 ? "0" + hour : hour;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;
  
    let currentTime = hour + ":"+ min + ":" + sec + am_pm;
  
    document.getElementById("samaya")
            samaya.innerHTML = currentTime;
}
showTime();
var weather = document.getElementById("weather");
    
    weather.addEventListener("click", function(){
        var weather_block = document.getElementById("weather-block");
        var stat = document.getElementById("status");
        var feels= document.getElementById('feels_like');
        fetch('https://api.openweathermap.org/data/2.5/weather?q=Kathmandu&appid=0ad905346442530e313acd19729ff3d0')
        .then(response =>response.json())
        .then(data =>{
        var descValue = data['weather'][0]['description'];
        var feels_like = data['main']['feels_like'];
        feels_like = Math.round((Number(feels_like) - 273.15));
        stat.innerHTML = descValue;
        feels.innerHTML = feels_like;
        weather_block.classList.toggle("hidden");
     })
    })          
