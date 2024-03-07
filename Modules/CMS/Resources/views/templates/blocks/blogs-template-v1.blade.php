@php
    $blogs = $homeService->getBlogs($component->blog_type, $component->blog_limit, [], $component->blogs);
@endphp

<style>
    .blog-template-v1-{{$component->id}} {
        --text-color-light: {{ $component->text_color_light }};
        --text-color-dark: {{ $component->text_color_dark }};
        --blog-btn-text-color-light: {{ $component->btn_text_color_light }};
        --blog-btn-text-color-dark: {{ $component->btn_text_color_dark }};
        --newsletter-btn-text-color-light: {{ $component->newsletter_btn_text_color_light }};
        --newsletter-btn-text-color-dark: {{ $component->newsletter_btn_text_color_dark }};
        --newsletter-btn-color-light: {{ $component->newsletter_btn_color_light }};
        --newsletter-btn-color-dark: {{ $component->newsletter_btn_color_dark }};

        --bg-color-light: {{ $component->main_bg_color_light }};
        --bg-color-dark: {{ $component->main_bg_color_dark }};
    }

    .blog-bg-{{$component->id}} {
        background-image: url('{{ isset($component->main_bg_image_light) && !empty($component->main_bg_image_light) ? urlSlashReplace(pathToUrl($component->main_bg_image_light)) : '' }}');
        background-repeat: no-repeat, repeat;
        background-size: cover;
    }
    .dark .blog-bg-{{$component->id}} {
        background-image: url('{{ isset($component->main_bg_image_dark) && !empty($component->main_bg_image_dark) ? urlSlashReplace(pathToUrl($component->main_bg_image_dark)) : '' }}');
        background-repeat: no-repeat, repeat;
        background-size: cover;
    }
</style>

@php
    $textColor = empty($component->text_color_light) && empty($component->text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--text-color-light)] dark:text-[var(--text-color-dark)]';

    $btnTextColor = empty($component->btn_text_color_light) && empty($component->btn_text_color_dark) ? 'text-color-14 dark:text-white' : 'text-[var(--blog-btn-text-color-light)] dark:text-[var(--blog-btn-text-color-dark)]';

    $newsLetterBtn = empty($component->newsletter_btn_color_light) && empty($component->newsletter_btn_color_dark) && empty($component->newsletter_btn_text_color_light) && empty($component->newsletter_btn_text_color_dark) ? 'bg-color-14 dark:bg-color-76 text-white' : 'text-[var(--newsletter-btn-text-color-light)] dark:text-[var(--newsletter-btn-text-color-dark)] bg-[var(--newsletter-btn-color-light)] dark:bg-[var(--newsletter-btn-color-dark)]';
    $bgColor =  empty($component->main_bg_color_light) && empty($component->main_bg_color_dark) ? '' : 'bg-[var(--bg-color-light)] dark:bg-[var(--bg-color-dark)]';
@endphp

