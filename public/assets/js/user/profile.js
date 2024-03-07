"use strict";

// email-modal
$(".open-email-modal").on('click', function () {
    $(".profile-modal").css("display", "flex");
    $(".existing-mail-container").show();
    $(".otp-container , .new-email-container").hide();
});
$(".modal-close-btn").on('click', function () {
    $(".profile-modal, .password-modal, .member-link-modal").css("display", "none");
});

//Update profile

$(".mainForm").on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: UPDATE_PROFILE,
        type:'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        dataType:'JSON',
        beforeSend: () => {
            $(".update-profile-loader").removeClass('hidden');
            $(".update-profile-button").attr("disabled", "disabled");
        },
        success: function (response) {
            toastMixin.fire({
                title: response.message,
                icon: response.status == 'fail' ? 'error' : response.status,
            });

        },
        complete: () => {
            $(".update-profile-loader").addClass("hidden");
            $(".update-profile-button").removeAttr("disabled");
        }
    })
});

// password-modal
$(".open-password-modal").on('click', function () {
    $(".password-modal").css("display", "flex");
    $(".password-modal-container").show();
});

$('#close-btn').on('click', function() {
    $("#updatePasswordForm").trigger('reset');
});

$('#otpForm-close-btn').on('click', function() {
    $("#otpForm").trigger('reset');
});

$('#updateEmailForm-close-btn').on('click', function() {
    $("#updateEmailForm").trigger('reset');
});

$('#updatePasswordForm').on('submit', function(e) {
    e.preventDefault();
    var old_password= $('#old_password').val();
    var new_password= $('#new_password').val();
    var confirm_password= $('#confirm_password').val();
    var token = $('input[name="_token"]').val();
    $.ajax({
        url: UPDATE_PASSWORD,
        type:'POST',
        data:{
        'old_password':old_password,
        'new_password':new_password,
        'confirm_password':confirm_password,
        '_token':token
        },
        dataType:'JSON',
        beforeSend: () => {
            $(".password-loader").removeClass("hidden");
        },
        success: function (response) {
            if (response.status == 'success') {
                $(".password-modal").css("display", "none");
                $(".password-modal-container").hide();
                $("#updatePasswordForm").trigger('reset');

            } else if(response.status == 'fail') {
                $(".password-modal-container").show();

            }

            toastMixin.fire({
                title: response.message,
                icon: response.status == 'fail' ? 'error' : response.status,
            });

        },
        complete: () => {
            $(".password-loader").addClass("hidden");
        },
        error: function() {
            $(".password-modal-container").hide();
        }
    })
});

$('#checkEmailForm').on('submit', function(e) {
    e.preventDefault();
    var email = $('#email').val();
    var token = $('input[name="_token"]').val();
    $.ajax({
        url: VERIFY_EMAIL,
        type:'POST',
        data:{
        'email':email,
        '_token':token
        },
        dataType:'JSON',
        beforeSend: () => {
            $(".email-loader").removeClass("hidden");
        },
        success: function (response) {
            if (response.status == 'success') {
                if (response.preference === 'token') {
                    $(".profile-modal").css("display", "none");
                    $(".existing-mail-container, .otp-container, .new-email-container").hide();
                } else {
                    $(".otp-container").show();
                    $(".existing-mail-container, .new-email-container").hide();
                }

            } else if(response.status == 'fail') {
                $(".existing-mail-container").show();
                $(".otp-container, .new-email-container").hide();
            }

            toastMixin.fire({
                title: response.message,
                icon: response.status == 'fail' ? 'error' : response.status,
            });
        },
        complete: () => {
            $(".email-loader").addClass("hidden");
        },
        error: function() {
            $(".profile-modal").css("display", "none");
            $(".existing-mail-container, .otp-container, .new-email-container").hide();
        }
    })
});

$('#otpForm').on('submit', function(e) {
    e.preventDefault();
    var otp = $('#otp').val();
    var token = $('input[name="_token"]').val();
    $.ajax({
        url: VERIFY_OTP,
        type:'POST',
        data:{
        'otp':otp,
        '_token':token
        },
        dataType:'JSON',
        beforeSend: () => {
            $(".email-loader").removeClass("hidden");
        },
        success: function (response) {
            if (response.status == 'success') {
                $(".new-email-container").show();
                $(".existing-mail-container, .otp-container").hide();

            } else if(response.status == 'fail'){
                $(".otp-container").show();
                $(".existing-mail-container, .new-email-container").hide();
            }

            $("#otpForm").trigger('reset');

            toastMixin.fire({
                title: response.message,
                icon: response.status == 'fail' ? 'error' : response.status,
            });
        },
        complete: () => {
            $(".email-loader").addClass("hidden");
        },
        error: function() {
            $(".profile-modal").css("display", "none");
            $(".existing-mail-container, .otp-container, .new-email-container").hide();
        }
    })
});

