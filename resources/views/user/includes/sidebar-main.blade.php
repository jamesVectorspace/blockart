<link rel="stylesheet" href="{{ asset('public/assets/css/user/sidebar.min.css') }}">
<div id="overlay" class="fixed z-[90] top-0 left-0 bg-darken-4"></div>
@php
    $slug = request('slug') ?? 'demo';
    $id = request('id') ?? 'demo';
    $color1 = '#141414';
    $color2 = '#141414';
    $menu = activeMenu(route('user.dashboard'));
    $subscription = Modules\Subscription\Entities\PackageSubscription::with(['package'])->where('user_id', Auth::user()->id)->first();

    if ($subscription != NULL) {
        $subscriptionMeta = Modules\Subscription\Entities\PackageSubscriptionMeta::where('package_subscription_id', $subscription->id)->where('type', 'feature_word')->get();
        $creditLimit = $subscriptionMeta->where('key', 'value')->first()->value;
        $creditUsed = $subscriptionMeta->where('key', 'usage')->first()->value;
        $creditPercentage = $creditLimit == 0 ? 0 : round( (($creditLimit  - $creditUsed) * 100) / $creditLimit );
    }
    
    if (auth()->user()->role()->type == 'admin') {
        $adminTemplateAccess = true;
        $adminSpeechToTextAccess = true;
        $adminImageAccess = true;
        $adminCodeAccess = true;
        $adminTextToSpeechAccess = true;
        $adminLongArticleAccess = true;
    } else {
        $adminTemplateAccess = json_decode(preference('user_permission'))?->hide_template != 1 ? true : false;
        $adminSpeechToTextAccess = json_decode(preference('user_permission'))?->hide_speech_to_text != 1 ? true : false;
        $adminImageAccess = json_decode(preference('user_permission'))?->hide_image != 1 ? true : false;
        $adminCodeAccess = json_decode(preference('user_permission'))?->hide_code != 1 ? true : false;
        $adminTextToSpeechAccess = json_decode(preference('user_permission'))?->hide_text_to_speech != 1 ? true : false;
        $adminLongArticleAccess = json_decode(preference('user_permission'))?->hide_long_article != 1 ? true : false;
    }
    $currcentPackage = session()->get('memberPackageData');
    if (isset($currcentPackage)) {
        $sessionUserId = $currcentPackage['packageUser'];
    } else {
        $sessionUserId = auth()->user()->id;
    }
