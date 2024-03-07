<div class="relative background-one">
    <img class="absolute w-full h-full sm:block hidden neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/background-one.png') }}"
        alt="{{ __('Image') }}">
    <span>
        <img class="absolute w-full sm:hidden top-[490px] neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/mobile-bg-1.svg') }}" alt="">
    </span>
    <div class="9xl:px-[310px] 8xl:px-40 lg:px-20 md:px-10 px-5 relative overflow-hidden">
        <div class="grid lg:grid-cols-2 lg:gap-6 gap-5">
            <div class="flex flex-col md:flex-row lg:flex-col lg:gap-6 gap-5">
                <div class="rounded-[30px] bg-color-76 w-full 6xl:px-10 px-[26px] 6xl:pt-8 py-[26px] lg:pb-0">
                    <p class="font-RedHat text-white 6xl:text-36 text-28 font-bold">{{ __('Let AI do all the magic for you')}}</p>
                    <div class="flex 2xl:flex-row md:flex-col-reverse gap-[26px] 6xl:mt-6 mt-5 items-center 2xl:items-start">
                        <img class="w-[215px] h-[292px] hidden lg:block bottom-0 neg-transition-scale"
                            src="{{ asset('Modules/OpenAI/Resources/assets/image/robot-hand.png') }}"
                            alt="{{ __('Image') }}">
                        <div class="6xl:mt-1 mt-0">
                            <p class="text-[18px] leading-[30px] text-white font-Figtree font-normal">{{ __('Unlock the power of AI with our cutting-edge technology that help you generate well-crafted and joyfully original content effortlessly.')}}</p>
                            <p class="text-[18px] leading-[30px] text-white font-Figtree font-normal 6xl:mt-7 mt-5 mb-5">{{ __('Our AI knows what converts and how to create content that resonates with your audience.')}}</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-[30px] bg-color-14 dark:bg-color-29 w-full text-white 6xl:px-10 p-[26px] 6xl:py-8 h-max">
                    <p class="font-RedHat text-28 font-bold">{{ __('Save Time & Money')}}</p>
                    <p class="mt-3 font-Figtree text-[18px] leading-[30px] font-normal ">{{ __('Save time and money with our automated system that empowers you to cut down your expenses while still getting great results.')}}</p>
                </div>
            </div>
            <div class="border border-color-89 bg-white dark:bg-color-14 dark:border-color-47 rounded-[30px] 6xl:pl-10 px-[26px] 6xl:pr-9 6xl:pt-8 py-[26px] 6xl:pb-[48px] w-full">
                <p class="xs:text-36 text-28 break-words text-color-14 dark:text-white font-bold font-RedHat lang-text-h1">
                    {!! str_replace(__('Only'), '<span class="text-color-E2 pl-1">' .  __('Only') . '</span>' ,__('The Only Artificial Intelligence Service you ever need')) !!}
                </p>
                <p class="mt-7 text-color-14 dark:text-white text-18 leading-[30px] font-normal font-Figtree">{{ __('Intuitive interface and minimal learning curve makes :x the ideal choice for anyone who needs to write content quickly without sacrificing quality and reach your milestones 10X faster!', ['x' => preference('company_name')])}}</p>
                <div class="flex md:flex-row lg:flex-col 4xl:flex-row flex-col gap-[15px] 6xl:mt-7 mt-5">
                    <div>
                        <p class="font-Figtree text-color-14 dark:text-white text-18 leading-[30px] font-normal"> {{ __(':x is built to focus and create human-like content that helps you generate engaging content and ideas for blogs, applications, social media, videos, digital art, SEO and much more.', ['x' => preference('company_name')])}}</p>
                        <a class="6xl:mt-[35px] mt-[26px] inline-block text-color-14 dark:text-white text-20 font-Figtree font-medium items-center learn-more break-words"
                            href="{{ route('site.page', [ 'slug' => 'about-us' ]) }}">{{ __('Learn more about us')}}
                            <span class="w-[14px] h-3 inline-block ml-2.5 margin-left-button neg-transition-scale">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12"
                                    fill="none">
                                    <path d="M13.707 6.70597C14.0977 6.3155 14.0977 5.68137 13.707 5.2909L8.70674 0.292854C8.31609 -0.0976181 7.68168 -0.0976181 7.29103 0.292854C6.90039 0.683327 6.90039 1.31745 7.29103 1.70793L10.5881 5.00039H1.00006C0.4469 5.00039 0 5.44709 0 6C0 6.55291 0.4469 6.99961 1.00006 6.99961H10.585L7.29416 10.2921C6.90351 10.6825 6.90351 11.3167 7.29416 11.7071C7.6848 12.0976 8.31921 12.0976 8.70986 11.7071L13.7101 6.7091L13.707 6.70597Z" fill="#E22861" />
                                </svg>
                            </span>
                        </a>
                    </div>
                    <img class="h-[270px] w-[301px] px-[15px] md:px-0 object-contain mx-auto neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/robot.png') }}" alt="">
                </div>
            </div>
        </div>
        <div>
            <div class="relative flex justify-center items-center 6xl:mt-[172px] mt-[102px]">
                <p class="uppercase absolute heading-1 tracking-[0.2em] text-center font-bold text-16 font-Figtree">{{ __('Ready made templates')}}
                </p>
            </div>
            <p class="mt-[18px] font-RedHat 6xl:text-48 text-36 font-bold text-center text-color-14 dark:text-white break-words px-5">{{ __('Think Less. Save Time. Use Cases.')}}
            </p>
            <p class="mt-3 font-Figtree text-color-14 dark:text-white font-normal text-center 6xl:text-18 text-16">{{ __('Our use case templates saves up your time and makes your work much more easier.')}}
            </p>
            <div class="grid lg:grid-cols-2 lg:gap-6 gap-5 6xl:mt-16 mt-8">
                <div class="rounded-[30px] 6xl:pt-8 pt-[26px] 6xl:pb-9 pb-8 bg-color-F6 dark:bg-color-29 h-max">
                    <p class="text-36 6xl:px-10 px-5 text-color-14 dark:text-white font-bold font-RedHat">{!!  __('Over :x Use Case Templates', ['x' => '<span class="text-color-E2">' . Modules\OpenAI\Entities\UseCase::useCaseCount() . '</span>']) !!} </p>
                    <p class="6xl:mt-6 mt-5 6xl:px-10 px-5 text-color-14 dark:text-white text-lg leading-[30px] font-normal font-Figtree">
                        {{ __('Our Use Cases help you quickly and easily create high-efficiency, human-friendly content for applications and social media, scripts for videos, boost SEO, and generate digital art – all at the fraction of the cost and in one place!') }}  </p>
                    <div class="mt-8 relative">
                        <img class="w-full h-full max-w-none dark:hidden 6xl:w-full 3xl:w-[553px] neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/image-use-cases.png') }}" alt="">
                        <img class="w-full h-full max-w-none dark:block hidden 6xl:w-full 3xl:w-[553px] neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/dark-image-use-cases.png') }}" alt="">
                        <span class="absolute top-0 9xl:-right-[178px] 8xl:-right-[187px] 7xl:-right-[200px] 6xl:-right-[176px] 3xl:-right-[116px] 2xl:-right-[155px] xl:-right-[137px] lg:-right-[118px] z-10 -right-28 max-w-none hidden xs:block sm:hidden lg:block template-floating-img">
                            <img class="9xl:w-full 8xl:w-[315px] 7xl:w-[336px] 6xl:w-[297px] 3xl:w-[259px] 2xl:w-[261px] xl:w-[230px] lg:w-[198px] md:h-full h-[185px] dark:hidden" src="{{ asset('Modules/OpenAI/Resources/assets/image/image-floating.png') }}" alt="">
                            <img class="9xl:w-full 8xl:w-[315px] 7xl:w-[336px] 6xl:w-[297px] 3xl:w-[259px] 2xl:w-[261px] xl:w-[230px] lg:w-[198px] md:h-full h-[185px] dark:block hidden" src="{{ asset('Modules/OpenAI/Resources/assets/image/dark-image-floating.png') }}" alt="">
                        </span>
                    </div>
                    <div class="text-center">
                        <a class="6xl:mt-9 mt-8 inline-block text-color-14 dark:text-white font-Figtree text-20 justify-center items-center lang-text-h4 font-semibold mx-5"
                            href="{{ route('frontend.use-cases') }}">{{ __('See all use cases')}}
                            <span class="w-[14px] h-3 inline-block ml-2.5 margin-left-button neg-transition-scale">
                                <svg class="w-[14px] h-3" xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12" fill="none">
                                    <path d="M13.707 6.70597C14.0977 6.3155 14.0977 5.68137 13.707 5.2909L8.70674 0.292854C8.31609 -0.0976181 7.68168 -0.0976181 7.29103 0.292854C6.90039 0.683327 6.90039 1.31745 7.29103 1.70793L10.5881 5.00039H1.00006C0.4469 5.00039 0 5.44709 0 6C0 6.55291 0.4469 6.99961 1.00006 6.99961H10.585L7.29416 10.2921C6.90351 10.6825 6.90351 11.3167 7.29416 11.7071C7.6848 12.0976 8.31921 12.0976 8.70986 11.7071L13.7101 6.7091L13.707 6.70597Z" fill="#E22861" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col lg:gap-6 gap-5">
                    <div class="rounded-[30px]  flex sm:flex-row flex-col gap-5 md:gap-4 2xl:gap-5 sm:pt-3.5 pt-0 6xl:pl-10 6xl:pr-[47px] px-[26px] text-color-14 dark:text-white items-center lg:items-start border border-color-89 dark:border-color-47 h-max">
                        <div class="mt-[25px]">
                            <p class="font-RedHat text-28 2xl:text-28 lg:text-lg leading-[39px] font-bold">{{ __('Be the King of Content.')}}</p>
                            <p class="my-3 font-Figtree text-18 2xl:text-18 md:text-sm leading-[30px] font-normal">{{ __('You give few instructions and our trained AI will do all the hassle for you.')}}</p>
                        </div>
                        <img class="w-[177px] h-[177px] neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/robot-image-2.png') }}" alt="{{ __('Image') }}">
                    </div>
                    <div class="rounded-br-[38px] rounded-[30px] background-gradient-two 6xl:pl-[153px] sm:pl-24 p-[26px] pr-0 pb-0 pt-10 h-max use-case-section">
                        <div>
                            <div class="flex">
                                <span class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                                        <circle cx="3" cy="3" r="3" fill="white" />
                                    </svg>
                                </span>
                                <div class="border-l -ml-[3px] border-color-DF pl-3.5 pb-10 steps">
                                    <p class=" -mt-2 tracking-[0.2em] text-white font-Figtree text-14">{{ __('STEP 1')}}
                                    </p>
                                    <p class="mt-1.5 text-22 font-semibold text-white font-Figtree pr-5">{{ __('Select Use Case Template')}}
                                    </p>
                                </div>
                            </div>
                            <div class="flex">
                                <span class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                                        <circle cx="3" cy="3" r="3" fill="white" />
                                    </svg>
                                </span>
                                <div class="border-l -ml-[3px] border-color-DF pl-3.5 pb-10 steps">
                                    <p class="-mt-2 tracking-[0.2em] text-white font-Figtree text-14">{{ __('STEP 2')}}
                                    </p>
                                    <p class="mt-1.5 text-22 font-semibold text-white font-Figtree pr-5">{{ __('Enter specific keywords and see the magic!')}}
                                    </p>
                                </div>
                            </div>
                            <div class="flex">
                                <span class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="6" viewBox="0 0 6 6" fill="none">
                                        <circle cx="3" cy="3" r="3" fill="white" />
                                    </svg>
                                </span>
                                <div class="-ml-[3px] pl-3.5 steps !border-0">
                                    <p class="-mt-2 tracking-[0.2em] text-white font-Figtree text-14">{{ __('STEP 3')}}
                                    </p>
                                    <p class="mt-1.5 text-22 font-semibold text-white font-Figtree pr-5">{{ __('Content is ready! You can create, edit or update.')}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <span class="flex justify-end bottom-0 items-end flex-col">
                            <img class="mt-9 w-full h-[329px] neg-transition-scale" src="{{ asset('Modules/OpenAI/Resources/assets/image/image-dash.png') }}" alt="{{ __('Image') }}">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