$('#updateEmailForm').on('submit', function(e) {
    e.preventDefault();
    var new_email = $('#new_email').val();
    var token = $('input[name="_token"]').val();
    $.ajax({
        url: UPDATE_EMAIL,
        type:'POST',
        data:{
        'new_email':new_email,
        '_token':token
        },
        dataType:'JSON',
        beforeSend: () => {
            $(".email-loader").removeClass("hidden");
        },
        success: function (response) {
            if (response.status == 'success') {
                $("#update_email").val(new_email);
                $("#email").val(new_email);
                $(".profile-modal").css("display", "none");
                $(".existing-mail-container, .otp-container, .new-email-container").hide();
                $("#updateEmailForm").trigger('reset');

            } else if(response.status == 'fail'){
                $(".new-email-container").show();
                $(".existing-mail-container, .otp-container").hide();
            }

            toastMixin.fire({
                title: response.message,
                icon: response.status == 'fail' ? 'error' : response.status,
            });
        },
        complete: () => {
            $(".email-loader").addClass("hidden");
        },
        error: function() {
            $(".profile-modal").css("display", "none");
            $(".existing-mail-container, .otp-container, .new-email-container").hide();
        }
    })
});

$('#memberLinkSendEmail').on('submit', function(e) {
    e.preventDefault();
    var email = $('#member_email').val();
    var token = $('input[name="_token"]').val();
    $.ajax({
        url: MEMBER_INVITATION_EMAIL_FROFILE,
        type:'POST',
        data:{
        'email':email,
        '_token':token
        },
        dataType:'JSON',
        beforeSend: () => {
            $(".member-loader").removeClass("hidden");
        },
        success: function (response) {
            if (response.status == 'success') {
                if (response.preference === 'token') {
                    $(".profile-modal").css("display", "none");
                    $(".existing-mail-container, .otp-container, .new-email-container").hide();
                } else {
                    $(".otp-container").show();
                    $(".existing-mail-container, .new-email-container").hide();
                }

            } else if(response.status == 'fail') {
                $(".existing-mail-container").show();
                $(".otp-container, .new-email-container").hide();
            }

            toastMixin.fire({
                title: response.message,
                icon: response.status == 'fail' ? 'error' : response.status,
            });
        },
        complete: () => {
            $(".member-loader").addClass("hidden");
            $(".member-link-modal").hide();
            $('#member_email').val('');
        },
        error: function() {
            $(".profile-modal").css("display", "none");
            $(".existing-mail-container, .otp-container, .new-email-container").hide();
        }
    })
});

// member link copy modal
$(".open-member-link-modal").on('click', function () {
    $(".member-link-modal").css("display", "flex");
    $(".member-link-show").show();
});

$(".memberForm").on('submit', function (e) {
    e.preventDefault();

    $.ajax({
        url: UPDATE_MEMBER,
        type:'POST',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        dataType:'JSON',
        beforeSend: () => {
            $(".update-profile-loader").removeClass('hidden');
            $(".update-profile-button").attr("disabled", "disabled");
        },
        success: function (response) {
            toastMixin.fire({
                title: response.message,
                icon: response.status == 'fail' ? 'error' : response.status,
            });

        },
        complete: () => {
            $(".update-profile-loader").addClass("hidden");
            $(".update-profile-button").removeAttr("disabled");
        }
    })
});

function metaValueChange(field) {
    let metaValue = '';

    if(document.getElementById("meta_"+field).value == "1"){
         
        metaValue = document.getElementById("meta_"+field).value='0';
    }else{
        metaValue = document.getElementById("meta_"+field).value='1';
    }
    let team_id   = document.getElementsByName("team_id")[0].value;
    let metaField = document.getElementById("metaField_"+field).value;

    $.ajax({
        url: UPDATE_MEMBER_META,
        type:'POST',
        data:{_token:CSRF_TOKEN, team_id:team_id, metaField:metaField, metaValue:metaValue},
        contentType:"application/x-www-form-urlencoded; charset=UTF-8",
        cache: false,
        processData:true,
        dataType:'JSON',
        beforeSend: () => {
            $(".member-loader").removeClass("hidden");
            $(".update-profile-button").attr("disabled", "disabled");
            $(".member-meta-value").attr("disabled", "disabled");
        },
        success: function (response) {
            toastMixin.fire({
                title: response.message,
                icon: response.status == 'fail' ? 'error' : response.status,
            });
        },
        complete: () => {
            $(".member-loader").addClass("hidden");
            $(".update-profile-button").removeAttr("disabled");
            $(".member-meta-value").removeAttr("disabled");
        }
    })
}
