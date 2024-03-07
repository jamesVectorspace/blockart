@extends('layouts.site_master')
@section('content')
    <div class="dark:bg-color-14 -mt-[74px]">
        <div class="section-bg">
            <p class="text-center text-36 md:text-48 font-RedHat text-color-14 dark:text-white font-bold pt-[118px] md:pt-[162px]">{{ __(':x Use Cases', [ 'x' => preference('company_name') ]) }}</p>
            <div class="flex justify-center pb-[59px] px-5">
                <p class="text-center text-16 md:text-18 text-color-14 dark:text-white font-normal mt-3 w-[700px] break-words font-Figtree">
                    {!! $useCase == 0 ? __('No templates found under the categories.') : __('A Library of over :x in demand pre-built use case templates to help you get up and running in no time according to your preferences.', ['x' => '<span class="text-color-E2">' . Modules\OpenAI\Entities\UseCase::useCaseCount() . '</span>']) !!}
                </p>
            </div>
        </div>
        <div class="9xl:px-[310px] 8xl:px-40 lg:px-20 md:px-10 px-5 pb-16">
            @foreach($useCaseCategories as $useCaseCategory)
                @if(count($useCaseCategory->useCases) != 0)
                    <p class="text-24 text-color-14 dark:text-white font-bold mt-[52px] font-RedHat">{{ $useCaseCategory->name }}</p>
                    <div class="mt-6 grid 9xl:grid-cols-4 5xl:grid-cols-4 4xl:grid-cols-3 xs:grid-cols-2 grid-cols-1 gap-4 xl:gap-[23px] pb-8">
                        @foreach($useCaseCategory->useCases as $category)
                        <a href="{{ route('user.template', $category->slug) }}" class="bg-white dark:bg-color-14 border-dark border-design-2 cursor-pointer rounded-xl border border-color-DF dark:border-[#474746]">
                            <div class="relative">
                                <div class="p-4 xl:p-[30px] xl:pb-6">
                                    <img class="rounded-full w-12 h-12 neg-transition-scale"
                                    src="{{ $category->fileUrl() }}"
                                    alt="{{ __('Image') }}">
                                    <p class="text-color-14 dark:text-white font-semibold text-18 mt-7 break-words line-clamp-double font-Figtree">{{trimWords ($category->name,65) }}</p>
                                    <p class="text-13 xl:text-14 text-color-14 dark:text-color-DF font-light mt-2.5 break-words font-Figtree">{{trimWords ($category->description,65) }}</p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                @endif
            @endforeach

            <div class="rounded-[40px] mt-[31px] relative get-started-for-free text-center">
                <p class="text-center text-36 md:text-48 text-color-14 font-bold pt-[26px] md:pt-12 font-RedHat break-words px-[26px] lg:px-5">{{ __('All set to level up your content game?') }}</p>
                <p class="text-center text-16 md:text-18 text-color-14 font-normal px-[26px] sm:px-5 mt-4 md:mt-5 break-words xl:w-[775px] mx-auto font-Figtree">{{ __('Sign up for a Free Trial and discover how easy it can be to create amazing content!') }}</p>
                <div class="relative pb-10 md:pb-0">
                    <a href="{{route('users.registration')}}" class="bg-white h-[54px] inline-flex gap-2.5 text-center items-center mx-auto justify-center mt-8 md:mb-[58px] rounded-lg"><span class="text-18 pl-[27px] pr-27px-rtl font-semibold text-color-14 font-Figtree rounded-lg">
                        {{ __('Get Started for Free') }} </span>
                        <svg class="mr-[27px] ml-27px-rtl neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                            <path d="M13.707 6.70597C14.0977 6.3155 14.0977 5.68137 13.707 5.2909L8.70674 0.292854C8.31609 -0.0976181 7.68168 -0.0976181 7.29103 0.292854C6.90039 0.683327 6.90039 1.31745 7.29103 1.70793L10.5881 5.00039H1.00006C0.4469 5.00039 0 5.44709 0 6C0 6.55291 0.4469 6.99961 1.00006 6.99961H10.585L7.29416 10.2921C6.90351 10.6825 6.90351 11.3167 7.29416 11.7071C7.6848 12.0976 8.31921 12.0976 8.70986 11.7071L13.7101 6.7091L13.707 6.70597Z" fill="#E22861"></path>
                        </svg>
                    </a>
                    <img class="absolute top-[-30px] left-[88px] hidden xl:block gmail-rtl neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/google.png') }}" alt="{{ __('Image') }}">
                    <img class="absolute top-0 right-[88px] hidden xl:block ink-rtl neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/ink.png') }}" alt="{{ __('Image') }}">
                </div>
                <div class="relative flex justify-center w-max mx-auto">
                    <img class="mx-auto 2xl:w-full xl:w-[700px] lg:w-[580px] bottom-0 hidden lg:block z-10 neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/content.png') }}">
                    <img class="hidden lg:block absolute -top-[25px] left-40 neg-transition-scale mike-rtl" src="{{ asset('Modules/OpenAI/Resources/assets/image/mike.png') }}">
                    <img class="hidden lg:block absolute bottom-10 z-[50] -left-5 you-tube-rtl neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/youtube.png') }}">
                    <img class="hidden xl:block absolute bottom-5 xl:bottom-[53px] z-[50] -right-[154px] robo-target neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/img-robo-target.png') }}">
                </div>
            </div>
        </div>
    </div>
@endsection

