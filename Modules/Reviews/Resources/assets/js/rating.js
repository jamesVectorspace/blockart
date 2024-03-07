'use strict';

let stars = document.querySelectorAll(".stars i");

let val=0;

stars.forEach(( star, index1 ) => {

    star.addEventListener("click", (e) => {

        if ($(e.target.parentElement.parentElement).children('label.error')){
            $(e.target.parentElement.parentElement).children('label.error').remove();
        }

        val = index1 + 1 ;
        stars.forEach(( star, index2 ) => {

            if ( index1 >= index2 ) {
                star.classList.add("fa-star-beach");
                star.classList.remove("icon-light-gray");
            } else {
                star.classList.remove("fa-star-beach");
                star.classList.add("icon-light-gray");
            }

        });

        $('#rating').val(val);
    });

});

