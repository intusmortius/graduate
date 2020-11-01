require("./jq.js");

let burger = document.getElementById("burger");
let menu = document.getElementById("navmenu");
let filterName = document.getElementById("filter-name");
let filter = document.getElementById("filter");


burger.addEventListener('click', function(){
    burger.classList.toggle("active");
    menu.classList.toggle("nav__active");
});
filterName.addEventListener('click', function(){
    filter.classList.toggle("active");
});