<div class="relative blog-template-v1-{{$component->id}} {{ $component->background_type == 'backgroundImage' ? 'blog-bg-' . $component->id : $bgColor }}">
    <div class="{{count($blogs) != 0 ? 'justify-between 9xl:!pl-[310px] 8xl:!pl-40 7xl:!pl-32 2xl:!pl-16 gap-5 blog-slider-section' : 'justify-center text-center items-center 9xl:!px-[310px] 8xl:!px-40 lg:!px-16 md:!px-10 !px-5'}} py-[75px] w-full flex xl:flex-row flex-col xl:relative" style="padding:{{ !empty($component->pt_y) ? $component->pt_y . ' ' . '0' : '' }};">
        <div class="mt-3 mb-8 xl:mb-0 2xl:pl-0 relative {{count($blogs) != 0 ? '2xl:w-[34%] xl:w-[44%] lg:w-1/2 w-full lg:pl-16 md:pl-10 pl-5 first-side' : '5xl:w-[36%] md:w-1/2 w-full'}}">
            @if ($component->overline)
                <div class="relative flex {{count($blogs) != 0 ? 'justify-start' : 'justify-center'}} items-center">
                    <p class="uppercase absolute heading-1 tracking-[0.2em] font-bold text-16 font-Figtree">
                        {!! strtoupper($component->overline) !!}
                    </p>
                </div>
            @endif
            
            @if ($component->heading)
                <p class="mt-[18px] font-RedHat 6xl:text-48 text-36 font-bold pr-5 {{ $textColor }}">
                    {!! $component->heading !!}
                </p>
            @endif
            @if(count($blogs) != 0 && $component->blog_button == 1 && !empty($component->btn_name))
                <a class="mt-3 flex font-Figtree text-18 font-medium justify-start items-center gap-2.5 {{ $btnTextColor }}" href="{{ empty($component->btn_link) ? 'javascript:void(0)' : $component->btn_link }}">
                    <span>{{ $component->btn_name }}</span>
                    <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                        <path
                            d="M13.707 6.70597C14.0977 6.3155 14.0977 5.68137 13.707 5.2909L8.70674 0.292854C8.31609 -0.0976181 7.68168 -0.0976181 7.29103 0.292854C6.90039 0.683327 6.90039 1.31745 7.29103 1.70793L10.5881 5.00039H1.00006C0.4469 5.00039 0 5.44709 0 6C0 6.55291 0.4469 6.99961 1.00006 6.99961H10.585L7.29416 10.2921C6.90351 10.6825 6.90351 11.3167 7.29416 11.7071C7.6848 12.0976 8.31921 12.0976 8.70986 11.7071L13.7101 6.7091L13.707 6.70597Z"
                            fill="{{ empty($component->btn_text_color_light) && empty($component->btn_text_color_dark) ? '#E22861' : 'currentColor' }}" />
                    </svg>
                </a>
            @endif

            @if ($component->newsletter_body)
                <p class="mt-3 font-Figtree font-normal text-18 {{count($blogs) != 0 ? 'pr-5' : ''}} {{ $textColor }}">
                    {!! $component->newsletter_body !!}
                </p>
            @endif
            
            @if ($component->newsletter_button == 1 && !empty($component->newsletter_btn_name))
                <form id="subscriptionEmailForm" name="subscriptionEmailForm">
                    {!! csrf_field() !!}
                    <div class="flex {{count($blogs) != 0 ? '2xl:justify-start justify-between pr-5 md:pr-10 sub-land-mail' : 'justify-center'}} mt-5 gap-2.5">
                        <div class="{{count($blogs) != 0 ? 'xl:w-max w-full 6xl:w-[278px]' : 'md:w-max w-full'}}">
                            <input class="border-color-89 dark:border-color-47 rounded-xl px-4 py-3 h-[54px] leading-6 6xl:w-[278px] w-full font-normal text-base text-color-89 font-Figtree form-control border focus:border-color-89 bg-color-F6 dark:bg-color-29 subscription_email" type="email" placeholder="{{ __('Email address') }}" id="email" name="email">
                            <div class="flex justify-start items-center gap-1.5 mt-2.5 hidden subscription_message">
                            </div>
                        </div>
                        <button type="submit" class="flex justify-center items-center gap-2 text-16 font-semibold rounded-[10px] font-Figtree py-[15px] px-7 h-max sub-land-button {{ $newsLetterBtn }}">
                            {{ $component->newsletter_btn_name }}
                            <span class="subscribe-loader hidden">
                                <svg class="animate-spin h-5 w-5 m-auto" xmlns="http://www.w3.org/2000/svg" width="72"
                                    height="72" viewBox="0 0 72 72" fill="none">
                                    <mask id="path-1-inside-1_1032_3036" fill="white">
                                        <path
                                            d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z" />
                                    </mask>
                                    <path
                                        d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z"
                                        stroke="url(#paint0_linear_1032_3036)" stroke-width="24"
                                        mask="url(#path-1-inside-1_1032_3036)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_1032_3036" x1="46.8123" y1="63.1382" x2="21.8195"
                                            y2="6.73779" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#E60C84" />
                                            <stop offset="1" stop-color="#FFCF4B" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            @endif
        </div>
        @if (count($blogs) != 0)
            <div class="latest-news 2xl:w-[66%] w-full overflow-hidden pl-0 6xl:rounded-[30px] !rounded-6">
                <div class="flex overflow-x-auto md:overflow-hidden md:gap-30p gap-5">
                    <div class="9xl:!w-full xs:w-full w-[360px] md:!h-[360px] h-[270px] 6xl:!rounded-[30px] !rounded-6 inner-img neg-transition-scale">
                        <div class="skeleton-loader dark:bg-color-29 9xl:!w-full xs:w-full w-[360px] md:!h-[360px] h-[270px] 6xl:!rounded-[30px] !rounded-6 relative">
                        </div>
                    </div>
                    <div class="9xl:!w-full xs:w-full w-[360px] md:!h-[360px] h-[270px] 6xl:!rounded-[30px] !rounded-6 inner-img neg-transition-scale">
                        <div class="skeleton-loader dark:bg-color-29 9xl:!w-full xs:w-full w-[360px] md:!h-[360px] h-[270px] 6xl:!rounded-[30px] !rounded-6 relative">
                        </div>
                    </div>
                </div>
                <button class="has-ajax-load-data opacity-0 invisible" onclick="ajaxProductLoad(this)" data-component="{{ $component->id }}"></button>
            </div>
        @endif
    </div>
</div>

