"use strict";

if ($('.main-body .page-wrapper').find('#gdpr-settings-container').length) {
    $('#is_gdpr_enable, #is_external_gdpr_enable').on('change', function () {
        if ($(this).val() == "0") {
            $(this).attr('value', '1');
        } else {
            $(this).attr('value', '0');
        }
    });
}