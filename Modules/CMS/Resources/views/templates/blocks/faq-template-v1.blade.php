@php
    $addons = \Modules\Addons\Entities\Addon::find('faq');
@endphp

<style>
    .faq-template-v1-{{$component->id}} {
        --text-color-light: {{ $component->text_color_light }};
        --text-color-dark: {{ $component->text_color_dark }};

        --bg-color-light: {{ $component->main_bg_color_light }};
        --bg-color-dark: {{ $component->main_bg_color_dark }};
    }

    .faq-bg-{{$component->id}} {
        background-image: url('{{ isset($component->main_bg_image_light) && !empty($component->main_bg_image_light) ? urlSlashReplace(pathToUrl($component->main_bg_image_light)) : '' }}');
        background-repeat: no-repeat, repeat;
        background-size: cover;
    }
    .dark .faq-bg-{{$component->id}} {
        background-image: url('{{ isset($component->main_bg_image_dark) && !empty($component->main_bg_image_dark) ? urlSlashReplace(pathToUrl($component->main_bg_image_dark)) : '' }}');
        background-repeat: no-repeat, repeat;
        background-size: cover;
    }
</style>

@if($addons->isEnabled())
    @php
        $faqs = $homeService->getFaqs($component->faq_type, $component->faq_limit, [], $component->faqs);
        $faqLimit = $component->faq_type == 'selectedFaqs' ? count($component->faqs) : $component->faq_limit;

        $bgColor =  empty($component->main_bg_color_light) && empty($component->main_bg_color_dark) ? '' : 'bg-[var(--bg-color-light)] dark:bg-[var(--bg-color-dark)]';

        $textColor = empty($component->text_color_light) && empty($component->text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--text-color-light)] dark:text-[var(--text-color-dark)]';
    @endphp

    @if(count($faqs) != 0)
        <div class="py-[75px] 9xl:!px-[310px] 8xl:!px-40 lg:@px-16 md:!px-10 !px-5 relative faq-template-v1-{{$component->id}} {{ $component->background_type == 'backgroundImage' ? 'faq-bg-' . $component->id : $bgColor }}" 
            style="padding:{{ !empty($component->pt_y) ? $component->pt_y . ' ' . '0' : '' }};">
            <div class="relative flex justify-center items-center">
                <p class="uppercase absolute heading-1 tracking-[0.2em] text-center font-bold text-16 font-Figtree">
                    {!! strtoupper($component->overline) !!}
                </p>
            </div>
            <p class="mt-[18px] font-RedHat lg:text-48 text-36 font-bold text-center {{ $textColor }}">
                {!! $component->heading !!}
            </p>
            <p class="mt-3 font-Figtree font-normal text-center lg:text-18 text-16 {{ $textColor }} ">
                {!! $component->body !!}
            </p>
            <div class="lg:mt-16 mt-8 faq-accordion">
                <div class="parent-container grid md:grid-cols-2 grid-cols-1 md:gap-6 gap-4 accordion-row lg:mt-16 mt-8 faq-accordion">
                    @foreach ($faqs as $key => $faq)
                        <div class="accordion">
                            <div class="accordion-header flex items-center justify-between w-full py-5 md:px-[30px] px-5 text-left rounded-[14px] bg-color-F6 dark:bg-color-29 focus:outline-none font-medium collapsed font-Figtree text-[20px] cursor-pointer {{ $textColor }} ">
                                <p> {{ $faq->title }}</p>
                                <span class="w-5 h-5">
                                    <svg class="accordion-arrow w-5 h-5" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5889 6.91058C15.9144 7.23602 15.9144 7.76366 15.5889 8.08909L10.5889 13.0891C10.2635 13.4145 9.73585 13.4145 9.41042 13.0891L4.41042 8.08909C4.08498 7.76366 4.08498 7.23602 4.41042 6.91058C4.73586 6.58514 5.26349 6.58514 5.58893 6.91058L9.99967 11.3213L14.4104 6.91058C14.7359 6.58514 15.2635 6.58514 15.5889 6.91058Z" fill="currentColor"/>
                                    </svg>
                                </span>
                            </div>
                            <div class="pb-[20px] md:px-[30px] px-5 font-Figtree text-16 font-normal rounded-b-2xl accordion-content {{ $textColor }}">
                                <p>{{ $faq->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endif

@push('scripts')
    <script src="{{ asset('public/assets/js/site/faq-accordion.min.js') }}"></script>
@endpush