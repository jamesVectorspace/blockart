@extends('layouts.site_master')
@section('page_title', __('Pricing'))
@section('content')
    <div class="dark:bg-color-14 -mt-[74px]">
        <div class="pricing-section-bg">
            <p class="text-center text-36 md:text-48 text-color-14 text-white font-bold pt-[118px] md:pt-[162px] font-RedHat">{{ __('Pricing') }}</p>
            <div class="flex justify-center pb-[59px] px-5">
                <p class="text-center text-16 md:text-18 text-color-1 text-white font-normal mt-3 xl:w-[700px] mx-5 font-Figtree">{{ ( count($packages) != 0 ) ?  __('We offer flexible pricing plans so everyone can find one that suits their needs.') : __('At this time, we do not have any pricing information, but if we do in the future, it will be available here.') }}</p>
            </div>
        </div>
        @if(count($packages) != 0)
            <div class="lg:mt-[52px] mt-8">
                <p class="text-color-14 dark:text-white font-bold text-center font-RedHat 6xl:text-32 text-28 xl:w-[700px] xl:px-0 px-5 mx-auto">
                    {{ __('We have plans for everyone, whether you are a solo marketer or a large agency.') }}</p>
                <p class="text-color-89 dark:text-white text-center text-15 font-medium mt-5 font-Figtree px-5">
                    {!! __('All pricing is in :x', ['x' => '<span class="text-[#E22861]">'. currency()['name'] .'</span>']) !!} {{ __('Plans with unlimited words are subject to our Fair Use Policy.') }}</p>
            </div>
            <div
                class="6xl:mt-11 mt-10 6xl:gap-[60px] gap-8 flex flex-col md:flex-row flex-wrap px-5 md:items-center items-start justify-center sm:w-max w-full md:w-full mx-auto">
                <div class="flex flex-row gap-3">
                    <img src="{{ asset('public/assets/image/padlock.svg') }}">
                    <span class="text-color-14 dark:text-white text-18 font-Figtree font-medium">
                        {{ __('100% secured payment') }}
                    </span>
                </div>
                <div class="flex flex-row gap-3">
                    <img src="{{ asset('public/assets/image/hacker.svg') }}">
                    <span class="text-color-14 dark:text-white text-18 font-Figtree font-medium">
                        {{ __('No hidden fees') }}
                    </span>
                </div>
                <div class="flex flex-row gap-3">
                    <img src="{{ asset('public/assets/image/cancel-sub.svg') }}">
                    <span class="text-color-14 dark:text-white text-18 font-Figtree font-medium pr-5">
                        {{ __('Cancel subscription anytime') }}
                    </span>
                </div>
            </div>
        @endif

        <div class="relative background-one">
            <img class="absolute w-full h-full sm:block hidden" src="{{ asset('Modules/OpenAI/Resources/assets/image/background-one.png') }}">
            <div class="9xl:px-[310px] 8xl:px-40 lg:px-16 relative">
                @include('site.landing_page.landing-sub-layout.plan')

                <p class="text-color-14 dark:text-white font-bold text-center font-RedHat 6xl:text-32 text-28 md:px-10 px-5 mt-[52px]">{{ __('Collaborated With Industry Leaders') }}
                </p>
                <p class="text-color-14 dark:text-white text-center 6xl:text-18 text-16 font-normal mt-3 mx-auto font-Figtree xl:w-[700px] xs:w-[388px] w-full xs:px-0 px-5 flex justify-center items-center">{{ __('Thousands of marketers, agencies, and entrepreneurs choose :x to automate and simplify their content marketing.', ['x' => preference('company_name')]) }}</p>
                <div class="flex flex-wrap justify-center items-center md:gap-10 gap-[26px] mt-[60px] md:px-10 px-0">
                    <img class="w-[200px] h-[60px] dark:hidden neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/lense-eye.svg') }}" alt="{{ __('Image') }}">
                    <img class="w-[200px] h-[60px] hidden dark:block neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/lense-eye-dark.svg') }}" alt="{{ __('Image') }}">
                    <img class="w-[200px] h-[60px] dark:hidden neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/conn3ctr.svg') }}" alt="{{ __('Image') }}">
                    <img class="w-[200px] h-[60px] hidden dark:block neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/conn3ctr-dark.svg') }}" alt="{{ __('Image') }}">
                    <img class="w-[200px] h-[60px] dark:hidden neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/fusion.svg') }}" alt="{{ __('Image') }}">
                    <img class="w-[200px] h-[60px] hidden dark:block neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/fusion-dark.svg') }}" alt="{{ __('Image') }}">
                    <img class="w-[200px] h-[60px] dark:hidden neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/one-square.svg') }}" alt="{{ __('Image') }}">
                    <img class="w-[200px] h-[60px] hidden dark:block neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/one-square-dark.svg') }}" alt="{{ __('Image') }}">
                    <img class="w-[200px] h-[60px] dark:hidden neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/g-diamond.svg') }}" alt="{{ __('Image') }}">
                    <img class="w-[200px] h-[60px] hidden dark:block neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/g-diamond-dark.svg') }}" alt="{{ __('Image') }}">
                </div>
            </div>
        </div>

        @if (count($packages) != 0)
            <div class="lg:mt-[170px] mt-[90px] relative">
                <img class="absolute w-full h-full" src="{{ asset('public/assets/image/pricing-bg.png') }}">
                <div class="relative">
                    <p class="mt-[18px] 9xl:px-[310px] 8xl:px-40 lg:px-16 md:px-10 px-5 font-RedHat lg:text-48 text-36 font-bold text-center text-color-14 dark:text-white">
                        {{ __('Compare Plans') }}
                    </p>
                    <p class="mt-3 lg:px-16 md:px-10 px-5 font-Figtree text-color-14 dark:text-white font-normal text-center lg:text-18 text-16 xl:w-[660px] px-5 xl:px-0 mx-auto">
                        {{ __('Our plans offer the perfect balance between price, features and performance. Compare our plans and find the one that best suits your needs.') }}
                    </p>
                    <div class="mt-16 9xl:px-[310px] 8xl:px-40 lg:px-16 md:px-10 sm:px-5 px-0">
                        <div class="flex flex-col">
                            <div class="overflow-y-auto pricing-table pb-2.5 sidebar-scrollbar">
                                <table class="min-w-full">
                                    <thead>
                                        <tr>
                                            <th colspan="{{ count($packages) + 1 }}">
                                                <div class="w-full border border-color-DF dark:border-color-47 dark:bg-[#333332] rounded-2xl table-box-shadow">
                                                    <table class="w-full">
                                                        <thead>
                                                            <tr>
                                                                <th class="w-[300px]">
                                                                    <div class="py-3.5 px-8 w-[300px]">
                                                                        <p class="font-Figtree text-sm font-bold feature-text text-left uppercase">{{ __('FEATURES') }}</p>
                                                                        <p class="text-lg font-medium font-Figtree text-color-14 dark:text-white text-left mt-1 break-words">{{ __('Choose the plan that best suits your needs') }}</p>
                                                                        <a class="mt-3 text-color-89 font-Figtree text-[10px] leading-4 font-normal text-left block" href="{{ (option('default_template_page', '') != null? route('site.page', ['slug' => option('default_template_page', '')['term_condition']]): '#') }}">* {{ __('T&C applied')}}</a>
                                                                    </div>
                                                                </th>
                                                                @foreach($packages as $key => $package)
                                                                    <th class="w-1/4 px-7">
                                                                        <p class="text-color-14 w-40 mx-auto dark:text-white text-[24px] leading-[36px] font-bold font-RedHat break-words">{{ $package['name'] }}</p>
                                                                    </th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $iteration = 15;
                                        @endphp
                                        @foreach ($features as $feature)
                                            @break($loop->iteration > $iteration)
                                            @php
                                                if (empty($feature['title'])) {
                                                    ++$iteration;
                                                    continue;
                                                }
                                            @endphp
                                            <tr>
                                                <td class="text-left text-color-14 dark:text-white text-base font-medium w-[300px] font-Figtree pt-10">
                                                    <p class="w-[300px] pl-8 feature-title">{{ $feature['title'] }}</p>
                                                </td>
                                                @foreach($packages as $key => $package)
                                                    @if (isset($feature['value']))

                                                    <td class="text-center pt-7 w-1/4 px-7">
                                                        <span class="flex justify-center text-color-14 dark:text-white font-Figtree fomt-medium text-14">
                                                            @if (isset($feature['values'][$package['name']]))
                                                                {{ $feature['values'][$package['name']] == -1 ? __('Unlimited') : $feature['values'][$package['name']] }}
                                                            @endif
                                                        </span>
                                                    </td>
                                                    @elseif (in_array($package['name'], $feature['feature']))
                                                        <td class="text-center pt-7 w-1/4 px-7">
                                                            <span class="flex justify-center text-color-14 dark:text-white font-Figtree font-medium text-14">
                                                                <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                <path d="M13.7071 2.43776C14.0976 2.8163 14.0976 3.43106 13.7071 3.80961L5.70796 11.5622C5.31738 11.9408 4.68307 11.9408 4.29249 11.5622L0.292936 7.68593C-0.0976453 7.30738 -0.0976453 6.69262 0.292936 6.31407C0.683517 5.93553 1.31782 5.93553 1.7084 6.31407L5.00179 9.50295L12.2947 2.43776C12.6853 2.05921 13.3196 2.05921 13.7102 2.43776H13.7071Z" fill="currentColor"/>
                                                                </svg>
                                                            </span>
                                                        </td>
                                                    @else
                                                        <td class="text-center pt-7 w-1/4 px-7">
                                                            <span class="flex justify-center">
                                                                <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                    <g clip-path="url(#clip0_4568_3555)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1.174 1.174C1.57266 0.775335 2.21901 0.775335 2.61767 1.174L7 5.55632L11.3823 1.174C11.781 0.775335 12.4273 0.775335 12.826 1.174C13.2247 1.57266 13.2247 2.21901 12.826 2.61767L8.44368 7L12.826 11.3823C13.2247 11.781 13.2247 12.4273 12.826 12.826C12.4273 13.2247 11.781 13.2247 11.3823 12.826L7 8.44368L2.61767 12.826C2.21901 13.2247 1.57266 13.2247 1.174 12.826C0.775335 12.4273 0.775335 11.781 1.174 11.3823L5.55632 7L1.174 2.61767C0.775335 2.21901 0.775335 1.57266 1.174 1.174Z" fill="#DF2F2F"/>
                                                                    </g>
                                                                    <defs>
                                                                    <clipPath id="clip0_4568_3555">
                                                                    <rect width="14" height="14" fill="white"/>
                                                                    </clipPath>
                                                                    </defs>
                                                                    </svg>
                                                            </span>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

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
                    <div class="lg:mt-[154px] mt-[102px] 9xl:px-[310px] 8xl:px-40 lg:px-16 md:px-10 px-5 relative dark:bg-color-14">
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

        <div class="9xl:px-[310px] 8xl:px-40 lg:px-16 md:px-10 px-5 lg:mt-[120px] py-[52px] lg:pb-16 dark:bg-color-14 text-center">
            <div class="rounded-[40px] get-started-for-free">
                <p class="text-center text-36 md:text-48 text-color-14 font-bold pt-[26px] md:pt-12 px-[26px] lg:px-5 font-RedHat">{{ __('All set to level up your content game?') }}</p>
                <p class="text-center text-16 md:text-18 text-color-14 font-normal px-[26px] sm:px-5 mt-4 md:mt-5 break-words xl:w-[775px] mx-auto font-Figtree">{{ __('Sign up for a Free Trial and discover how easy it can be to create amazing content!') }}</p>
                <div class="relative pb-10 md:pb-0">
                    <a href="{{route('users.registration')}}" class="bg-white h-[54px] inline-flex gap-2.5 text-center items-center mx-auto justify-center mt-8 md:mb-[58px] rounded-lg"><span class="text-18 font-semibold pl-[27px] pr-27px-rtl text-color-14 font-Figtree rounded-lg">
                        {{ __('Get Started for Free')}}</span>
                        <svg class="mr-[27px] ml-27px-rtl neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                            <path d="M13.707 6.70597C14.0977 6.3155 14.0977 5.68137 13.707 5.2909L8.70674 0.292854C8.31609 -0.0976181 7.68168 -0.0976181 7.29103 0.292854C6.90039 0.683327 6.90039 1.31745 7.29103 1.70793L10.5881 5.00039H1.00006C0.4469 5.00039 0 5.44709 0 6C0 6.55291 0.4469 6.99961 1.00006 6.99961H10.585L7.29416 10.2921C6.90351 10.6825 6.90351 11.3167 7.29416 11.7071C7.6848 12.0976 8.31921 12.0976 8.70986 11.7071L13.7101 6.7091L13.707 6.70597Z" fill="#E22861"></path>
                        </svg>
                    </a>
                    <img class="absolute top-[-30px] left-[88px] hidden xl:block gmail-rtl neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/google.png') }}">
                    <img class="absolute top-0 right-[88px] hidden xl:block ink-rtl neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/ink.png') }}">
                </div>
                <div class="relative flex justify-center w-max mx-auto">
                    <img class="mx-auto 2xl:w-full xl:w-[700px] lg:w-[580px] bottom-0 hidden lg:block z-10 neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/content.png') }}">
                    <img class="hidden lg:block absolute -top-[25px] left-40 neg-transition-scale mike-rtl" src="{{ asset('Modules/OpenAI/Resources/assets/image/mike.png') }}">
                    <img class="hidden lg:block absolute bottom-10 z-[50] -left-5 you-tube-rtl neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/youtube.png') }}">
                    <img class="hidden lg:block absolute bottom-5 xl:bottom-[53px] z-[50] -right-[154px]  robo-target neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/img-robo-target.png') }}">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/assets/js/site/faq-accordion.min.js') }}"></script>
@endsection
