"use strict";
    function toggleSideNav() {
        let collapse_icon = document.querySelector('.collapse-icon');
        let close = document.querySelector('.close');
        let sidenav = document.querySelector('#sidenav');
        let overlay = document.querySelector('#overlay');

        let classOpen = [sidenav, overlay];

        collapse_icon.addEventListener('click', function(e) {
            classOpen.forEach(el => el.classList.add('active'));
        });

        let classCloseClick = [overlay, close];
        classCloseClick.forEach(function(el) {
            el.addEventListener('click', function(els) {
                classOpen.forEach(el => el.classList.remove('active'));
            });
        });
    }

    function checkWindowWidth() {
        if (window.innerWidth < 992) {
            toggleSideNav();
        }
    }

    checkWindowWidth();
    window.addEventListener('resize', function() {
        checkWindowWidth();
    });

// toggle bar

var shrink_btn = document.querySelector(".shrink-btn");
let activeIndex;
if(shrink_btn) {
    shrink_btn.addEventListener("click", () => {
        document.body.classList.toggle("shrink");
        setTimeout(moveActiveTab, 400);
        shrink_btn.classList.add("hovered");
        setTimeout(() => {
            shrink_btn.classList.remove("hovered");
        }, 500);
    });
}
