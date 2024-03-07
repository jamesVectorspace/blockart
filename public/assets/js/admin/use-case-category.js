"use strict";

$(() => {
    $('#btnSubmit').on('click', () => {
        let form = $('#form');
        form.validate();

        if (form.valid()) {
            $('#btnSubmit').text(jsLang('Creating')).append(`<div class="spinner-border spinner-border-sm ml-2" role="status"></div>`).addClass('disabled-btn');
        }
    });
});
