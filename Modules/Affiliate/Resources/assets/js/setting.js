"use strict";
if ($('.main-body .page-wrapper').find('#affiliate-settings-container').length) {
    lifetimeCommissionDiv();

    $(document).on('keyup', '#track_param', function() {
        var str = this.value.replace(/[^A-Z0-9]+/ig, "");
        str = str.replace(/\d+|^\s+$/g, '').replace(/\s+/g, ' ');

        $('#track_param').val(str);
    });

    $(".select-package").select2({
        ajax: {
            url: SITE_URL + '/affiliate/find-packages-in-ajax',
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    variation : 'yes',
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
        placeholder: jsLang("Search for packages by name."),
        minimumInputLength: 3,
    });

    $(".select_user").select2({
        ajax: {
            url: SITE_URL + '/affiliate/find-affiliate-user-in-ajax',
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
        placeholder: jsLang("Search for users by name."),
        minimumInputLength: 3,
    });

    $('#lifetime_commission').on('change', function () {
        lifetimeCommissionDiv();
    });

    $(".lifetime_exclude_tags").select2({
        placeholder: jsLang("Select tags"),
    });

    function lifetimeCommissionDiv()
    {
        if ($('#lifetime_commission').prop("checked")) {
            $('.lifetime_commission').removeClass('display_none');
            return;
        }
        $('.lifetime_commission').addClass('display_none');
    }
}
