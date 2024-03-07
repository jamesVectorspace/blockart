@php
    $addons = \Modules\Addons\Entities\Addon::find('faq');
@endphp

@if($addons->isEnabled())
    @php
        $faqs = \Modules\FAQ\Entities\Faq::getAll()->where('status', 'Active');
        $count = $faqs->count();
    @endphp

    @if($count != 0)
    <div>
        <img class="absolute -top-[28rem] w-full sm:block hidden bg-four neg-transition-scale"
            src="{{ asset('Modules/OpenAI/Resources/assets/image/bg-four.png') }}" alt="">
        <div class="lg:mt-[172px] mt-[72px] 9xl:px-[310px] 8xl:px-40 lg:px-16 md:px-10 px-5 relative">
            <div class="relative flex justify-center items-center">
                <p class="uppercase absolute heading-1 tracking-[0.2em] text-center font-bold text-16 font-Figtree">
                    {{ __('Before you begin') }}
                </p>
            </div>
            <p class="mt-[18px] font-RedHat lg:text-48 text-36 font-bold text-center text-color-14 dark:text-white">
                {{ __('Frequently Asked Questions') }}
            </p>
            <p class="mt-3 font-Figtree text-color-14 dark:text-white font-normal text-center lg:text-18 text-16">
                {{ __('See what other people are asking about :x and be a part of it.', ['x' => preference('company_name')]) }}
            </p>
            <div class="lg:mt-16 mt-8 faq-accordion">
                <div class="parent-container grid md:grid-cols-2 grid-cols-1 md:gap-6 gap-4 accordion-row lg:mt-16 mt-8 faq-accordion">
                    @foreach ($faqs as $key => $faq)
                        <div class="accordion">
                            <div class="accordion-header flex items-center justify-between w-full py-5 md:px-[30px] px-5 text-left rounded-[14px] bg-color-F6 dark:bg-color-29 focus:outline-none text-color-14 dark:text-white font-medium collapsed font-Figtree text-20 cursor-pointer">
                                <p> {{ $faq->title }}</p>
                                <span class="w-5 h-5">
                                    <svg class="accordion-arrow w-5 h-5" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5889 6.91058C15.9144 7.23602 15.9144 7.76366 15.5889 8.08909L10.5889 13.0891C10.2635 13.4145 9.73585 13.4145 9.41042 13.0891L4.41042 8.08909C4.08498 7.76366 4.08498 7.23602 4.41042 6.91058C4.73586 6.58514 5.26349 6.58514 5.58893 6.91058L9.99967 11.3213L14.4104 6.91058C14.7359 6.58514 15.2635 6.58514 15.5889 6.91058Z" fill="currentColor"/>
                                    </svg>
                                </span>
                            </div>
                            <div class="pb-[20px] md:px-[30px] px-5 text-color-14 dark:text-white font-Figtree text-16 font-normal rounded-b-2xl accordion-content">
                                <p>{{ $faq->description }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
@endif

<div class="{{count($blogs) != 0 ? 'justify-between 9xl:pl-[310px] 8xl:pl-40 7xl:pl-32 2xl:pl-16 gap-5 blog-slider-section' : 'justify-center text-center items-center 9xl:px-[310px] 8xl:px-40 lg:px-16 md:px-10 px-5'}} 6xl:mt-40 mt-[60px] w-full flex xl:flex-row flex-col xl:relative">
    <div class="mt-3 mb-8 xl:mb-0 2xl:pl-0 relative {{count($blogs) != 0 ? '2xl:w-[34%] xl:w-[44%] lg:w-1/2 w-full lg:pl-16 md:pl-10 pl-5 first-side' : '5xl:w-[36%] md:w-1/2 w-full'}}">
        <div class="relative flex {{count($blogs) != 0 ? 'justify-start' : 'justify-center'}} items-center">
            <p class="uppercase absolute heading-1 tracking-[0.2em] font-bold text-16 font-Figtree">
                {{ __('Latest News') }}
            </p>
        </div>
        <p class="mt-[18px] font-RedHat 6xl:text-48 text-36 font-bold text-color-14 dark:text-white pr-5">
           {{ __('Stay Updated With Our Activities') }}
        </p>
        @if(count($blogs) != 0)
            <a class="mt-3 flex text-color-14 dark:text-white font-Figtree text-18 font-medium {{ count($blogs) != 0 ? 'justify-start' : 'justify-center'}} items-center gap-2.5"
                href="{{ route('blog.all') }}"> <span>{{ __('Head to all blogs') }}</span>
                <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                    <path
                        d="M13.707 6.70597C14.0977 6.3155 14.0977 5.68137 13.707 5.2909L8.70674 0.292854C8.31609 -0.0976181 7.68168 -0.0976181 7.29103 0.292854C6.90039 0.683327 6.90039 1.31745 7.29103 1.70793L10.5881 5.00039H1.00006C0.4469 5.00039 0 5.44709 0 6C0 6.55291 0.4469 6.99961 1.00006 6.99961H10.585L7.29416 10.2921C6.90351 10.6825 6.90351 11.3167 7.29416 11.7071C7.6848 12.0976 8.31921 12.0976 8.70986 11.7071L13.7101 6.7091L13.707 6.70597Z"
                        fill="#E22861" />
                </svg>
            </a>
        @endif
        <p class="mt-3 font-Figtree text-color-14 dark:text-white font-normal text-18 {{count($blogs) != 0 ? 'pr-5' : ''}}">
            {{ __('Subscribe to our newsletters and stay updated about our activities and much more. No spam, we promise.') }}
        </p>
        <form id="subscriptionEmailForm" name="subscriptionEmailForm">
            {!! csrf_field() !!}
            <div class="flex {{count($blogs) != 0 ? '2xl:justify-start justify-between pr-5 md:pr-10 sub-land-mail' : 'justify-center'}} mt-5 gap-2.5">
                <div class="{{count($blogs) != 0 ? 'xl:w-max w-full 6xl:w-[278px]' : 'md:w-max w-full'}}">
                    <input class="border-color-89 dark:border-color-47 rounded-xl px-4 py-3 h-[54px] leading-6 6xl:w-[278px] w-full font-normal text-base text-color-89 font-Figtree form-control border focus:border-color-89 bg-color-F6 dark:bg-color-29 subscription_email" type="email" placeholder="{{ __('Email address') }}" id="email" name="email">
                    <div class="flex justify-start items-center gap-1.5 mt-2.5 hidden subscription_message">
                    </div>
                </div>
                <button type="submit" class="text-white flex justify-center items-center gap-2 text-16 font-semibold rounded-[10px] font-Figtree bg-color-14 dark:bg-color-76 py-[15px] px-7 h-max sub-land-button">{{ __('Subscribe') }}
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
    </div>
    @if (count($blogs) != 0)
        <div class="latest-news 2xl:w-[66%] w-full overflow-hidden pl-0 6xl:rounded-[30px] !rounded-6">
            <div class="swiper slider2 6xl:rounded-[30px] !rounded-6">
                <img class="absolute top-0 lg:right-[50px] right-[316px] z-50 dark:hidden hidden lg:block latest-news-overlay neg-transition-scale"
                    src="{{ asset('Modules/OpenAI/Resources/assets/image/white-overlay.png') }}" alt="">
                <img class="absolute top-0 lg:right-[50px] right-[316px] z-50 hidden dark:hidden lg:dark:block latest-news-overlay neg-transition-scale"
                    src="{{ asset('Modules/OpenAI/Resources/assets/image/black-overlay.png') }}" alt="">
                <div class="swiper-wrapper w-full 6xl:rounded-[30px] !rounded-6">
                    @foreach ( $blogs as $blog )
                        <a class="swiper-slide 6xl:rounded-[30px] !rounded-6" href="{{ route('blog.details', [$blog->slug]) }}">
                            <div class="w-full 6xl:rounded-[30px] rounded-6 overflow-hidden latest-slider-footer !rounded-6">
                                <img class="9xl:!w-full xs:w-full w-[360px] md:!h-[360px] h-[270px] object-cover 6xl:!rounded-[30px] !rounded-6 inner-img neg-transition-scale"
                                    src="{{ $blog->fileUrl() }}"
                                    alt="{{ __('Image') }}">
                                <div class="latest-slider-footer absolute bottom-0 lg:p-8 p-5 pb-[20px] w-full">
                                    <p class="text-white 6xl:text-22 text-16 font-semibold font-Figtree">{{ $blog->title }}
                                    </p>
                                    <div class="read-now mt-2.5">
                                        <div class="flex gap-2 justify-start items-center font-medium font-Figtree text-white text-14">
                                            <span> {{ __('read now') }}</span>
                                            <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="11" height="9"
                                                viewBox="0 0 11 9" fill="none">
                                                <path
                                                    d="M10.7698 5.02948C11.0767 4.73663 11.0767 4.26103 10.7698 3.96818L6.84101 0.219641C6.53407 -0.0732136 6.0356 -0.0732136 5.72867 0.219641C5.42173 0.512495 5.42173 0.98809 5.72867 1.28094L8.31921 3.75029H0.785758C0.351136 3.75029 0 4.08532 0 4.5C0 4.91468 0.351136 5.24971 0.785758 5.24971H8.31676L5.73112 7.71905C5.42419 8.01191 5.42419 8.4875 5.73112 8.78036C6.03806 9.07321 6.53653 9.07321 6.84346 8.78036L10.7723 5.03182L10.7698 5.02948Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next bg-white dark:bg-color-14 text-color-14 dark:text-white rounded-full">
                <svg class="w-full h-full m-[9px] bg-white dark:bg-color-14 text-color-14 dark:text-white neg-transition-scale"
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M6.91009 15.5889C7.23553 15.9144 7.76317 15.9144 8.0886 15.5889L13.0886 10.5889C13.414 10.2635 13.414 9.73585 13.0886 9.41042L8.0886 4.41042C7.76317 4.08498 7.23553 4.08498 6.91009 4.41042C6.58466 4.73586 6.58466 5.26349 6.91009 5.58893L11.3208 9.99967L6.91009 14.4104C6.58466 14.7359 6.58466 15.2635 6.91009 15.5889Z"
                        fill="currentColor"/>
                </svg>
            </div>
            <div class="swiper-button-prev bg-white dark:bg-color-14 text-color-14 dark:text-white rounded-full">
                <svg class="w-full h-full m-[9px] bg-white dark:bg-color-14 text-color-14 dark:text-white neg-transition-scale"
                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.0899 15.5889C12.7645 15.9144 12.2368 15.9144 11.9114 15.5889L6.9114 10.5889C6.58596 10.2635 6.58596 9.73585 6.9114 9.41042L11.9114 4.41042C12.2368 4.08498 12.7645 4.08498 13.0899 4.41042C13.4153 4.73586 13.4153 5.26349 13.0899 5.58893L8.67916 9.99967L13.0899 14.4104C13.4153 14.7359 13.4153 15.2635 13.0899 15.5889Z"
                        fill="currentColor" />
                </svg>
            </div>
        </div>
    @endif
</div>
