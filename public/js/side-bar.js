let side_nav_close = document.getElementById("side-nav-close");
let side_nav_open = document.getElementById("side-nav-open");
let side_nav = document.getElementById("side-nav");
let content = document.getElementsByClassName("content");

side_nav_open.addEventListener("click", function(){
    side_nav.style.width = "20%";
    content[0].style.opacity = "1";
});

side_nav_close.addEventListener("click", function(){
    side_nav.style.width = "0";
});