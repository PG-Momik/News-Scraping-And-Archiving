var menu_1 = document.getElementById("menu-1");
var back_btn = document.getElementById("back-btn");
var count = 0;
menu_1.addEventListener('click', function () {
    var menus = document.getElementsByClassName('menu');
    var i = 0;
    for (i = 0; i < menus.length; i++) {
        menus[i].classList.toggle("hidden");
    }
    var sub_menus = document.getElementsByClassName('sub-menu');
    for (i = 0; i < sub_menus.length; i++) {
        sub_menus[i].classList.toggle("hidden");
        if (window.innerWidth > 500) {
            sub_menus[i].style.width = '800px';
        }
        else {
            sub_menus[i].style.width = '326px';
        }
    }
    count = 1;
})
back_btn.addEventListener('click', function () {
    if (count > 0) {
        var menus = document.getElementsByClassName('menu');
        var sub_menus = document.getElementsByClassName('sub-menu');
        var i = 0;
        for (i = 0; i < menus.length; i++) {
            menus[i].classList.toggle("hidden");
        }
        for (i = 0; i < sub_menus.length; i++) {
            sub_menus[i].classList.toggle("hidden");
        }
    }
    count = 0;
})