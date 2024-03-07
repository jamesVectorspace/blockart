"use strict";
$(".password_confirmation, .password").on('keyup', function () {
    let password = $(this).closest('.password-match').find('.password').val();
    let confirmPassword = $(this).closest('.password-match').find('.password_confirmation').val();
    if (password.length > 0 && confirmPassword.length > 0) {
        if (password != confirmPassword) {
            $(this).closest('.password-match').find(".password-validation-error").addClass("text-red-500");
            $(this).closest('.password-match').find(".password-validation-error").text(jsLang('Passwords do not match'));
            $(this).closest('.password-match').find('.password-matching').hide();
        } else {
            $(this).closest('.password-match').find(".password-validation-error").text("");
            $(this).closest('.password-match').find('.password-matching').show();
        }
    }
});

$(document).on("submit", "#password-validate-submit", function () {
    var status = true;
    var isPasswordValid = true;
    var errorMsg = "";
    var tmpMsg = [];

    if (uppercase && $(".password-validation").val().search(/[A-Z]/) < 0) {
        tmpMsg.push(jsLang("uppercase"));
        status = isPasswordValid = false;
    }
    if (lowercase && $(".password-validation").val().search(/[a-z]/) < 0) {
        tmpMsg.push(jsLang("lowercase"));
        status = isPasswordValid = false;
    }
    if (number && $(".password-validation").val().search(/[0-9]/) < 0) {
        tmpMsg.push(jsLang("numbers"));
        status = isPasswordValid = false;
    }
    if (
        symbol &&
        $(".password-validation")
            .val()
            .search(/[#?!@$%^&*-]/) < 0
    ) {
        tmpMsg.push(jsLang("symbols"));
        status = isPasswordValid = false;
    }

    if (tmpMsg.length > 0) {
        errorMsg = jsLang("Password must contain :x");
        errorMsg = errorMsg.replace(":x", tmpMsg.join(", "));
    }

    if (length && $(".password-validation").val().length < length) {
        if (errorMsg.length > 0) {
            errorMsg = jsLang(
                "Password must contain :x and :y characters long."
            );
            errorMsg = errorMsg.replace(":x", tmpMsg.join(", "));
            errorMsg = errorMsg.replace(":y", length);
        } else {
            errorMsg = jsLang("Password must be at least :x characters.");
            errorMsg = errorMsg.replace(":x", length);
        }
        status = isPasswordValid = false;
    }

    if (status == false) {
        if (!isPasswordValid) {
            $(".password-validation-error")
                .removeClass("text-green-500")
                .addClass("text-[#dc2626]")
                .text(errorMsg);
            $(".password-validation").css("border-color","red");
        }
        return false;
    } else {
        $('.sign-up-loader').removeClass('hidden');
        $('.signup-btn').prop('disabled', true);
        setTimeout(() => {
            $('.sign-up-loader').addClass('hidden');
            $('.signup-btn').prop('disabled', false);
        }, 6000);
        return true;
    }
});
