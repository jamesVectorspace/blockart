@extends('layouts.site_master')
@section('css')
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/wow-js-animation/animation.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/plugin/swiper/swiper-bundle.min.css') }}">
@endsection
@section('content')
    <div class="dark:bg-color-14">
        @include('site.landing_page.landing-sub-layout.top-section')
        <div class="md:mt-[122px] mt-[97px] dark:bg-color-14">
            <div class="relative flex justify-center items-center">
                <p
                    class="uppercase absolute font-Figtree text-center heading-1 tracking-[0.2em] text-base leading-6 font-bold">
                    {{ __('Artificial Intelligence') }}</p>
            </div>
            <p class="mt-[18px] font-RedHat 6xl:text-48 text-36 font-bold text-center text-color-14 dark:text-white break-words px-5">
                {{ __('Generate Quality Content Effortlessly') }}
            </p>
            <p
                class="mt-3 font-Figtree text-color-14 dark:text-white font-normal text-center 6xl:text-18 text-16 md:px-10 xl:px-5 px-5 lg:px-0 dark:bg-color-14 lg:w-[650px] w-full mx-auto">
               {{ __(':x is the ultimate AI-powered content generating tool to help you quickly create high-quality content that requires minimal effort, time, and cost.', ['x' => preference('company_name')]) }}
            </p>
            <div class="5xl:pt-2.5 pt-0 5xl:mt-11 mt-8">
                @include('site.landing_page.landing-sub-layout.art-ready-sec')
            </div>
            <div class="text-center">
                <div
                    class="6xl:mt-[72px] mt-10 6xl:gap-[60px] gap-12 flex flex-col md:flex-row items-center justify-center flex-wrap px-5">
                    <div class="flex lg:flex-row flex-col items-center justify-center gap-3">
                        <img class="neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/pen-tool1.svg') }}"
                            alt="{{ __('Image') }}">
                        <span class="text-color-14 dark:text-white text-18 font-Figtree font-medium">
                            {{ __('No more human error') }}
                        </span>
                    </div>
                    <div class="flex lg:flex-row flex-col items-center justify-center gap-3">
                        <img class="neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/flash-1.svg') }}"
                            alt="{{ __('Image') }}">
                        <span class="text-color-14 dark:text-white text-18 font-Figtree font-medium">
                            {{ __('Publish content 10X faster') }}
                        </span>
                    </div>
                    <div class="flex lg:flex-row flex-col items-center justify-center gap-3">
                        <img class="neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/rocket1.svg') }}"
                            alt="{{ __('Image') }}">
                        <span class="text-color-14 dark:text-white text-18 font-Figtree font-medium">
                            {{ __('Boost sales with better copy') }}
                        </span>
                    </div>
                </div>
                <p class="text-color-14 dark:text-white font-bold text-center font-RedHat 6xl:text-32 text-28 mt-10 px-5">
                    {{ __('Start your free trial today and witness the magic!') }}</p>
                <p class="text-color-14 dark:text-white text-center text-18 font-normal mt-4 font-Figtree">
                    {{ __('No credit card required.') }}</p>
                <a href="{{ route('users.registration') }}"
                    class="inline-flex h-[58px] gap-2.5 text-center items-center mx-auto justify-center mt-9 rounded-lg free-button"><span
                        class="text-18 pl-[27px] font-semibold text-color-14 dark:text-white font-Figtree rounded-lg pr-27px-rtl">
                        {{ __('Get Started for Free') }}</span> <svg class="mr-[27px] ml-27px-rtl neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14"
                        height="12" viewBox="0 0 14 12" fill="none">
                        <path
                            d="M13.707 6.70597C14.0977 6.3155 14.0977 5.68137 13.707 5.2909L8.70674 0.292854C8.31609 -0.0976181 7.68168 -0.0976181 7.29103 0.292854C6.90039 0.683327 6.90039 1.31745 7.29103 1.70793L10.5881 5.00039H1.00006C0.4469 5.00039 0 5.44709 0 6C0 6.55291 0.4469 6.99961 1.00006 6.99961H10.585L7.29416 10.2921C6.90351 10.6825 6.90351 11.3167 7.29416 11.7071C7.6848 12.0976 8.31921 12.0976 8.70986 11.7071L13.7101 6.7091L13.707 6.70597Z"
                            fill="#E22861" />
                    </svg>
                </a>
            </div>
            @include('site.landing_page.landing-sub-layout.slider-sec')
            <div class="relative 2xl:pt-[182px] pt-[52px] bg-white dark:bg-color-14">
                <img class="absolute -top-[28rem] w-full hidden sm:block neg-transition-scale"
                    src="{{ asset('Modules/OpenAI/Resources/assets/image/bg-three.png') }}" alt="">
                <span class="w-full">
                    <img class="absolute w-full block sm:hidden neg-transition-scale"
                        src="{{ asset('Modules/OpenAI/Resources/assets/image/mobile-bg-three.svg') }}" alt="">
                </span>

                @include('site.landing_page.landing-sub-layout.brand-subscribe')
            </div>
            <div class="9xl:px-[310px] 8xl:px-40 lg:px-16 md:px-10 px-5">
                @include('site.landing_page.landing-sub-layout.customer-review')
            </div>
            <div class="relative">
                @include('site.landing_page.landing-sub-layout.faq-latestNews')
            </div>
            <div>
                <div class="relative sm:top-[111px] top-[72px] rounded-[40px] flex justify-center">
                    <img class="absolute h-full 9xl:px-[310px] 8xl:px-40 lg:px-16 md:px-10 px-5 rounded-[54px] md:rounded-0 w-full neg-transition-scale"
                        src="{{ asset('Modules/OpenAI/Resources/assets/image/footer-bg.png') }}" alt="">
                    <div
                        class="relative grid md:grid-cols-2 grid-cols-1 gap-5 6xl:gap-0 9xl:px-[310px] 8xl:px-40 lg:px-16 md:px-10 px-5">
                        <div class="lg:pl-[72px] px-[26px] xl:mb-[86px] md:mb-10 mb-0 footer-banner">
                            <p class="text-color-14 3xl:text-48 text-36 font-RedHat font-bold lg:pt-[68px] pt-[26px]">
                                {!! str_replace(__('imagination'), "<span class='text-color-E2'>" . __('imagination') . "</span>", __('Harmony with machines beyond imagination.') ) !!}
                            </p>
                            <p class="mt-4 text-color-14 3xl:text-18 text-16 font-normal font-Figtree">
                                {{ __('Explore :x for free to see the potential and how it can help to autopilot the content creation process.', [ 'x' => preference('company_name') ]) }} </p>
                            <div class="flex mt-8 items-center gap-4 flex-wrap">
                                <a href="{{ route('users.registration') }}"
                                    class="text-color-14 text-16 font-semibold font-Figtree bg-white py-[13px] xs:px-7 px-3 rounded-lg">{{ __('Register Now') }}</a>
                                <a href="{{ route('frontend.pricing') }}"
                                    class="text-white text-16 font-semibold font-Figtree bg-color-14 py-[13px] xs:px-7 px-3 rounded-lg">{{ __('See Pricings') }}</a>
                            </div>
                        </div>
                        <img class="lg:-mt-[52px] lg:mb-10 -mb-[33px] lg:ml-0 sm:ml-7 xs:ml-[65px] m-auto lg:w-[479px] lg:h-[452px] md:w-[395px] md:h-[360px] w-[295px] h-[278px] holding-butterfly neg-transition-scale"
                            src="{{ asset('Modules/OpenAI/Resources/assets/image/Holding_a_butterfly.png') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/assets/plugin/wow-js-animation/animation.min.js') }}"></script>
    <script src="{{ asset('public/assets/plugin/swiper/swiper-bundle.min.js') }}"></script>
    <script>
        const SUBSCRIBE_EMAIL = "{{ route('subscriber.store') }}";
    </script>
    <script src="{{ asset('public/assets/js/site/landing.min.js') }}"></script>
@endsection
