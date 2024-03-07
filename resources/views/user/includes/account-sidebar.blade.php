<div class="bg-[#F6F3F2] dark:bg-[#3A3A39] xl:!w-[401px] 5xl:!w-[474px] sidebar-scrollbar xl:overflow-auto xl:h-screen hidden md:block pt-14 h-screen md:h-max" id="account-sidebar">
    <div class="px-5 py-6 xl:my-0 xl:p-6 flex flex-col gap-4">
        @php $menu = accountSidebarActiveMenu(route('user.profile')) @endphp
        <a class="bg-white dark:bg-[#474746] border border-color-DF dark:border-[#474746] border-design-3 cursor-pointer rounded-xl {{ $menu["class"]}}"
        href="{{ route('user.profile') }}">
            <div class="px-6 py-4 flex justify-between items-center">
                <div class="flex justify-center items-center gap-3">
                   
                    <svg class="neg-transition-scale" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4.5C0 3.25736 1.00736 2.25 2.25 2.25H15.75C16.9926 2.25 18 3.25736 18 4.5V13.5C18 14.7426 16.9926 15.75 15.75 15.75H2.25C1.00736 15.75 0 14.7426 0 13.5V4.5ZM10.125 6.1875C10.125 5.87684 10.3768 5.625 10.6875 5.625H15.1875C15.4982 5.625 15.75 5.87684 15.75 6.1875C15.75 6.49816 15.4982 6.75 15.1875 6.75H10.6875C10.3768 6.75 10.125 6.49816 10.125 6.1875ZM10.125 9C10.125 8.68934 10.3768 8.4375 10.6875 8.4375H15.1875C15.4982 8.4375 15.75 8.68934 15.75 9C15.75 9.31066 15.4982 9.5625 15.1875 9.5625H10.6875C10.3768 9.5625 10.125 9.31066 10.125 9ZM11.25 11.8125C11.25 11.5018 11.5018 11.25 11.8125 11.25H15.1875C15.4982 11.25 15.75 11.5018 15.75 11.8125C15.75 12.1232 15.4982 12.375 15.1875 12.375H11.8125C11.5018 12.375 11.25 12.1232 11.25 11.8125ZM10.125 14.0625C10.125 14.2535 10.1094 14.4413 10.0794 14.625H2.24998C1.69826 14.625 1.2393 14.2278 1.1434 13.7038C1.35047 11.6973 3.27788 10.125 5.62498 10.125C8.11026 10.125 10.125 11.8879 10.125 14.0625ZM7.87498 6.75C7.87498 7.99264 6.86762 9 5.62498 9C4.38234 9 3.37498 7.99264 3.37498 6.75C3.37498 5.50736 4.38234 4.5 5.62498 4.5C6.86762 4.5 7.87498 5.50736 7.87498 6.75Z" fill="url(#paint0_linear_460_805)"/>
                        <defs>
                        <linearGradient id="paint0_linear_460_805" x1="11.7031" y1="14.0884" x2="7.91656" y2="2.6952" gradientUnits="userSpaceOnUse">
                        <stop stop-color="{{ $menu['color1'] }}"/>
                        <stop offset="1" stop-color="{{  $menu['color2'] }}"/>
                        </linearGradient>
                        </defs>
                    </svg>
                    <p class="font-normal leading-[26px] text-lg text-color-14 dark:text-white">{{ __('Profile')}}</p>
                </div>
                <div>
                    @if (url()->current() == route('user.profile'))
                        <svg class='block dark:hidden neg-transition-scale' xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#000000"></path>
                        </svg>
                        <svg class='hidden dark:block neg-transition-scale' xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#ffffff"></path>
                        </svg>
                    @else
                        <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#898989"></path>
                        </svg>
                    @endif
                </div>
            </div>
        </a>
        @php $menu = accountSidebarActiveMenu(route('user.package')) @endphp
        <a class="bg-white dark:bg-[#474746] border border-color-DF dark:border-[#474746] border-design-3 cursor-pointer rounded-xl {{ $menu["class"]}}"
            href="{{ route('user.package') }}">
            <div class="px-6 py-4 flex justify-between items-center">
                <div class="flex justify-center items-center gap-3">
                    <svg class="neg-transition-scale" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 4.5C0 3.25736 1.00736 2.25 2.25 2.25H15.75C16.9926 2.25 18 3.25736 18 4.5V10.125H0V4.5ZM12.9375 5.625C12.6268 5.625 12.375 5.87684 12.375 6.1875V7.3125C12.375 7.62316 12.6268 7.875 12.9375 7.875H15.1875C15.4982 7.875 15.75 7.62316 15.75 7.3125V6.1875C15.75 5.87684 15.4982 5.625 15.1875 5.625H12.9375Z" fill="url(#paint0_linear_2555_1960)"/>
                        <path d="M0 12.375V13.5C0 14.7426 1.00736 15.75 2.25 15.75H15.75C16.9926 15.75 18 14.7426 18 13.5V12.375H0Z" fill="url(#paint1_linear_2555_1960)"/>
                        <defs>
                        <linearGradient id="paint0_linear_2555_1960" x1="11.7031" y1="14.0884" x2="7.91656" y2="2.6952" gradientUnits="userSpaceOnUse">
                        <stop stop-color="{{ $menu['color1'] }}"/>
                        <stop offset="1" stop-color="{{ $menu['color2'] }}"/>
                        </linearGradient>
                        <linearGradient id="paint1_linear_2555_1960" x1="11.7031" y1="14.0884" x2="7.91656" y2="2.6952" gradientUnits="userSpaceOnUse">
                        <stop stop-color="{{ $menu['color1'] }}"/>
                        <stop offset="1" stop-color="{{ $menu['color2'] }}"/>
                        </linearGradient>
                        </defs>
                    </svg>
                    <p class="font-normal leading-[26px] text-lg text-color-14 dark:text-white">
                        {{ __('Subscriptions')}}</p>
                </div>
                <div>
                    @if (url()->current() == route('user.package'))
                        <svg class='block dark:hidden neg-transition-scale' xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#000000"></path>
                        </svg>
                        <svg class='hidden dark:block neg-transition-scale' xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#ffffff"></path>
                        </svg>
                    @else
                        <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#898989"></path>
                        </svg>
                    @endif
                </div>
            </div>
        </a>
        @php $menu = accountSidebarActiveMenu(route('user.subscription.history')) @endphp
        <a class="bg-white dark:bg-[#474746] border border-color-DF dark:border-[#474746] border-design-3 cursor-pointer rounded-xl {{ $menu["class"]}}"
            href="{{ route('user.subscription.history') }}">
            <div class="px-6 py-4 flex justify-between items-center">
                <div class="flex justify-center items-center gap-3">
                
                    <svg class="neg-transition-scale" width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.9038 0H1.09643C0.772841 0 0.510498 0.262343 0.510498 0.585936V17.6881C0.510498 17.8435 0.572256 17.9925 0.682099 18.1024L2.40803 19.8284C2.63686 20.0572 3.00784 20.0572 3.2367 19.8284L4.5483 18.5168L5.85982 19.8284C5.96971 19.9382 6.11873 20 6.27412 20C6.42951 20 6.57857 19.9383 6.68846 19.8284L8.00001 18.5168L9.31161 19.8284C9.4215 19.9382 9.57056 20 9.72591 20C9.8813 20 10.0304 19.9383 10.1402 19.8284L11.4518 18.5168L12.7634 19.8284C12.8778 19.9428 13.0277 20 13.1777 20C13.3276 20 13.4776 19.9428 13.592 19.8284L15.3179 18.1024C15.4278 17.9925 15.4896 17.8435 15.4896 17.6881V0.585936C15.4897 0.262343 15.2273 0 14.9038 0ZM7.41404 4.4012V3.72398C7.41404 3.40038 7.67642 3.13804 7.99998 3.13804C8.32361 3.13804 8.58591 3.40038 8.58591 3.72398V4.39323H9.25525C9.5788 4.39323 9.84118 4.65558 9.84118 4.97917C9.84118 5.30276 9.5788 5.56511 9.25525 5.56511H7.58166C7.21263 5.56511 6.9124 5.86534 6.9124 6.23436C6.9124 6.60343 7.21263 6.9037 7.58166 6.9037H8.41849C9.43368 6.9037 10.2597 7.72959 10.2597 8.74483C10.2597 9.70354 9.52294 10.4931 8.58591 10.578V11.2553C8.58591 11.5788 8.32361 11.8412 7.99998 11.8412C7.67642 11.8412 7.41404 11.5788 7.41404 11.2553V10.5859H6.74478C6.42123 10.5859 6.15885 10.3236 6.15885 9.99998C6.15885 9.67639 6.42123 9.41404 6.74478 9.41404H8.41849C8.78751 9.41404 9.08779 9.11381 9.08779 8.74479C9.08779 8.37577 8.78755 8.07553 8.41849 8.07553H7.58166C6.56642 8.07553 5.74053 7.24956 5.74053 6.23432C5.74057 5.27565 6.47717 4.48616 7.41404 4.4012ZM11.1381 14.9792H4.86205C4.53846 14.9792 4.27612 14.7168 4.27612 14.3932C4.27612 14.0696 4.53846 13.8073 4.86205 13.8073H11.1381C11.4616 13.8073 11.724 14.0696 11.724 14.3932C11.724 14.7168 11.4616 14.9792 11.1381 14.9792Z" fill="url(#paint0_linear_3352_1880)"/>
                        <defs>
                        <linearGradient id="paint0_linear_3352_1880" x1="10.2495" y1="17.5384" x2="2.03526" y2="3.65527" gradientUnits="userSpaceOnUse">
                        <stop stop-color="{{ $menu['color1'] }}"/>
                        <stop offset="1" stop-color="{{ $menu['color2'] }}"/>
                        </linearGradient>
                        </defs>
                    </svg>
                    <p class="font-normal leading-[26px] text-lg text-color-14 dark:text-white">
                            {{ __('Billing history')}}</p>
                </div>
                <div>
                    @if (url()->current() == route('user.subscription.history'))
                        <svg class='block dark:hidden neg-transition-scale' xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#000000"></path>
                        </svg>
                        <svg class='hidden dark:block neg-transition-scale' xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#ffffff"></path>
                        </svg>
                    @else
                        <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#898989"></path>
                        </svg>
                    @endif
                </div>
            </div>
        </a>


        @php $menu = accountSidebarActiveMenu(route('user.subscription.teamList')) 
        @endphp
        @if(teamMemberAccountSidebarAccess(Auth::user()->id) && subscription('isSubscribed', Auth::user()->id))
        <a class="bg-white dark:bg-[#474746] border border-color-DF dark:border-[#474746] border-design-3 cursor-pointer rounded-xl {{ $menu["class"]}}"
            href="{{ route('user.subscription.teamList') }}">
            <div class="px-6 py-4 flex justify-between items-center">
                <div class="flex justify-center items-center gap-3">
                
                    <svg class="neg-transition-scale" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M0 4.5C0 3.25736 1.00736 2.25 2.25 2.25H15.75C16.9926 2.25 18 3.25736 18 4.5V13.5C18 14.7426 16.9926 15.75 15.75 15.75H2.25C1.00736 15.75 0 14.7426 0 13.5V4.5ZM10.125 6.1875C10.125 5.87684 10.3768 5.625 10.6875 5.625H15.1875C15.4982 5.625 15.75 5.87684 15.75 6.1875C15.75 6.49816 15.4982 6.75 15.1875 6.75H10.6875C10.3768 6.75 10.125 6.49816 10.125 6.1875ZM10.125 9C10.125 8.68934 10.3768 8.4375 10.6875 8.4375H15.1875C15.4982 8.4375 15.75 8.68934 15.75 9C15.75 9.31066 15.4982 9.5625 15.1875 9.5625H10.6875C10.3768 9.5625 10.125 9.31066 10.125 9ZM11.25 11.8125C11.25 11.5018 11.5018 11.25 11.8125 11.25H15.1875C15.4982 11.25 15.75 11.5018 15.75 11.8125C15.75 12.1232 15.4982 12.375 15.1875 12.375H11.8125C11.5018 12.375 11.25 12.1232 11.25 11.8125ZM10.125 14.0625C10.125 14.2535 10.1094 14.4413 10.0794 14.625H2.24998C1.69826 14.625 1.2393 14.2278 1.1434 13.7038C1.35047 11.6973 3.27788 10.125 5.62498 10.125C8.11026 10.125 10.125 11.8879 10.125 14.0625ZM7.87498 6.75C7.87498 7.99264 6.86762 9 5.62498 9C4.38234 9 3.37498 7.99264 3.37498 6.75C3.37498 5.50736 4.38234 4.5 5.62498 4.5C6.86762 4.5 7.87498 5.50736 7.87498 6.75Z" fill="url(#paint0_linear_3352_1881)"/>
                        <defs>
                        <linearGradient id="paint0_linear_3352_1881" x1="11.7031" y1="14.0884" x2="7.91656" y2="2.6952" gradientUnits="userSpaceOnUse">
                        <stop stop-color="{{ $menu['color1'] }}"/>
                        <stop offset="1" stop-color="{{  $menu['color2'] }}"/>
                    </svg>
                    <p class="font-normal leading-[26px] text-lg text-color-14 dark:text-white">
                    {{ __('Team Members')}}
                    </p>
                </div>
                <div>
                    @if (url()->current() == route('user.subscription.teamList'))
                    <svg class='block dark:hidden' xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#000000"></path>
                        </svg>
                        <svg class='hidden dark:block' xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#ffffff"></path>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#898989"></path>
                        </svg>
                    @endif
                </div>
            </div>
        </a>  
        @endif


            

        @php $menu = accountSidebarActiveMenu(route('user.subscription.smallPlan')) @endphp
        <a class="bg-white dark:bg-[#474746] border border-color-DF dark:border-[#474746] border-design-3 cursor-pointer rounded-xl {{ $menu["class"]}}"
            href="{{ route('user.subscription.smallPlan') }}">
            <div class="px-6 py-4 flex justify-between items-center">
                <div class="flex justify-center items-center gap-3">
                
                    <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 4.5H15V6H3V4.5ZM4.5 1.5H13.5V3H4.5V1.5ZM15 7.5H3C2.60218 7.5 2.22064 7.65804 1.93934 7.93934C1.65804 8.22064 1.5 8.60218 1.5 9V15C1.5 15.3978 1.65804 15.7794 1.93934 16.0607C2.22064 16.342 2.60218 16.5 3 16.5H15C15.3978 16.5 15.7794 16.342 16.0607 16.0607C16.342 15.7794 16.5 15.3978 16.5 15V9C16.5 8.60218 16.342 8.22064 16.0607 7.93934C15.7794 7.65804 15.3978 7.5 15 7.5ZM11.25 12.75H9.75V14.25H8.25V12.75H6.75V11.25H8.25V9.75H9.75V11.25H11.25V12.75Z" fill="url(#paint0_linear_3352_1882)"/>
                        <defs>
                        <linearGradient id="paint0_linear_3352_1882" x1="10.2495" y1="17.5384" x2="2.03526" y2="3.65527" gradientUnits="userSpaceOnUse">
                        <stop stop-color="{{ $menu['color1'] }}"/>
                        <stop offset="1" stop-color="{{ $menu['color2'] }}"/>
                        </linearGradient>
                        </defs>
                    </svg>
                    <p class="font-normal leading-[26px] text-lg text-color-14 dark:text-white">
                            {{ __('Credit')}}</p>
                </div>
                <div>
                    @if (url()->current() == route('user.subscription.smallPlan'))

                        <svg class='block dark:hidden' xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#000000"></path>
                        </svg>
                        <svg class='hidden dark:block' xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#ffffff"></path>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                            viewBox="0 0 18 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                                fill="#898989"></path>
                        </svg>
                    @endif
                </div>
            </div>
        </a>

        @php $menu = accountSidebarActiveMenu(route('users.logout')) @endphp
        <a class="bg-white dark:bg-[#474746] border border-color-DF dark:border-[#474746] border-design-3 cursor-pointer rounded-xl {{ $menu["class"]}}"
            href="{{ route('users.logout') }}">
            <div class="px-6 py-4 flex justify-between items-center">
                <div class="flex justify-center items-center gap-3">
                    <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18" fill="none">
                        <path
                            d="M12.375 2.8125C12.375 2.19094 11.8716 1.6875 11.25 1.6875H8.71875C8.5635 1.6875 8.4375 1.8135 8.4375 1.96875V2.53125C8.4375 2.6865 8.5635 2.8125 8.71875 2.8125H11.25V4.78125C11.25 4.9365 11.376 5.0625 11.5312 5.0625H12.0938C12.249 5.0625 12.375 4.9365 12.375 4.78125V2.8125Z"
                            fill="#898989"></path>
                        <path
                            d="M11.25 13.2188V15.1875H8.71875C8.5635 15.1875 8.4375 15.3135 8.4375 15.4688V16.0312C8.4375 16.1865 8.5635 16.3125 8.71875 16.3125H11.25C11.8716 16.3125 12.375 15.8091 12.375 15.1875V13.2188C12.375 13.0635 12.249 12.9375 12.0938 12.9375H11.5312C11.376 12.9375 11.25 13.0635 11.25 13.2188Z"
                            fill="#898989"></path>
                        <path
                            d="M8.43766 9.5625C8.43766 9.71775 8.56366 9.84375 8.71891 9.84375H14.0627V11.6134C14.0627 11.6871 14.1515 11.7236 14.2033 11.6719L16.8122 9.063C16.8465 9.02869 16.8465 8.97244 16.8122 8.93812L14.2033 6.32812C14.1515 6.27637 14.0627 6.31294 14.0627 6.38662V8.15625H8.71891C8.56366 8.15625 8.43766 8.28225 8.43766 8.4375V9.5625Z"
                            fill="#898989"></path>
                        <path
                            d="M1.56375 2.73037L6.91425 1.13794C7.11225 1.07887 7.3125 1.224 7.3125 1.4265V16.5684C7.3125 16.7737 7.11 16.9206 6.90919 16.8609L1.56375 15.2696C1.30331 15.192 1.125 14.9569 1.125 14.6902V3.30975C1.125 3.04312 1.30331 2.808 1.56375 2.73037ZM5.0625 9.5625C5.0625 9.87356 5.31394 10.125 5.625 10.125C5.93606 10.125 6.1875 9.87356 6.1875 9.5625V8.4375C6.1875 8.127 5.93606 7.875 5.625 7.875C5.31394 7.875 5.0625 8.127 5.0625 8.4375V9.5625Z"
                            fill="#898989"></path>
                    </svg>
                    <p class="font-normal leading-[26px] text-lg text-color-14 dark:text-white">{{ __('Logout') }}</p>
                </div>
                <div>
                    <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                        viewBox="0 0 18 18" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.125 9C1.125 8.68934 1.37684 8.4375 1.6875 8.4375H14.9545L11.4148 4.89775C11.1951 4.67808 11.1951 4.32192 11.4148 4.10225C11.6344 3.88258 11.9906 3.88258 12.2102 4.10225L16.7102 8.60225C16.9299 8.82192 16.9299 9.17808 16.7102 9.39775L12.2102 13.8977C11.9906 14.1174 11.6344 14.1174 11.4148 13.8977C11.1951 13.6781 11.1951 13.3219 11.4148 13.1023L14.9545 9.5625H1.6875C1.37684 9.5625 1.125 9.31066 1.125 9Z"
                            fill="#898989"></path>
                    </svg>
                </div>
            </div>
        </a>
    </div>
</div>