@endphp
<nav id="sidenav"
    class="md:pt-14 h-screen sidebar-nav md:sticky z-[100] md:z-50 top-0 left-0 w-[270px] text-color-14 flex flex-col font-Figtree">
    <div class="sidebar-bg-white h-full py-3.5 flex flex-col">
        <div class="sidebar-top relative flex items-center pl-5 dark:border-[#474746] top-option py-3.5 {{ $menu['class'] }} main-menu menus-height">
            <a href="{{ route('user.dashboard') }}" class="flex w-full gap-3 items-center">
                <span class="h-5 w-5 category-svg">
                    <svg width="16" height="17" viewBox="0 0 16 17" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M5.5 13.1664H10.5V16.4998H5.5V13.1664ZM0.5 15.2164L3.83333 11.8831V16.4998H1.33333C0.875 16.4998 0.5 16.1248 0.5 15.6664V15.2164ZM10.3583 2.99976L3.83333 9.52476L0.5 12.8498V8.49143C0.5 8.28309 0.575 8.09143 0.708333 7.94143C0.716667 7.92476 0.733333 7.91643 0.741667 7.89976L7.40833 1.23309C7.43333 1.20809 7.45 1.19143 7.475 1.18309L7.53333 1.12476C7.86667 0.916428 8.30833 0.949761 8.59167 1.23309L10.3583 2.99976ZM15.5 8.49143V15.6664C15.5 16.1248 15.125 16.4998 14.6667 16.4998H12.1667V9.52476L9.18333 6.54143L11.5417 4.18309L15.2583 7.89976C15.4083 8.05809 15.5 8.26643 15.5 8.49143Z"
                        fill="url(#paint0_linear_2671_2007)" />
                    <defs>
                        <linearGradient id="paint0_linear_2671_2007" x1="10.2526" y1="14.5909" x2="4.74869"
                            y2="2.57816" gradientUnits="userSpaceOnUse">
                            <stop stop-color="{{ $menu['color1'] }}" />
                            <stop offset="1" stop-color="{{ $menu['color2'] }}" />
                        </linearGradient>
                    </defs>
                </svg>
                </span>

                <p class="transion-hide text-base leading-[24px] font-normal text-color-14">
                    <span class="dark:text-white">{{ __('Dashboard') }}</span>
                </p>
            </a>
            <span class="shrink-btn absolute top-[50%] opacity-1 right-3.5 cursor-pointer hidden md:block">
                <svg class="dark:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none">
                    <rect width="24" height="24" rx="4" fill="#141414" />
                    <g clip-path="url(#clip0_344_741)">
                        <path
                            d="M9.95841 7.91675H12.5834L9.66674 12.0001L12.5834 16.0834H9.95841L7.04174 12.0001L9.95841 7.91675Z"
                            fill="white" />
                        <path
                            d="M15.0417 7.91675H17.6667L14.7501 12.0001L17.6667 16.0834H15.0417L12.1251 12.0001L15.0417 7.91675Z"
                            fill="white" />
                    </g>
                    <defs>
                        <clipPath id="clip0_344_741">
                            <rect width="14" height="14" fill="white" transform="matrix(-1 0 0 1 19 5)" />
                        </clipPath>
                    </defs>
                </svg>
                <svg class="hidden dark:block neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none">
                    <rect width="24" height="24" rx="4" fill="white" />
                    <g clip-path="url(#clip0_435_902)">
                        <path
                            d="M9.95841 7.91675H12.5834L9.66674 12.0001L12.5834 16.0834H9.95841L7.04174 12.0001L9.95841 7.91675Z"
                            fill="#141414" />
                        <path
                            d="M15.0417 7.91675H17.6667L14.7501 12.0001L17.6667 16.0834H15.0417L12.1251 12.0001L15.0417 7.91675Z"
                            fill="#141414" />
                    </g>
                    <defs>
                        <clipPath id="clip0_435_902">
                            <rect width="14" height="14" fill="white" transform="matrix(-1 0 0 1 19 5)" />
                        </clipPath>
                    </defs>
                </svg>
            </span>

            <div class="close shrink-btn absolute top-[50%] opacity-1 right-3.5 cursor-pointer md:hidden">
                <svg class="dark:hidden" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none">
                <rect width="24" height="24" rx="4" fill="#141414" />
                <g clip-path="url(#clip0_344_741)">
                    <path
                        d="M9.95841 7.91675H12.5834L9.66674 12.0001L12.5834 16.0834H9.95841L7.04174 12.0001L9.95841 7.91675Z"
                        fill="white" />
                    <path
                        d="M15.0417 7.91675H17.6667L14.7501 12.0001L17.6667 16.0834H15.0417L12.1251 12.0001L15.0417 7.91675Z"
                        fill="white" />
                </g>
                <defs>
                    <clipPath id="clip0_344_741">
                        <rect width="14" height="14" fill="white" transform="matrix(-1 0 0 1 19 5)" />
                    </clipPath>
                </defs>
            </svg>
            <svg class="hidden dark:block neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none">
                <rect width="24" height="24" rx="4" fill="white" />
                <g clip-path="url(#clip0_435_902)">
                    <path
                        d="M9.95841 7.91675H12.5834L9.66674 12.0001L12.5834 16.0834H9.95841L7.04174 12.0001L9.95841 7.91675Z"
                        fill="#141414" />
                    <path
                        d="M15.0417 7.91675H17.6667L14.7501 12.0001L17.6667 16.0834H15.0417L12.1251 12.0001L15.0417 7.91675Z"
                        fill="#141414" />
                </g>
                <defs>
                    <clipPath id="clip0_435_902">
                        <rect width="14" height="14" fill="white" transform="matrix(-1 0 0 1 19 5)" />
                    </clipPath>
                </defs>
            </svg>
            </div>
        </div>
        <div class="sidebar-links sidebar-accordion middle-sidebar-scroll overflow-y-scroll">
            <ul class="mt-3">
                @if($adminTemplateAccess == true || $adminSpeechToTextAccess  == true || $adminTextToSpeechAccess == true || $adminImageAccess == true || $adminCodeAccess == true || $adminLongArticleAccess == true)
                <li class="w-[52px] div-border border dark:border-[#474746] border-t border-color-DF ml-5 my-3.5">
                </li>
                @endif
                @if ($adminTemplateAccess)
                <li>
                    @php $menu = activeMenu(route('openai'), route('user.template', ['slug' => $slug]) )@endphp
                    @if(customerPanelAccess('template'))

                    <a href="{{ route('openai') }}">
                        <div
                            class="{{ $menu['class'] }} main-menu flex items-center gap-3 w-full py-3 pl-5 pr-[15px] text-left text-color-14 text-base leading-6 font-normal menus-height">
                            <span class="w-5 h-5">
                                <svg class="category-svg" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.5 8.83333H7.16667V0.5H0.5V8.83333ZM0.5 15.5H7.16667V10.5H0.5V15.5ZM8.83333 15.5H15.5V7.16667H8.83333V15.5ZM8.83333 0.5V5.5H15.5V0.5H8.83333Z"
                                    fill="url(#paint0_linear_3040_2060)" />
                                <defs>
                                    <linearGradient id="paint0_linear_3040_2060" x1="10.2526" y1="13.6538"
                                        x2="5.04573" y2="1.90371" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="{{ $menu['color1'] }}" />
                                        <stop offset="1" stop-color="{{ $menu['color2'] }}" />
                                    </linearGradient>
                                </defs>
                            </svg>
                            </span>
                            

                            <p class="transion-hide accordion-menus"><span
                                    class="dark:text-white">{{ __('Pre-built Templates') }}</span></p>
                        </div>
                    </a>
                    @endif
                </li>
                @endif
                @if ($adminLongArticleAccess)
                <li>
                    @php $menu = activeMenu(route('user.long_article.create')) @endphp
                    @if(customerPanelAccess('long_article'))
                    <a href="{{ route('user.long_article.create') }}">
                        <div
                            class="{{ $menu['class'] }} main-menu flex items-center gap-3 w-full py-3 pl-5 pr-[15px] text-left text-color-14 text-base leading-6 font-normal menus-height">
                            <span class="w-4 h-4 text-color-14 dark:text-white">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.181 2.58949L17.4135 3.82165C18.1955 4.60347 18.1955 5.87002 17.4135 6.65184L15.7837 8.28116L15.7524 8.24989L15.2519 7.74952L12.2489 4.74732L11.7171 4.21568L13.3469 2.58637C14.1289 1.80454 15.3958 1.80454 16.1779 2.58637L16.181 2.58949ZM9.53996 5.57918C9.24592 5.28522 8.77044 5.28522 8.47952 5.57918L5.2857 8.77214C4.99166 9.06611 4.51618 9.06611 4.22526 8.77214C3.93435 8.47818 3.93122 8.00283 4.22526 7.71199L7.41596 4.51903C8.29496 3.64026 9.72139 3.64026 10.6004 4.51903L11.0102 4.92871L11.542 5.46035L14.545 8.46254L15.0455 8.96291L15.0768 8.99418L14.545 9.52582L9.18023 14.886C7.67872 16.3871 5.7643 17.4128 3.68097 17.8288L2.89893 17.9851C2.65181 18.0352 2.39843 17.957 2.22013 17.7787C2.04182 17.6005 1.96675 17.3472 2.01367 17.1001L2.17008 16.3183C2.58612 14.2355 3.61215 12.3216 5.11365 10.8205L9.94975 5.98886L9.53996 5.57918Z" fill="url(#paint0_linear_10232_5981)"/>
                                    <defs>
                                    <linearGradient id="paint0_linear_10232_5981" x1="12.4027" y1="16.0307" x2="6.84878" y2="3.49729" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="{{ $menu['color1'] }}"/>
                                    <stop offset="1" stop-color="{{ $menu['color2'] }}"/>
                                    </linearGradient>
                                    </defs>
                                </svg>
                            </span>
                            <p class="transion-hide accordion-menus"><span class="dark:text-white">{{ __('Long Article') }}</span></p>
                        </div>
                    </a>
                    @endif
                </li>
                @endif
                @if ($adminImageAccess)
                <li>
                    @php $menu = activeMenu(route('user.imageTemplate')) @endphp
                    @if(customerPanelAccess('image'))
                    <a href="{{ route('user.imageTemplate') }}">
                        <div
                            class="{{ $menu['class'] }} main-menu flex items-center gap-3 w-full py-3 pl-5 pr-[15px] text-left text-color-14 text-base leading-6 font-normal menus-height">
                            <span class="w-5 h-5">
                                <svg class="category-svg" width="20" height="20" viewBox="0 0 20 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_1997_1547)">
                                    <path
                                        d="M17.5 15.8333V4.16667C17.5 3.25 16.75 2.5 15.8333 2.5H4.16667C3.25 2.5 2.5 3.25 2.5 4.16667V15.8333C2.5 16.75 3.25 17.5 4.16667 17.5H15.8333C16.75 17.5 17.5 16.75 17.5 15.8333ZM7.08333 11.25L9.16667 13.7583L12.0833 10L15.8333 15H4.16667L7.08333 11.25Z"
                                        fill="url(#paint0_linear_1997_1547)" />
                                </g>
                                <defs>
                                    <linearGradient id="paint0_linear_1997_1547" x1="12.2526" y1="15.6538"
                                        x2="7.04573" y2="3.90371" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="{{ $menu['color1'] }}" />
                                        <stop offset="1" stop-color="{{ $menu['color2'] }}" />
                                    </linearGradient>
                                    <clipPath id="clip0_1997_1547">
                                        <rect width="20" height="20" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                            </span>

                            <p class="transion-hide accordion-menus"><span
                                    class="dark:text-white">{{ __('Image Maker') }}</span></p>
                        </div>
                    </a>
                    @endif
                </li>
                @endif
                @if ($adminCodeAccess)
                <li>
                    @php $menu = activeMenu(route('user.codeTemplate')) @endphp
                    @if(customerPanelAccess('code'))
                    <a href="{{ route('user.codeTemplate') }}">
                        <div
                            class="{{ $menu['class'] }} main-menu flex items-center gap-3 w-full py-3 pl-5 pr-[15px] text-left text-color-14 text-base leading-6 font-normal menus-height">
                            <span class="w-5 h-5">
                                <svg class="category-svg" width="20" height="16" viewBox="0 0 20 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.8761 7.69945L14.7717 2.59512C14.613 2.43639 14.3322 2.43639 14.1735 2.59512L13.0668 3.70174C12.9016 3.86702 12.9016 4.13495 13.0668 4.30023L16.7655 7.99849L13.067 11.6974C12.9018 11.8627 12.9018 12.1306 13.067 12.2959L14.1737 13.4025C14.253 13.4819 14.3607 13.5267 14.4729 13.5267C14.5849 13.5267 14.6928 13.4819 14.7722 13.4025L19.8761 8.29837C20.0414 8.13287 20.0414 7.86474 19.8761 7.69945Z"
                                        fill="url(#paint0_linear_2838_1839)" />
                                    <path
                                        d="M6.93299 11.6975L3.23494 7.99907L6.93362 4.30081C7.01298 4.22145 7.05764 4.11394 7.05764 4.00156C7.05764 3.8894 7.0132 3.78168 6.93362 3.70232L5.827 2.5957C5.74764 2.51633 5.63992 2.47168 5.52776 2.47168C5.41559 2.47168 5.30787 2.51633 5.22851 2.5957L0.123963 7.69961C-0.041321 7.86489 -0.041321 8.13282 0.123963 8.29831L5.2283 13.4024C5.30766 13.4818 5.41538 13.5267 5.52754 13.5267C5.63971 13.5267 5.74743 13.4818 5.82679 13.4024L6.93341 12.2958C7.09869 12.1307 7.09869 11.8628 6.93299 11.6975Z"
                                        fill="url(#paint1_linear_2838_1839)" />
                                    <path
                                        d="M12.9025 0.877949C12.8488 0.779328 12.7582 0.706104 12.6507 0.674359L11.7536 0.409608C11.5297 0.343156 11.2939 0.471616 11.2279 0.695734L7.0632 14.7995C7.03145 14.9072 7.04373 15.023 7.09727 15.1214C7.15081 15.2202 7.2416 15.2932 7.34911 15.3252L8.24622 15.5899C8.28622 15.6018 8.32664 15.6075 8.36621 15.6075C8.54885 15.6075 8.71752 15.4881 8.77191 15.3038L12.9366 1.19984C12.9683 1.09212 12.9563 0.976357 12.9025 0.877949Z"
                                        fill="url(#paint2_linear_2838_1839)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_2838_1839" x1="17.5312" y1="12.1666"
                                            x2="12.6806" y2="5.17616" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="{{ $menu['color1'] }}" />
                                            <stop offset="1" stop-color="{{ $menu['color2'] }}" />
                                        </linearGradient>
                                        <linearGradient id="paint1_linear_2838_1839" x1="4.58867" y1="12.166"
                                            x2="-0.264378" y2="5.1743" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="{{ $menu['color1'] }}" />
                                            <stop offset="1" stop-color="{{ $menu['color2'] }}" />
                                        </linearGradient>
                                        <linearGradient id="paint2_linear_2838_1839" x1="10.8871" y1="13.7348"
                                            x2="3.81928" y2="7.54154" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="{{ $menu['color1'] }}" />
                                            <stop offset="1" stop-color="{{ $menu['color2'] }}" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </span>
                            <p class="transion-hide accordion-menus"><span
                                    class="dark:text-white">{{ __('Code Writer') }}</span></p>
                        </div>
                    </a>
                    @endif
                </li>
                @endif
                @if ($adminSpeechToTextAccess)
                <li>
                    @php $menu = activeMenu(route('user.speechTemplate')) @endphp
                    @if(customerPanelAccess('speech_to_text'))
                    <a href="{{ route('user.speechTemplate') }}">
                        <div
                            class="{{ $menu['class'] }} main-menu flex items-center gap-3 w-full py-3 pl-5 pr-[15px] text-left text-color-14 text-base leading-6 font-normal menus-height">
                            <span class="w-5 h-5 text-color-14 dark:text-white">
                                <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4718 0.562316C14.3031 0.598479 14.1526 0.693145 14.0471 0.829562C13.9415 0.965979 13.8875 1.13535 13.8948 1.3077V15.9231C13.8777 16.0277 13.8835 16.1347 13.9119 16.2368C13.9402 16.3389 13.9904 16.4336 14.059 16.5144C14.1276 16.5951 14.213 16.66 14.3092 16.7045C14.4053 16.749 14.51 16.772 14.616 16.772C14.7219 16.772 14.8266 16.749 14.9228 16.7045C15.019 16.66 15.1043 16.5951 15.1729 16.5144C15.2415 16.4336 15.2917 16.3389 15.3201 16.2368C15.3485 16.1347 15.3543 16.0277 15.3371 15.9231V1.3077C15.3396 1.20497 15.3203 1.10287 15.2806 1.00808C15.2409 0.913296 15.1817 0.827945 15.1068 0.757603C15.0319 0.687261 14.943 0.63351 14.8459 0.59986C14.7488 0.56621 14.6457 0.553417 14.5433 0.562316C14.5195 0.561148 14.4956 0.561148 14.4718 0.562316ZM5.24099 1.33155C5.07231 1.36771 4.92187 1.46238 4.81629 1.59879C4.7107 1.73521 4.65678 1.90458 4.66406 2.07693V15.1539C4.64693 15.2584 4.65274 15.3655 4.6811 15.4676C4.70945 15.5697 4.75967 15.6644 4.82827 15.7451C4.89688 15.8259 4.98222 15.8908 5.07839 15.9352C5.17456 15.9797 5.27925 16.0028 5.38522 16.0028C5.49118 16.0028 5.59587 15.9797 5.69204 15.9352C5.78821 15.8908 5.87356 15.8259 5.94216 15.7451C6.01076 15.6644 6.06098 15.5697 6.08933 15.4676C6.11769 15.3655 6.1235 15.2584 6.10637 15.1539V2.07693C6.10881 1.9742 6.08956 1.8721 6.04987 1.77731C6.01017 1.68253 5.95094 1.59718 5.87602 1.52683C5.80111 1.45649 5.7122 1.40274 5.6151 1.36909C5.518 1.33544 5.4149 1.32265 5.31252 1.33155C5.28869 1.33038 5.26482 1.33038 5.24099 1.33155ZM12.1641 3.63924C11.9954 3.6754 11.845 3.77007 11.7394 3.90648C11.6338 4.0429 11.5799 4.21227 11.5871 4.38462V12.8462C11.5696 12.9509 11.5752 13.0581 11.6033 13.1605C11.6315 13.2628 11.6816 13.3578 11.7502 13.4389C11.8188 13.5199 11.9042 13.585 12.0005 13.6296C12.0969 13.6743 12.2017 13.6974 12.3079 13.6974C12.4141 13.6974 12.519 13.6743 12.6153 13.6296C12.7116 13.585 12.797 13.5199 12.8656 13.4389C12.9342 13.3578 12.9843 13.2628 13.0125 13.1605C13.0407 13.0581 13.0462 12.9509 13.0287 12.8462V4.38462C13.0311 4.28203 13.0119 4.18008 12.9723 4.0854C12.9327 3.99073 12.8736 3.90546 12.7988 3.83514C12.7241 3.76483 12.6354 3.71104 12.5385 3.67729C12.4416 3.64353 12.3386 3.63057 12.2364 3.63924C12.212 3.63802 12.1884 3.63802 12.1641 3.63924ZM2.93329 4.40847C2.76462 4.44463 2.61418 4.5393 2.5086 4.67572C2.40301 4.81213 2.34909 4.9815 2.35637 5.15385V12.0769C2.33887 12.1816 2.34439 12.2889 2.37255 12.3913C2.40071 12.4936 2.45084 12.5886 2.51944 12.6696C2.58804 12.7506 2.67347 12.8157 2.76978 12.8604C2.86609 12.9051 2.97098 12.9282 3.07714 12.9282C3.1833 12.9282 3.28819 12.9051 3.3845 12.8604C3.48081 12.8157 3.56624 12.7506 3.63484 12.6696C3.70344 12.5886 3.75357 12.4936 3.78173 12.3913C3.80989 12.2889 3.81541 12.1816 3.79791 12.0769V5.15385C3.80033 5.05126 3.78111 4.94931 3.74151 4.85464C3.70191 4.75996 3.64282 4.67469 3.56807 4.60437C3.49333 4.53406 3.40461 4.48027 3.3077 4.44652C3.21079 4.41276 3.10786 4.3998 3.0056 4.40847C2.98126 4.40725 2.95764 4.40725 2.93329 4.40847ZM7.54868 5.1777C7.38001 5.21386 7.22957 5.30853 7.12398 5.44495C7.01839 5.58136 6.96447 5.75073 6.97175 5.92309V11.3077C6.95425 11.4124 6.95977 11.5197 6.98794 11.622C7.0161 11.7244 7.06622 11.8194 7.13482 11.9004C7.20342 11.9814 7.28885 12.0465 7.38516 12.0912C7.48148 12.1358 7.58636 12.159 7.69252 12.159C7.79869 12.159 7.90357 12.1358 7.99988 12.0912C8.0962 12.0465 8.18163 11.9814 8.25023 11.9004C8.31883 11.8194 8.36895 11.7244 8.39711 11.622C8.42527 11.5197 8.4308 11.4124 8.41329 11.3077V5.92309C8.41571 5.82049 8.3965 5.71854 8.3569 5.62387C8.3173 5.52919 8.2582 5.44392 8.18346 5.3736C8.10871 5.30329 8.02 5.2495 7.92309 5.21575C7.82617 5.18199 7.72324 5.16903 7.62099 5.1777C7.59664 5.17648 7.57302 5.17648 7.54868 5.1777ZM16.7794 5.1777C16.6108 5.21386 16.4603 5.30853 16.3547 5.44495C16.2492 5.58136 16.1952 5.75073 16.2025 5.92309V11.3077C16.1854 11.4123 16.1912 11.5193 16.2196 11.6214C16.2479 11.7235 16.2981 11.8182 16.3667 11.899C16.4353 11.9797 16.5207 12.0446 16.6169 12.0891C16.713 12.1336 16.8177 12.1566 16.9237 12.1566C17.0296 12.1566 17.1343 12.1336 17.2305 12.0891C17.3267 12.0446 17.412 11.9797 17.4806 11.899C17.5492 11.8182 17.5994 11.7235 17.6278 11.6214C17.6562 11.5193 17.662 11.4123 17.6448 11.3077V5.92309C17.6473 5.82035 17.628 5.71826 17.5883 5.62347C17.5486 5.52868 17.4894 5.44333 17.4145 5.37299C17.3396 5.30265 17.2507 5.24889 17.1536 5.21524C17.0565 5.18159 16.9534 5.1688 16.851 5.1777C16.8272 5.17653 16.8033 5.17653 16.7794 5.1777ZM0.625601 6.71616C0.456929 6.75233 0.306489 6.84699 0.200903 6.98341C0.0953174 7.11983 0.0413947 7.2892 0.0486779 7.46155V9.76924C0.0315452 9.87381 0.037358 9.98085 0.0657132 10.0829C0.0940684 10.185 0.144288 10.2798 0.21289 10.3605C0.281492 10.4413 0.366836 10.5061 0.463006 10.5506C0.559175 10.5951 0.66387 10.6182 0.769832 10.6182C0.875794 10.6182 0.980488 10.5951 1.07666 10.5506C1.17283 10.5061 1.25817 10.4413 1.32677 10.3605C1.39538 10.2798 1.4456 10.185 1.47395 10.0829C1.50231 9.98085 1.50812 9.87381 1.49099 9.76924V7.46155C1.49343 7.35881 1.47417 7.25672 1.43448 7.16193C1.39479 7.06714 1.33555 6.98179 1.26064 6.91145C1.18572 6.84111 1.09681 6.78736 0.999717 6.75371C0.902619 6.72006 0.799516 6.70726 0.697139 6.71616C0.673052 6.71497 0.649689 6.71497 0.625601 6.71616ZM9.85637 6.71616C9.6877 6.75233 9.53726 6.84699 9.43167 6.98341C9.32609 7.11983 9.27216 7.2892 9.27945 7.46155V9.76924C9.26195 9.87395 9.26747 9.98121 9.29563 10.0836C9.32379 10.1859 9.37391 10.2809 9.44251 10.3619C9.51111 10.443 9.59654 10.5081 9.69286 10.5527C9.78917 10.5974 9.89406 10.6205 10.0002 10.6205C10.1064 10.6205 10.2113 10.5974 10.3076 10.5527C10.4039 10.5081 10.4893 10.443 10.5579 10.3619C10.6265 10.2809 10.6766 10.1859 10.7048 10.0836C10.733 9.98121 10.7385 9.87395 10.721 9.76924V7.46155C10.7234 7.35895 10.7042 7.257 10.6646 7.16233C10.625 7.06766 10.5659 6.98238 10.4912 6.91207C10.4164 6.84175 10.3277 6.78796 10.2308 6.75421C10.1339 6.72046 10.0309 6.70749 9.92868 6.71616C9.90433 6.71494 9.88071 6.71494 9.85637 6.71616ZM19.0871 6.71616C18.9185 6.75233 18.768 6.84699 18.6624 6.98341C18.5569 7.11983 18.5029 7.2892 18.5102 7.46155V9.76924C18.4931 9.87381 18.4989 9.98085 18.5273 10.0829C18.5556 10.185 18.6058 10.2798 18.6744 10.3605C18.743 10.4413 18.8284 10.5061 18.9245 10.5506C19.0207 10.5951 19.1254 10.6182 19.2314 10.6182C19.3373 10.6182 19.442 10.5951 19.5382 10.5506C19.6344 10.5061 19.7197 10.4413 19.7883 10.3605C19.8569 10.2798 19.9071 10.185 19.9355 10.0829C19.9638 9.98085 19.9697 9.87381 19.9525 9.76924V7.46155C19.955 7.35881 19.9357 7.25672 19.896 7.16193C19.8563 7.06714 19.7971 6.98179 19.7222 6.91145C19.6473 6.84111 19.5584 6.78736 19.4613 6.75371C19.3642 6.72006 19.2611 6.70726 19.1587 6.71616C19.1348 6.71499 19.111 6.71499 19.0871 6.71616Z" fill="url(#paint0_linear_9514_4841)"/>
                                    <defs>
                                    <linearGradient id="paint0_linear_9514_4841" x1="12.9925" y1="14.7766" x2="8.1441" y2="1.33125" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="{{ $menu['color1'] }}"/>
                                    <stop offset="1" stop-color="{{ $menu['color2'] }}"/>
                                    </linearGradient>
                                    </defs>
                                </svg>
                            </span>
                            <p class="transion-hide accordion-menus"><span class="dark:text-white">{{ __('Speech to Text') }}</span></p>
                        </div>
                    </a>
                    @endif
                </li>
                @endif
                @if ($adminTextToSpeechAccess)
                <li>
                    @php $menu = activeMenu(route('user.textToSpeechTemplate')) @endphp
                    @if(customerPanelAccess('voiceover'))
                    <a href="{{ route('user.textToSpeechTemplate') }}">
                        <div
                            class="{{ $menu['class'] }} main-menu flex items-center gap-3 w-full py-3 pl-5 pr-[15px] text-left text-color-14 text-base leading-6 font-normal menus-height">
                            <span class="w-5 h-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18" viewBox="0 0 14 18" fill="none">
                                    <path d="M7 11.1875C8.83398 11.1875 10.3203 9.71875 10.3203 7.90625V3.53125C10.3203 1.71875 8.83398 0.25 7 0.25C5.16602 0.25 3.67969 1.71875 3.67969 3.53125V7.90625C3.67969 9.71875 5.16602 11.1875 7 11.1875ZM13.4453 7.86719C13.4453 7.78125 13.375 7.71094 13.2891 7.71094H12.1172C12.0312 7.71094 11.9609 7.78125 11.9609 7.86719C11.9609 10.6074 9.74023 12.8281 7 12.8281C4.25977 12.8281 2.03906 10.6074 2.03906 7.86719C2.03906 7.78125 1.96875 7.71094 1.88281 7.71094H0.710938C0.625 7.71094 0.554688 7.78125 0.554688 7.86719C0.554688 11.1621 3.02734 13.8809 6.21875 14.2656V16.2656H3.38086C3.11328 16.2656 2.89844 16.5449 2.89844 16.8906V17.5938C2.89844 17.6797 2.95313 17.75 3.01953 17.75H10.9805C11.0469 17.75 11.1016 17.6797 11.1016 17.5938V16.8906C11.1016 16.5449 10.8867 16.2656 10.6191 16.2656H7.70312V14.2754C10.9316 13.9238 13.4453 11.1895 13.4453 7.86719Z" fill="url(#paint0_linear_9790_5737)"/>
                                    <defs>
                                      <linearGradient id="paint0_linear_9790_5737" x1="8.9358" y1="15.5961" x2="1.69141" y2="3.55391" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="{{ $menu['color1'] }}"/>
                                        <stop offset="1" stop-color="{{ $menu['color2'] }}"/>
                                      </linearGradient>
                                    </defs>
                                </svg>
                            </span>

                            <p class="transion-hide accordion-menus">
                                <span class="dark:text-white">{{ __('Voiceover') }}</span>
                            </p>
                        </div>
                    </a>
                    @endif
                </li>
                @endif
                @if($adminTemplateAccess == true || $adminSpeechToTextAccess  == true || $adminTextToSpeechAccess == true || $adminImageAccess == true || $adminCodeAccess == true || $adminLongArticleAccess == true)
                <li class="w-[52px] div-border border dark:border-[#474746] border-t border-color-DF ml-5 my-3.5">
                </li>
                @endif
                @if ($adminTemplateAccess == true || $adminSpeechToTextAccess  == true || $adminTextToSpeechAccess == true || $adminCodeAccess == true || $adminLongArticleAccess == true)
                <li>
                    @php 
                        $menu = activeMenu(route('user.documents'), route('user.favouriteDocuments'), route('user.editContent', ['slug' => $slug]), route('user.codeList'), route('user.codeView', ['slug' => $slug]), route('user.textToSpeechList'), route('user.textToSpeechView', ['id' => $id]), route('user.speechLists'), route('user.editSpeech', ['id' => $id]), route('user.long_article.index'), route('user.long_article.edit', $id));
                        
                        $accessChecks = [
                            'template' => [$adminTemplateAccess, 'user.documents'],
                            'code' => [$adminCodeAccess, 'user.codeList'],
                            'speech_to_text' => [$adminSpeechToTextAccess, 'user.speechLists'],
                            'voiceover' => [$adminTextToSpeechAccess, 'user.textToSpeechList'],
                            'long_article' => [$adminLongArticleAccess, 'user.long_article.index'],
                        ];

                        $view = '';

                        foreach ($accessChecks as $panel => $accessCheck) {
                            if ($accessCheck[0] && customerPanelAccess($panel) || isset($currcentPackage)) {
                                $view = route($accessCheck[1]);
                                break;
                            }
                        }

                    @endphp
                    @if(customerPanelAccess('template') || customerPanelAccess('voiceover') || customerPanelAccess('code') || customerPanelAccess('speech_to_text') || customerPanelAccess('long_article'))
                    <a href="{{ $view }}">
                        <div
                            class="{{ $menu['class'] }} main-menu flex items-center gap-3 w-full py-3 pl-5 pr-[15px] text-left text-color-14 text-base leading-6 font-normal menus-height">
                            <span class="w-5 h-5">
                                <svg class="category-svg" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.75 9C17.75 11.3206 16.8281 13.5462 15.1872 15.1872C13.5462 16.8281 11.3206 17.75 9 17.75C6.67936 17.75 4.45376 16.8281 2.81282 15.1872C1.17187 13.5462 0.25 11.3206 0.25 9C0.25 8.83424 0.315848 8.67527 0.433058 8.55806C0.550268 8.44085 0.70924 8.375 0.875 8.375C1.04076 8.375 1.19973 8.44085 1.31694 8.55806C1.43415 8.67527 1.5 8.83424 1.5 9C1.4975 10.6738 2.05413 12.3005 3.08154 13.6218C4.10895 14.9432 5.54827 15.8835 7.17105 16.2936C8.79383 16.7036 10.5071 16.5599 12.0389 15.8853C13.5707 15.2106 14.8332 14.0436 15.6262 12.5696C16.4191 11.0955 16.697 9.39886 16.4157 7.74888C16.1344 6.0989 15.31 4.59015 14.0734 3.4621C12.8369 2.33405 11.259 1.65134 9.59018 1.52233C7.92137 1.39332 6.25728 1.82541 4.86204 2.75H5.25C5.41576 2.75 5.57473 2.81585 5.69194 2.93306C5.80915 3.05027 5.875 3.20924 5.875 3.375C5.875 3.54076 5.80915 3.69974 5.69194 3.81695C5.57473 3.93416 5.41576 4 5.25 4H3.375C3.29291 4.00005 3.21162 3.98392 3.13577 3.95252C3.05992 3.92113 2.991 3.8751 2.93295 3.81705C2.87491 3.759 2.82887 3.69009 2.79748 3.61424C2.76609 3.53839 2.74995 3.45709 2.75 3.375V1.5C2.75 1.33424 2.81585 1.17527 2.93306 1.05806C3.05027 0.940853 3.20924 0.875005 3.375 0.875005C3.54076 0.875005 3.69973 0.940853 3.81694 1.05806C3.93415 1.17527 4 1.33424 4 1.5V1.8212C5.31174 0.90694 6.84896 0.369672 8.44463 0.267782C10.0403 0.165893 11.6334 0.50328 13.0507 1.24328C14.4681 1.98328 15.6556 3.09759 16.484 4.46512C17.3125 5.83265 17.7504 7.40109 17.75 9ZM14.625 9C14.625 10.1125 14.2951 11.2001 13.677 12.1251C13.0589 13.0501 12.1804 13.7711 11.1526 14.1968C10.1248 14.6226 8.99376 14.734 7.90262 14.5169C6.81147 14.2999 5.80919 13.7641 5.02252 12.9775C4.23585 12.1908 3.70012 11.1885 3.48308 10.0974C3.26604 9.00624 3.37743 7.87524 3.80318 6.84741C4.22892 5.81958 4.94989 4.94107 5.87492 4.32299C6.79994 3.7049 7.88748 3.375 9 3.375C10.4913 3.37663 11.9211 3.96979 12.9757 5.02433C14.0302 6.07887 14.6234 7.50866 14.625 9ZM11.2217 9.73L9.625 8.66553V5.875C9.625 5.70924 9.55915 5.55027 9.44194 5.43306C9.32473 5.31585 9.16576 5.25 9 5.25C8.83424 5.25 8.67527 5.31585 8.55806 5.43306C8.44085 5.55027 8.375 5.70924 8.375 5.875V9C8.37502 9.10289 8.40043 9.20418 8.44898 9.29489C8.49753 9.3856 8.56772 9.46292 8.65332 9.52L10.5283 10.77C10.6662 10.86 10.8341 10.892 10.9955 10.8589C11.1568 10.8258 11.2986 10.7304 11.39 10.5933C11.4813 10.4563 11.5149 10.2887 11.4834 10.1271C11.4519 9.96539 11.3578 9.8227 11.2217 9.73Z"
                                        fill="url(#paint0_linear_3321_1869)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_3321_1869" x1="11.628" y1="15.5961"
                                            x2="5.55335" y2="1.88766" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="{{ $menu['color1'] }}" />
                                            <stop offset="1" stop-color="{{ $menu['color2'] }}" />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </span>
                            <p class="transion-hide accordion-menus"><span
                                    class="dark:text-white">{{ __('History') }}</span></p>
                        </div>
                    </a>
                    @endif
                </li>
                @endif

                @if ($adminImageAccess)
                <li>
                    @php $menu = activeMenu(route('user.imageGallery'),route('user.imageList'), route('user.image.view', ['slug' => $slug]))  @endphp
                    @if(customerPanelAccess('image') || isset($currcentPackage))
                    <a href="{{ route('user.imageGallery') }}">
                        <div
                            class="{{ $menu['class'] }} main-menu flex items-center gap-3 w-full py-3 pl-5 pr-[15px] text-left text-color-14 text-base leading-6 font-normal menus-height">
                            <span class="w-5 h-5">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_12240_6893)">
                                    <path d="M15.0703 1.5C15.0703 1.36739 15.0176 1.24021 14.9239 1.14645C14.8301 1.05268 14.7029 1 14.5703 1H3.57031C3.4377 1 3.31053 1.05268 3.21676 1.14645C3.12299 1.24021 3.07031 1.36739 3.07031 1.5V2H15.0703V1.5Z" fill="url(#paint0_linear_12240_6893)"/>
                                    <path d="M16.0586 3.5C16.0586 3.36739 16.0059 3.24021 15.9121 3.14645C15.8184 3.05268 15.6912 3 15.5586 3H2.55859C2.42599 3 2.29881 3.05268 2.20504 3.14645C2.11127 3.24021 2.05859 3.36739 2.05859 3.5V4H16.0586V3.5Z" fill="url(#paint1_linear_12240_6893)"/>
                                    <path d="M16.06 5H1.94C1.6907 5 1.4516 5.09904 1.27532 5.27532C1.09904 5.4516 1 5.6907 1 5.94V15.06C1 15.3093 1.09904 15.5484 1.27532 15.7247C1.4516 15.901 1.6907 16 1.94 16H16.06C16.3093 16 16.5484 15.901 16.7247 15.7247C16.901 15.5484 17 15.3093 17 15.06V5.94C17 5.6907 16.901 5.4516 16.7247 5.27532C16.5484 5.09904 16.3093 5 16.06 5ZM4.28 6.725C4.57667 6.725 4.86668 6.81297 5.11336 6.9778C5.36003 7.14262 5.55229 7.37689 5.66582 7.65098C5.77935 7.92506 5.80906 8.22666 5.75118 8.51764C5.6933 8.80861 5.55044 9.07588 5.34066 9.28566C5.13088 9.49544 4.86361 9.6383 4.57264 9.69618C4.28166 9.75406 3.98006 9.72435 3.70597 9.61082C3.43189 9.49729 3.19762 9.30503 3.0328 9.05836C2.86797 8.81168 2.78 8.52167 2.78 8.225C2.78 7.82718 2.93804 7.44564 3.21934 7.16434C3.50064 6.88304 3.88218 6.725 4.28 6.725ZM15 14H3L6.73 10.265C6.79649 10.199 6.88635 10.162 6.98 10.162C7.07365 10.162 7.16351 10.199 7.23 10.265L9.07 12.105L11.605 9.5C11.6715 9.43405 11.7613 9.39704 11.855 9.39704C11.9487 9.39704 12.0385 9.43405 12.105 9.5L15 12.395V14Z" fill="url(#paint2_linear_12240_6893)"/>
                                    </g>
                                    <defs>
                                    <linearGradient id="paint0_linear_12240_6893" x1="10.8724" y1="1.87692" x2="10.8378" y2="0.941036" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="{{ $menu['color1'] }}"/>
                                    <stop offset="1" stop-color="{{ $menu['color2'] }}"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_12240_6893" x1="11.161" y1="3.87692" x2="11.1314" y2="2.9407" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="{{ $menu['color1'] }}"/>
                                    <stop offset="1" stop-color="{{ $menu['color2'] }}"/>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_12240_6893" x1="11.4027" y1="14.6461" x2="8.52888" y2="5.21289" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="{{ $menu['color1'] }}"/>
                                    <stop offset="1" stop-color="{{ $menu['color2'] }}"/>
                                    </linearGradient>
                                    <clipPath id="clip0_12240_6893">
                                    <rect width="18" height="18" fill="white"/>
                                    </clipPath>
                                    </defs>
                                </svg>
                                    
                            </span>
                            <p class="transion-hide accordion-menus"><span
                                    class="dark:text-white">{{ __('Gallery') }}</span></p>
                        </div>
                    </a>
                    @endif
                </li>
                @endif
                
                @if($adminTemplateAccess == true || $adminSpeechToTextAccess  == true || $adminTextToSpeechAccess == true || $adminImageAccess == true || $adminCodeAccess == true)
                <li class="w-[52px] div-border border dark:border-[#474746] border-t border-color-DF ml-5 my-3.5">
                </li>
                @endif
                <li>
                    @php $menu = activeMenu(route('user.ticketList'), route('user.searchList'), route('user.ticketAdd'), route('user.threadReply', ['id' => $id] ))  @endphp
                    <a href="{{ route('user.ticketList') }}">
                        <div
                            class="{{ $menu['class'] }} main-menu flex items-center gap-3 w-full py-3 pl-5 pr-[15px] text-left text-color-14 text-base leading-6 font-normal menus-height">
                            <span class="w-5 h-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <g clip-path="url(#clip0_8222_4651)">
                                      <path d="M19.375 8.4375V11.5625C19.375 12.4243 18.6743 13.125 17.8125 13.125H17.3871C16.7896 16.6663 13.7091 19.375 10 19.375C9.65454 19.375 9.375 19.0955 9.375 18.75C9.375 18.4045 9.65454 18.125 10 18.125C13.446 18.125 16.25 15.321 16.25 11.875V8.125C16.25 4.67896 13.446 1.875 10 1.875C6.55396 1.875 3.75 4.67896 3.75 8.125V12.5C3.75 12.8455 3.47046 13.125 3.125 13.125H2.1875C1.32568 13.125 0.625 12.4243 0.625 11.5625V8.4375C0.625 7.57568 1.32568 6.875 2.1875 6.875H2.61292C3.21045 3.33374 6.29089 0.625 10 0.625C13.7091 0.625 16.7896 3.33374 17.3871 6.875H17.8125C18.6743 6.875 19.375 7.57568 19.375 8.4375ZM10 3.125C7.24304 3.125 5 5.36804 5 8.125V11.25C5 14.007 7.24304 16.25 10 16.25C12.757 16.25 15 14.007 15 11.25V8.125C15 5.36804 12.757 3.125 10 3.125Z" fill="url(#paint0_linear_8222_4651)"/>
                                    </g>
                                    <defs>
                                      <linearGradient id="paint0_linear_8222_4651" x1="12.8157" y1="17.0672" x2="6.30717" y2="2.37963" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="{{ $menu['color1'] }}"/>
                                        <stop offset="1" stop-color="{{ $menu['color2'] }}"/>
                                      </linearGradient>
                                      <clipPath id="clip0_8222_4651">
                                        <rect width="20" height="20" fill="white"/>
                                      </clipPath>
                                    </defs>
                                  </svg>
                            </span>
                            <p class="transion-hide accordion-menus"><span
                                    class="dark:text-white">{{ __('Support Ticket') }}</span></p>
                        </div>
                    </a>
                </li>
                <li>
                    @php $menu = activeMenu(route('user.folderView', ['slug' => $slug]) ) @endphp
                    <a href="{{route('user.folderView', ['slug' => 'drive-' . auth()->user()->id ]) }}">
                        <div
                            class="{{ $menu['class'] }} main-menu flex items-center gap-3 w-full py-3 pl-5 pr-[15px] text-left text-color-14 text-base leading-6 font-normal menus-height">
                            <span class="w-5 h-5">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.057 3.375H15.5362C16.8593 3.375 17.8967 4.51107 17.7769 5.82871L17.061 13.7037C16.9557 14.8626 15.984 15.75 14.8203 15.75H3.17975C2.01604 15.75 1.04434 14.8626 0.938986 13.7037L0.223077 5.82871C0.173514 5.28352 0.322075 4.76941 0.607013 4.354L0.562513 3.375C0.562513 2.13236 1.56987 1.125 2.81251 1.125H6.94303C7.53977 1.125 8.11207 1.36205 8.53402 1.78401L9.466 2.71599C9.88796 3.13795 10.4603 3.375 11.057 3.375ZM1.69479 3.5096C1.93419 3.42259 2.19303 3.375 2.46384 3.375H8.53402L7.73853 2.57951C7.52755 2.36853 7.2414 2.25 6.94303 2.25H2.81251C2.19829 2.25 1.69903 2.74224 1.68771 3.35377L1.69479 3.5096Z" fill="url(#paint0_linear_435_759)"/>
                                    <defs>
                                    <linearGradient id="paint0_linear_435_759" x1="11.6389" y1="13.9499" x2="7.18938" y2="1.88497" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="{{ $menu['color1'] }}"/>
                                    <stop offset="1" stop-color="{{ $menu['color2'] }}"/>
                                    </linearGradient>
                                    </defs>
                                </svg>  
                            </span>
                            
                            <p class="transion-hide accordion-menus"><span class="dark:text-white">{{ __('Drive') }}</span></p>
                        </div>
                    </a>
                </li>
                <li>
                    @php $menu = activeMenu(route('user.profile'), route('user.package'), route('user.subscription.history'), route('user.subscription.teamList'), route('user.subscription.smallPlan'))  @endphp
                    <a href="{{ route('user.profile') }}">
                        <div
                            class="{{ $menu['class'] }} main-menu flex items-center gap-3 w-full py-3 pl-5 pr-[15px] text-left text-color-14 text-base leading-6 font-normal menus-height">
                            <span class="w-5 h-5">
                                <svg class="category-svg w-4 h-4" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.99984 0.666626C4.39984 0.666626 0.666504 4.39996 0.666504 8.99996C0.666504 13.6 4.39984 17.3333 8.99984 17.3333C13.5998 17.3333 17.3332 13.6 17.3332 8.99996C17.3332 4.39996 13.5998 0.666626 8.99984 0.666626ZM8.99984 3.16663C10.3832 3.16663 11.4998 4.28329 11.4998 5.66663C11.4998 7.04996 10.3832 8.16663 8.99984 8.16663C7.6165 8.16663 6.49984 7.04996 6.49984 5.66663C6.49984 4.28329 7.6165 3.16663 8.99984 3.16663ZM8.99984 15C6.9165 15 5.07484 13.9333 3.99984 12.3166C4.02484 10.6583 7.33317 9.74996 8.99984 9.74996C10.6582 9.74996 13.9748 10.6583 13.9998 12.3166C12.9248 13.9333 11.0832 15 8.99984 15Z"
                                    fill="url(#paint0_linear_460_1019)" />
                                <defs>
                                    <linearGradient id="paint0_linear_460_1019" x1="11.5027" y1="15.2819"
                                        x2="5.71732" y2="2.2263" gradientUnits="userSpaceOnUse">
                                        <stop stop-color="{{ $menu['color1'] }}" />
                                        <stop offset="1" stop-color="{{ $menu['color2'] }}" />
                                    </linearGradient>
                                </defs>
                            </svg>
                            </span>
                            <p class="transion-hide accordion-menus"><span
                                    class="dark:text-white">{{ __('Account') }}</span></p>
                        </div>
                    </a>
                </li>
            </ul>
            @if($subscription != NULL && in_array($subscription->status, ['Active', 'Cancel']))
            
            @if (auth()->user()->id == $sessionUserId)
            <div class="bg-color-F6 dark:bg-[#434241] border border-color-DF dark:border-color-47 rounded-xl p-4 mx-5 mt-3 mb-7 plan-card">
                <div class="flex justify-start items-cetner gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <g clip-path="url(#clip0_5419_1957)">
                        <path d="M12.419 6.22813C12.327 6.08513 12.169 6.00014 12 6.00014H8.50006V0.500211C8.50006 0.264215 8.33506 0.0602174 8.10407 0.0112181C7.86907 -0.0387812 7.63907 0.0822171 7.54307 0.297214L3.54313 9.29709C3.47413 9.45109 3.48913 9.63109 3.58113 9.77208C3.67313 9.91408 3.83112 10.0001 4.00012 10.0001H7.50007V15.5C7.50007 15.736 7.66507 15.94 7.89607 15.989C7.93107 15.996 7.96607 16 8.00007 16C8.19407 16 8.37506 15.887 8.45706 15.703L12.457 6.70313C12.525 6.54813 12.512 6.37013 12.419 6.22813Z" fill="url(#paint0_linear_5419_1957)"/>
                        </g>
                        <defs>
                        <linearGradient id="paint0_linear_5419_1957" x1="9.35152" y1="14.0307" x2="2.06253" y2="4.77849" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#E60C84"/>
                        <stop offset="1" stop-color="#FFCF4B"/>
                        </linearGradient>
                        <clipPath id="clip0_5419_1957">
                        <rect width="16" height="16" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                    <p class="text-color-14 dark:text-white text-sm font-semibold font-Figtree">{{ optional($subscription->package)->name }}</p>
                </div>
                <p class="text-color-14 dark:text-white font-Figtree font-normal text-sm mt-2.5">
                    {!! __('You have :x words left in your :y plan', [ 'x' =>  '<span class="total-word-used text-[#E22861] dark:text-[#FCCA19]">' . ($creditUsed) . '</span>' .  '<span class="credit-limit text-[#E22861] dark:text-[#FCCA19]">/' . ($creditLimit == -1 ? __('Unlimited') : $creditLimit) . '</span>', 'y' => ($subscription->billing_cycle == 'days' ? $subscription->duration . ' ' : '') . $subscription->billing_cycle ]) !!}
                </p>
                <div
                    class="relative h-1 w-full bg-white dark:bg-color-3A rounded-[25px] border border-color-DF dark:border-color-47 mt-3">
                    <div
                        class="progress-fill absolute h-1 rounded-[60px] w-[30%]" style="width: {{ ($creditLimit == -1) ? 0 : ((100 - $creditPercentage) > 100 ? 100 : (100 - $creditPercentage)) }}%">
                    </div>
                </div>
                <a
                class="magic-bg rounded-xl text-[13px] text-white justify-center items-center font-semibold py-2 w-full mx-auto flex text-center mt-4 cursor-pointer font-Figtree" href="{{ route('frontend.pricing') }}">
                    <span>
                        {{ __('Upgrade') }}
                    </span>
                </a>
            </div>
            @endif
        @endif
        </div>
        <div class="sidebar-footer relative mt-auto">
            <div class="w-[52px] div-border border dark:border-[#474746] border-t border-color-DF ml-5 my-3.5">
            </div>
            <div class="flex items-center h-[52px] justify-start pl-5 w-full bottom-0 dash-switch">
                <label for="switch" class="flex items-center cursor-pointer"> 
                    <div class="relative">
                        <input type="checkbox" id="switch" class="sr-only" {{ \Cookie::get('theme_preference') == 'dark' ? 'checked' : '' }} >
                        <div
                            class="block bg-color-DF dark:bg-[#FF774B] border border-color-89 dark:border-[#FF774B] w-9 h-5 rounded-full">
                        </div>
                        <div class="dot absolute left-[2px] top-[2px] bg-white w-4 h-4 rounded-full transition"></div>
                    </div>
                    <div class="ml-3 transion-hide text-color-14 font-normal text-base leading-6 theme-swticher-rtl">
                        <span class="dark:text-[#333332] dark:hidden">{{ __('Dark Mode') }}</span>
                        <span class="dark:text-white text-white dark:flex hidden">{{ __('Light Mode') }}</span>
                    </div>
                </label>
            </div>
        </div>
    </div>
</nav>
