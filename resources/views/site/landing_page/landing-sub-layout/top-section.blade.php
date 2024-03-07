<div class="relative bg-top">
    <img class="absolute h-full w-full dark:bg-color-14 dark:hidden sm:block hidden"
        src="{{ asset('Modules/OpenAI/Resources/assets/image/main-bg.png') }}" alt="">
    <img class="absolute h-full w-full dark:bg-color-14 sm:dark:block hidden"
        src="{{ asset('Modules/OpenAI/Resources/assets/image/main-bg-dark.png') }}" alt="">
    <img class="absolute h-full w-full dark:bg-color-14 sm:hidden"
        src="{{ asset('Modules/OpenAI/Resources/assets/image/mobile-hero-bg.png') }}" alt="">
    <img class="absolute h-full w-full dark:bg-color-14 dark:block hidden sm:dark:hidden"
        src="{{ asset('Modules/OpenAI/Resources/assets/image/mobile-hero-dark-bg.png') }}" alt="">
    <div class="7xl:pt-[187px] 2xl:pt-[154px] pt-[114px] relative text-center content px-5 md:px-0">
        <p class="font-Figtree 5xl:text-20 text-18 font-medium text-color-F6 wow fadeInUp break-words" data-wow-offset="10">
            {{ __('Create Better Content with Less Effort.') }}</p>
        <p class="px-5 text-white 5xl:text-80 xs:text-[52px] text-[45px] font-bold font-RedHat mt-5 wow fadeInUp break-words"
            data-wow-delay="200ms" data-wow-offset="10">{{ __('AI Powered') }}</p>
        <div class="swiper slider3 2xl:w-[900px] m-auto wow fadeInUp" data-wow-delay="400ms" data-wow-offset="10">
            <div class="swiper-wrapper md:mt-4 mt-3">
                <div class="swiper-slide w-full h-full">
                    <div class="flex justify-center">
                        <p class="5xl:text-[80px] xs:text-[52px] text-[45px] font-bold font-RedHat heading-3 break-words top-slider-text">
                            {{ __('Social Media Marketing') }}
                        </p>
                    </div>
                </div>
                <div class="swiper-slide w-full h-full">
                    <div class="relative flex justify-center">
                        <p class="5xl:text-[80px] xs:text-[52px] text-[45px] font-bold font-RedHat heading-3 break-words top-slider-text">
                            {{ __('Content Improver') }}
                        </p>
                    </div>
                </div>
                <div class="swiper-slide w-full h-full">
                    <div class="relative flex justify-center">
                        <p class="5xl:text-[80px] xs:text-[52px] text-[45px] font-bold font-RedHat heading-3 break-words top-slider-text">
                            {{ __('Video Script Writing') }}
                        </p>
                    </div>
                </div>
                <div class="swiper-slide w-full h-full">
                    <div class="relative flex justify-center">
                        <p class="5xl:text-[80px] xs:text-[52px] text-[45px] font-bold font-RedHat heading-3 break-words top-slider-text">
                            {{ __('Landing Page Copy') }}
                        </p>
                    </div>
                </div>
                <div class="swiper-slide w-full h-full">
                    <div class="relative flex justify-center">
                        <p class="5xl:text-[80px] xs:text-[52px] text-[45px] font-bold font-RedHat heading-3 break-words top-slider-text">
                            {{ __('Business Strategies') }}
                        </p>
                    </div>
                </div>
                <div class="swiper-slide w-full h-full">
                    <div class="relative flex justify-center">
                        <p class="5xl:text-[80px] xs:text-[52px] text-[45px] font-bold font-RedHat heading-3 break-words top-slider-text">
                            {{ __('Blog & Email Writing') }}
                        </p>
                    </div>
                </div>
                <div class="swiper-slide w-full h-full">
                    <div class="relative flex justify-center">
                        <p class="5xl:text-[80px] xs:text-[52px] text-[45px] font-bold font-RedHat heading-3 break-words top-slider-text">
                            {{ __('And So Much More') }}!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <p class="text-color-F6 font-Figtree font-medium 5xl:text-[26px] 5xl:leading-[44px] text-lg leading-[31px] md:mt-7 mt-6 wow fadeInUp mx-auto 7xl:w-[1000px] 2xl:w-[700px] md:w-[600px]"
            data-wow-delay="600ms" data-wow-offset="10">
            {{ __('Write 10x faster, engage your audience & never struggle with the blank page again. The number 1 AI collaborative software you ever need.') }}
        </p>
        <div class="5xl:mt-[52px] mt-9 flex flex-col items-center md:gap-8 gap-7 justify-center wow fadeInUp"
            data-wow-delay="1000ms">
            <a href="{{ route('users.registration') }}"
                class="text-color-14 rounded-lg bg-white px-9 py-[13px] font-Figtree text-20 font-semibold flex relative z-50">{{ __('Get Started for Free') }}</a>
            <a href="{{ route('site.page', [ 'slug' => 'about-us' ]) }}"
                class="text-white underline font-Figtree text-18 6xl:mb-[133px] xl:mb-[176px] lg:mb-[188px] mb-[290px] font-normal relative z-50">{{ __('Learn More') }}</a>
            <div class="hidden button-to-bottom xl:block pb-[88px]">
                <div class="mouse m-1"></div>
            </div>
        </div>
        <span class="wow fadeInUp absolute 9xl:right-[199px] 5xl:right-[73px] 3xl:right-[64px] md:right-8 right-0 -bottom-12"
            data-wow-delay="1500ms" data-wow-offset="10">
            <img class="up-down-animation 4xl:w-[565px] md:h-[406px] xl:w-[530px] lg:w-[445px] w-[421px] h-[399px] object-contain lg:block hidden" src="{{ asset('Modules/OpenAI/Resources/assets/image/floating-robot.png') }}" alt="{{ __('Image') }}">
        </span>
        <span class="wow fadeInUp absolute xs:-bottom-[83px] -bottom-[38px] right-1"  data-wow-delay="1500ms" data-wow-offset="10">
            <img class="up-down-animation w-[418px] h-[399px] object-contain lg:hidden" src="{{ asset('Modules/OpenAI/Resources/assets/image/floating-image-small.png') }}" alt="{{ __('Image') }}">
        </span>
    </div>
</div>
