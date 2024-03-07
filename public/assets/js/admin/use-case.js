"use strict";

const slugify = (str) => str.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)+/g, '');

$(() => {
    $(".ajax_category").select2({
        ajax: {
            url: (typeof searchCategoryUrl === "undefined") ? '' : searchCategoryUrl,
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term,
                };
            },
            processResults: function (jsonResponse, params) {
                return {
                    results: jsonResponse.data,
                };
            },
            cache: true,
        },
        placeholder: jsLang("Search categories"),
        allowClear: true,
        minimumInputLength: 0,
    });

    $(".ajax_users_filter_select2").select2({
        ajax: {
            url: (typeof searchURI === "undefined") ? '' : searchURI,
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term,
                };
            },
            processResults: function (jsonResponse, params) {
                return {
                    results: jsonResponse.data,
                };
            },
            cache: true,
        },
        placeholder: jsLang("Search creator"),
        allowClear: true,
        minimumInputLength: 3,
    });

    $("#name").on("input", (e) => {
        if (e.target.value.length > 0) {
            $("#slug-span").text(slugify(e.target.value));
        } else {
            $("#slug-span").text('(auto-generated)');
        }
    });

    $('#btnSubmit').on('click', () => {
        let form = $('#form');
        form.validate();

        if (form.valid()) {
            $('#btnSubmit').text(jsLang('Creating')).append(`<div class="spinner-border spinner-border-sm ml-2" role="status"></div>`).addClass('disabled-btn');
        }
    });
});
