@php
    $component = isset($component) ? $component : null;
@endphp

<style>
    .ai-template-v1-{{$component->id}} {
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

        --btn-text-color-light: {{ $component->btn_text_color_light }};
        --btn-text-color-dark: {{ $component->btn_text_color_dark }};

        --bg-color-light: {{ $component->main_bg_color_light }};
        --bg-color-dark: {{ $component->main_bg_color_dark }};

    }

    .ai-bg-{{$component->id}} {
        background-image: url('{{ isset($component->main_bg_image_light) && !empty($component->main_bg_image_light) ? urlSlashReplace(pathToUrl($component->main_bg_image_light)) : '' }}');
        background-repeat: no-repeat, repeat;
        background-size: cover;
    }
    .dark .ai-bg-{{$component->id}} {
        background-image: url('{{ isset($component->main_bg_image_dark) && !empty($component->main_bg_image_dark) ? urlSlashReplace(pathToUrl($component->main_bg_image_dark)) : '' }}');
        background-repeat: no-repeat, repeat;
        background-size: cover;
    }

</style>

@php
    $textColor = empty($component->text_color_light) && empty($component->text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--text-color-light)] dark:text-[var(--text-color-dark)]';

    $firstBlockColor = empty($component->bg_color_light) && empty($component->bg_color_dark) ? 'bg-color-76' : 'bg-[var(--first-block-color-light)] dark:bg-[var(--first-block-color-dark)]';
    $firstBlockTextColor = empty($component->first_block_text_color_light) && empty($component->first_block_text_color_dark) ? 'text-white' : 'text-[var(--first-block-text-color-light)] dark:text-[var(--first-block-text-color-dark)]';

    $secondBlockColor = empty($component->bg_color_light2) && empty($component->bg_color_dark2) ? 'bg-color-14 dark:bg-color-29' : 'bg-[var(--second-block-color-light)] dark:bg-[var(--second-block-color-dark)]';
    $secondBlockTextColor = empty($component->second_block_text_color_light) && empty($component->second_block_text_color_dark) ? 'text-white' : 'text-[var(--second-block-text-color-light)] dark:text-[var(--second-block-text-color-dark)]';

    $thirdBlockColor = empty($component->bg_color_light3) && empty($component->bg_color_dark3) ? 'bg-white dark:bg-color-14' : 'bg-[var(--third-block-color-light)] dark:bg-[var(--third-block-color-dark)]';
    $thirdBlockTextColor = empty($component->third_block_text_color_light) && empty($component->third_block_text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--third-block-text-color-light)] dark:text-[var(--third-block-text-color-dark)]';

    $btnTextColor = empty($component->btn_text_color_light) && empty($component->btn_text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--btn-text-color-light)] dark:text-[var(--btn-text-color-dark)]';

    $bgColor =  empty($component->main_bg_color_light) && empty($component->main_bg_color_dark) ? '' : 'bg-[var(--bg-color-light)] dark:bg-[var(--bg-color-dark)]';

@endphp

