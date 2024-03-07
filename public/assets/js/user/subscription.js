"use strict";

var response = {
    status: $('.alert-danger').length > 0 ? 'failed' : 'success',
    message: $('.reset-success-msg').text()
}

$(".billing-information").on('click', function () {
    $(".billing-information-modal").css("display", "flex");
    $(".billing-modal-container").show();
});
$(".modal-close-btn").on('click', function () {
    $(".billing-information-modal, .upgradePlan-information-modal, .upgradePlan-allPlans-container, .upgradePlan-allPlans-modal").css("display", "none");
});
$(".upgrade-plan").on('click', function () {
    $(".upgradePlan-information-modal").css("display", "flex");
    $(".upgradePlan-modal-container").show();
});

$(document).on("click", '.plan', function () {
    const packageId = $(this).val();
    getPlan(packageId);

});

function getPlan(packageId) {
    $.ajax({
        url: SITE_URL + `/plan-description/${packageId}`,
        type: "GET",
        beforeSend: function() {
            setTimeout(() => {
                $(".checked-loader").block({
                    message: `<div class="flex justify-center">
                <svg class="animate-spin text-gray-700 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="#000" stroke-width="3"></circle>
                <path class="opacity-75" fill="#fff" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
                </div>`,
                    css: {
                        backgroundColor: "transparent",
                        border: "none",
                    },
                });
            }, 5);
        },
        success: function(result) {
            $('#plans').find('.plan-description').replaceWith(result);
            $(".checked-loader").unblock();
        }
    });
}
$(document).on("submit", ".plan-form", function () {
    $('.update-plan-loader').removeClass('hidden');
    setTimeout(() => {
    $('.update-plan-loader').addClass('hidden');
}, 6000);
});

if ($(".subscription-details").length > 0) {
    setTimeout(() => {
        (window["ReactNativeWebView"]||window).postMessage(JSON.stringify(response));
    }, 100);
}

//Plan Pricing
$('input[name="check_billing"]').on('change', function() {
    var value = $(this).val();
    $('.plan-parent').addClass('hidden');
    
    if ($(`.plan-${value}`).length == 0) {
        $('.plan-root').append(`
            <div class="plan-parent plan-${value}">
                <p class="text-color-14 dark:text-white mx-auto text-[22px] leading-6 font-semibold px-5 break-words text-center">${jsLang('No plan available under this category')}</p>
            </div>
        `)
    } else {
        $(`.plan-${value}`).removeClass('hidden');
    }
})


if (typeof is_onetime !== 'undefined' && is_onetime) {
    $('#tabs-category-tab-id-1').addClass('active show');
    $('#tabs-home').removeClass('active show');
    $('a[href="#tabs-category-tab-id-1"]').addClass('active');
    $('a[href="#tabs-home"]').removeClass('active');
}

// all plans
$('.all-plans-toggle').on('click', function() {
    $(`.show-current-subscription`).hide();
    $(`.show-all-plans`).show();
})

$('.back-to-current').on('click', function() {
    $(`.show-current-subscription`).show();
    $(`.show-all-plans`).hide();
})

$(document).ready(function(){
    $('.card-border.disable-gradient-border').removeClass('card-border');
});

$('.nav-link-activity').on('click', function() {
    var value = $(this).data('val');
    $('.nav-link-activity').removeClass('active').css({
        'background-color': '',
        'border': '',
        'color': ''
    });

    $(this).addClass('active').css({
        'background-color': '#ff774b',
        'border': 'unset',
        'color': 'white'
    });

    $('.plan-parent').addClass('hidden');
    
    if ($(`.plan-${value}`).length == 0) {
        $('.plan-root').append(`
            <div class="plan-parent plan-${value}">
                <p class="text-color-14 dark:text-white mx-auto text-[22px] leading-6 font-semibold px-5 break-words text-center">${jsLang('No plan available under this category')}</p>
            </div>
        `)
    } else {
        $(`.plan-${value}`).removeClass('hidden');
    }
});

$(".upgrade-allPlans").on('click', function () {

    $(".upgradePlan-allPlans-modal").css("display", "flex");
    $(".upgradePlan-allPlans-container").show();
    let planContainer = $(this).closest(".single-plan-container");

    let packageName = planContainer.find(".package-name").text().trim();
    let planPrice = planContainer.find(".plan-price").text().trim();
    let billingCycle = planContainer.find(".billing-text").text().trim();
    let featuresArray = planContainer.find(".break-words").map((index,element) =>{
        if (index > 0) { 
        return $(element).text().trim();
        }
    }).get();


    $(".modal-package-name").text(packageName);
    $(".modal-selling-price").html(planPrice + `<span class="text-14 font-medium modal-billing-cycle">
    ${billingCycle}
     </span>`);

    var text = featuresArray.map(addContent).join('');
    $('.modal-plan').html(text);

    const btnText = $(this).closest('.disable-gradient-border').find('.submit-btn').text();  
     $('.modal-btn').text(btnText);
    $(".upgradePlan-allPlans-modal").find('.current-subscription-plan-modal').html(planContainer.find('.current-subscription-plan').html());
   
});
$(".modal-close-btn").on('click', function () {
    $('.modal-btn').text('');
    $(".billing-information-modal, .upgradePlan-information-modal").css("display", "none");
});

const addContent=(data) =>{
    var randomNumber = Math.random();
    return `
    <div class="flex items-center text-color-14 dark:text-white text-15 font-normal font-Figtree gap-[9px]">
        <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="12" height="9"
            viewBox="0 0 12 9" fill="none">
            <path
                d="M11.1433 1.10826C11.4609 1.42579 11.4609 1.94146 11.1433 2.25899L4.64036 8.76197C4.32283 9.0795 3.80717 9.0795 3.48964 8.76197L0.238146 5.51048C-0.0793821 5.19295 -0.0793821 4.67728 0.238146 4.35976C0.555675 4.04223 1.07134 4.04223 1.38887 4.35976L4.06627 7.03462L9.99516 1.10826C10.3127 0.790735 10.8284 0.790735 11.1459 1.10826H11.1433Z"
                fill="url(#paint0_linear_950_${randomNumber})" />
            <defs>
                <linearGradient id="paint0_linear_950_${randomNumber}" x1="7.39992"
                    y1="7.99947" x2="5.20783" y2="1.07424"
                    gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#E60C84" />
                    <stop offset="1" stop-color="#FFCF4B" />
                </linearGradient>
            </defs>
        </svg>
        <span class="modal-billing-feature">${data}</span>
    </div>`;
}

$('.plan-disable-btn').on('submit', function() {
     $('.plan-loader').prop('disabled', true);
})

$(document).on("click", ".plan-modal-btn", function () {
    var randomNumber = Math.random();
    $(this).append(
        `<span class="items-center update-plan-loader">
            <svg class="animate-spin h-5 w-5 m-auto" xmlns="http://www.w3.org/2000/svg" width="72"
                height="72" viewBox="0 0 72 72" fill="none">
                <mask id="path-1-inside-1_1032_${randomNumber}" fill="white">
                    <path
                        d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z" />
                </mask>
                <path
                    d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z"
                    stroke="url(#paint0_linear_1032_${randomNumber})" stroke-width="24"
                    mask="url(#path-1-inside-1_1032_${randomNumber})" />
                <defs>
                    <linearGradient id="paint0_linear_1032_${randomNumber}" x1="46.8123" y1="63.1382" x2="21.8195"
                        y2="6.73779" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#E60C84" />
                        <stop offset="1" stop-color="#FFCF4B" />
                    </linearGradient>
                </defs>
            </svg>
        </span>`
    );
});
