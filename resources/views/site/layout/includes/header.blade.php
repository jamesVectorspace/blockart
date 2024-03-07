
<header id="top" class="relative pt-scroll md:pt-[66px] pt-14">
    <nav id="top-menu"
        class="flex md:gap-3 nav-sticky md:flex-row flex-col justify-between w-full py-3.5 md:py-2 9xl:px-[310px] 8xl:px-40 lg:px-20 md:px-10 px-5 bg-color-14 text-white"
        style="background: {{ $header['main']['bg_color'] }}">
        <div class="flex justify-between">
            @if (isset($header['main']['show_logo']) && $header['main']['show_logo'] == 1 && $headerLogoLight->image && $headerLogoDark->image)
                <div class="neg-transition-scale">
                    <a href="{{ route('frontend.index') }}">
                        <img class="w-[104px] h-7 md:w-[157px] md:h-[42px] hidden dark:block object-contain"
                            src="{{ $headerLogoDark->fileUrl() }}" alt="{{ __('Image') }}">
                    </a>
                    <a href="{{ route('frontend.index') }}">
                        <img class="w-[104px] h-7 md:w-[157px] md:h-[42px] block dark:hidden object-contain"
                            src="{{ $headerLogoLight->fileUrl() }}" alt="{{ __('Image') }}">
                    </a>
                </div>
            @endif
            <button id="menuBtn" class="block md:hidden focus:outline-none neg-transition-scale" type="button" onclick="navToggle();">
                <svg id="icon" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"
                    fill="none">
                    <path d="M22 13H4M22 7H4M22 19H10" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <svg id="cross_icon" class="hidden" xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                    viewBox="0 0 26 26" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M5.36612 6.36612C5.85427 5.87796 6.64573 5.87796 7.13388 6.36612L12.5 11.7322L17.8661 6.36612C18.3543 5.87796 19.1457 5.87796 19.6339 6.36612C20.122 6.85427 20.122 7.64573 19.6339 8.13388L14.2678 13.5L19.6339 18.8661C20.122 19.3543 20.122 20.1457 19.6339 20.6339C19.1457 21.122 18.3543 21.122 17.8661 20.6339L12.5 15.2678L7.13388 20.6339C6.64573 21.122 5.85427 21.122 5.36612 20.6339C4.87796 20.1457 4.87796 19.3543 5.36612 18.8661L10.7322 13.5L5.36612 8.13388C4.87796 7.64573 4.87796 6.85427 5.36612 6.36612Z"
                        fill="white" />
                </svg>
            </button>
        </div>

        @php
            $menus = Modules\MenuBuilder\Http\Models\MenuItems::menus(4);
        @endphp

        <div class="flex justify-end md:gap-7 items-center">
            <div class="hidden w-full md:flex md:items-center text-center 4xl:w-[770px] xl:w-[570px] lg:w-[430px] justify-center md:justify-end h-[500px] md:h-max overflow-auto md:overflow-hidden width-420px" id="menu"
            style="color: {{ $header['main']['text_color'] }}">
                <ul class="pt-12 pb-6 flex flex-col md:flex-row flex-nowrap items-center md:gap-1.5 gap-10 md:pt-0 md:pb-0 whitespace-nowrap overflow-auto sidebar-scrollbar w-full md:w-max md:justify-between" id='header'>
                    @if (isset($header['main']['show_menu']) && $header['main']['show_menu'] == 1)
                        @foreach ($menus as $menu)

                            @php
                                $url = $menu->url(empty($menu->params) ? 'page' : '');
                                $url = str_contains($url, url('/')) || str_contains($url, 'http') ? $url : url('/' . $url);
                                $activeUrl = $url;
                                $currentUrl = url()->current();

                                if (strpos($activeUrl, '?')) {
                                    $activeUrl = explode('?', $activeUrl)[0];
                                }

                            @endphp

                            <li class="px-3 py-1 rounded-md {{ $activeUrl == $currentUrl ? 'bg-[#E22861]' : '' }}" data-url ="{{ $activeUrl }}">
                                <a class=" text-16 font-normal font-Figtree bg-color-FF9 {{ !empty($menu->class) ? $menu->class : '' }}" href="{{ $url }}">{{ ucwords($menu->label) }}</a>
                            </li>
                        @endforeach
                        @includeIf('affiliate::layouts.includes.be_affiliate')
                        <li class="block md:hidden">
                            @auth
                                <div>
                                <a class="text-white text-16 font-normal font-Figtree flex text-center items-center justify-center rounded-lg h-[50px] sign-in-button sign-in"
                                href="{{ Auth::user()->role()->type == 'admin' ? route('dashboard') : route('user.dashboard') }}">
                                <span class="px-5">{{ __("Go to Dashboard") }}</span></a>
                                </div>
                            @else
                                <div>
                                    <a class="text-white text-16 font-normal font-Figtree flex text-center items-center justify-center rounded-lg w-[105px] login-width h-[50px] sign-in-button sign-in"
                                    href="{{ route('login') }}">
                                    <span>{{ __("Login") }}</span></a>
                                </div>
                            @endauth
                        </li>
                    @endif
                </ul>
            </div>

            <div id="dropdowns-header" class="md:relative absolute top-0 right-[50px] md:right-1 flex justify-end items-center lg:gap-5 gap-3">
                @if (isset($header['main']['show_switch_bar']) && $header['main']['show_switch_bar'] == 1)
                    <div class="mt-3 md:mt-0 cursor-pointer" id="switch">
                        <img  src="{{ asset('Modules/OpenAI/Resources/assets/image/moon.png') }}" class="neg-transition-scale moon w-6 {{ \Cookie::get('theme_preference') == 'dark' ? 'hidden' : '' }}" alt="moon">
                        <img src="{{ asset('Modules/OpenAI/Resources/assets/image/sun.png') }}" class="neg-transition-scale sun w-6 {{ \Cookie::get('theme_preference') == 'dark' ? '' : 'hidden' }}" alt="sun">
                    </div>
                @endif
                <div>
                    @php
                        $flag = config('app.locale');
                        $languages = \App\Models\Language::getAll()->where('status', 'Active');
                    @endphp
                    @if($languages->isNotEmpty())
                        <div class="cursor-pointer mt-3 md:mt-0 relative">
                            <a class="text-white text-16 cursor-pointer font-normal language-dropdown-click font-Figtree flex text-center gap-2 items-center justify-center">
                                <img class="rounded-full cursor-pointer h-[18px] w-[18px] bg-white neg-transition-scale" src="{{ url("public/datta-able/fonts/flag/flags/4x3/" . getSVGFlag($flag) . ".svg") }}"
                                alt="{{ __('Image') }}">
                                <p> {{ ucFirst($flag) }} </p>
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.64645 4.64605C2.45118 4.84131 2.45118 5.15789 2.64645 5.35316L5.64645 8.35316C5.84171 8.54842 6.15829 8.54842 6.35355 8.35316L9.35355 5.35316C9.54882 5.15789 9.54882 4.84131 9.35355 4.64605C9.15829 4.45079 8.84171 4.45079 8.64645 4.64605L6 7.2925L3.35355 4.64605C3.15829 4.45079 2.84171 4.45079 2.64645 4.64605Z" fill="white"/>
                                </svg>
                            </a>
                            <div
                                class="hidden origin-top-right md:top-9 py-2 top-7 absolute md:right-0 mx-auto md:mt-3 mt-2 w-[201px] border border-color-89 dark:border-color-47 rounded-lg bg-white dark:bg-color-29 z-50 language-drop-down dropdown-shadow language-dropdown max-h-[210px] overflow-auto sidebar-scrollbar">
                                <div>
                                    @foreach($languages as $language)
                                        <a data-short-name="{{ $language->short_name }}" class="lang-change flex justify-start items-center gap-1.5 text-14 font-medium text-color-14 dark:text-white font-Figtree px-[15px] py-2 hover:bg-color-F6 dark:hover:bg-[#3A3A39]">
                                            <img class="rounded-full cursor-pointer h-[18px] w-[18px] bg-white neg-transition-scale" src="{{ url("public/datta-able/fonts/flag/flags/4x3/" . getSVGFlag($language->short_name) . ".svg") }}"
                                            alt="{{ __('Image') }}">
                                            <p>{{ $language->name }}</p>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="mt-1 md:mt-0">
                    @auth
                        <div class="relative">
                            <a class="header-dropdown-click flex flex-col justify-center items-center">
                                <div class="text-white text-16 cursor-pointer font-normal font-Figtree flex text-center items-center justify-center rounded-full h-10 w-10 md:h-11 md:w-11 sign-in-button sign-in">
                                <img class="rounded-full h-9 w-9 md:h-10 md:w-10 cursor-pointer bg-white neg-transition-scale" src="{{ Auth::user()->fileUrl() }}"
                                alt="Avatar of User">
                                </div>
                                <svg class="hidden md:block" xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.64645 4.64605C2.45118 4.84131 2.45118 5.15789 2.64645 5.35316L5.64645 8.35316C5.84171 8.54842 6.15829 8.54842 6.35355 8.35316L9.35355 5.35316C9.54882 5.15789 9.54882 4.84131 9.35355 4.64605C9.15829 4.45079 8.84171 4.45079 8.64645 4.64605L6 7.2925L3.35355 4.64605C3.15829 4.45079 2.84171 4.45079 2.64645 4.64605Z" fill="white"/>
                                </svg>
                            </a>
                            <div
                                class="hidden origin-top-right md:top-14 top-[42px] absolute md:right-0 mx-auto mt-2 w-[270px] border border-color-89 dark:border-color-47 rounded-lg bg-white dark:bg-color-29 z-50 header-drop-down dropdown-shadow landing-header-dropdown">
                                <div>
                                    <a href="{{ Auth::user()->role()->type == 'admin' ? route('users.profile') : route('user.profile') }}">
                                        <div
                                            class="flex gap-3 rounded-lg items-center justify-start magic-bg w-full px-[18px] py-5">
                                            @auth
                                                <img class="rounded-full h-11 w-11 cursor-pointer bg-white"
                                                    src="{{ Auth::user()->fileUrl() }}" alt="Avatar of User">
                                                <div class="text-left">
                                                    <p class="text-white text-16 font-semibold font-Figtree">
                                                        {{ trimWords(Auth::user()->name) }}</p>
                                                    <p class="text-white text-14 font-normal font-Figtree break-all">
                                                        {{ trimWords(config('openAI.is_demo') ? 'xxxxxxx@xx.xx' : Auth::user()->email) }}</p>
                                                </div>
                                            @endauth
                                        </div>
                                    </a>
                                    <div class="pt-4 pb-2">
                                        <a href="{{ Auth::user()->role()->type == 'admin' ? route('dashboard') : route('user.dashboard') }}" class="flex justify-start items-center gap-1.5 text-14 font-normal text-color-14 dark:text-white font-Figtree px-[18px]">
                                            <svg class="neg-transition-scale" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_2465_1852)">
                                                    <path
                                                        d="M2 8.66667H7.33333V2H2V8.66667ZM2 14H7.33333V10H2V14ZM8.66667 14H14V7.33333H8.66667V14ZM8.66667 2V6H14V2H8.66667Z"
                                                        fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2465_1852">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <p> {{  Auth::user()->role()->type == 'admin' ? __('Admin Dashboard') : __('Dashboard') }} </p>
                                        </a>
                                    </div>
                                    @if (Auth::user()->role()->type == 'admin')
                                    <div class="py-2">
                                        <a href="{{ route('user.dashboard') }}" class="flex justify-start items-center gap-1.5 text-14 font-normal text-color-14 dark:text-white font-Figtree px-[18px]">
                                            <svg class="neg-transition-scale" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_2465_1852)">
                                                    <path
                                                        d="M2 8.66667H7.33333V2H2V8.66667ZM2 14H7.33333V10H2V14ZM8.66667 14H14V7.33333H8.66667V14ZM8.66667 2V6H14V2H8.66667Z"
                                                        fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2465_1852">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <p>{{ __('User Dashboard') }}
                                            </p>
                                        </a>
                                    </div>
                                    @endif
                                    @includeIf('affiliate::layouts.includes.site_header')
                                    <div class="py-2">
                                        <a href="{{ Auth::user()->role()->type == 'admin' ? route('users.profile') : route('user.profile') }}" class="flex justify-start items-center gap-1.5 text-14 font-normal text-color-14 dark:text-white font-Figtree px-[18px]">
                                            <svg class="neg-transition-scale" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_2465_1858)">
                                                    <path
                                                        d="M12.7597 8.62667C12.7864 8.42667 12.7997 8.22001 12.7997 8.00001C12.7997 7.78667 12.7864 7.57334 12.7531 7.37334L14.1064 6.32001C14.2264 6.22667 14.2597 6.04667 14.1864 5.91334L12.9064 3.70001C12.8264 3.55334 12.6597 3.50667 12.5131 3.55334L10.9197 4.19334C10.5864 3.94001 10.2331 3.72667 9.83975 3.56667L9.59975 1.87334C9.57308 1.71334 9.43975 1.60001 9.27975 1.60001H6.71975C6.55975 1.60001 6.43308 1.71334 6.40641 1.87334L6.16641 3.56667C5.77308 3.72667 5.41308 3.94667 5.08641 4.19334L3.49308 3.55334C3.34641 3.50001 3.17975 3.55334 3.09975 3.70001L1.82641 5.91334C1.74641 6.05334 1.77308 6.22667 1.90641 6.32001L3.25975 7.37334C3.22641 7.57334 3.19975 7.79334 3.19975 8.00001C3.19975 8.20667 3.21308 8.42667 3.24641 8.62667L1.89308 9.68001C1.77308 9.77334 1.73975 9.95334 1.81308 10.0867L3.09308 12.3C3.17308 12.4467 3.33975 12.4933 3.48641 12.4467L5.07975 11.8067C5.41308 12.06 5.76641 12.2733 6.15975 12.4333L6.39975 14.1267C6.43308 14.2867 6.55975 14.4 6.71975 14.4H9.27975C9.43975 14.4 9.57308 14.2867 9.59308 14.1267L9.83308 12.4333C10.2264 12.2733 10.5864 12.06 10.9131 11.8067L12.5064 12.4467C12.6531 12.5 12.8197 12.4467 12.8997 12.3L14.1797 10.0867C14.2597 9.94001 14.2264 9.77334 14.0997 9.68001L12.7597 8.62667ZM7.99975 10.4C6.67975 10.4 5.59975 9.32001 5.59975 8.00001C5.59975 6.68001 6.67975 5.60001 7.99975 5.60001C9.31975 5.60001 10.3997 6.68001 10.3997 8.00001C10.3997 9.32001 9.31975 10.4 7.99975 10.4Z"
                                                        fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2465_1858">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <p>{{ __('Account Settings') }}</p>
                                        </a>
                                    </div>
                                    <div class="pt-2 pb-4">
                                        <a href="{{ route('users.logout') }}" class="flex justify-start items-center gap-1.5 text-14 font-normal text-color-14 dark:text-white font-Figtree px-[18px] ">
                                            <svg class="neg-transition-scale" width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11 2.5C11 1.9475 10.5525 1.5 10 1.5H7.75C7.612 1.5 7.5 1.612 7.5 1.75V2.25C7.5 2.388 7.612 2.5 7.75 2.5H10V4.25C10 4.388 10.112 4.5 10.25 4.5H10.75C10.888 4.5 11 4.388 11 4.25V2.5Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M10 11.75V13.5H7.75C7.612 13.5 7.5 13.612 7.5 13.75V14.25C7.5 14.388 7.612 14.5 7.75 14.5H10C10.5525 14.5 11 14.0525 11 13.5V11.75C11 11.612 10.888 11.5 10.75 11.5H10.25C10.112 11.5 10 11.612 10 11.75Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M7.49992 8.49999C7.49992 8.63799 7.61192 8.74999 7.74992 8.74999H12.4999V10.323C12.4999 10.3885 12.5789 10.421 12.6249 10.375L14.9439 8.05599C14.9744 8.02549 14.9744 7.97549 14.9439 7.94499L12.6249 5.62499C12.5789 5.57899 12.4999 5.61149 12.4999 5.67699V7.24999H7.74992C7.61192 7.24999 7.49992 7.36199 7.49992 7.49999V8.49999Z"fill="currentColor" />
                                                <path
                                                    d="M1.39 2.427L6.146 1.0115C6.322 0.958998 6.5 1.088 6.5 1.268V14.7275C6.5 14.91 6.32 15.0405 6.1415 14.9875L1.39 13.573C1.1585 13.504 1 13.295 1 13.058V2.942C1 2.705 1.1585 2.496 1.39 2.427ZM4.5 8.5C4.5 8.7765 4.7235 9 5 9C5.2765 9 5.5 8.7765 5.5 8.5V7.5C5.5 7.224 5.2765 7 5 7C4.7235 7 4.5 7.224 4.5 7.5V8.5Z"
                                                    fill="currentColor" />
                                            </svg>
                                            <p>{{ __('Logout') }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="hidden md:block">
                            <a class="text-white text-16 font-normal font-Figtree flex text-center items-center justify-center rounded-lg w-[105px] login-width h-[50px] sign-in-button sign-in"
                            href="{{ route('login') }}" target="_top"><span>{{ __("Login") }}</span></a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</header>
