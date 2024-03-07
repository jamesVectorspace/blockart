@php
    $blogs = $homeService->getBlogs($component->blog_type, $component->blog_limit, null, $component->blogs);
@endphp

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


<script src="{{ asset('public/assets/plugin/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/js/site/landing.min.js') }}"></script>