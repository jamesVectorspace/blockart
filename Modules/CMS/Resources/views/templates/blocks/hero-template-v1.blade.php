@php
    $component = isset($component) ? $component : null;
@endphp

<style>
    .hero-template-v1-{{$component->id}} {
        --text-color-light: {{ $component->text_color_light }};
        --text-color-dark: {{ $component->text_color_dark }};
        --btn-color-light-1: {{ $component->btn_color_light1 }};
        --btn-color-dark-1: {{ $component->btn_color_dark1 }};
        --btn-text-color-light-1: {{ $component->btn_text_color_light1 }};
        --btn-text-color-dark-1: {{ $component->btn_text_color_dark1 }};
        --btn-text-color-light-2: {{ $component->btn_text_color_light2 }};
        --btn-text-color-dark-2: {{ $component->btn_text_color_dark2 }};
        --bg-color-light: {{ $component->bg_color_light }};
        --bg-color-dark: {{ $component->bg_color_dark }};
    }

    .mouse-{{$component->id}} {
        width: 23px;
        height: 32px;
        border-radius: 20px;
        position: absolute;
        left: calc(50% - 20px);
        border: 2px solid {{ empty($component->text_color_light) ? 'white' : $component->text_color_light }};
    }

    .dark .mouse-{{$component->id}} {
        width: 23px;
        height: 32px;
        border-radius: 20px;
        position: absolute;
        left: calc(50% - 20px);
        border: 2px solid {{ empty($component->text_color_dark) ? 'white' : $component->text_color_dark }};
    }
    .mouse-{{$component->id}}:before,
    .mouse-{{$component->id}}:after {
        content: "";
        display: block;
        position: absolute;
    }

    .m-{{$component->id}} {
        margin: 0.25rem;
        left: calc(50% - 6px);
        -webkit-animation: m-1-ball 1.2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        animation: m-1-ball 1.2s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
    }
    @-webkit-keyframes m-1-ball {
        0%,
        65%,
        100% {
            opacity: 0;
        }
        10%,
        40% {
            opacity: 1;
        }
        0% {
            transform: translateY(2px) scale(0.7);
        }
        5% {
            transform: scale(0.7);
        }
        15%,
        100% {
            transform: scale(1);
        }
        45%,
        65% {
            transform: translateY(8px) scale(0.7);
        }
    }

    @keyframes m-1-ball {
        0%,
        65%,
        100% {
            opacity: 0;
        }
        10%,
        40% {
            opacity: 1;
        }
        0% {
            transform: translateY(2px) scale(0.7);
        }
        5% {
            transform: scale(0.7);
        }
        15%,
        100% {
            transform: scale(1);
        }
        45%,
        65% {
            transform: translateY(8px) scale(0.7);
        }
    }
</style>

@php
    $textColor = empty($component->text_color_light) && empty($component->text_color_dark) ? 'text-color-F6' : 'text-[var(--text-color-light)] dark:text-[var(--text-color-dark)]';
    $headerColor = empty($component->text_color_light) && empty($component->text_color_dark) ? 'text-white' : 'text-[var(--text-color-light)] dark:text-[var(--text-color-dark)]';

    $firstBtn = empty($component->btn_color_light1) && empty($component->btn_color_dark1) && empty($component->btn_text_color_light1) && empty($component->btn_text_color_dark1) ? 'bg-white text-color-14' : 'text-[var(--btn-text-color-light-1)] dark:text-[var(--btn-text-color-dark-1)] bg-[var(--btn-color-light-1)] dark:bg-[var(--btn-color-dark-1)]';
    $secondBtn = empty($component->btn_text_color_light2) && empty($component->btn_text_color_dark2) ? 'text-white' : 'text-[var(--btn-text-color-light-2)] dark:text-[var(--btn-text-color-dark-2)]';
    $bgColor = empty($component->bg_color_light) && empty($component->bg_color_dark) ? '' : 'bg-[var(--bg-color-light)] dark:bg-[var(--bg-color-dark)]';
@endphp

