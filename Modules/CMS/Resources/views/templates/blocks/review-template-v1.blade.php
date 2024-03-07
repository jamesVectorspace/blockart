@php
    $addons = \Modules\Addons\Entities\Addon::find('reviews');
@endphp

<style>
    .review-template-v1-{{$component->id}} {
        --text-color-light: {{ $component->text_color_light }};
        --text-color-dark: {{ $component->text_color_dark }};

        --bg-color-light: {{ $component->main_bg_color_light }};
        --bg-color-dark: {{ $component->main_bg_color_dark }};
    }

    .review-template-bg-{{$component->id}} {
        background-image: url('{{ isset($component->main_bg_image_light) && !empty($component->main_bg_image_light) ? urlSlashReplace(pathToUrl($component->main_bg_image_light)) : '' }}');
        background-repeat: no-repeat, repeat;
        background-size: cover;
    }
    .dark .review-template-bg-{{$component->id}} {
        background-image: url('{{ isset($component->main_bg_image_dark) && !empty($component->main_bg_image_dark) ? urlSlashReplace(pathToUrl($component->main_bg_image_dark)) : '' }}');
        background-repeat: no-repeat, repeat;
        background-size: cover;
    }
</style>

@if($addons->isEnabled())
    @php
        $userReviews = $homeService->getReviews($component->review_type, $component->review_limit, [], $component->reviews);
        $reviewLimit = $component->review_type == 'selectedReviews' ? count($component->reviews) : $component->review_limit;
        $textColor = empty($component->text_color_light) && empty($component->text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--text-color-light)] dark:text-[var(--text-color-dark)]';
        $bgColor =  empty($component->main_bg_color_light) && empty($component->main_bg_color_dark) ? '' : 'bg-[var(--bg-color-light)] dark:bg-[var(--bg-color-dark)]';
    @endphp
    @if(count($userReviews) > 0)
        <div class="9xl:!px-[310px] 8xl:!px-40 lg:!px-16 md:!px-10 px-5 py-[75px] review-template-v1-{{$component->id}}
            {{ $component->background_type == 'backgroundImage' ? 'review-template-bg-' . $component->id : $bgColor }}" 
            style="padding:{{ !empty($component->pt_y) ? $component->pt_y . ' ' . '0' : ''}};">
            <div class="relative flex justify-center items-center">
                <p class="uppercase absolute heading-1 tracking-[0.2em] text-center font-bold text-16 font-Figtree">
                    {!! strtoupper($component->overline) !!}
                </p>
            </div>
            <p class="mt-[18px] font-RedHat 6xl:text-48 text-36 font-bold text-center break-words px-5 {{ $textColor }}">
                {!! $component->heading !!}
            </p>
            <p class="mt-3 font-Figtree font-normal text-center 6xl:text-18 text-16 {{ $textColor }}">
                {!! $component->body !!}
            </p>
            
            <div class="6xl:mt-16 mt-8">
                <div class="grid md:grid-cols-2 2xl:grid-cols-4 grid-cols-1 gap-6">
                    @for ($i = 0; $i < $reviewLimit; $i++)
                        <div class="dark:bg-color-29 skeleton-loader p-5 rounded-[20px] relative h-[250px]">
                            
                        </div>
                    @endfor
                    <button class="has-ajax-load-data opacity-0 invisible" onclick="ajaxProductLoad(this)" data-component="{{ $component->id }}"></button>
                </div>
            </div>
        </div>
    @endif
@endif

