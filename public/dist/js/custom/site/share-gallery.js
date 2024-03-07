"use strict";
var swiper = new Swiper(".mySwiper", {
    spaceBetween: 12,
    slidesPerView: 4,
    roundLengths: true,
    loopAdditionalSlides: 30,
    observer: true,
    observeParents: true,
    observeChildren: true,
    freeMode: true,
    watchSlidesProgress: true,
    breakpoints: {
        428: {
            slidesPerView: 5,
        },
        640: {
            slidesPerView: 6,
        },
        800: {
            slidesPerView: 5,
        },
        1152: {
            slidesPerView: 6,
            spaceBetween: 20,
        },

    },
});
var swiper2 = new Swiper(".mySwiper2", {
    spaceBetween: 0,
    effect: 'fade',
    thumbs: {
        swiper: swiper,
    },
});