<div class="relative bg-top hero-template-v1-{{$component->id}} h-[873px] min-[429px]:h-[951px] sm:h-[914px] flex flex-col justify-center">
    
    
    @if ( isset($component->image) && !empty($component->image) )
        <span class="wow fadeInUp absolute 9xl:right-[199px] 5xl:right-[73px] 3xl:right-[64px] z-10 md:right-8 right-0 -bottom-[80px] xl:-bottom-12"
            data-wow-delay="1500ms" data-wow-offset="10">
            <img class="2xl:w-[589px] xl:w-[500px] md:h-[406px] w-[421px] h-[399px] object-contain lg:block hidden
            @if($component->float_image == 1) up-down-animation @endif" 
            src="{{ pathToUrl($component->image) }}" alt="{{ __('Image') }}">
        </span>
    @endif
    @if ( isset($component->mob_image) && !empty($component->mob_image) )
        <span class="absolute -bottom-[80px] right-2 min-[429px]:right-8 z-10 wow fadeInUp"  data-wow-delay="1500ms" data-wow-offset="10">
            <img class="w-[421px] h-[399px] object-contain lg:hidden 
            @if($component->float_image == 1) up-down-animation @endif" 
            src="{{ pathToUrl($component->mob_image) }}" alt="{{ __('Image') }}">
        </span>
    @endif

    @if($component->display_icon == 1)
        <div class="hidden button-to-bottom xl:block {{ $textColor }}">
            <div class="mouse-{{$component->id}} bottom-12 z-10 wow fadeInUp" data-wow-delay="1000ms">
                <svg class="m-{{$component->id}}" width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.19983 11.6H5.27183L5.43184 11.768C5.50621 11.843 5.59469 11.9025 5.69217 11.9431C5.78966 11.9837 5.89423 12.0046 5.99984 12.0046C6.10544 12.0046 6.21001 11.9837 6.3075 11.9431C6.40498 11.9025 6.49346 11.843 6.56783 11.768L6.72783 11.6H6.79983V11.528L11.3678 6.96799L10.2318 5.83199L6.79983 9.27199V0.799988H5.19983V9.27199L1.76783 5.83199L0.631836 6.96799L5.19983 11.528V11.6Z" fill="currentColor"/>
                </svg>
            </div>
        </div>
    @endif
    
    
    
    @if ($component->background_type == 'backgroundImage')
        @if (isset($component->bg_image_light) && !empty($component->bg_image_light))
            <img class="absolute h-full w-full dark:bg-color-14 dark:hidden sm:block hidden"
                src="{{ pathToUrl($component->bg_image_light) }}" alt="">
        @endif
        @if (isset($component->bg_image_dark) && !empty($component->bg_image_dark))
            <img class="absolute h-full w-full dark:bg-color-14 sm:dark:block hidden"
                src="{{ pathToUrl($component->bg_image_dark) }}" alt="">
        @endif
        @if (isset($component->bg_image_light_mob) && !empty($component->bg_image_light_mob))
            <img class="absolute h-full w-full dark:bg-color-14 sm:hidden"
                src="{{ pathToUrl($component->bg_image_light_mob) }}" alt="">
        @endif
        @if (isset($component->bg_image_dark_mob) && !empty($component->bg_image_dark_mob))
            <img class="absolute h-full w-full dark:bg-color-14 dark:block hidden sm:dark:hidden"
                src="{{ pathToUrl($component->bg_image_dark_mob) }}" alt="">
        @endif
    @endif
    <div class="relative text-center content px-5 md:px-0 -mt-[209px] sm:-mt-[120px]  @if($component->background_type == 'backgroundColor') {{ $bgColor }} @endif">
        <p class="font-Figtree lg:text-20 text-18 font-medium wow fadeInUp break-words {{ $textColor }}" data-wow-offset="10">
            {!! $component->overline !!}
        </p>
        <p class="px-5 lg:text-80 xs:text-[52px] text-[45px] font-bold font-RedHat mt-5 wow fadeInUp break-words {{ $headerColor }} {{ $textColor }}"
            data-wow-delay="200ms" data-wow-offset="10">{!! $component->heading !!}</p>
        @if ( isset($component->slider) && count($component->slider) != 0 )
            <div class="swiper slider3 2xl:w-[900px] m-auto wow fadeInUp" data-wow-delay="400ms" data-wow-offset="10">
                <div class="swiper-wrapper md:mt-4 mt-3">
                    @foreach ($component->slider as $slider)
                        <div class="swiper-slide w-full h-full">
                            <div class="flex justify-center">
                                <p class="lg:text-[80px] xs:text-[52px] text-[45px] font-bold font-RedHat heading-3 break-words top-slider-text">
                                    {!! $slider['title'] !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <p class="font-Figtree font-medium lg:text-[26px] lg:leading-[44px] text-lg leading-[31px] md:mt-7 mt-6 wow fadeInUp mx-auto 7xl:w-[1000px] lg:w-[900px] md:w-[600px]
        {{ $textColor }}"
            data-wow-delay="600ms" data-wow-offset="10">
            {!! $component->body !!}
        </p>
        <div class="lg:mt-[52px] mt-9 flex flex-col items-center md:gap-8 gap-7 justify-center wow fadeInUp"
            data-wow-delay="1000ms">
            @if ($component->first_button == 1 && !empty($component->btn_name1))
                <a href="{{ !empty($component->btn_link1) ? $component->btn_link1 : 'javascript:void(0)' }}" class="rounded-lg px-9 py-[13px] font-Figtree text-20 font-semibold flex relative z-50 {{ $firstBtn }}">
                    {!! $component->btn_name1 !!}
                </a>
            @endif
            @if ($component->basic_link == 1 && !empty($component->btn_name2))
                <a href="{{ !empty($component->btn_link2) ? $component->btn_link2 : 'javascript:void(0)' }}" class="underline font-Figtree text-18 font-normal relative z-50 {{ $secondBtn }}">
                    {!! $component->btn_name2 !!}
                </a>
            @endif
        </div>
    </div>
</div>