<div class="py-[75px] ai-template-v1-{{$component->id}} {{ $component->background_type == 'backgroundImage' ? 'ai-bg-' . $component->id : $bgColor }}" 
    style="padding:{{ !empty($component->pt_y) ? $component->pt_y . ' ' . '0' : ''}};">
    <div class="relative flex justify-center items-center">
        <p class="uppercase absolute font-Figtree text-center heading-1 tracking-[0.2em] text-base leading-6 font-bold">
            {!! strtoupper($component->overline) !!}
        </p>
    </div>
    <p class="mt-[18px] font-RedHat 6xl:text-48 text-36 font-bold text-center {{ $textColor }} break-words px-5">
        {!! $component->heading !!}
    </p>
    <p class="mt-3 font-Figtree {{ $textColor }} font-normal text-center 6xl:text-18 text-16 md:px-10 xl:px-5 px-5 lg:px-0 lg:w-[650px] w-full mx-auto">
        {!! $component->body !!}
    </p>
    
    <div class="5xl:pt-2.5 pt-0 5xl:mt-11 mt-8">
        <div class="relative background-one">
            <div class="9xl:px-[310px] 8xl:px-40 lg:px-20 md:px-10 px-5 relative overflow-hidden">
                <div class="grid lg:grid-cols-2 lg:gap-6 gap-5">
                    @if ( $component->first_block == 1 ||  $component->second_block == 1)
                        <div class="flex flex-col md:flex-row lg:flex-col lg:gap-6 gap-5">
                            {{-- First Block --}}
                            @if($component->first_block == 1)
                                <div class="rounded-[30px] {{$firstBlockColor}} w-full 6xl:px-10 px-[26px] 6xl:pt-8 py-[26px] lg:pb-0"
                                    style="border-width:{{ $component->border_width }}px; border-color:{{ $component->border_color }}; border-style:{{ $component->border_style }};">
                                    <p class="font-RedHat {{$firstBlockTextColor}} 6xl:text-36 text-28 font-bold">{!! $component->block1_heading !!}</p>
                                    <div class="flex 2xl:flex-row md:flex-col-reverse gap-[26px] 6xl:mt-6 mt-5 items-center 2xl:items-start">
                                        @if (isset($component->image_light_mode) && !empty($component->image_light_mode))
                                            <img class="w-[215px] h-[292px] hidden lg:block bottom-0 neg-transition-scale"
                                                src="{{ pathToUrl($component->image_light_mode) }}" alt="{{ __('Image') }}">
                                        @endif
                                        <div class="6xl:mt-1 mt-0">
                                            <p class="text-[18px] leading-[30px] {{$firstBlockTextColor}} font-Figtree font-normal">{!! $component->block1_body !!}</p>
                                            <p class="text-[18px] leading-[30px] {{$firstBlockTextColor}} font-Figtree font-normal 6xl:mt-7 mt-5 mb-5">{!! $component->block1_second_body !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            
                            @if($component->second_block == 1)
                                <div class="rounded-[30px] {{ $secondBlockColor }} {{ $secondBlockTextColor }} w-full  6xl:px-10 p-[26px] 6xl:py-8 h-max" 
                                style="border-width:{{ $component->border_width2 }}px; border-color:{{ $component->border_color2 }}; border-style:{{ $component->border_style2 }};">
                                    <p class="font-RedHat text-28  font-bold">{!! $component->block2_heading !!}</p>
                                    <p class="mt-3 font-Figtree text-[18px] leading-[30px] font-normal ">{!! $component->block2_body !!}</p>
                                </div>
                            @endif
                        </div>
                    @endif
                    @if($component->third_block == 1)
                        <div class="border border-color-89 flex flex-col justify-between {{ $thirdBlockColor }} dark:border-color-47 rounded-[30px] 6xl:pl-10 px-[26px] 6xl:pr-9 6xl:pt-8 py-[26px] 6xl:pb-[48px] w-full"
                            style="border-width:{{ $component->border_width3 }}px; border-color:{{ $component->border_color3 }}; border-style:{{ $component->border_style3 }};">
                            <p class="xs:text-36 text-28 break-words {{ $thirdBlockTextColor }} font-bold font-RedHat lang-text-h1">
                                {!! $component->block3_heading !!}
                            </p>
                            <p class="mt-7 {{ $thirdBlockTextColor }} text-18 leading-[30px] font-normal font-Figtree">{!! $component->block3_body !!}</p>
                            <div class="flex justify-end md:flex-row lg:flex-col 4xl:flex-row flex-col gap-[15px] 6xl:mt-7 mt-5">
                                <div>
                                    <p class="font-Figtree {{ $thirdBlockTextColor }} text-18 leading-[30px] font-normal"> {!! $component->block3_second_body !!} </p>
                                    
                                    @if ($component->btn_name)
                                    <a class="6xl:mt-[35px] mt-[26px] inline-block {{ $btnTextColor }}  text-20 font-Figtree font-medium items-center learn-more break-words"
                                        href="{{ !empty($component->btn_link) ? $component->btn_link :'javascript:void(0)' }}">
                                        {!! $component->btn_name !!}
                                        <span class="w-[14px] h-3 inline-block ml-2.5 {{ $btnTextColor }} margin-left-button neg-transition-scale">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12"
                                                fill="{{ empty($component->btn_text_color_light) && empty($component->btn_text_color_dark) ? 'none' : 'currentColor' }}">
                                                <path d="M13.707 6.70597C14.0977 6.3155 14.0977 5.68137 13.707 5.2909L8.70674 0.292854C8.31609 -0.0976181 7.68168 -0.0976181 7.29103 0.292854C6.90039 0.683327 6.90039 1.31745 7.29103 1.70793L10.5881 5.00039H1.00006C0.4469 5.00039 0 5.44709 0 6C0 6.55291 0.4469 6.99961 1.00006 6.99961H10.585L7.29416 10.2921C6.90351 10.6825 6.90351 11.3167 7.29416 11.7071C7.6848 12.0976 8.31921 12.0976 8.70986 11.7071L13.7101 6.7091L13.707 6.70597Z" fill="#E22861" />
                                            </svg>
                                        </span>
                                    </a>
                                    @endif
                                </div>
                                @if (isset($component->image_light_mode3) && !empty($component->image_light_mode3))
                                    <img class="h-[270px] w-[301px] px-[15px] md:px-0 object-contain neg-transition-scale" src="{{ pathToUrl($component->image_light_mode3) }}" alt="">
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
