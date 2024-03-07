"use strict";
  $(document).ready(function() {
    $('.parent-container .accordion .accordion-header').on('click', function() {
        var currentAccordion = $(this).parent('.accordion');
        var currentContent = currentAccordion.find('.accordion-content');
        var otherAccordions = $('.parent-container .accordion').not(currentAccordion);

        if (currentAccordion.hasClass('active')) {
            // Toggle the visibility of the content
            currentAccordion.removeClass('active');
            currentAccordion.find('.accordion-arrow').removeClass('active');
            currentContent.slideUp();
        } else {
            // Close other accordions
            otherAccordions.removeClass('active');
            otherAccordions.find('.accordion-arrow').removeClass('active');
            $('.parent-container .accordion-content').slideUp();
            // Open the clicked accordion and toggle its content
            currentAccordion.addClass('active');
            currentAccordion.find('.accordion-arrow').addClass('active');
            currentContent.slideDown();
        }

        // Add or remove a border on the current accordion based on its active state
        $('.parent-container .accordion').removeClass('faq-accordion-border'); // Remove border from all accordions
        if (currentAccordion.hasClass('active')) {
            currentAccordion.addClass('faq-accordion-border'); // Add border to the current accordion if it is active
        }
    });
  });
