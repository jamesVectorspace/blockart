@extends('layouts.master')
@section('child-content')
<div class="relative h-screen log-bg flex flex-col items-center pb-11 login-bg overflow-auto font-Figtree">
    @php
        $logoLight = App\Models\Preference::getFrontendLogo('light');
        $logoDark = App\Models\Preference::getFrontendLogo('dark');
        $msg = __('This field is required.');
    @endphp
    <a href="{{ route('frontend.index') }}" >
        <img class="mt-11 dark:hidden" src="{{ $logoLight }}" alt="{{ __('Logo') }}">
        <img class="mt-11 hidden dark:block" src="{{ $logoDark }}" alt="{{ __('Logo') }}">
    </a>
    <div class="relative bg-white dark:bg-[#3A3A39] rounded-3xl w-[350px] xs:w-[388px] sm:w-[506px] h-max px-4 sm:px-10 py-8 z-[2] mt-11">
        <form action="{{ route('user.emailSignup')}}" method="post" class="signupForm">
            {!! csrf_field() !!}
            <label class="block mt-6">
                <span class="block text-14 font-medium text-color-14 dark:text-white">{{ __('Email Address')}}</span>
                <input class="form-control border border-color-89 dark:border-[#474746] rounded-xl h-12 w-full mt-1.5 px-2 text-color-14 dark:text-white dark:bg-[#333332] text-14 font-medium" value="{{ old('email') }}" type="email" name="email" placeholder="{{ __('Email') }}" required oninvalid="this.setCustomValidity('{{ $msg }}')"oninvalid="this.setCustomValidity('{{ $msg }}')"/>
            </label>
            <button class="block w-full bg-color-14 dark:bg-white text-white dark:text-color-14 text-16 font-semibold py-3 flex justify-center items-center gap-3 rounded-xl text-center mt-6">{{ __('Submit')}}
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



