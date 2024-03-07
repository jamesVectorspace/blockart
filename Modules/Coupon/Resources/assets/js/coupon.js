'use strict';
$(document).ready(function(){
    $('#success-message').css("display", "none");
    $('#warning-message').css("display", "none");
    $("#v-pills-general-tab").trigger("click");

    $("input").on('change', function() {
        $('.warning-message').addClass('alert-secondary');
        $('#warning-message').css("display", "block");
        $('#warning-msg').html(jsLang('Settings have changed, you should save them!'));
      });
});


// Change switch with value
$(document).on('click', '.cr', function() {
    var value = $(this).closest('.switch').find('input').val();
    if (value == 1) {
        $(this).closest('.switch').find('input').val(0)
    } else {
        $(this).closest('.switch').find('input').val(1)
    }
})

// Show title with data-id attr
$('.tab-name').on("click", function () {
    var id = $(this).attr('data-id');
    $('#theme-title').html(id);
});

$('#discount_amount').on('keyup change', function() {
    if ($(this).attr('placeholder') == jsLang('Discount Percentage') && $(this).val() > 100) {
        $(this).val(100);
    }
})

if ($('.main-body .page-wrapper').find('#coupon-add-container, #coupon-edit-container, #coupon-list-container').length) {
    $('.tab-pane[aria-labelledby="v-pills-general-tab"').addClass(
        "show active")
    $('#discount_type').on('change', function() {
        if ($(this).val() == 'Percentage') {
            $('.discount_amount_label').text(jsLang('Discount Percentage'))
            $('#discount_amount').attr("placeholder", jsLang('Discount Percentage'))
            $('#discount_amount').val() >= 100 ? $('#discount_amount').val(100) : '';
        } else {
            $('.discount_amount_label').text(jsLang('Discount Amount'))
            $('#discount_amount').attr("placeholder", jsLang('Discount Amount'))
        }
    })
}
// Coupon module
function discount() {
    if ($('select[name="discount_type"]').val() != "Percentage" ) {
        $('#max_discount').hide();
    } else {
        $('.discount_amount_label').text(jsLang('Discount Percentage'))
    }

    $('select[name="discount_type"]').on('change', function(e) {
        if (e.target.value == 'Percentage') {
            $('#max_discount').show();
        } else {
            $('#max_discount').hide();
        }
    })
}

// Coupon add section (Admin panel)
if ($('.main-body .page-wrapper').find('#coupon-add-container').length) {
    $('input[name="start_date"]').daterangepicker(dateSingleConfig());
    $('input[name="end_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        startDate: moment().add(1, 'day'),
        minDate: moment().add(1, 'day'),
        locale: {
            format: 'YYYY-MM-DD'
        }
    });
}

// Coupon edit section (Admin panel)
if ($('.main-body .page-wrapper').find('#coupon-edit-container').length) {
    $('input[name="start_date"]').daterangepicker(dateSingleConfig($('input[name="start_date"]').val()));
    $('input[name="end_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        startDate: $('input[name="end_date"]').val(),
        minDate: moment().add(1, 'day'),
        locale: {
            format: 'YYYY-MM-DD'
        }
    });

}

// Coupon add and edit section (Admin panel)
if ($('.main-body .page-wrapper').find('#coupon-add-container, #coupon-edit-container').length) {
    discount();
}

if ($('.main-body .page-wrapper').find('#coupon-list-container').length) {
    // For export csv and pdf
    $(document).on("click", "#csv, #pdf", function(event) {
        event.preventDefault();
        window.location = SITE_URL + "/coupon/" + this.id;
    });
}

if ($('.main-body .page-wrapper').find('#coupon-redeem-list-container').length) {
    // For export csv and pdf
    $(document).on("click", "#csv, #pdf", function(event) {
        event.preventDefault();
        window.location = SITE_URL + "/coupon-redeem/" + this.id;
    });
}

$('.coupon-submit-button').on('click', function (e) {
    var arr = ['#v-pills-general', '#v-pills-restriction', '#v-pills-limit']
    setTimeout(() => {
        for (const key in arr) {
            if($(arr[key]).find('.error').length) {
                var target = $(arr[key]).attr('aria-labelledby');
                $('#' + target).tab('show');
                tabTitle(target);
                break;
            }
        }
    }, 100);
});
function tabTitle(id){
    var title = $('#'+ id).attr('data-id');
    $('#theme-title').html(title);
}
$('button.switch-tab').on('click', function() {
    $('#' + $(this).attr('data-id')).tab('show');
    var titleName = $(this).attr('data-id');
    tabTitle(titleName);
    $('.tab-pane[aria-labelledby="home-tab"').addClass('show active')
    $('#' + $(this).attr('id')).addClass('active').attr('aria-selected', true)
})
