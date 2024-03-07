'use strict';

$(function () {
    var pagination = ['v-pills-general-tab', 'v-pills-optional-tab', 'v-pills-optionals-tab', 'v-pills-usecase-tab'];

    if (typeof dynamic_page !== 'undefined') {
        pagination = ['v-pills-general-tab'];
        for (const value of dynamic_page) {
            pagination.push(`v-pills-${value}-tab`)
        }
    }

    function tabTitle(id) {
        var title = $('#' + id).attr('data-id');
        $('#theme-title').html(title);
    }


    $(document).on("click", '.tab-name', function () {
        var id = $(this).attr('data-id');
        $('#theme-title').html(id);
    });

    $(document).on('click', 'button.switch-tab', function (e) {
        $('#' + $(this).attr('data-id')).tab('show');
        var titleName = $(this).attr('data-id');

        tabTitle(titleName);

        $('.tab-pane[aria-labelledby="home-tab"').addClass('show active')
        $('#' + $(this).attr('id')).addClass('active').attr('aria-selected', true)
    })

    // Hide export option
    var hideExport = setInterval(() => {
        if ($("#btnGroupDrop1").length) {
            $("#btnGroupDrop1").css('display','none')
            $(".btn-group").css({'display':'inline-block'})
            $("#dataTableBuilder_length").css({'margin-top':'-20px'})
            clearInterval(hideExport);
        }
    }, 100);

    $(document).on("keyup", ".int-number", function () {
        let number = $(this).val();
        number = number.substring(0,8);

        if (number == '-') {
            $(this).val('-')
        } else if (number.includes('-1')) {
            $(this).val('-1');
        } else {
            $(this).val(number.replace(/[^0-9]{1,8}/g, ""));
        }
    });

    $(".package-submit-button, .package-feature-submit-button, .credit-submit-button").on("click", function () {
        setTimeout(() => {
            for (const data of pagination) {
                if ($('#' + data.replace('-tab', '')).find(".error").length) {
                    var target = $('#' + data.replace('-tab', '')).attr("aria-labelledby");
                    $('#' + target).tab('show');
                    tabTitle(target);
                    break;
                }
            }
        }, 100);
    });

    $('.add-feature-nav').on('click', function () {
        var count = $(this).attr('data-count');
        var nav = $('#add-feature-nav').find('li a')

        nav.attr('id', `v-pills-${count}-tab`)
            .attr('href', `#v-pills-${count}`)
            .attr('aria-controls', `v-pills-${count}`)
            .attr('data-id', jsLang('Custom') + count)

        nav.text(jsLang('Custom') + count)

        $(this).attr('data-count', +count + 1);
        $(this).before($('#add-feature-nav').html())

        var data = $('#add-feature-data');
        data.find('.tab-pane')
            .attr('id', `v-pills-${count}`)
            .attr('aria-labelledby', `v-pills-${count}-tab`)

        data.find('.type').attr('name', `meta[custom${count}][type]`);
        data.find('.title').attr('name', `meta[custom${count}][title]`);
        data.find('.description').attr('name', `meta[custom${count}][description]`);
        data.find('.is_visible').attr('name', `meta[custom${count}][is_visible]`).addClass('select2-dynamic');
        data.find('.status').attr('name', `meta[custom${count}][status]`).addClass('select2-dynamic');


        $('#topNav-v-pills-tabContent').append(data.html());
        $('#add-feature-data').find('.is_visible, .status').removeClass('select2-dynamic');

        $(".select2-dynamic").select2({
            minimumResultsForSearch: Infinity
        });
    })

    $(document).on('click', '.custom-feature-nav .close', function () {
        $('#v-pills-general-tab').tab('show');
        tabTitle('v-pills-general-tab');

        var id = $(this).siblings('a').attr('aria-controls')
        $(this).closest('.custom-feature-nav').remove();
        $('#' + id).remove()
    })

    // Subscription add section
    if ($('#subscription-add-container').length) {
        $('input[name="activation_date"]').daterangepicker(dateSingleConfig());
        $('input[name="billing_date"]').daterangepicker(dateSingleConfig());
        $('input[name="next_billing_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            startDate: moment().add(1, 'day'),
            minDate: moment().add(1, 'day'),
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    }

    // Subscription edit section (Admin panel)
    if ($('#subscription-edit-container').length) {
        $('input[name="activation_date"]').daterangepicker(dateSingleConfig($('input[name="activation_date"]').val()));
        $('input[name="billing_date"]').daterangepicker(dateSingleConfig($('input[name="billing_date"]').val()));
        $('input[name="next_billing_date"]').daterangepicker(dateSingleConfig($('next_input[name="billing_date"]').val()));
    }

    function removeUseCaseErrorMessage() {
        let template = document.querySelector("#usecase-category")
        let templateCategory = document.querySelector("#usecase-template")
        template.setCustomValidity('');
        templateCategory.setCustomValidity('');

        $("#usecase-category").siblings('.error').remove();
        $("#usecase-template").siblings('.error').remove();
    }

    //UseCase template
    $('.select2#usecase-category').on('select2:select', function(e) {
        var category = e.params.data;
        removeUseCaseErrorMessage();
        $.ajax({
            url: SITE_URL + "/package/get-templates/" + category.id,
            type: "get",

            success: function(data) {
                for (const template of data.data) {
                    var option = new Option(template.name, template.slug, false, true);
                    $('.select2#usecase-template').append(option);
                }
            }
        });
    });

    $('.select2#usecase-category').on('select2:unselect', function(e) {
        var category = e.params.data;

        $.ajax({
            url: SITE_URL + "/package/get-templates/" + category.id,
            type: "get",

            success: function(data) {
                for (const template of data.data) {
                    $('.select2#usecase-template option[value="' + template.slug + '"]').remove();
                }
            }
        });
    });

    //Send Invoice
    $(document).on('click', '#email_invoice', function(e) {
        e.preventDefault();
        parent = this;

        $(this).attr('disabled', true).find('.feather').addClass('icon-loader');

        $.ajax({
            url: $(parent).attr('url'),
            type: "get",

            success: function(data) {
               let addClass =  !data.status ? 'alert-danger' : 'alert-success';
               let removeClass =  data.status ? 'alert-danger' : 'alert-success';
               $('.top-notification').removeClass('d-none').find('.alert').addClass(addClass).removeClass(removeClass).find('.alertText').text(data.message);
            },
            complete: function() {
                $(parent).removeAttr('disabled').find('.feather').removeClass('icon-loader');
            }
        });
    })

    function getPackageData(package_id) {
        var deferred = $.Deferred();
        $.ajax({
            url: SITE_URL + "/package/get-info/" + package_id,
            type: "get",

            success: function (data) {
                deferred.resolve(data);
            }
        });

        return deferred.promise();
    }

    function setRenewable(data) {
        if (data) {
            $('#renewable').val(data.renewable);
        }
    }

    function setTransaction(data) {
        if (data) {
            var cycle = $('#billing_cycle').val()
            var price = data.discount_price[cycle] > 0 ? data.discount_price[cycle] : data.sale_price[cycle]
            $('#billing_price, #amount_billed').val(price)

            if ($('#payment_status').val() == 'Paid') {
                $('#amount_received').val(price)
                $('#amount_due').val(0)
            } else {
                $('#amount_due').val(price)
                $('#amount_received').val(0)
            }

            if (cycle == 'days') {
                $('#duration_days').removeClass('d-none')
                $('#duration').val(data.duration).attr('readonly', true)
            } else {
                $('#duration_days').addClass('d-none')
                $('#duration').val('').attr('readonly', true)
            }
        }
    }

    const billing_cycles = {
        'lifetime': 0,
        'yearly': 365,
        'monthly': 30,
        'weekly': 7,
    }

    function setDate(data) {
        var day = 1;
        var cycle = $('#billing_cycle').val()
        if (cycle == 'days') {
            day = data.duration;
        } else {
            day = billing_cycles[cycle]
        }

        if ($('#subscription-add-container').length || $('#subscription-edit-container').length) {

            $('input[name="next_billing_date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                startDate: moment().add(day, 'day'),
                minDate: moment().add(1, 'day'),
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
        }
    }
    
    function setBillingCycle(data) {
        $('#billing_cycle').html('');
        for (const key in data.billing_cycle) {
            if (data.billing_cycle[key] == 1) {
                $('#billing_cycle').append(`
                    <option value="${key}">${key.charAt(0).toUpperCase() + key.slice(1)}</option>
                `)
            }
        }
        
        $('.select2-hide-search').select2({
            minimumResultsForSearch: Infinity
        });
    }

    //Set renewable data from package
    $('.select2#package_id').on('select2:select', function(e) {
        var package_id = e.params.data.id;
        var promise = getPackageData(package_id);

        promise.done(function(data) {
            setRenewable(data);
            setBillingCycle(data);
            setTransaction(data);
            setDate(data);
            nextBillingVisibility();
        });
    });

    if ($('#subscription-add-container').length) {
        var promise = getPackageData($('.select2#package_id').val());

        promise.done(function(data) {
            setRenewable(data);
            setBillingCycle(data);
            setTransaction(data);
            setDate(data);
            nextBillingVisibility();
        });
    }
    
    $('.select2-hide-search#billing_cycle').on('select2:select', function(e) {
        
        var val = $(this).val();

        if (val == 'days') {
            $('#duration_days').removeClass('d-none');
        } else {
            $('#duration_days').addClass('d-none');
        }
        
        var promise = getPackageData($('.select2#package_id').val());

        promise.done(function(data) {
            setRenewable(data);
            setTransaction(data);
            setDate(data);
        });
    });

    $('.select2-hide-search#payment_status').on('select2:select', function(e) {
        var payment_status = e.params.data.text;
        var price = $('#billing_price').val();

        if (payment_status == 'Paid') {
            $('#amount_received').val(price)
            $('#amount_due').val(0);
        } else {
            $('#amount_received').val(0)
            $('#amount_due').val(price);
        }
    });
    
    function billingReadOnly(checkbox, readonly = true) {
        var textField = $(checkbox).closest('.billing-parent').find('input[type="text"]');
        
        textField.attr('readonly', readonly);
        
        if (readonly) {
            textField.val(null); 
        }
    }
    
    $('.billing-checkbox').on('change', function() {
        if ($(this).is(':checked')) {
            billingReadOnly(this, false)
        } else {
            billingReadOnly(this, true)
        }
    });
    
    
    function removeChatErrorMessage() {
        let template = document.querySelector("#chat-category")
        let templateCategory = document.querySelector("#chat-template")
        template.setCustomValidity('');
        templateCategory.setCustomValidity('');

        $("#chat-category, #chat-template").siblings('.error').remove();
    }

    //Chat template
    $('.select2#chat-category').on('select2:select', function(e) {
        var category = e.params.data;
        removeChatErrorMessage();
        $.ajax({
            url: SITE_URL + "/package/get-chats/" + category.id,
            type: "get",

            success: function(data) {
                for (const template of data.data) {
                    var option = new Option(template.name, template.code, false, true);
                    $('.select2#chat-template').append(option);
                }
            }
        });
    });

    $('.select2#chat-category').on('select2:unselect', function(e) {
        var category = e.params.data;

        $.ajax({
            url: SITE_URL + "/package/get-chats/" + category.id,
            type: "get",

            success: function(data) {
                for (const template of data.data) {
                    $('.select2#chat-template option[value="' + template.code + '"]').remove();
                }
            }
        });
    });
    
    function nextBillingVisibility() {
        if (($('#billing_cycle').val()) == 'lifetime') {
            $('.next-billing-date').hide();
            $('.activation-date, .billing-date').addClass('col-md-6').removeClass('col-md-4')
        } else {
            $('.next-billing-date').show();
            $('.activation-date, .billing-date').addClass('col-md-4').removeClass('col-md-6')
        }
    }
    
    $('#billing_cycle').on('change', function() {
        nextBillingVisibility();
    })
})
