@extends('layouts.master')
@section('page_title', __('Set New Password'))
@section('child-content')
<div class="relative h-screen log-bg flex flex-col items-center pb-11 login-bg overflow-auto font-Figtree">
    @php
        $logoLight = App\Models\Preference::getFrontendLogo('light');
        $logoDark = App\Models\Preference::getFrontendLogo('dark');
    @endphp
    <a href="{{ route('frontend.index') }}" >
        <img class="mt-11 dark:hidden w-[175px] h-[42px] object-contain" src="{{ $logoLight }}" alt="{{ __('Logo') }}">
        <img class="mt-11 hidden dark:block w-[175px] h-[42px] object-contain" src="{{ $logoDark }}" alt="{{ __('Logo') }}">
    </a>
    <div class="relative confirm-password-form-container container-all password-match bg-white dark:bg-[#3A3A39] rounded-3xl w-[350px] xs:w-[388px] sm:w-[506px] h-max px-4 sm:px-10 py-8 z-[2] mt-11">
        <p class="text-center text-24 font-bold text-color-14 dark:text-white">{{ __('Set new password')}}</p>
        @php $msg = __('This field is required.'); @endphp
        <form action="{{ route('password.resets') }}" method="post" class="button-need-disable signupForm">
            <label class="block mt-8">
                <div class="flex justify-between">
                    <span class="block text-14 font-medium text-color-14 dark:text-white">{{ __('New Password')}}</span>
                </div>
                <div class="relative password-container">
                    @csrf
                    <input type="hidden" name="id" value = {{ $user->id}} >
                    <input type="hidden" name="token" value = {{$token}} >
                    <input type="password" class="form-control password password-field border border-color-89 dark:border-[#474746] rounded-xl h-12 w-full mt-1.5 px-2 text-color-14 dark:text-white dark:bg-[#333332] text-14 font-medium password-field" placeholder="{{__('New Password')}}" id="password-reset-validation" name="password" required oninvalid="this.setCustomValidity('{{ $msg }}')"/>
                    <a href="javascript: void(0)">
                        <svg class="absolute right-[14px] top-5 pass-eye" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M9.99967 3.75C5.83301 3.75 2.27467 6.34167 0.833008 10C2.27467 13.6583 5.83301 16.25 9.99967 16.25C14.1663 16.25 17.7247 13.6583 19.1663 10C17.7247 6.34167 14.1663 3.75 9.99967 3.75ZM9.99967 14.1667C7.69967 14.1667 5.83301 12.3 5.83301 10C5.83301 7.7 7.69967 5.83333 9.99967 5.83333C12.2997 5.83333 14.1663 7.7 14.1663 10C14.1663 12.3 12.2997 14.1667 9.99967 14.1667ZM9.99967 7.5C8.61634 7.5 7.49967 8.61667 7.49967 10C7.49967 11.3833 8.61634 12.5 9.99967 12.5C11.383 12.5 12.4997 11.3833 12.4997 10C12.4997 8.61667 11.383 7.5 9.99967 7.5Z" fill="#898989"/>
                            </g>
                            <defs>
                                <clipPath>
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>

                        <svg class="password-show absolute right-[14px] top-5" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M9.99967 3.75C5.83301 3.75 2.27467 6.34167 0.833008 10C2.27467 13.6583 5.83301 16.25 9.99967 16.25C14.1663 16.25 17.7247 13.6583 19.1663 10C17.7247 6.34167 14.1663 3.75 9.99967 3.75ZM9.99967 14.1667C7.69967 14.1667 5.83301 12.3 5.83301 10C5.83301 7.7 7.69967 5.83333 9.99967 5.83333C12.2997 5.83333 14.1663 7.7 14.1663 10C14.1663 12.3 12.2997 14.1667 9.99967 14.1667ZM9.99967 7.5C8.61634 7.5 7.49967 8.61667 7.49967 10C7.49967 11.3833 8.61634 12.5 9.99967 12.5C11.383 12.5 12.4997 11.3833 12.4997 10C12.4997 8.61667 11.383 7.5 9.99967 7.5Z" fill="#898989"/>
                            </g>
                            <defs>
                                <clipPath>
                                    <rect width="20" height="20" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>

                        <svg class="password-hide absolute right-[14px] top-5" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.2706 2.47187C16.0262 2.2275 15.6312 2.2275 15.3868 2.47187L13.6593 4.19937C12.5662 3.75937 11.3456 3.47562 9.99932 3.47562C3.99994 3.47562 0.252442 9.29625 0.0961922 9.54437C0.00369221 9.69125 -0.0200578 9.86187 0.0161922 10.0187C-0.0138078 10.1675 0.00556721 10.3269 0.0911922 10.4669C0.178067 10.6094 1.41744 12.585 3.61744 14.2425L2.16557 15.6937C1.92119 15.9381 1.92119 16.3331 2.16557 16.5775C2.28744 16.6994 2.44744 16.7606 2.60744 16.7606C2.76744 16.7606 2.92744 16.6994 3.04932 16.5775L16.2706 3.35562C16.5143 3.11187 16.5143 2.71625 16.2706 2.47187ZM6.39932 9.96312C6.39932 7.97812 8.01432 6.36312 9.99932 6.36312C10.4443 6.36312 10.8693 6.44687 11.2624 6.59562L10.2243 7.63375C10.1493 7.62562 10.0762 7.61312 9.99932 7.61312C8.70369 7.61312 7.64932 8.6675 7.64932 9.96312C7.64932 10.04 7.66244 10.1131 7.66994 10.1881L6.63182 11.2262C6.48307 10.8337 6.39932 10.4081 6.39932 9.96312ZM19.9024 10.4556C19.7462 10.7031 15.9987 16.5244 9.99932 16.5244C8.43307 16.5244 7.03307 16.1437 5.81119 15.5762L8.26932 13.1175C8.78307 13.4006 9.37307 13.5625 9.99994 13.5625C11.9849 13.5625 13.5999 11.9475 13.5999 9.9625C13.5999 9.33562 13.4381 8.74625 13.1549 8.23187L15.9487 5.43812C18.4199 7.14937 19.8162 9.38125 19.9081 9.5325C19.9937 9.6725 20.0131 9.83187 19.9831 9.98062C20.0187 10.1387 19.9956 10.3087 19.9024 10.4556ZM9.21807 12.1694L12.2056 9.1825C12.2931 9.42812 12.3493 9.68875 12.3493 9.96375C12.3493 11.2594 11.2949 12.3137 9.99932 12.3137C9.72432 12.3131 9.46369 12.2569 9.21807 12.1694Z" fill="#898989"/>
                        </svg>
                    </a>
                </div>
            </label>
            <div class="block mt-6">
                <span class="block text-14 font-medium text-color-14 dark:text-white">{{ __('Repeat Password')}}</span>
                <div class="relative password-container">
                    <input type="password" class="form-control border password_confirmation password-field border-color-89 dark:border-[#474746] rounded-xl h-12 w-full mt-1.5 px-2 text-color-14 dark:text-white dark:bg-[#333332] text-14 font-medium password-field" placeholder="{{ __('Repeat Password')}}" name="password_confirmation" required oninvalid="this.setCustomValidity('{{ $msg }}')"/>
                    <span
                        class="absolute hidden password-matching right-[14px] top-2.5 h-8 cursor-pointer">
                        <svg class="mt-2.5 h-3 md:h-4" xmlns="http://www.w3.org/2000/svg" width="19"
                            height="15" viewBox="0 0 19 15" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.3163 0.462473C17.5102 -0.242925 16.3121 -0.128557 15.6403 0.717921L8.80424 9.33189C8.14548 10.162 7.77515 10.6215 7.47948 10.9039C7.47564 10.9076 7.47188 10.9112 7.46818 10.9147C7.46419 10.9115 7.46013 10.9083 7.456 10.9051C7.13719 10.6519 6.72875 10.2295 6.00113 9.4654L3.2435 6.56972C2.5015 5.79059 1.29849 5.79059 0.556498 6.56972C-0.185497 7.34886 -0.185497 8.61209 0.556498 9.39123L3.31413 12.2869C3.34002 12.3141 3.36587 12.3412 3.39168 12.3684C4.01203 13.02 4.60881 13.6469 5.16407 14.0878C5.78606 14.5817 6.60062 15.0461 7.6445 14.9963C8.68838 14.9466 9.45955 14.4067 10.0364 13.8557C10.5514 13.3639 11.0916 12.6828 11.6532 11.9749C11.6766 11.9454 11.7 11.9159 11.7235 11.8864L18.5596 3.27239C19.2313 2.42592 19.1224 1.16787 18.3163 0.462473Z"
                                fill="#33C172" />
                        </svg>
                            </span>
                </div>
            </div>
            <span class="password-validation-error block text-xs font-Figtree md:text-sm mt-1 text-[#DF2F2F]"></span>
            <button class="block w-full bg-color-14 dark:bg-white text-white dark:text-color-14 text-16 font-semibold py-3 flex justify-center items-center gap-3 rounded-xl text-center mt-6">{{ __('Update')}}
                <span class="items-center sign-up-loader hidden">
                    <svg class="animate-spin h-5 w-5 m-auto" xmlns="http://www.w3.org/2000/svg" width="72"
                        height="72" viewBox="0 0 72 72" fill="none">
                        <mask id="path-1-inside-1_1032_3036" fill="white">
                            <path
                                d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z" />
                        </mask>
                        <path
                            d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z"
                            stroke="url(#paint0_linear_1032_3036)" stroke-width="24"
                            mask="url(#path-1-inside-1_1032_3036)" />
                        <defs>
                            <linearGradient id="paint0_linear_1032_3036" x1="46.8123" y1="63.1382" x2="21.8195"
                                y2="6.73779" gradientUnits="userSpaceOnUse">
                                <stop offset="0" stop-color="#E60C84" />
                                <stop offset="1" stop-color="#FFCF4B" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
            </button>
        </form>
    </div>
</div>
@endsection
