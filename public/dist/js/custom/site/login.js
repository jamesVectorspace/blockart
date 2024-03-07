"use strict";
$(document).on('keyup', '.password_confirmation, .password', function () {
    let $passwordMatch = $(this).closest('.password-match');
    let $password = $passwordMatch.find('.password');
    let $confirmPassword = $passwordMatch.find('.password_confirmation');

    // Get the values of password and confirmPassword
    let password = $password.val() || '';
    let confirmPassword = $confirmPassword.val() || '';

    if (password.length > 0 && confirmPassword.length > 0) {
        if (password !== confirmPassword) {
            let $validationError = $passwordMatch.find(".password-validation-error");
            $validationError.addClass("text-red-500").text(jsLang('Passwords do not match'));
            $passwordMatch.find('.password-matching').hide();
        } else {
            $passwordMatch.find(".password-validation-error").text("");
            $passwordMatch.find('.password-matching').show();
        }
    }
});

$(document).on("click", ".update-pass-button", function () {
    $(this).addClass('cursor-not-allowed');
    $('.update-loader').removeClass('hidden');

    setTimeout(() => {
        $(this).removeClass('cursor-not-allowed');
        $('.update-loader').addClass('hidden');
    }, 6000);
});
// Sign-in loader Added
$(document).on("submit", ".loginForm", function () {
    $('.sign-in-loader').removeClass('hidden');
    setTimeout(() => {
    $('.sign-in-loader').addClass('hidden');
}, 6000);
});

// Sign-up loader Added
$(document).on("submit", ".signupForm", function () {
    $('.sign-up-loader').removeClass('hidden');

    setTimeout(() => {
        $('.sign-in-loader').addClass('hidden');
    }, 6000);
});

// Active login part
$(document).on("click", ".login-active", function () {
    $(".register-active").removeClass("is-active");
    $(".login-active").addClass("is-active");
    $(".login-active-border").addClass("active-border");
    $(".register-active-border").removeClass("active-border");
});

// Active registration part
$(document).on("click", ".register-active", function () {
    $(".login-active").removeClass("is-active");
    $(".register-active").addClass("is-active");
    $(".register-active-border").addClass("active-border");
    $(".login-active-border").removeClass("active-border");
});

//password show-hide part
$(".password-hide").on('click', function () {
    $(this).hide();
    $(".password-show").show();
    $(this).closest(".password-container").find(".password-field").get(0).type =
        "text";
});

$(".password-show").on('click', function () {
    $(this).hide();
    $(".password-hide").show();
    $(this).closest(".password-container").find(".password-field").get(0).type =
        "password";
});

$(".modal-btn-close").on('click', function () {
    $(".flash-message").fadeOut();
});
$(function() {
    setTimeout(function() {
        $(".flash-message").fadeOut(1000);
    }, 3000)
})

$('.button-need-disable').on('submit', function() {
    $(this).find('button').prop('disabled', true);
})

$(document).on('click', '.one-click-login', function() {
    let type = $(this).attr('data-type');
    let demoCredential = JSON.parse(demoCredentials);
    if (type == 'admin') {
        $('#login-email').val(demoCredential['admin']['email']);
        $('#login-password').val(demoCredential['admin']['password']);
    } else if (type == 'customer') {
        $('#login-email').val(demoCredential['customer']['email']);
        $('#login-password').val(demoCredential['customer']['password']);
    }
    $('.loginForm').trigger('submit');
})
