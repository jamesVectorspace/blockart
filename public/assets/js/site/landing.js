"use strict";

// image generator section
var slider1 = new Swiper('.slider1', {
    direction: 'horizontal',
    loop: false,
    allowTouchMove:false,
    autoplayDisableOnInteraction: false,
    paginationClickable: true,
    speed: 1000,
    effect: 'fade',
    pagination: {
      el: '.swiper-pagination',
      clickable: true
    },
    slide:true,
    autoplay: {
        delay: 1500,
        disableOnInteraction: false,
      },
  });

// latest news section
var slider2 = new Swiper(".slider2", {
    slidesPerView: 2,
    spaceBetween: 24,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      1024: {

          spaceBetween: 20,
      },
  },
  });

// header section
var slider3 = new Swiper(".slider3", {
    slidesPerView: 1,
    loop: true,
    autoplay: {
        delay: 2300,
        disableOnInteraction: false,
      },
  });

// wow animation integration
new WOW().init();

// faq accordion
$(document).ready(function(){
  $('.dropdown-click').on("click",function(event){
      event.stopPropagation();
       $(".drop-down").slideToggle(200);
  });
  $(".drop-down").on("click", function (event) {
      event.stopPropagation();
  });
});
$(document).on("click", function () {
  $(".drop-down").hide();
});

$('#subscriptionEmailForm').on('submit', function(e) {
    e.preventDefault();
    $("div.subscription_message").addClass("hidden");
    $("p#subscription_message").text(' ');
    var email = $('#email').val();
    var token = $('input[name="_token"]').val();
    $.ajax({
        url: SUBSCRIBE_EMAIL,
        type:'POST',
        data:{
            'email':email,
            '_token':token
        },
        dataType:'JSON',
        beforeSend: () => {
          $(".subscribe-loader").removeClass("hidden");
        },
        success: function (response) {
            if (response.status == 'success') {
                $("div.subscription_message").removeClass("hidden");
                var html = '<svg xmlns="http://www.w3.org/2000/svg" width="15" height="11" viewBox="0 0 15 11" fill="none"> <path d="M13.88 1.17017C14.2755 1.56567 14.2755 2.20798 13.88 2.60349L5.77995 10.7035C5.38444 11.099 4.74214 11.099 4.34663 10.7035L0.296631 6.65349C-0.0988769 6.25798 -0.0988769 5.61567 0.296631 5.22017C0.692139 4.82466 1.33444 4.82466 1.72995 5.22017L5.06487 8.55192L12.4498 1.17017C12.8453 0.774658 13.4876 0.774658 13.8831 1.17017H13.88Z" fill="url(#paint0_linear_765_1114)" /><defs> <linearGradient id="paint0_linear_765_1114" x1="9.21721" y1="9.75373" x2="6.48678" y2="1.12779" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#E60C84" /><stop offset="1" stop-color="#FFCF4B" /></linearGradient></defs></svg>';
                html += '<p class="text-color-14 dark:text-white font-Figtree font-normal text-14" id="subscription_message">' + response.message + '</p>';
                $("div.subscription_message").html(html);
                $("input.subscription_email").val('');
            } 
            if (response.status == 'fail') {
              $("div.subscription_message").removeClass("hidden");
              var html = '<svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.09014 1.59014C1.46032 1.21995 2.06051 1.21995 2.4307 1.59014L6.5 5.65944L10.5693 1.59014C10.9395 1.21995 11.5397 1.21995 11.9099 1.59014C12.28 1.96032 12.28 2.56051 11.9099 2.9307L7.84056 7L11.9099 11.0693C12.28 11.4395 12.28 12.0397 11.9099 12.4099C11.5397 12.78 10.9395 12.78 10.5693 12.4099L6.5 8.34056L2.4307 12.4099C2.06051 12.78 1.46032 12.78 1.09014 12.4099C0.719954 12.0397 0.719954 11.4395 1.09014 11.0693L5.15944 7L1.09014 2.9307C0.719954 2.56051 0.719954 1.96032 1.09014 1.59014Z" fill="#DF2F2F"/></svg>';
              html += '<p class="text-color-14 dark:text-white font-Figtree font-normal text-14" id="subscription_message">' + response.message + '</p>';
              $("div.subscription_message").html(html);
            }

            setTimeout(function() { 
                $("div.subscription_message").addClass("hidden");
            }, 5000);
        },
        complete: () => {
          $(".subscribe-loader").addClass("hidden");
        },
        error: function(response) {
            $("div.subscription_message").removeClass("hidden");
            var html = '<svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M1.09014 1.59014C1.46032 1.21995 2.06051 1.21995 2.4307 1.59014L6.5 5.65944L10.5693 1.59014C10.9395 1.21995 11.5397 1.21995 11.9099 1.59014C12.28 1.96032 12.28 2.56051 11.9099 2.9307L7.84056 7L11.9099 11.0693C12.28 11.4395 12.28 12.0397 11.9099 12.4099C11.5397 12.78 10.9395 12.78 10.5693 12.4099L6.5 8.34056L2.4307 12.4099C2.06051 12.78 1.46032 12.78 1.09014 12.4099C0.719954 12.0397 0.719954 11.4395 1.09014 11.0693L5.15944 7L1.09014 2.9307C0.719954 2.56051 0.719954 1.96032 1.09014 1.59014Z" fill="#DF2F2F"/></svg>';
            html += '<p class="text-color-14 dark:text-white font-Figtree font-normal text-14" id="subscription_message">' +response.responseJSON.errors.email[0]+ '</p>';
            $("div.subscription_message").html(html);

            setTimeout(function() { 
              $("div.subscription_message").addClass("hidden");
            }, 5000);
        }

    })
});