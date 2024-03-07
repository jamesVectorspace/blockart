@php
    $component = isset($component) ? $component : null;
@endphp

<style>
    .ready-made-template-v1-{{$component->id}} {
        --text-color-light: {{ $component->text_color_light }};
        --text-color-dark: {{ $component->text_color_dark }};

        --first-block-color-light: {{ $component->bg_color_light }};
        --first-block-color-dark: {{ $component->bg_color_dark }};
        --first-block-text-color-light: {{ $component->first_block_text_color_light }};
        --first-block-text-color-dark: {{ $component->first_block_text_color_dark }};

        --second-block-color-light: {{ $component->bg_color_light2 }};
        --second-block-color-dark: {{ $component->bg_color_dark2 }};
        --second-block-text-color-light: {{ $component->second_block_text_color_light }};
        --second-block-text-color-dark: {{ $component->second_block_text_color_dark }};

        --third-block-color-light: {{ $component->bg_color_light3 }};
        --third-block-color-dark: {{ $component->bg_color_dark3 }};
        --third-block-text-color-light: {{ $component->third_block_text_color_light }};
        --third-block-text-color-dark: {{ $component->third_block_text_color_dark }};

        --forth-block-text-color-light: {{ $component->forth_block_text_color_light }};
        --forth-block-text-color-dark: {{ $component->forth_block_text_color_dark }};

        --forth-block-btn-text-color-light: {{ $component->btn_text_color_light }};
        --forth-block-btn-text-color-dark: {{ $component->btn_text_color_dark }};
        --forth-block-btn-color-light: {{ $component->btn_color_light }};
        --forth-block-btn-color-dark: {{ $component->btn_color_dark }};

        --btn-text-color-light: {{ $component->block1_btn_text_color_light }};
        --btn-text-color-dark: {{ $component->block1_btn_text_color_dark }};

        --bg-color-light: {{ $component->main_bg_color_light }};
        --bg-color-dark: {{ $component->main_bg_color_dark }};

    }

    .ready-made-bg-{{$component->id}} {
        background-image: url('{{ isset($component->main_bg_image_light) && !empty($component->main_bg_image_light) ? urlSlashReplace(pathToUrl($component->main_bg_image_light)) : '' }}');
        background-repeat: no-repeat, repeat;
        background-size: cover;
    }
    .dark .ready-made-bg-{{$component->id}} {
        background-image: url('{{ isset($component->main_bg_image_dark) && !empty($component->main_bg_image_dark) ? urlSlashReplace(pathToUrl($component->main_bg_image_dark)) : '' }}');
        background-repeat: no-repeat, repeat;
        background-size: cover;
    }
</style>

@php
    $textColor = empty($component->text_color_light) && empty($component->text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--text-color-light)] dark:text-[var(--text-color-dark)]';

    $firstBlockColor = empty($component->bg_color_light) && empty($component->bg_color_dark) ? 'bg-color-F6 dark:bg-color-29' : 'bg-[var(--first-block-color-light)] dark:bg-[var(--first-block-color-dark)]';
    $firstBlockTextColor = empty($component->first_block_text_color_light) && empty($component->first_block_text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--first-block-text-color-light)] dark:text-[var(--first-block-text-color-dark)]';

    $secondBlockColor = empty($component->bg_color_light2) && empty($component->bg_color_dark2) ? '' : 'bg-[var(--second-block-color-light)] dark:bg-[var(--second-block-color-dark)]';
    $secondBlockTextColor = empty($component->second_block_text_color_light) && empty($component->second_block_text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--second-block-text-color-light)] dark:text-[var(--second-block-text-color-dark)]';

    $thirdBlockColor = empty($component->bg_color_light3) && empty($component->bg_color_dark3) ? 'background-gradient-two' : 'bg-[var(--third-block-color-light)] dark:bg-[var(--third-block-color-dark)]';
    $thirdBlockTextColor = empty($component->third_block_text_color_light) && empty($component->third_block_text_color_dark) ? 'text-white' : 'text-[var(--third-block-text-color-light)] dark:text-[var(--third-block-text-color-dark)]';

    $forthBlockTextColor = empty($component->forth_block_text_color_light) && empty($component->forth_block_text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--forth-block-text-color-light)] dark:text-[var(--forth-block-text-color-dark)]';
    $forthBlockBtn = empty($component->btn_color_light) && empty($component->btn_color_dark) && empty($component->btn_text_color_light) && empty($component->btn_text_color_dark) ? 'text-color-14 dark:text-white free-button' : 'text-[var(--forth-block-btn-text-color-light)] dark:text-[var(--forth-block-btn-text-color-dark)] bg-[var(--forth-block-btn-color-light)] dark:bg-[var(--forth-block-btn-color-dark)]';

    $btnTextColor = empty($component->block1_btn_text_color_light) && empty($component->block1_btn_text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--btn-text-color-light)] dark:text-[var(--btn-text-color-dark)]';

    $bgColor =  empty($component->main_bg_color_light) && empty($component->main_bg_color_dark) ? '' : 'bg-[var(--bg-color-light)] dark:bg-[var(--bg-color-dark)]';

