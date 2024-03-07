"use strict";

$('#memberLinkSendEmail').on('submit', function(e) {
    e.preventDefault();
    var email = $('#member_email').val();
    var token = $('input[name="_token"]').val();
    $.ajax({
        url: MEMBER_INVITATION_EMAIL,
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

$(document).on("click", ".modal-toggle", function (e) {
    $('.delete-member').attr('data-id', $(this).attr('id')); // sets
});

$(document).on('click', '.delete-member', function () {
    var id = $(this).attr("data-id");
    doAjaxprocess(
        SITE_URL + "/user/team-member-delete/"+id,
        {
            id : $(this).attr("data-id"),
            _token: CSRF_TOKEN
        },
        'get',
        'json'
    ).done(function(data) {
        toastMixin.fire({
            title: data.message,
            icon: data.status,
        });
        window.location.reload();
    });
});


// member link copy modal
$(".open-member-link-modal").on('click', function () {
    $(".member-link-modal").css("display", "flex");
    $(".member-link-show").show();
});

//close modal
$(".modal-close-btn").on('click', function () {
    $(".member-link-modal").css("display", "none");
});

// Close modal when click outside of the modal
$(document).on("mousedown", function (e) {
    if (
        !(
            $(e.target).closest("#modal-main").length > 0 ||
            $(e.target).closest(".open-email-modal").length > 0
        )
    ) {
        $(".member-link-modal").css("display", "none");
    }
});