var innerBurger = document.getElementById("inner-burger-icon");
var outerBurger = document.getElementById("outer-burger-icon");
var menu = document.getElementById("menu-popup");
var navbar = document.getElementById("navbar-fixed");
var blankSpace = document.getElementById("blank-space");

innerBurger.onclick = function () {
    menu.classList.add("hidden");
    menu.classList.remove("fixed");
    navbar.classList.add("fixed");
    navbar.classList.remove("hidden");
};

outerBurger.onclick = function () {
    menu.classList.add("fixed");
    menu.classList.add("flex");
    menu.classList.remove("hidden");
    navbar.classList.add("hidden");
    navbar.classList.remove("fixed");
};

blankSpace.onclick = function () {
    menu.classList.add("hidden");
    menu.classList.remove("fixed");
    navbar.classList.add("fixed");
    navbar.classList.remove("hidden");
}