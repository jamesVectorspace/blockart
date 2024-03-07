<style>
    .footer-banner-{{$component->id}} {
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
        --bg-color-light: {{ $component->main_bg_color_light }};
        --bg-color-dark: {{ $component->main_bg_color_dark }};
    }
</style>

@php
    $textColor = empty($component->text_color_light) && empty($component->text_color_dark) ? 'text-color-14' : 'text-[var(--text-color-light)] dark:text-[var(--text-color-dark)]';

    $firstBtn = empty($component->btn_color_light1) && empty($component->btn_color_dark1) && empty($component->btn_text_color_light1) && empty($component->btn_text_color_dark1) ? 'text-color-14 bg-white' : 'text-[var(--btn-text-color-light-1)] dark:text-[var(--btn-text-color-dark-1)] bg-[var(--btn-color-light-1)] dark:bg-[var(--btn-color-dark-1)]';

    $secondBtn = empty($component->btn_color_light2) && empty($component->btn_color_dark2) && empty($component->btn_text_color_light2) && empty($component->btn_text_color_dark2) ? 'text-white bg-color-14' : 'text-[var(--btn-text-color-light-2)] dark:text-[var(--btn-text-color-dark-2)] bg-[var(--btn-color-light-2)] dark:bg-[var(--btn-color-dark-2)]';
    $bgColor = empty($component->main_bg_color_light) && empty($component->main_bg_color_dark) ? '' : 'bg-[var(--bg-color-light)] dark:bg-[var(--bg-color-dark)]';

@endphp

<div class="footer-banner-{{$component->id}}">
    <div class="relative 9xl:mx-[310px] 8xl:mx-40 lg:mx-16 md:mx-10 mx-5 sm:top-[111px] top-[72px] rounded-[40px] flex justify-center  
    @if($component->background_type == 'backgroundColor') {{ $bgColor }} @endif" style="margin-top:{{ $component->mt }};margin-bottom:{{ $component->mb }};">
        @if($component->background_type == 'backgroundImage')
            @if (isset($component->main_bg_image_light) && !empty($component->main_bg_image_light)) 
                <img class="absolute h-full rounded-[54px] md:rounded-0 w-full neg-transition-scale dark:hidden"
                    src="{{ pathToUrl($component->main_bg_image_light) }}" alt="">
            @endif
            @if (isset($component->main_bg_image_dark) && !empty($component->main_bg_image_dark)) 
                <img class="absolute h-full rounded-[54px] md:rounded-0 w-full neg-transition-scale hidden dark:block"
                    src="{{ pathToUrl($component->main_bg_image_dark) }}" alt="">
            @endif
        @endif
        <div
            class="relative grid md:grid-cols-2 grid-cols-1 gap-5 6xl:gap-0">
            <div class="lg:pl-[72px] px-[26px] xl:mb-[86px] md:mb-10 mb-0 footer-banner">
                <p class="3xl:text-48 text-36 font-RedHat font-bold lg:pt-[68px] pt-[26px] {{ $textColor }}">
                    {!! $component->heading !!}
                </p>
                <p class="mt-4 3xl:text-18 text-16 font-normal font-Figtree {{ $textColor }}">  {!! $component->body !!} </p>
               
                <div class="flex mt-8 items-center gap-4 flex-wrap">
                    @if ($component->first_button == 1)
                        <a href="{{ !empty($component->btn_link1) ? $component->btn_link1 : 'javascript:void(0);' }}" 
                            class="py-[13px] xs:px-7 px-3 rounded-lg text-16 font-semibold font-Figtree {{ $firstBtn }}">
                            {!! $component->btn_name1 !!}
                        </a>
                    @endif
                    @if ($component->second_button == 1)
                        <a href="{!! !empty($component->btn_link2) ? $component->btn_link2 : 'javascript:void(0);' !!}"
                            class="text-16 font-semibold font-Figtree  py-[13px] xs:px-7 px-3 rounded-lg {{ $secondBtn }}">
                            {!! $component->btn_name2 !!}
                        </a>
                    @endif
                </div>
            </div>
            @if(isset($component->image) && !empty($component->image)) 
                <img class="lg:-mt-[52px] lg:mb-10 -mb-[33px] lg:ml-0 sm:ml-7 xs:ml-[65px] m-auto lg:w-[479px] lg:h-[452px] md:w-[395px] md:h-[360px] w-[295px] h-[278px] holding-butterfly neg-transition-scale"
                    src="{{ pathToUrl($component->image) }}" alt="">
            @endif
        </div>
    </div>
</div>