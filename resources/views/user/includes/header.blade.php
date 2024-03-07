<header>
    <div class="fixed top-0 right-0 left-0 w-full font-Figtree z-[99]">
        <nav
            class="flex h-[56px] items-center justify-between bg-color-2C transition-all duration-500 ease-in-out dark:bg-[#141414]">
            <div class="w-full h-[56px] flex items-center justify-between md:mx-5 gap-3">

                <div class="flex items-center justify-center">
                    <div class="w-[66px] h-[56px] mr-4 bg-[#464444] flex items-center justify-center md:hidden">
                        <svg class="collapse-icon pointer" width="26" height="26" viewBox="0 0 26 26" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 13H22M4 7H22M4 19H16" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </div>

                    <a href="{{ route('user.dashboard') }}" class="b-brand">
                        @php
                            $logo = App\Models\Preference::getLogo('company_logo');
                        @endphp
                        <img class="w-[104px] sm:w-[175px] h-7 sm:h-[42px] object-contain" width="104" height="28" src="{{ $logo }}" alt="{{ trimWords(preference('company_name'), 17)}}">
                    </a>
                </div>

                
                @includeIf('affiliate::layouts.includes.customer_panel_header')

                <div class="flex-1">
                    <div id="dropdowns-header" class="md:relative absolute top-1 md:top-0 right-[67px] md:right-1 flex justify-end items-center lg:gap-5 gap-3">
                        <div>
                            @php
                                $flag = config('app.locale');
                                $languages = \App\Models\Language::getAll()->where('status', 'Active');
                            @endphp
                            
                            @if ($languages->isNotEmpty())
                            <div class="cursor-pointer mt-3 md:mt-0 relative">
                                <a class="text-white text-16 cursor-pointer font-normal language-dropdown-click font-Figtree flex text-center gap-2 items-center justify-center">
                                    <img class="rounded-full cursor-pointer h-[18px] w-[18px] bg-white" src="{{ url("public/datta-able/fonts/flag/flags/4x3/" . getSVGFlag($flag) . ".svg") }}"
                                    alt="{{ __('Image') }}">
                                    <p> {{ ucFirst($flag) }} </p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="13" viewBox="0 0 12 13" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.64645 4.64605C2.45118 4.84131 2.45118 5.15789 2.64645 5.35316L5.64645 8.35316C5.84171 8.54842 6.15829 8.54842 6.35355 8.35316L9.35355 5.35316C9.54882 5.15789 9.54882 4.84131 9.35355 4.64605C9.15829 4.45079 8.84171 4.45079 8.64645 4.64605L6 7.2925L3.35355 4.64605C3.15829 4.45079 2.84171 4.45079 2.64645 4.64605Z" fill="white"/>
                                    </svg>
                                </a>
                                <div
                                    class="hidden origin-top-right md:top-9 py-2 top-7 absolute md:right-0 mx-auto md:mt-0 mt-2 w-[201px] border border-color-89 dark:border-color-47 rounded-lg bg-white dark:bg-color-29 z-50 language-drop-down dropdown-shadow language-dropdown max-h-[210px] overflow-auto sidebar-scrollbar">
                                    <div>
                                        @foreach($languages as $language)
                                            <a data-short-name="{{ $language->short_name }}" class="lang-change flex justify-start items-center gap-1.5 text-14 font-medium text-color-14 dark:text-white font-Figtree px-[15px] py-2 hover:bg-color-F6 dark:hover:bg-[#3A3A39]">
                                                <img class="rounded-full cursor-pointer h-[18px] w-[18px] bg-white" src="{{ url("public/datta-able/fonts/flag/flags/4x3/" . getSVGFlag($language->short_name) . ".svg") }}"
                                                alt="{{ __('Image') }}">
                                                <p>{{ $language->name }}</p>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                <div class="flex gap-1.5">
                    @php $memberHeaderData = \App\Http\Controllers\User\UserController::packages() @endphp
                    <div>
                        <div class="relative">
                            <a class="user-header-dropdown-click flex justify-center items-center gap-2 cursor-pointer">
                                <div class="text-white text-16 cursor-pointer font-normal font-Figtree flex text-center items-center justify-center rounded-full h-10 w-10 md:h-11 md:w-11 sign-in-button sign-in mr-2.5">
                                <img class="rounded-full h-9 w-9 md:h-10 md:w-10 cursor-pointer bg-white" src="{{ Auth::user()->fileUrl() }}"
                                alt="Avatar of User">
                                </div>
                                <p class="text-white text-16 font-semibold font-Figtree line-clamp-single hidden md:block">
                                    @php
                                    if(!empty($memberHeaderData['memberData']) && ($memberHeaderData['isMemberPackage'] === true || auth()->user()->hasCredit('word'))){
                                        echo session()->get('memberPackageData.packUserName');
                                    }else{
                                        echo trimWords(Auth::user()->name);
                                    }
                                    @endphp
                                </p>
                            </a>
                            <div
                                class="hidden origin-top-right md:top-14 top-[42px] absolute md:right-0 -right-[46px] mx-auto md:-mt-1 mt-2 w-[210px] border border-color-89 dark:border-color-3A rounded-lg bg-white dark:bg-color-47 z-50 user-header-drop-down dropdown-shadow landing-header-dropdown">
                                <div>
                                    @if(!empty($memberHeaderData['memberData']) && ($memberHeaderData['isMemberPackage'] === true || auth()->user()->hasCredit('word')))
                                    @foreach ($memberHeaderData['memberPackages'] as $memberPackage)
                                    
                                    <div class="pt-4 pb-2">
                                        <a data-member-package="{{ $memberPackage['id'] }}" 
                                        class="package-change cursor-pointer flex justify-start items-center gap-1.5 text-14 font-medium px-[18px] font-Figtree
                                        {{ $memberPackage['id'] == @$memberHeaderData['memberCurrentPackage']['packageUser'] ? 'text-[#059669] break-words' : 'text-color-14 dark:text-white' }}">
                                            <p class="{{ $memberPackage['id'] == @$memberHeaderData['memberCurrentPackage']['packageUser'] ? 'text-[#059669]' : 'wrap-anywhere' }}"> 
                                                {{ $memberPackage['package_name'] }} 
                                                {{$memberPackage['id'] == @$memberHeaderData['memberCurrentPackage']['packageUser']?'✓':''}}
                                            </p>
                                        </a>
                                    </div>
                                    @endforeach
                                    @endif 
                                    <div class="pt-2 pb-4 border-t border-color-DF dark:border-color-89">
                                        <a href="{{ route('users.logout') }}" class="flex justify-start items-center gap-1.5 break-words text-14 font-medium text-color-14 dark:text-white font-Figtree px-[18px]">
                                            <p class="wrap-anywhere">{{ __('Logout') }}</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<script>
    "use strict";

const USER_REDIRECT_DASHBOARD = "{{ route('user.dashboard') }}";
const MEMBER_SESSION_UPDATE = "{{ route('user.subscription.memberSessionUpdate') }}";

</script>
