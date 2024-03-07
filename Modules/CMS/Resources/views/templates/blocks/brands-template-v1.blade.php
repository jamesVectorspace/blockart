@php
    $component = isset($component) ? $component : null;
@endphp

<style>
    .brands-template-v1-{{$component->id}} {
        --text-color-light: {{ $component->text_color_light }};
        --text-color-dark: {{ $component->text_color_dark }};

        --bg-color-light: {{ $component->main_bg_color_light }};
        --bg-color-dark: {{ $component->main_bg_color_dark }};
    }

    .brand-bg-{{$component->id}} {
        background-image: url('{{ isset($component->main_bg_image_light) && !empty($component->main_bg_image_light) ? urlSlashReplace(pathToUrl($component->main_bg_image_light)) : '' }}');
        background-repeat: no-repeat, repeat;
        background-size: cover;
    }
    .dark .brand-bg-{{$component->id}} {
        background-image: url('{{ isset($component->main_bg_image_dark) && !empty($component->main_bg_image_dark) ? urlSlashReplace(pathToUrl($component->main_bg_image_dark)) : '' }}');
        background-repeat: no-repeat, repeat;
        background-size: cover;
    }
</style>

@php
    $textColor = empty($component->text_color_light) && empty($component->text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--text-color-light)] dark:text-[var(--text-color-dark)]';

    $bgColor =  empty($component->main_bg_color_light) && empty($component->main_bg_color_dark) ? '' : 'bg-[var(--bg-color-light)] dark:bg-[var(--bg-color-dark)]';
@endphp

<div class="relative py-[75px] brands-template-v1-{{$component->id}} {{ $component->background_type == 'backgroundImage' ? 'brand-bg-' . $component->id : $bgColor }}" 
    style="padding:{{ !empty($component->pt_y) ? $component->pt_y . ' ' . '0' : '' }};">
    
    <p class="font-bold text-center font-RedHat 6xl:text-32 text-28 md:px-10 px-5 {{ $textColor }}">
        {!! $component->heading !!}
    </p>
    <p class=" text-center 6xl:text-18 text-16 font-normal mt-4 md:px-10 px-5 font-Figtree {{ $textColor }}">
        {{ $component->body }}
    </p>
    @if ( isset($component->brand) && count($component->brand) != 0 )
        <div class="flex flex-wrap justify-center items-center md:gap-10 gap-[26px] mt-[60px] md:px-10 px-0">
            @foreach($component->brand as $brand)
                @if (isset($brand['light_logo']) && !empty($brand['light_logo']))
                    <img class="w-[200px] h-[60px] dark:hidden neg-transition-scale" src="{{ pathToUrl($brand['light_logo']) }}" alt="{{ __('Image') }}">
                @endif
                @if (isset($brand['dark_logo']) && !empty($brand['dark_logo']))
                    <img class="w-[200px] h-[60px] hidden dark:block neg-transition-scale" src="{{ pathToUrl($brand['dark_logo']) }}" alt="{{ __('Image') }}">
                @endif
            @endforeach
        </div>
    @endif
</div>