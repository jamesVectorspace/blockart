@extends('layouts.master')
@section('page_title', __('Reset Link'))
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
    <div class="relative bg-white dark:bg-[#3A3A39] rounded-3xl w-[350px] xs:w-[388px] sm:w-[506px] h-[352px] px-4 sm:px-10 py-8 z-[2] mt-11">
        <p class="text-center text-24 font-bold text-color-14 dark:text-white">{{ __('Reset your password')}}</p>
        <div class="flex justify-center mt-9">
            <svg class="neg-transition-scale" width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M75.1685 31.3104L75.4789 30.9131L76.0003 31.3104V73.5174C75.9962 74.887 74.887 75.9961 73.5176 76.0002H6.48274C5.11333 75.9961 4.00408 74.8868 4 73.5174V31.3104L4.52144 30.9131L4.8318 31.3104H75.1685Z" fill="url(#paint0_linear_1295_1573)"/>
                <path d="M75.4789 30.9131L75.1686 31.3104L41.2417 57.3794H38.759L4.83184 31.3104L4.52148 30.9131L16.4139 21.6648L32.7754 8.96546L38.4981 4.52127C39.3789 3.82616 40.6216 3.82616 41.5023 4.52127L47.2251 8.96546L63.5865 21.6648L75.4789 30.9131Z" fill="#821E24"/>
                <path d="M63.5866 11.4482V40.211L41.2418 57.3794H38.759L16.4141 40.2111V11.4482C16.4181 10.0786 17.5274 8.96953 18.8968 8.96545H61.1038C62.4734 8.96953 63.5825 10.0788 63.5866 11.4482Z" fill="#F6F3F2"/>
                <path d="M75.5143 74.9822C75.0509 75.6236 74.3069 76.0024 73.5157 76.0002H6.48099C5.68969 76.0026 4.94578 75.6236 4.48242 74.9822L32.9225 52.898L38.4963 48.5656C39.3771 47.8705 40.6198 47.8705 41.5005 48.5656L47.0743 52.898L75.5143 74.9822Z" fill="url(#paint1_linear_1295_1573)"/>
                <path d="M50.2776 16.065C47.4323 13.2197 42.8194 13.2197 39.9741 16.065L39.1201 16.919C38.7974 17.2306 38.668 17.6923 38.7816 18.1262C38.8953 18.5602 39.2342 18.8993 39.6683 19.0129C40.1022 19.1265 40.5638 18.9971 40.8755 18.6744L41.7308 17.8204C42.9299 16.5442 44.7285 16.0216 46.4248 16.4569C48.121 16.8921 49.446 18.2161 49.8823 19.9119C50.3187 21.6077 49.7977 23.4069 48.5223 24.607L45.1036 28.0257C44.0821 29.0427 42.6587 29.5485 41.2244 29.4043C39.7902 29.26 38.496 28.4809 37.6976 27.2808C37.318 26.7097 36.5475 26.5543 35.9764 26.9339C35.4054 27.3133 35.25 28.0839 35.6295 28.655C36.839 30.4764 38.8015 31.6592 40.9769 31.878C43.1523 32.0968 45.3111 31.3286 46.8592 29.7846L50.2779 26.3672C53.1173 23.5202 53.1173 18.9121 50.2776 16.065Z" fill="#141414"/>
                <path d="M39.1199 34.0154L38.2646 34.8694C37.0655 36.1456 35.2669 36.6681 33.5706 36.2329C31.8744 35.7976 30.5494 34.4737 30.1131 32.7779C29.6766 31.0819 30.1977 29.2829 31.4731 28.0828L34.8918 24.6641C35.9133 23.6471 37.3367 23.1412 38.771 23.2855C40.2052 23.4298 41.4994 24.2089 42.2979 25.4089C42.6773 25.98 43.4479 26.1354 44.019 25.7559C44.59 25.3765 44.7454 24.6058 44.3659 24.0348C43.1552 22.2149 41.193 21.0334 39.0182 20.8146C36.8434 20.5958 34.6851 21.3629 33.1363 22.9051L29.7175 26.3226C27.8704 28.1618 27.1465 30.8478 27.8193 33.3661C28.4922 35.8844 30.4592 37.8515 32.9775 38.5242C35.4958 39.1971 38.1817 38.4732 40.021 36.6261L40.875 35.7721C41.3454 35.2849 41.3388 34.5106 40.8598 34.0318C40.381 33.553 39.6067 33.5462 39.1196 34.0166V34.0154H39.1199Z" fill="#141414"/>
                <defs>
                <linearGradient id="paint0_linear_1295_1573" x1="50.8126" y1="70.4508" x2="39.9258" y2="31.2181" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#E60C84"/>
                <stop offset="1" stop-color="#FFCF4B"/>
                </linearGradient>
                <linearGradient id="paint1_linear_1295_1573" x1="50.6653" y1="72.5594" x2="46.231" y2="47.1335" gradientUnits="userSpaceOnUse">
                <stop offset="0" stop-color="#E60C84"/>
                <stop offset="1" stop-color="#FFCF4B"/>
                </linearGradient>
                </defs>
            </svg>
        </div>

        <p class="text-center text-14 font-normal text-color-14 dark:text-white mt-9">{{ __('A password reset link has been sent to your email address (:x). Check your spam folder if not found.',['x' => $email])}}</p>
        <a class="text-center text-15 font-medium text-color-14 dark:text-white block mt-6 underline" href="{{ route('login') }}">{{ __('Back to sign in')}}</a>
    </div>
</div>
@endsection
