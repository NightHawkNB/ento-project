/*

::Navbar Js::

***Pre-requisite***
- This will work provided you have followed the html structure
- #main-navbar > ul.menu > li > (a or a + ul.submenu)

***Procedure***
- Just assign the navbar id to the letiable $navbar_id
- and it should work

*/

let navbar_id = "main-navbar";

// -------------------

let navbar;
let navbar_menu;
let menu_toggler;
let li_list;

// The DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    navbar = document.getElementById(navbar_id);
    navbar_menu = navbar.querySelector(".menu");
    menu_toggler = navbar.querySelector("#menu-toggler");
    li_list = navbar.querySelectorAll(".menu li");

    // Insert 'fa-angle-down' icon to LI's which have children UL
    li_list.forEach(function (li) {
        if (li.children.length === 2) {
            li.children[0].innerHTML += "<i class='fa fa-angle-down'></i>";
            li.classList.add("has-dropdown");
        }
    });

    let mediaQuery = window.matchMedia("(min-width: 860px)");
    navFunctionality(mediaQuery);
    // Optional (Only for testing purposes)
    mediaQuery.addListener(navFunctionality);

    function navFunctionality(mediaQuery) {
        // Initially remove all the event listeners from LI if any
        li_list.forEach(function (li) {
            li.removeEventListener("mouseleave", toggleActive);
            li.removeEventListener("mouseenter", toggleActive);
            li.removeEventListener("click", toggleActive);
        });

        if (mediaQuery.matches) {
            // Toggle dropdown on hover
            li_list.forEach(function (li) {
                li.addEventListener("mouseleave", toggleActive);
                li.addEventListener("mouseenter", toggleActive);
            });
        } else {
            // Toggle dropdown on click
            li_list.forEach(function (li) {
                li.addEventListener("click", toggleActive);
            });

            // Hamburger operations
            menu_toggler.addEventListener("click", function (e) {
                if (e.currentTarget.classList.contains("active")) {
                    li_list.forEach(function (li) {
                        li.classList.remove("active");
                    });
                }

                navbar_menu.classList.toggle("active");
                e.currentTarget.classList.toggle("active");
            });
        }
    }

    // function to toggle 'active' class from LI
    function toggleActive(e) {
        e.stopPropagation();
        if (e.type === "click") {
            if (e.currentTarget.classList.contains("has-dropdown")) {
                e.preventDefault();
            }
            if (
                !e.currentTarget.classList.contains("active") &&
                e.currentTarget.parentElement.classList.contains("menu")
            ) {
                li_list.forEach(function (li) {
                    li.classList.remove("active");
                });
            }
        }
        e.currentTarget.classList.toggle("active");
    }
});
