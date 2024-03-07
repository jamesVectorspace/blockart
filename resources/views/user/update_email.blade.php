@extends('layouts.master')
@section('child-content')
    <div class="relative h-screen log-bg flex flex-col items-center pb-11 login-bg overflow-auto font-Figtree">
        <div class="absolute h-[52px] justify-start pl-5 w-full right-6 top-6">
            <label for="switch" class="flex items-center cursor-pointer float-right">
                <div class="relative">
                    <input type="checkbox" id="switch" class="sr-only switched">
                    <div class="block bg-color-DF dark:bg-[#FF774B] border border-color-89 dark:border-[#FF774B] w-9 h-5 rounded-full"></div>
                    <div class="dot absolute left-[2px] top-[2px] bg-white w-4 h-4 rounded-full transition"></div>
                </div>
                <div class="ml-3 hide dark:text-white text-color-14 font-normal text-base leading-6">
                    <span class="dark:text-[#333332] dark:hidden">{{ __('Dark Mode')}}</span>
                    <span class="dark:text-white text-white dark:flex hidden">{{ __('Light Mode')}}</span>
                </div>
            </label>
        </div>
        @php
            $logoLight = App\Models\Preference::getFrontendLogo('light');
            $logoDark = App\Models\Preference::getFrontendLogo('dark');
        @endphp
        <img class="mt-11 dark:hidden w-[175px] h-[42px] object-contain" src="{{ $logoLight }}" alt="{{ __('Logo') }}">
        <img class="mt-11 hidden dark:block w-[175px] h-[42px] object-contain" src="{{ $logoDark }}" alt="{{ __('Logo') }}">
        <div class="relative bg-white dark:bg-[#3A3A39] rounded-3xl w-[350px] xs:w-[388px] sm:w-[506px] h-max px-4 sm:px-10 py-8 z-[2] mt-11">
            <p class="text-center text-24 font-bold text-color-14 dark:text-white">{{ __('Reset your Email')}}</p>
            <form action="{{ route('userUpdateEmail') }}" id="updateEmailForm" method="post">
                {!! csrf_field() !!}
                <label class="block mt-6">
                    <input name="id" id="user_id" value type="hidden" />
                    <span class="block text-14 font-medium text-color-14 dark:text-white">{{ __('New Email Address')}}</span>
                    <input class="form-control border border-color-89 dark:border-[#474746] rounded-xl h-12 w-full mt-1.5 px-2 text-color-14 dark:text-white dark:bg-[#333332] text-14 font-medium" value="{{ old('email') }}" name="email" placeholder="{{ __('Email') }}" required />
                </label>
                <button class="update-email block w-full bg-color-14 dark:bg-white text-white dark:text-color-14 text-16 font-semibold py-3 rounded-xl text-center mt-6">{{ __('Submit')}}</button>
            </form>
        </div>
    </div>
@endsection

@section('child-js')

    <script>
        const hash_id = {{ decrypt($id) }};
    </script>
    
    <script src="{{ asset('public/assets/js/user/update-email.min.js') }}"></script>

@endsection