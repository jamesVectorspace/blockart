"use strict";
if ($('.main-body .page-wrapper').find('#affiliate-user-profile-container').length) {
    var tem_text = "";
    var oldIdentifier = $('#identifier').val();
    var oldUrlGenerator = $('#urlGenerator').text();
    $(".save-button, .cancel-button").hide();
    $(window).on("load", function () {
        $(".save-button").on("click", save_onclick);
        $(".cancel-button").on("click", cancel_onclick);
        $(".edit-button").on("click", edit_onclick);
        $(".referralURL").on("click", copyURL);
        $(".pathType").on("change", pathPaste);
    });

    function edit_onclick() {
        tem_text = $(this).closest(".close-parent").find("input").val();
        setFormMode($(this).closest(".close-parent"), "edit");
        $(this).closest(".close-parent").find(".edit-input").trigger("focus");
    }

    function cancel_onclick() {
        $(this).closest(".close-parent").find("input").val(tem_text);
        setFormMode($(this).closest(".close-parent"), "view");
    }

    function pathPaste() {
        if ($(this).val().length > 0) {
            return $('.pathPaste').text("/"+$(this).val());
        }

        $('.pathPaste').text('');
    }

    function copyURL() {
        var copyText = $(this).text();

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText);
        triggerNotification(jsLang('link copied'));
    }

    function save_onclick() {
        $.ajax({
            url: identifierUrl,
            type: 'POST',
            data: {
                "_token": token,
                identifier: $('#identifier').val(),
            },
            dataType: 'JSON',
            success: function(data) {
                if (data['status'] == 'success') {
                    $('.updateIdentifier').text($('#identifier').val());
                    oldIdentifier = $('#identifier').val();
                    triggerNotification(data['message']);
                } else {
                    $('#identifier').val(oldIdentifier);
                    triggerNotification(data['message']);
                }
            },
            error: function(data) {
                triggerNotification(jsLang('Something went wrong, please try again.'));
            }
        })

        setFormMode($(this).closest(".close-parent"), "view");
    }

    function setFormMode($form, mode) {
        switch (mode) {
            case "view":
                $form.find(".save-button, .cancel-button").hide();
                $form.find(".edit-button").show();
                $form.find("input, select").prop("disabled", true);
                break;
            case "edit":
                $form.find(".save-button, .cancel-button").show();
                $form.find(".edit-button").hide();
                $form.find("input, select").prop("disabled", false);
                break;
        }
    }

    const triggerNotification = (msg) => {
        $(".notification-msg-bar").find(".notification-msg").html(msg);
        $(".notification-msg-bar").removeClass("smoothly-hide");
        setTimeout(() => {
            $(".notification-msg-bar").addClass("smoothly-hide"),
                $(".notification-msg-bar").find(".notification-msg").html("");
        }, 2500);
    };
}

if ($('.main-body .page-wrapper').find('#affiliate-profile-container').length) {
    $("#life_time_customers").select2({
        ajax: {
            url: SITE_URL + '/find-users-with-ajax',
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                };
            },
            processResults: function (data, params) {
                let results = data.data;
                return {
                    results: results
                };
            },
            cache: true,
        },
        placeholder: jsLang("Search for customers."),
        minimumInputLength: 3,
    });

    $(".referral_link").on("click", copyURL);

    function copyURL() {

        var copyText = $(this).text();

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText);
    }
}
