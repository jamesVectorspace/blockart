'use strict';
$(document).on("click", ".ticket-modal-toggle", function (e) {
    $('.ticket-delete-content').attr('data-id', $(this).attr('id')); // sets
    e.preventDefault();
    $('.index-modal').toggleClass('is-visible');
});

$(document).on('click', '.ticket-delete-content', function () {
    var contentId = $(this).attr("data-id");
    doAjaxprocess(
        SITE_URL + "/user/deleteContent",
        {
            contentId : contentId,
        },
        'get',
        'json'
    ).done(function(data) {
        $('#partial-history').html('');
        $('.save-content-' + contentId).hide();
        toastMixin.fire({
            title: data.message,
            icon: "success",
        });
        $('#document_'+contentId).remove();
    });
});

// Sign-in loader Added
$(document).on("submit", ".ticketForm", function () {
    $('.ticket-loader').removeClass('hidden');
    setTimeout(() => {
    $('.ticket-loader').addClass('hidden');
}, 6000);
});

$(document).on("change", ".search", function () {

    var priority = $('#priority').val();
    var token = $('input[name="_token"]').val();
    console.log(CSRF_TOKEN);
    $.ajax({
        url: SEARCH_LIST,
        type:'POST',
        data:{
        'priority':priority,
        '_token':CSRF_TOKEN 
        },
        dataType:'JSON',
        beforeSend: () => {
            $(".email-loader").removeClass("hidden");
        },
        success: function (response) {
            if (response.status == 'success') {
            }
        },
        complete: () => {
            $(".email-loader").addClass("hidden");
        },
        error: function() {

        }
    })
});