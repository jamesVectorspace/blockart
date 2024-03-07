<div id="digital_art" class="relative 6xl:mt-[120px] mt-[72px]">
    <img class="absolute w-full h-full dark:hidden hidden md:block neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/bg-two.png') }}" alt="">
    <img class="absolute w-full h-full md:dark:block hidden neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/dark-bg-two.png') }}" alt="">
    <img class="absolute w-full h-full md:hidden neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/mobile-bg-2.png') }}" alt="">
    <img class="absolute w-full h-full md:dark:hidden dark:block hidden neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/mobile-bg-dark-2.png') }}" alt="">
    <div class="flex 2xl:flex-row flex-col z-40 relative justify-between gap-11 2xl:gap-4">
        <div class="6xl:pt-[122px] 9xl:ltr:pl-[310px] 8xl:ltr:pl-40 7xl:ltr:pl-32 lg:ltr:pl-16 md:ltr:pl-10 ltr:pl-5 9xl:rtl:pr-[310px] 8xl:rtl:pr-40 7xl:rtl:pr-32 lg:rtl:pr-16 md:rtl:pr-10 rtl:pr-5 pt-12 relative">
            <div class="relative">
                <p class="uppercase heading-2 absolute tracking-[0.2em] font-Figtree text-16 font-bold">{{ __('image generator')}}
                </p>
            </div>
            <p class="text-white mt-[30px] 6xl:text-48 text-36 font-bold font-RedHat 7xl:w-[520px] md:ltr:pr-0 ltr:pr-5 2xl:w-[375px]">{{ __('Generate Digital Arts Like Never Before')}}
            </p>
            <p class="text-white 6xl:text-18 text-16 font-Figtree font-normal mt-3 lg:pr-[117px] pr-9 create-ai">{{ __("Create AI art or images from text that turns your imagination into unique images in seconds. Finally, you'll have the perfect picture to match your message.") }}</p>
            <div class="6xl:mt-9 mt-8 relative pl-5 option-create-ai">
                <div class="flex gap-3 mb-[26px]">
                    <img class="neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/checkmark.svg') }}"
                        alt="{{ __('Image') }}">
                    <p class="font-normal text-18 text-white font-Figtree">{{ __('Various Resulation')}}</p>
                </div>
                <div class="flex gap-3 mb-[26px]">
                    <img class="neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/checkmark.svg') }}"
                        alt="{{ __('Image') }}">
                    <p class="font-normal text-18 text-white font-Figtree">{{ __('Royality-free commercial use')}}</p>
                </div>
                <div class="flex gap-3">
                    <img class="neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/checkmark.svg') }}"
                        alt="{{ __('Image') }}">
                    <p class="font-normal text-18 text-white font-Figtree">{{ __('No watermark')}}</p>
                </div>
            </div>
            <div class="flex flex-wrap gap-4 my-12 relative mr-5">
                <a class="font-Figtree text-white items-center text-center font-semibold text-18 bg-color-E6 py-3.5 px-8 rounded-lg"
                    href="{{ moduleConfig('openai.demo_url') }}" target="_blank">{{ __('Watch Demo')}}</a>
                <a class="font-Figtree text-white dark:text-color-14 flex justify-center items-center font-semibold text-18 gap-2.5 learn-more-button h-[54px] rounded-lg"
                    href="{{ route('site.page', [ 'slug' => 'about-us' ]) }}"> <span class="pl-[27px] pr-27px-rtl">{{ __('Learn More')}}</span> <svg class="mr-[27px] ml-27px-rtl neg-transition-scale" xmlns="http://www.w3.org/2000/svg"
                        width="14" height="12" viewBox="0 0 14 12" fill="none">
                        <path
                            d="M13.707 6.70597C14.0977 6.3155 14.0977 5.68137 13.707 5.2909L8.70674 0.292854C8.31609 -0.0976181 7.68168 -0.0976181 7.29103 0.292854C6.90039 0.683327 6.90039 1.31745 7.29103 1.70793L10.5881 5.00039H1.00006C0.4469 5.00039 0 5.44709 0 6C0 6.55291 0.4469 6.99961 1.00006 6.99961H10.585L7.29416 10.2921C6.90351 10.6825 6.90351 11.3167 7.29416 11.7071C7.6848 12.0976 8.31921 12.0976 8.70986 11.7071L13.7101 6.7091L13.707 6.70597Z"
                            fill="currentColor" />
                    </svg> </a>
            </div>
        </div>
        <div class="flex 2xl:flex-row flex-col gap-9">
            <div class="relative slider-section px-5 2xl:px-0 md:mr-auto 2xl:m-auto md:pl-10 lg:pl-16 bg-transparent">
                <div
                    class="swiper 8xl:w-[570px] 6xl:w-[500px] 2xl:h-[780px] h-[576px] 2xl:w-[428px] sm:w-[90%] slider1 absolute 2xl:-bottom-11 md:w-[570px] sm:h-[780px]  bg-transparent">
                    <div class="swiper-wrapper rounded-[30px]">
                        <div class="swiper-slide w-full h-full rounded-[30px] bg-transparent overflow-hidden"><img class="w-full h-full rounded-[30px] neg-transition-scale"
                                src="{{ asset('Modules/OpenAI/Resources/assets/image/deer.png') }}"
                                alt="{{ __('Image') }}">
                        </div>
                        <div class="swiper-slide w-full h-full rounded-[30px] bg-transparent overflow-hidden"><img class="w-full h-full rounded-[30px] neg-transition-scale"
                                src="{{ asset('Modules/OpenAI/Resources/assets/image/mountain.png') }}"
                                alt="{{ __('Image') }}">
                        </div>
                        <div class="swiper-slide w-full h-full rounded-[30px] bg-transparent overflow-hidden"><img class="w-full h-full rounded-[30px] neg-transition-scale"
                                src="{{ asset('Modules/OpenAI/Resources/assets/image/ziraffe.png') }}"
                                alt="{{ __('Image') }}">
                        </div>
                        <div class="swiper-slide w-full h-full rounded-[30px] bg-transparent overflow-hidden"><img class="w-full h-full rounded-[30px] neg-transition-scale"
                            src="{{ asset('Modules/OpenAI/Resources/assets/image/potrait.png') }}"
                            alt="{{ __('Image') }}">
                        </div>
                        <div class="swiper-slide w-full h-full rounded-[30px] bg-transparent overflow-hidden"><img class="w-full h-full rounded-[30px] neg-transition-scale"
                            src="{{ asset('Modules/OpenAI/Resources/assets/image/sports-car.png') }}"
                            alt="{{ __('Image') }}">
                        </div>

                    </div>
                    <div class="swiper-pagination"></div>

                </div>
            </div>
            <div class="main-div 2xl:pr-9 pr-0 pb-12 lg:pb-9 2xl:pb-0 slider-scroll-div">
                <div class="slider m-auto overflow-hidden relative">
                    <div class="slider-wrap flex gap-6 2xl:flex-col flex-row 2xl:w-full 2xl:h-[778px] slider-wrap-rtl">
                        <div class="slide 3xl:h-[230px] 3xl:w-80 w-64 h-[184px] text-center">
                            <img class="slide-image 3xl:h-[230px] 3xl:w-80 w-64 h-[184px] object-cover rounded-[16px]"
                                src="{{ asset('Modules/OpenAI/Resources/assets/image/human-group.png') }}"
                                alt="{{ __('Image') }}">
                        </div>
                        <div class="slide 3xl:h-[230px] 3xl:w-80 w-64 h-[184px]">
                            <img class="slide-image 3xl:h-[230px] 3xl:w-80 w-64 h-[184px] object-cover rounded-[16px] neg-transition-scale"
                                src="{{ asset('Modules/OpenAI/Resources/assets/image/space-ship.png') }}"
                                alt="{{ __('Image') }}">
                        </div>
                        <div class="slide 3xl:h-[230px] 3xl:w-80 w-64 h-[184px]">
                            <img class="slide-image 3xl:h-[230px] 3xl:w-80 w-64 h-[184px] object-cover rounded-[16px] neg-transition-scale"
                                src="{{ asset('Modules/OpenAI/Resources/assets/image/cloud-human.png') }}"
                                alt="{{ __('Image') }}">
                        </div>
                        <div class="slide 3xl:h-[230px] 3xl:w-80 w-64 h-[184px]">
                            <img class="slide-image 3xl:h-[230px] 3xl:w-80 w-64 h-[184px] object-cover rounded-[16px] neg-transition-scale"
                                src="{{ asset('Modules/OpenAI/Resources/assets/image/helmet.png') }}"
                                alt="{{ __('Image') }}">
                        </div>
                        <div class="slide 3xl:h-[230px] 3xl:w-80 w-64 h-[184px]">
                            <img class="slide-image 3xl:h-[230px] 3xl:w-80 w-64 h-[184px] object-cover rounded-[16px] neg-transition-scale"
                                src="{{ asset('Modules/OpenAI/Resources/assets/image/robotics-hand.png') }}"
                                alt="{{ __('Image') }}">
                        </div>
                        <div class="slide 3xl:h-[230px] 3xl:w-80 w-64 h-[184px]">
                            <img class="slide-image 3xl:h-[230px] 3xl:w-80 w-64 h-[184px] object-cover rounded-[16px] neg-transition-scale"
                                src="{{ asset('Modules/OpenAI/Resources/assets/image/rainbow.png') }}"
                                alt="{{ __('Image') }}">
                        </div>
                        <div class="slide 3xl:h-[230px] 3xl:w-80 w-64 h-[184px]">
                            <img class="slide-image 3xl:h-[230px] 3xl:w-80 w-64 h-[184px] object-cover rounded-[16px] neg-transition-scale"
                                src="{{ asset('Modules/OpenAI/Resources/assets/image/car.png') }}"
                                alt="{{ __('Image') }}">
                        </div>
                        <div class="slide 3xl:h-[230px] 3xl:w-80 w-64 h-[184px]">
                            <img class="slide-image 3xl:h-[230px] 3xl:w-80 w-64 h-[184px] object-cover rounded-[16px] neg-transition-scale"
                                src="{{ asset('Modules/OpenAI/Resources/assets/image/Rectangle-robot.png') }}"
                                alt="{{ __('Image') }}">
                        </div>
                        <div class="slide 3xl:h-[230px] 3xl:w-80 w-64 h-[184px]">
                            <img class="slide-image 3xl:h-[230px] 3xl:w-80 w-64 h-[184px] object-cover rounded-[16px] neg-transition-scale"
                                src="{{ asset('Modules/OpenAI/Resources/assets/image/human-brain.png') }}"
                                alt="{{ __('Image') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
