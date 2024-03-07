<div class="9xl:px-[310px] 8xl:px-40 lg:px-16 relative">
    <p class="text-color-14 dark:text-white font-bold text-center font-RedHat 6xl:text-32 text-28 md:px-10 px-5">{{ __('Collaborated With Industry Leaders')}}
    </p>
    <p class="text-color-14 dark:text-white text-center 6xl:text-18 text-16 font-normal mt-4 md:px-10 px-5 font-Figtree">{{ __('Thousands of marketers, agencies, and entrepreneurs choose :x to automate', ['x' => preference('company_name')]) }} <br> {{ __('and simplify their content marketing.')}}</p>
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

    @if (count($packages) != 0)
        <div class="relative flex justify-center items-center 6xl:mt-[172px] mt-[102px]">
            <p class="uppercase absolute font-Figtree text-center heading-1 tracking-[0.2em] text-base leading-6 font-bold">
                {{ __('pricing')}}</p>
        </div>
        <p class="mt-[18px] font-RedHat 6xl:text-48 text-36 font-bold text-center text-color-14 dark:text-white break-words px-5">{{ __('Subscription Plans')}}
        </p>
        <p class="font-Figtree lg:w-[700px] mx-auto mt-3 px-5 md:px-10 xl:px-5 flex items-center justify-center text-color-14 dark:text-white font-normal text-center 6xl:text-18 text-16">{{ __('We offer flexible pricing plans so everyone can find one that suits their needs.') . ' ' .  __('Check out our pricing table for more information about our features and services.')}}
        </p>
        @include('site.landing_page.landing-sub-layout.plan')
    @endif
</div>
