'use strict';
function buttonLoader(){
    return `<svg class="loader animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
    <mask id="path-1-inside-1_1032_3036" fill="white">
        <path d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z"></path>
    </mask>
    <path d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z" stroke="url(#paint0_linear_1032_3036)" stroke-width="24" mask="url(#path-1-inside-1_1032_3036)"></path>
    <defs>
        <linearGradient id="paint0_linear_1032_3036" x1="46.8123" y1="63.1382" x2="21.8195" y2="6.73779" gradientUnits="userSpaceOnUse">
            <stop offset="0" stop-color="#E60C84"></stop>
            <stop offset="1" stop-color="#FFCF4B"></stop>
        </linearGradient>
    </defs>
</svg>`
}
$(document).ready(function () {
    $(".apply-button").on("click", function () {
        var couponCode = $(".coupon-input").val();
        var currencyName = $('#currency_name').text();
        var planPrice = $('.plan-price').text();
        
        if (couponCode !== "") {
            $('.apply-loader').removeClass('hidden').html(buttonLoader)
            $.ajax({
                url: check_coupon,
                type: "POST",
                data: {
                    _token: CSRF_TOKEN,
                    code: couponCode,
                    package_id: $('#package_id').val(),
                    billing_cycle: $('#billing_cycle').val()
                },
                success: function(result) {
                    if (result.status == 'success') {
                        var couponBlock = ``;
                        for (const key in result.data) {
                            couponBlock += `<div class="parent-flex"><div class="flex justify-between items-center pt-[14px]">
                            <p class="flex items-center gap-1.5 dark:text-white">Coupon <span class="text-[#763CD4] dark:text-[#FCCA19] text-15 font-medium max-w-[125px] word-breaks">(<span class="coupon-code">${key}</span>)</span>
                            <span class="cursor-pointer remove-coupon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M2.33881 2.33929C2.65773 2.02037 3.17482 2.02037 3.49375 2.33929L6.99961 5.84516L10.5055 2.33929C10.8244 2.02037 11.3415 2.02037 11.6604 2.33929C11.9793 2.65822 11.9793 3.17531 11.6604 3.49423L8.15455 7.0001L11.6604 10.506C11.9793 10.8249 11.9793 11.342 11.6604 11.6609C11.3415 11.9798 10.8244 11.9798 10.5055 11.6609L6.99961 8.15504L3.49375 11.6609C3.17482 11.9798 2.65773 11.9798 2.33881 11.6609C2.01988 11.342 2.01988 10.8249 2.33881 10.506L5.84467 7.0001L2.33881 3.49423C2.01988 3.17531 2.01988 2.65822 2.33881 2.33929Z" fill="#898989"/></svg>
                                </span></p><p class="text-[#DF2F2F]">-${subtractAndFormat(result.data[key], '0', getSeparator(planPrice))} <span>${currencyName}</span></p></div></div>`;
                            
                           planPrice = subtractAndFormat(planPrice, result.data[key], getSeparator(planPrice))
                        }
                        
                        $('.discount-price').text(planPrice);
                        
                        // Append the coupon block to the coupon-list
                        $("#coupon-list").html(couponBlock);

                        toastMixin.fire({
                            title: result.message,
                            icon: 'success'
                        });
                    } else {
                        toastMixin.fire({
                            title: result.message,
                            icon: 'error'
                        });
                    }
                    
                    $(".coupon-input").val("");
                },
                complete: function(){
                    $('.apply-loader').addClass('hidden').html('')
                }
            }); 
        }
    });
    
    $(document).on('click', '.remove-coupon', function() {
        var couponCode = $(this).closest(".parent-flex").find(".coupon-code").text();
        var parent = this;
        var planPrice = $('.plan-price').text();
        $(this).html(buttonLoader)
        $.ajax({
            url: reset_discount,
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                code: couponCode,
                package_id: $('#package_id').val(),
                billing_cycle: billing_cycle,
            },
            success: function(result) {
                planPrice = subtractAndFormat(planPrice, result.amount.toString(), getSeparator(planPrice))
                $('.discount-price').text(planPrice);
                
                $(parent).closest(".parent-flex").remove();
            }
        });
    })
    $('.checkout-btn').on("click", function () {
        $(this).find('svg').removeClass('hidden')
        setTimeout(() => {
            $(this).find('svg').addClass('hidden')
        }, 6000);
    })
    
    function subtractAndFormat(number1, number2, resultSeparator) {
        // Detect separators used in the input numbers
        number1 = number1.toString();
        number2 = number2.toString();
        var separator1 = getSeparator(number1);
        var separator2 = getSeparator(number2);

        // Replace separators and cast to float
        var num1 = parseFloat(number1.replace(separator1, '.'));
        var num2 = parseFloat(number2.replace(separator2, '.'));

        // Subtract the two numbers
        var result = num1 - num2;

        // Format the result with the specified separator
        var formattedResult = result.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).replace('.', resultSeparator);

        return formattedResult;
    }

    function getSeparator(number) {
        // Detect separator used in the number (',' or '.')  
        number = number.toString();      
        if (number.indexOf(',') !== -1) {
            return ',';
        } else if (number.indexOf('.') !== -1) {
            return '.';
        } else {
            // Default to '.'
            return '.';
        }
    }
});
