<style>
    .image-template-v1-{{$component->id}} {
        --text-color-light: {{ $component->text_color_light }};
        --text-color-dark: {{ $component->text_color_dark }};
        --btn-color-light-1: {{ $component->btn_color_light1 }};
        --btn-color-dark-1: {{ $component->btn_color_dark1 }};
        --btn-text-color-light-1: {{ $component->btn_text_color_light1 }};
        --btn-text-color-dark-1: {{ $component->btn_text_color_dark1 }};
        --btn-color-light-2: {{ $component->btn_color_light2 }};
        --btn-color-dark-2: {{ $component->btn_color_dark2 }};
        --btn-text-color-light-2: {{ $component->btn_text_color_light2 }};
        --btn-text-color-dark-2: {{ $component->btn_text_color_dark2 }};

        --bg-color-light: {{ $component->bg_color_light }};
        --bg-color-dark: {{ $component->bg_color_dark }};

    }
</style>
@php
    $textColor = empty($component->text_color_light) && empty($component->text_color_dark) ? 'text-white' : 'text-[var(--text-color-light)] dark:text-[var(--text-color-dark)]';
    $firstBtn = empty($component->btn_color_light1) && empty($component->btn_color_dark1) && empty($component->btn_text_color_light1) && empty($component->btn_text_color_dark1) ? 'text-white bg-color-E6' : 'text-[var(--btn-text-color-light-1)] dark:text-[var(--btn-text-color-dark-1)] bg-[var(--btn-color-light-1)] dark:bg-[var(--btn-color-dark-1)]';

    $secondBtn = empty($component->btn_color_light2) && empty($component->btn_color_dark2) && empty($component->btn_text_color_light2) && empty($component->btn_text_color_dark2) ? 'learn-more-button text-white dark:text-color-14' : 'text-[var(--btn-text-color-light-2)] dark:text-[var(--btn-text-color-dark-2)] bg-[var(--btn-color-light-2)] dark:bg-[var(--btn-color-dark-2)]';

    $bgColor =  empty($component->bg_color_light) && empty($component->bg_color_dark) ? '' : 'bg-[var(--bg-color-light)] dark:bg-[var(--bg-color-dark)]';
@endphp