@endphp

<div class="py-[75px] ready-made-template-v1-{{$component->id}} {{ $component->background_type == 'backgroundImage' ? 'ready-made-bg-' . $component->id : $bgColor }}" 
    style="padding:{{ !empty($component->pt_y) ? $component->pt_y . ' ' . '0' : ''}};">
    <div class="9xl:px-[310px] 8xl:px-40 lg:px-20 md:px-10 px-5 relative">
        <div class="relative flex justify-center items-center">
            <p class="uppercase absolute heading-1 tracking-[0.2em] text-center font-bold text-16 font-Figtree">{!! strtoupper($component->overline) !!}
            </p>
        </div>
        <p class="mt-[18px] font-RedHat 6xl:text-48 text-36 font-bold text-center {{ $textColor }} break-words px-5">{!! $component->heading !!}
        </p>
        <p class="mt-3 font-Figtree {{ $textColor }} font-normal text-center 6xl:text-18 text-16">{!! $component->body !!}
        </p>
        <div class="grid lg:grid-cols-2 lg:gap-6 gap-5 6xl:mt-16 mt-8">
            @if($component->first_block == 1)
                <div class="rounded-[30px] 6xl:pt-8 pt-[26px] 6xl:pb-9 pb-8 {{ $firstBlockColor }}" 
                    style="border-width:{{ $component->border_width }}px; border-color:{{ $component->border_color }}; border-style: {{ $component->border_style }};">
                    <p class="text-36 6xl:px-10 px-5 {{ $firstBlockTextColor }} font-bold font-RedHat">{!! $component->block1_heading !!} </p>
                    <p class="6xl:mt-6 mt-5 6xl:px-10 px-5 {{ $firstBlockTextColor }} text-lg leading-[30px] font-normal font-Figtree">
                        {!! $component->block1_body !!}  </p>
                    <p class="6xl:mt-6 mt-5 6xl:px-10 px-5 text-color-14 dark:text-white text-lg leading-[30px] font-normal font-Figtree">
                        {!! $component->block1_second_body !!}
                    </p>    
                    <div class="mt-8 relative overflow-hidden">
                        @if (isset($component->image_light_mode) && !empty($component->image_light_mode))
                            <img class="w-full h-full max-w-none dark:hidden 6xl:w-full 3xl:w-[553px] neg-transition-scale" src="{{ pathToUrl($component->image_light_mode) }}" alt="">
                        @endif
                        @if (isset($component->image_dark_mode) && !empty($component->image_dark_mode))
                            <img class="w-full h-full max-w-none dark:block hidden 6xl:w-full 3xl:w-[553px] neg-transition-scale" src="{{ pathToUrl($component->image_dark_mode) }}" alt="">
                        @endif
                        @if (isset($component->floating_image_light_mode) || isset($component->floating_image_dark_mode))
                            <span class="absolute top-0 9xl:-right-[178px] 8xl:-right-[187px] 7xl:-right-[200px] 6xl:-right-[176px] 3xl:-right-[116px] 2xl:-right-[155px] xl:-right-[137px] lg:-right-[118px] z-10 -right-28 max-w-none hidden xs:block sm:hidden lg:block template-floating-img">
                                @if (isset($component->floating_image_light_mode) && !empty($component->floating_image_light_mode))
                                    <img class="9xl:w-full 8xl:w-[315px] 7xl:w-[336px] 6xl:w-[297px] 3xl:w-[259px] 2xl:w-[261px] xl:w-[230px] lg:w-[198px] md:h-full h-[185px] dark:hidden" src="{{ pathToUrl($component->floating_image_light_mode) }}" alt="">
                                @endif
                                @if (isset($component->floating_image_dark_mode) && !empty($component->floating_image_dark_mode))
                                    <img class="9xl:w-full 8xl:w-[315px] 7xl:w-[336px] 6xl:w-[297px] 3xl:w-[259px] 2xl:w-[261px] xl:w-[230px] lg:w-[198px] md:h-full h-[185px] dark:block hidden" src="{{ pathToUrl($component->floating_image_dark_mode) }}" alt="">
                                @endif
                            </span>
                        @endif
                    </div>
                    
                    @if (isset($component->block1_btn_name) && !empty($component->block1_btn_name))
                        <div class="text-center">
                            <a class="6xl:mt-9 mt-8 inline-block {{ $btnTextColor }} font-Figtree text-20 justify-center items-center lang-text-h4 font-semibold mx-5"
                                href="{{ isset($component->block1_btn_link) ? $component->block1_btn_link : 'javascript:void(0)'}}"
                                >{!! $component->block1_btn_name !!}
                                    <span class="w-[14px] h-3 inline-block ml-2.5 margin-left-button neg-transition-scale">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12"
                                            fill="none">
                                            <path d="M13.707 6.70597C14.0977 6.3155 14.0977 5.68137 13.707 5.2909L8.70674 0.292854C8.31609 -0.0976181 7.68168 -0.0976181 7.29103 0.292854C6.90039 0.683327 6.90039 1.31745 7.29103 1.70793L10.5881 5.00039H1.00006C0.4469 5.00039 0 5.44709 0 6C0 6.55291 0.4469 6.99961 1.00006 6.99961H10.585L7.29416 10.2921C6.90351 10.6825 6.90351 11.3167 7.29416 11.7071C7.6848 12.0976 8.31921 12.0976 8.70986 11.7071L13.7101 6.7091L13.707 6.70597Z" fill="{{ empty($component->block1_btn_text_color_light) && empty($component->block1_btn_text_color_dark) ? '#E22861' : 'currentColor' }}" />
                                        </svg>
                                    </span>
                            </a>
                        </div>
                    @endif
                </div>
            @endif
            
            @if($component->second_block == 1 || $component->third_block == 1)
                <div class="flex flex-col lg:gap-6 gap-5">
                    {{-- Second Block --}}
                    @if($component->second_block == 1)
                        <div class="rounded-[30px] flex justify-between sm:flex-row flex-col gap-5 md:gap-4 2xl:gap-5 sm:pt-3.5 pt-0 6xl:pl-10 6xl:pr-[47px] px-[26px] {{ $secondBlockTextColor }} {{ $secondBlockColor }} items-center lg:items-start border border-color-89 dark:border-color-47 h-max" 
                            style="border-width:{{ $component->border_width2 }}px; border-color:{{ $component->border_color2 }}; border-style:{{ $component->border_style2 }};">
                            <div class="mt-[25px]">
                                <p class="font-RedHat text-28 2xl:text-28 lg:text-lg leading-[39px] font-bold">{!! $component->block2_heading !!}</p>
                                <p class="my-3 font-Figtree text-18 2xl:text-18 md:text-sm leading-[30px] font-normal">{{ $component->block2_body }}</p>
                            </div>
                            @if (isset($component->image_light_mode2) && !empty($component->image_light_mode2))
                                <img class="w-[177px] h-[177px] neg-transition-scale" src="{{ pathToUrl($component->image_light_mode2) }}" alt="{{ __('Image') }}">
                            @endif
                        </div>
                    @endif
                    @if($component->third_block == 1)
                        {{-- Third Block --}}
                        <div class="rounded-br-[38px] rounded-[30px] {{ $thirdBlockColor }}  6xl:pl-[153px] sm:pl-24 p-[26px] pr-0 pb-0 pt-10 h-max use-case-section"
                            style="border-width:{{ $component->border_width3 }}px; border-color: {{ $component->border_color3 }}; border-style: {{ $component->border_style3 }};">
                            @if (isset($component->step) && count($component->step) != 0)
                                <div>
                                    @foreach($component->step as $step)
                                        @if ( !empty($step['title']) || !empty($step['description']))
                                            <div class="flex {{ $thirdBlockTextColor }}">
                                                <span class="relative">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                                                        <circle cx="3" cy="3" r="3" fill="{{ empty($component->third_block_text_color_light) && empty($component->third_block_text_color_dark) ? 'white' : 'currentColor' }}" />
                                                    </svg>
                                                </span>
                                                <div class="{{ $loop->last ? '!border-0' : 'border-l pb-10 border-color-DF' }} -ml-[3px] border-color-DF pl-3.5 steps {{ empty($component->third_block_text_color_light) && empty($component->third_block_text_color_dark) ? '' : 'border-current' }}">
                                                    <p class=" -mt-2 tracking-[0.2em] {{ $thirdBlockTextColor }} font-Figtree text-14">{{ $step['title'] }}
                                                    </p>
                                                    <p class="mt-1.5 text-22 font-semibold {{ $thirdBlockTextColor }} font-Figtree pr-5">{{ $step['description'] }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            <span class="flex justify-end bottom-0 items-end flex-col">
                                @if (isset( $component->image_light_mode3 ) && !empty( $component->image_light_mode3 ))
                                    <img class="mt-9 w-full h-[329px] neg-transition-scale" src="{{ pathToUrl($component->image_light_mode3) }}" alt="{{ __('Image') }}">
                                @endif
                            </span>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
    
    @if($component->forth_block == 1)
        <div class="text-center">
            <div class="6xl:mt-[72px] mt-10 6xl:gap-[60px] gap-12 flex flex-col md:flex-row items-center justify-center flex-wrap px-5">
                @if (isset($component->content))
                    @foreach ($component->content as $content)
                        <div class="flex lg:flex-row flex-col items-center justify-center gap-3">
                            @if (isset($content['icon_light']) && !empty($content['icon_light']) )
                                <img class="neg-transition-scale w-[21px] h-[20px]" src="{{ pathToUrl($content['icon_light']) }}" alt="{{ __('Image') }}">
                            @endif
                            <span class="{{  $forthBlockTextColor }} text-18 font-Figtree font-medium">
                                {!! $content['title'] !!}
                            </span>
                        </div>
                    @endforeach
                @endif
            </div>
            <p class="{{  $forthBlockTextColor }} font-bold text-center font-RedHat 6xl:text-32 text-28 mt-10 px-5">
                {!! $component->block4_heading !!}
            </p>
            <p class="{{  $forthBlockTextColor }} text-center text-18 font-normal mt-4 font-Figtree">
                {!! $component->block4_body !!}
            </p>
    
            @if ($component->btn_name)
                <a href="{{ isset($component->btn_link) ? $component->btn_link : 'javascript:void(0)'  }}" class="inline-flex h-[58px] gap-2.5 text-center items-center mx-auto justify-center mt-9 rounded-lg {{ $forthBlockBtn }}"
                    style="border-color:{{ $component->border_color4 }}; border-width:{{ $component->border_width4 }}px; border-style:{{ $component->border_style4 }}">
                    <span class="text-18 pl-[27px] font-semibold font-Figtree rounded-lg pr-27px-rtl">
                        {!! $component->btn_name !!}
                    </span> 
                    
                    <svg class="mr-[27px] ml-27px-rtl neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14"
                        height="12" viewBox="0 0 14 12" fill="none">
                        <path
                            d="M13.707 6.70597C14.0977 6.3155 14.0977 5.68137 13.707 5.2909L8.70674 0.292854C8.31609 -0.0976181 7.68168 -0.0976181 7.29103 0.292854C6.90039 0.683327 6.90039 1.31745 7.29103 1.70793L10.5881 5.00039H1.00006C0.4469 5.00039 0 5.44709 0 6C0 6.55291 0.4469 6.99961 1.00006 6.99961H10.585L7.29416 10.2921C6.90351 10.6825 6.90351 11.3167 7.29416 11.7071C7.6848 12.0976 8.31921 12.0976 8.70986 11.7071L13.7101 6.7091L13.707 6.70597Z"
                            fill="{{ empty($component->btn_color_light) && empty($component->btn_color_dark) && empty($component->btn_text_color_light) && empty($component->btn_text_color_dark) ? '#E22861' : 'currentColor' }}" />
                    </svg>
                </a>
            @endif
        </div>
    @endif
</div>
