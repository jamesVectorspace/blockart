"use strict";
  // mobile menu
  function navToggle() {
          var btn = document.getElementById('menuBtn');
          var nav = document.getElementById('menu');
          var icon = document.getElementById('icon');
          var cross_icon = document.getElementById('cross_icon');
          var dropdowns = document.getElementById('dropdowns-header');
          dropdowns.classList.toggle('hidden');
          btn.classList.toggle('open');
          nav.classList.toggle('flex');
          nav.classList.toggle('hidden');
          icon.classList.toggle('hidden');
          cross_icon.classList.toggle('hidden');
          cross_icon.classList.toggle('show');
      }
      
// language dropdown
$(document).ready(function(){
$('.language-dropdown-click').on("click",function(event){
    event.stopPropagation();
        $(".language-drop-down").slideToggle(200);
        $(".header-drop-down").hide();
});
$(".language-drop-down").on("click", function (event) {
    event.stopPropagation();
});
});
$(document).on("click", function () {
    $(".language-drop-down").hide();
  });

// header dropdown
$(document).ready(function(){
  $('.header-dropdown-click').on("click",function(event){
      event.stopPropagation();
      $(".header-drop-down").slideToggle(200);
      $(".language-drop-down").hide();
  });
  });
  $(document).on("click", function () {
  $(".header-drop-down").hide();
  });