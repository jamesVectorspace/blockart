<!DOCTYPE html>
<html lang="en" class="{{ \Illuminate\Support\Facades\Cookie::get('theme_preference') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('public/assets/tailwind/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/common/tailwind-custom.min.css') }}">
</head>
<body>
    @php
        $logoLight = App\Models\Preference::getFrontendLogo('light');
        $logoDark = App\Models\Preference::getFrontendLogo('dark');
    @endphp
    <div class="relative h-screen log-bg flex flex-col items-center pb-11 login-bg overflow-auto font-Figtree">
        <img class="mt-11 dark:hidden w-[175px] h-[42px] object-contain" src="{{ $logoLight }}" alt=" ">
        <img class="mt-11 hidden dark:block w-[175px] h-[42px] object-contain" src="{{ $logoDark }}" alt=" ">
        <div class="mt-14 relative flex flex-col items-center">
            <p class="font-bold lg:text-[384px] xs:text-[208px] text-[150px] lg:leading-[320px] leading-[200px] text-white error-msg-text-shadow font-RedHat">@yield('code')</p>
            <img class="absolute lg:top-[118px] top-20 w-[142px] lg:w-[229px]" src="{{ asset('public/assets/image/error-page-robo.png') }}">
            <p class="lg:mt-[118px] mt-20 text-center dark:text-white text-color-14 lg:text-lg text-base font-normal font-Figtree px-5">@yield('message')</p>
            <a href="{{ route('frontend.index') }}" class="flex justify-center items-center mt-8">
                <span class="underline text-lg font-Figtree text-color-14 font-semibold dark:text-white">{{ __('Go to Homepage')}}</span> 
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.83333 6.66667C5.3731 6.66667 5 6.29357 5 5.83333C5 5.3731 5.3731 5 5.83333 5H14.1667C14.6269 5 15 5.3731 15 5.83333V14.1667C15 14.6269 14.6269 15 14.1667 15C13.7064 15 13.3333 14.6269 13.3333 14.1667V7.84518L6.42259 14.7559C6.09715 15.0814 5.56951 15.0814 5.24408 14.7559C4.91864 14.4305 4.91864 13.9028 5.24408 13.5774L12.1548 6.66667H5.83333Z" fill="#E22861"/>
                </svg>
            </a>
        </div>
    </div>
</body>
</html>
