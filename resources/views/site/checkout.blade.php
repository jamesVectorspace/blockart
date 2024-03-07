@extends('layouts.master')
@section('child-content')
<div class="bg-color-F6 dark:bg-color-14 h-screen">
    @php
        $logoLight = App\Models\Preference::getFrontendLogo('light');
        $logoDark = App\Models\Preference::getFrontendLogo('dark');
    @endphp
    <a href="{{ route('frontend.index') }}" class="flex flex-col justify-center items-center -mb-1">
        <img class="mt-10 dark:hidden w-[177px] h-11 object-contain" src="{{ $logoLight }}" alt="{{ __('Logo') }}">
        <img class="mt-10 hidden dark:block w-[177px] h-11 object-contain" src="{{ $logoDark }}" alt="{{ __('Logo') }}">
    </a>
    <div class="flex justify-center">
        <div class="px-4 py-[29px] sm:px-[40px] sm:py-10 w-[94%] xs:w-[388px] sm:w-[506px] dark:bg-[#3A3A39] bg-white rounded-3xl my-[44px]">
            <h3 class="font-RedHat text-24 text-color-14 dark:text-white font-bold">{{ __('Transaction Details') }}</h3>
            <div class="flex flex-col mt-8 font-Figtree text-18 text-color-14 dark:text-white font-normal">
                <div class="flex justify-between items-center border-b dark:border-[#474746] border-dashed pb-[14px]">
                    <p>{{ __("Package") }}</p>
                    <p>{{ $plan->name ?? __('Unknown') }}</p>
                </div>
                <div class="flex justify-between items-center border-b dark:border-[#474746] border-dashed pt-[15px] pb-[14px]">
                    <p>{{ __("Period") }}</p>
                    <p>{{ ucfirst(request()->billing_cycle ?? '') }}</p>
                </div>

                <div class="flex justify-between items-center pt-[15px] pb-[15px] border-b dark:border-[#474746] border-dashed">
                    <p>{{ __("Price") }}</p>
                    <p><span class="plan-price">{{ $price }} </span>
                    <span id="currency_name">{{ $currency->name }}</span></p>
                </div>
            </div>
        
            <div id="coupon-list">
                <!-- Existing coupon block or blocks will appear here -->
            </div>
        
            <div class="mt-9">
                <p class="font-Figtree text-15 text-color-14 dark:text-white font-normal">{{ __("Have a coupon?") }}</p>
                <div class="flex justify-between mt-1.5 gap-3">
                    <input type="text" class="coupon-input focus:outline-none dark:bg-[#333332] font-Figtree text-15 text-color-14 dark:text-white font-normal rounded-xl form-input w-full h-12 border dark:border-[#474746] border-[#898989]">
                    <a href="javascript:void(0)" class="apply-button flex justify-center items-center gap-2 magic-bg w-max rounded-xl text-15 font-Figtree text-white font-medium py-3 px-[29.5px]">
                        {{ __("Apply") }}
                        <div class="apply-loader hidden">
                            <svg class="loader animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                                <mask id="path-1-inside-1_1032_3036" fill="white">
                                    <path d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z"></path>
                                </mask>
                                <path d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z" stroke="url(#paint0_linear_1032_3037)" stroke-width="24" mask="url(#path-1-inside-1_1032_3037)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_1032_3036" x1="46.8123" y1="63.1382" x2="21.8195" y2="6.73779" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-color="#E60C84"></stop>
                                        <stop offset="1" stop-color="#FFCF4B"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                    </a>
                </div>
                
                <p class="coupon-message font-Figtree text-15 text-[#2fdf3e] font-normal mt-2"></p>
            </div>

            <div class="text-center mt-9">
                <p class="font-Figtree text-22 text-color-14 dark:text-white font-normal">{{ __("Total") }}</p>
                <p class="font-RedHat text-36 leading-[52px] text-color-14 dark:text-white font-bold">
                    <span>{{ $currency->symbol }}</span>
                    <span class="discount-price">{{ $price }}</span>
                </p>
            </div>

            <div id="applied-coupon"></div>
            <form action="{{ techDecrypt(request()->sending_url) }}" method="POST">
                @csrf
                <input id="package_id" type="hidden" name="package_id" value="{{ request()->package_id }}">
                <input id="billing_cycle" type="hidden" name="billing_cycle" value="{{ request()->billing_cycle }}">
                <button type="submit" class="flex justify-center checkout-btn items-center text-center px-4 py-3 font-Figtree text-white dark:text-color-14 w-full mt-[22px] rounded-xl font-semibold dark:bg-color-F6 bg-black">
                    {{ __('Continue to Payment') }} 
                    <svg class="loader animate-spin h-5 w-5 hidden ml-2" xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 72 72" fill="none">
                        <mask id="path-1-inside-1_1032_3037" fill="white">
                            <path d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z"></path>
                        </mask>
                        <path d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z" stroke="url(#paint0_linear_1032_3037)" stroke-width="24" mask="url(#path-1-inside-1_1032_3037)"></path>
                        <defs>
                            <linearGradient id="paint0_linear_1032_3037" x1="46.8123" y1="63.1382" x2="21.8195" y2="6.73779" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#E60C84"></stop>
                                <stop offset="1" stop-color="#FFCF4B"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </button>
            
            </form>
            <div class="justify-center items-center text-center mt-[17px]">
                <a href="{{ url()->previous() }}" class="text-16 font-Figtree font-normal text-color-14 dark:text-white">{{ __('Go Back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('child-js')
<script>
    const check_coupon = "{{ route('user.subscription.checkDiscount') }}"
    const reset_discount = "{{ route('user.subscription.resetDiscount') }}"
    const billing_cycle = "{{ request()->billing_cycle }}";
</script>
<script src="{{ asset('public/assets/js/site/coupon.min.js') }}"></script>
@endsection