<div id="digital_art" class="relative image-template-v1-{{$component->id}} {{ $component->background_type == 'backgroundImage' ? '' : $bgColor }}"
    style="margin-top:{{ $component->mt }}; margin-bottom:{{ $component->mb }};">
    
    @if ($component->background_type == 'backgroundImage')
        @if (isset($component->bg_image_light) && !empty($component->bg_image_light))
            <img class="absolute w-full h-full dark:hidden hidden md:block neg-transition-scale" src="{{ pathToUrl($component->bg_image_light) }}" alt="">
        @endif
        @if (isset($component->bg_image_dark) && !empty($component->bg_image_dark))
            <img class="absolute w-full h-full md:dark:block hidden neg-transition-scale" src="{{ pathToUrl($component->bg_image_dark) }}" alt="">
        @endif
        @if (isset($component->mob_bg_image_light) && !empty($component->mob_bg_image_light))
            <img class="absolute w-full h-full md:hidden dark:hidden neg-transition-scale" src="{{ pathToUrl($component->mob_bg_image_light) }}" alt="">
        @endif
        @if (isset($component->mob_bg_image_dark) && !empty($component->mob_bg_image_dark))
            <img class="absolute w-full h-full md:dark:hidden dark:block hidden neg-transition-scale" src="{{ pathToUrl($component->mob_bg_image_dark) }}" alt="">
        @endif
    @endif

    <div class="flex 2xl:flex-row flex-col z-40 9xl:ltr:pl-[310px] 8xl:ltr:pl-40 7xl:ltr:pl-32 lg:ltr:pl-16 md:ltr:pl-10 ltr:pl-5 9xl:rtl:pr-[310px] 8xl:rtl:pr-40 7xl:rtl:pr-32 lg:rtl:pr-16 md:rtl:pr-10 rtl:pr-5 gap-11 2xl:gap-4">
        <div class="6xl:pt-[122px] pt-12 2xl:w-[573px] relative">
            <div class="relative">
                <p class="uppercase heading-2 absolute tracking-[0.2em] font-Figtree text-16 font-bold">{!! strtoupper($component->overline) !!}
                </p>
            </div>
            <p class="mt-[30px] 6xl:text-48 text-36 font-bold font-RedHat 7xl:w-[520px] md:ltr:pr-0 ltr:pr-5 2xl:w-[375px] {{ $textColor }}">
                {!! $component->heading !!}
            </p>
            <p class="6xl:text-18 text-16 font-Figtree font-normal mt-3 lg:pr-[117px] pr-9 create-ai {{ $textColor }}">
                {!! $component->body !!}</p>
            
            @if (isset($component->outline) && count($component->outline) != 0)
                <div class="6xl:mt-9 mt-8 relative pl-5 option-create-ai">

                    @foreach($component->outline as $outline)
                        @if ( !empty($outline['title'])) 
                            <div class="flex gap-3 mb-[26px] {{ $textColor }}">
                                <div class="w-[18px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                        <path d="M16.5433 3.70459C16.9827 4.14404 16.9827 4.85771 16.5433 5.29717L7.54326 14.2972C7.10381 14.7366 6.39014 14.7366 5.95068 14.2972L1.45068 9.79717C1.01123 9.35772 1.01123 8.64404 1.45068 8.20459C1.89014 7.76514 2.60381 7.76514 3.04326 8.20459L6.74873 11.9065L14.9542 3.70459C15.3937 3.26514 16.1073 3.26514 16.5468 3.70459H16.5433Z" fill="url(#paint0_linear_12033_7953)"/>
                                        <defs>
                                        <linearGradient id="paint0_linear_12033_7953" x1="11.3624" y1="13.2419" x2="8.32862" y2="3.6575" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="{{ empty($component->text_color_light) && empty($component->text_color_dark) ? '#E60C84' : 'currentColor'}}"/>
                                            <stop offset="1" stop-color="{{ empty($component->text_color_light) && empty($component->text_color_dark) ? '#FFCF4B' : 'currentColor'}}"/>
                                        </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <p class="font-normal text-18 font-Figtree ">
                                    {{ $outline['title'] }}
                                </p>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif
            @if ($component->first_button == 1 || $component->second_button == 1)
                <div class="flex flex-wrap gap-4 my-12 relative mr-5">
                    @if ($component->first_button == 1 && $component->btn_name1)
                        <a class="font-Figtree  items-center text-center font-semibold text-18 py-3.5 px-8 rounded-lg {{ $firstBtn }}"
                            href="{{ $component->btn_link1 }}" target="_blank">{{ $component->btn_name1 }}</a>
                    @endif
                    @if ($component->second_button == 1 && $component->btn_name2)
                        <a class="font-Figtree flex justify-center items-center font-semibold text-18 gap-2.5  h-[54px] rounded-lg {{ $secondBtn }}"
                            href="{{ $component->btn_link2 }}" 
                            style="border-width:{{ $component->border_width2 }}px;  border-color:{{ $component->border_color2 }}; border-style:{{ $component->border_style2 }};"> 
                            <span class="pl-[27px] pr-27px-rtl">
                                {{ $component->btn_name2 }}
                            </span>
                            <svg class="mr-[27px] ml-27px-rtl neg-transition-scale" xmlns="http://www.w3.org/2000/svg"
                                width="14" height="12" viewBox="0 0 14 12" fill="none">
                                <path
                                    d="M13.707 6.70597C14.0977 6.3155 14.0977 5.68137 13.707 5.2909L8.70674 0.292854C8.31609 -0.0976181 7.68168 -0.0976181 7.29103 0.292854C6.90039 0.683327 6.90039 1.31745 7.29103 1.70793L10.5881 5.00039H1.00006C0.4469 5.00039 0 5.44709 0 6C0 6.55291 0.4469 6.99961 1.00006 6.99961H10.585L7.29416 10.2921C6.90351 10.6825 6.90351 11.3167 7.29416 11.7071C7.6848 12.0976 8.31921 12.0976 8.70986 11.7071L13.7101 6.7091L13.707 6.70597Z"
                                    fill="currentColor" />
                            </svg>
                        </a>
                    @endif
                </div>
            @endif
        </div>
        <div class="flex 2xl:flex-row flex-col gap-9">
            @if ($component->feature_slider_block == 1 && isset($component->feature_slider) && count($component->feature_slider) != 0)
                <div class="relative slider-section px-5 2xl:px-0 md:mr-auto 2xl:m-auto md:pl-10 lg:pl-16">
                    <div
                        class="swiper 8xl:w-[570px] 6xl:w-[500px] 2xl:h-[780px] h-[576px] 2xl:w-[428px] sm:w-[90%] slider1 absolute 2xl:-bottom-11 md:w-[570px] sm:h-[780px]">
                        <div class="swiper-wrapper features-slide rounded-[30px]">
                            @foreach($component->feature_slider as $slider)
                                @if (isset($slider['image']) && !empty($slider['image']))
                                    <div class="swiper-slide w-full h-full rounded-[30px] overflow-hidden">
                                        <img class="w-full h-full rounded-[30px] neg-transition-scale"
                                            src="{{ pathToUrl($slider['image']) }}"
                                            alt="{{ __('Image') }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>

                    </div>
                </div>
            @endif

            @if ($component->default_slider_block == 1 && isset($component->default_slider) && count($component->default_slider) != 0)
                <div class="main-div 2xl:pr-9 pr-0 pb-12 lg:pb-9 2xl:pb-0 slider-scroll-div">
                    <div class="slider m-auto overflow-hidden relative">
                        <div class="slider-wrap flex gap-6 2xl:flex-col flex-row 2xl:w-full 2xl:h-[778px] slider-wrap-rtl">
                            @foreach ($component->default_slider as $defaultSlider)
                                @if (isset($defaultSlider['image']) && !empty($defaultSlider['image']))
                                    <div class="slide 3xl:h-[230px] 3xl:w-80 w-64 h-[184px] text-center">
                                        <img class="slide-image 3xl:h-[230px] 3xl:w-80 w-64 h-[184px] object-cover rounded-[16px]"
                                            src="{{ pathToUrl($defaultSlider['image']) }}"
                                            alt="{{ __('Image') }}">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>