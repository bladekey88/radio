"use strict"

function toggle_search_bar() {
    const toggle_search_button = document.getElementById("toggle-search");
    const close_search_button = document.getElementById("close-search");
    const search_form = document.querySelector(".header-search")


    toggle_search_button.addEventListener("click", function () {
        search_form.classList.toggle("active")
    });

    close_search_button.addEventListener("click", function () {
        search_form.classList.remove("active");
    });
}

function toggle_side_bar() {
    const menu_toggle = document.querySelector("header .menu-toggle");
    const sidebar = document.querySelector(".sidebar");

    menu_toggle.addEventListener("click", function () {
        this.classList.toggle("active");
        sidebar.classList.toggle("active");
    })
}