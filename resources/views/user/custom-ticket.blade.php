@extends('layouts.user_master')
@section('page_title', __('Custom ticket'))
@section('content')
    <div class="w-[68.9%] 6xl:w-[85.9%] dark:bg-[#292929] flex flex-col flex-1 border-l dark:border-[#474746] border-color-DF">
        <div class="w-full xl:flex">
            <div class="xl:bg-[#F6F3F2] xl:dark:bg-[#3A3A39] xl:!w-[401px] 5xl:!w-[474px] sidebar-scrollbar xl:overflow-auto xl:h-screen pt-14">
                <div>
                    <div class="flex gap-1.5 justify-between items-center bg-[#F6F3F2] dark:bg-[#3A3A39] px-5 py-6 xl:my-0 xl:p-6">
                        <p class="text-color-14 font-RedHat font-semibold text-[20px] leading-7 dark:text-white wrap-anywhere">Ticket #854</p>
                        <div class="xl:hidden flex gap-1.5 justify-center items-center cursor-pointer" id="accordionToggle">
                            <p class="font-Figtree text-[13px] font-medium leading-5 text-color-89">Show details</p>
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8"
                                fill="none">
                                <g clip-path="url(#clip0_8817_4934)">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.714747 2.43209C0.52347 2.62735 0.52347 2.94394 0.714747 3.1392L3.65352 6.1392C3.8448 6.33446 4.15492 6.33446 4.3462 6.1392L7.28497 3.1392C7.47625 2.94394 7.47625 2.62735 7.28497 2.43209C7.0937 2.23683 6.78358 2.23683 6.5923 2.43209L3.99986 5.07854L1.40742 2.43209C1.21615 2.23683 0.906024 2.23683 0.714747 2.43209Z" fill="#898989" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_8817_4934">
                                        <rect width="8" height="8" fill="white"
                                            transform="matrix(-4.37114e-08 1 1 4.37114e-08 0 0)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="hidden xl:block bg-[#F6F3F2] dark:bg-[#3A3A39] px-5 pb-6 pt-0 xl:px-6"
                        id="accordionContent">
                        <div class="gap-4 flex flex-col">
                            <div class="bg-white dark:bg-[#474746] border border-color-DF dark:border-[#474746]  cursor-pointer rounded-xl">
                                <div class="p-4 flex justify-between items-center gap-3">
                                    <p class="font-medium font-Figtree leading-[22px] text-[15px] text-color-89 break-words">{{ __('Status') }}</p>
                                    <p class="font-medium font-Figtree leading-[22px] text-[15px] text-[#3C904F] break-words">{{ __('Open') }}</p>
                                </div>
                            </div>
                            <div class="bg-white dark:bg-[#474746] border border-color-DF dark:border-[#474746]  cursor-pointer rounded-xl">
                                <div class="p-4 flex justify-between items-center gap-3">
                                    <p class="font-medium font-Figtree leading-[22px] text-[15px] text-color-89 break-words">{{ __('Department') }}</p>
                                    <p class="font-medium font-Figtree leading-[22px] text-[15px] text-color-14 dark:text-white break-words">{{ __('Image Maker') }}</p>
                                </div>
                            </div>
                            <div class="bg-white dark:bg-[#474746] border border-color-DF dark:border-[#474746]  cursor-pointer rounded-xl">
                                <div class="p-4 flex justify-between items-center gap-3">
                                    <p class="font-medium font-Figtree leading-[22px] text-[15px] text-color-89 break-words">{{ __('Priority') }}</p>
                                    <p class="font-medium font-Figtree leading-[22px] text-[15px] text-color-14 dark:text-white break-words">{{ __('High') }}</p>
                                </div>
                            </div>
                            <div class="bg-white dark:bg-[#474746] border border-color-DF dark:border-[#474746]  cursor-pointer rounded-xl">
                                <div class="p-4">
                                    <p class="font-medium font-Figtree leading-[22px] text-[15px] text-color-89 break-words">{{ __('Subject ') }}</p>
                                    <p class="font-medium mt-1.5 font-Figtree leading-[22px] text-[15px] text-color-14 dark:text-white break-words">{{ __('Stable diffusion not working.') }}</p>
                                </div>
                            </div>
                            <div class="bg-white dark:bg-[#474746] border border-color-DF dark:border-[#474746]  cursor-pointer rounded-xl">
                                <div class="p-4">
                                    <p class="font-medium font-Figtree leading-[22px] text-[15px] text-color-89 break-words">{{ __('Message') }}</p>
                                    <p class="font-medium mt-1.5 font-Figtree leading-[22px] text-[15px] text-color-14 dark:text-white break-words">{{ __('I worked so hard and got so far but in the end it does’nt even matter. I had to fall to lose it all but in the end, it doesnt even matterrrrr....') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grow xl:pt-14 pr-1.5 h-screen dark:bg-[#292929] xl:w-1/2">
                <div class="font-Figtree h-full flex flex-col justify-between">
                    <div class="sidebar-scrollbar overflow-auto h-full pb-3">
                        <div class="hidden xl:block">
                            <div class="xl:fixed w-full dark:bg-[#292929] bg-white">
                                <p class="xl:pl-6 pl-5 pt-6 font-semibold text-color-14 dark:text-white text-20 pb-3">
                                    {{ __('Messages') }}</p>
                                <div class="border-b border-color-DF dark:border-[#474746]"></div>
                            </div>
                        </div>
                        <div class="9xl:px-[240px] 7xl:px-44 5xl:px-20 xl:px-6 px-5 xl:pt-[70px]">
                            <div class="sender-container flex gap-3 mt-7">
                                <div>
                                    <p class="text-color-89 text-right font-medium text-[12px] leading-4 mb-1">{{ __('just now')}}
                                    </p>
                                    <p class="bg-color-3A dark:bg-[#474746] p-4 rounded-lg text-white font-Figtree font-normal text-sm text-right wrap-anywhere"> Can I worked so hard and got so far but in the end it does’nt even matter. I had to fall to lose it all but in the end, it doesnt even matterrrrr....</p>
                                </div>
                                <img class="w-10 h-10 rounded-full" src="{{ asset('public/assets/image/sender-profile.png') }}"alt="{{ __('Image') }}">
                            </div>
                            <div class="receiver-container flex gap-3 mt-7">
                                <img class="w-10 h-10 rounded-full" src="{{ asset('public/assets/image/sender-profile.png') }}"alt="{{ __('Image') }}">
                                <div>
                                    <p class="text-color-89 text-left font-medium text-[12px] leading-4 mb-1">4 Jul 2023,
                                        6:30 PM
                                    </p>
                                    <div>
                                        <p class="bg-[#F9F7F7] dark:bg-[#333332] p-4 rounded-lg text-color-14 dark:text-white font-Figtree font-normal text-sm text-left wrap-anywhere">
                                            Can I worked so hard and got so far but in the end it does’nt even matter. I had to fall to lose it all but in the end, it doesnt even matterrrrr....</p>
                                        <div class="py-1 px-[15px] border border-color-89 rounded-lg w-max mt-1 mr-auto">
                                            <div class="flex gap-1 justify-center items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none">
                                                        <g clip-path="url(#clip0_8817_4862)">
                                                            <path d="M7.80319 3.83266L7.04194 3.07216L3.23569 6.87766C3.08578 7.02761 2.96688 7.20562 2.88577 7.40153C2.80467 7.59743 2.76294 7.80739 2.76297 8.01942C2.76301 8.23146 2.8048 8.4414 2.88598 8.63728C2.96715 8.83316 3.08611 9.01113 3.23606 9.16103C3.38602 9.31094 3.56403 9.42984 3.75993 9.51095C3.95584 9.59206 4.1658 9.63378 4.37783 9.63375C4.58986 9.63371 4.79981 9.59192 4.99568 9.51075C5.19156 9.42957 5.36953 9.31061 5.51944 9.16066L10.0869 4.59391C10.5916 4.08917 10.875 3.40463 10.875 2.69089C10.8749 1.97715 10.5913 1.29268 10.0866 0.788035C9.58182 0.283394 8.89729 -7.03131e-05 8.18355 1.30825e-08C7.46981 7.03392e-05 6.78533 0.28367 6.28069 0.78841L1.48519 5.58316L1.47469 5.59291C0.00843748 7.05916 0.00843748 9.43516 1.47469 10.9007C2.94094 12.3662 5.31694 12.3662 6.78319 10.9007L6.79294 10.8902L6.79369 10.8909L10.0674 7.61791L9.30619 6.85741L6.03244 10.1297L6.02269 10.1394C5.52029 10.6408 4.83949 10.9224 4.12969 10.9224C3.41989 10.9224 2.73909 10.6408 2.23669 10.1394C1.98766 9.88984 1.79034 9.59356 1.65605 9.26757C1.52176 8.94158 1.45313 8.59229 1.45411 8.23973C1.45508 7.88717 1.52564 7.53826 1.66173 7.21302C1.79783 6.88778 1.99678 6.5926 2.24719 6.34441L2.24644 6.34366L7.04269 1.54891C7.67194 0.91891 8.69644 0.91891 9.32644 1.54891C9.95644 2.17891 9.95569 3.20266 9.32644 3.83191L4.75894 8.39866C4.65672 8.49268 4.52213 8.54358 4.38328 8.54071C4.24442 8.53785 4.11204 8.48145 4.01379 8.38329C3.91554 8.28513 3.85901 8.15281 3.85601 8.01396C3.853 7.87511 3.90377 7.74047 3.99769 7.63816L7.80394 3.83191L7.80319 3.83266Z" fill="#898989" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_8817_4862">
                                                                <rect width="12" height="12" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <p class="text-color-14 dark:text-white font-medium font-Figtree text-[11px] leading-5 wrap-anywhere">Sample-document.pdf</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="sender-container flex gap-3 mt-7">
                                <div>
                                    <p class="text-color-89 text-right font-medium text-[12px] leading-4 mb-1">just now</p>
                                    <div>
                                        <p class="bg-color-3A p-4 rounded-lg text-white font-Figtree font-normal text-sm text-right wrap-anywhere">
                                            Can I worked so hard and got so far but in the end it does’nt even matter. I had to fall to lose it all but in the end, it doesnt even matterrrrr....</p>
                                        <div class="py-1 px-[15px] border border-color-89 rounded-lg w-max mt-1 ml-auto">
                                            <div class="flex gap-1 justify-center items-center">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none">
                                                        <g clip-path="url(#clip0_8817_4862)">
                                                            <path d="M7.80319 3.83266L7.04194 3.07216L3.23569 6.87766C3.08578 7.02761 2.96688 7.20562 2.88577 7.40153C2.80467 7.59743 2.76294 7.80739 2.76297 8.01942C2.76301 8.23146 2.8048 8.4414 2.88598 8.63728C2.96715 8.83316 3.08611 9.01113 3.23606 9.16103C3.38602 9.31094 3.56403 9.42984 3.75993 9.51095C3.95584 9.59206 4.1658 9.63378 4.37783 9.63375C4.58986 9.63371 4.79981 9.59192 4.99568 9.51075C5.19156 9.42957 5.36953 9.31061 5.51944 9.16066L10.0869 4.59391C10.5916 4.08917 10.875 3.40463 10.875 2.69089C10.8749 1.97715 10.5913 1.29268 10.0866 0.788035C9.58182 0.283394 8.89729 -7.03131e-05 8.18355 1.30825e-08C7.46981 7.03392e-05 6.78533 0.28367 6.28069 0.78841L1.48519 5.58316L1.47469 5.59291C0.00843748 7.05916 0.00843748 9.43516 1.47469 10.9007C2.94094 12.3662 5.31694 12.3662 6.78319 10.9007L6.79294 10.8902L6.79369 10.8909L10.0674 7.61791L9.30619 6.85741L6.03244 10.1297L6.02269 10.1394C5.52029 10.6408 4.83949 10.9224 4.12969 10.9224C3.41989 10.9224 2.73909 10.6408 2.23669 10.1394C1.98766 9.88984 1.79034 9.59356 1.65605 9.26757C1.52176 8.94158 1.45313 8.59229 1.45411 8.23973C1.45508 7.88717 1.52564 7.53826 1.66173 7.21302C1.79783 6.88778 1.99678 6.5926 2.24719 6.34441L2.24644 6.34366L7.04269 1.54891C7.67194 0.91891 8.69644 0.91891 9.32644 1.54891C9.95644 2.17891 9.95569 3.20266 9.32644 3.83191L4.75894 8.39866C4.65672 8.49268 4.52213 8.54358 4.38328 8.54071C4.24442 8.53785 4.11204 8.48145 4.01379 8.38329C3.91554 8.28513 3.85901 8.15281 3.85601 8.01396C3.853 7.87511 3.90377 7.74047 3.99769 7.63816L7.80394 3.83191L7.80319 3.83266Z" fill="#898989" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_8817_4862">
                                                                <rect width="12" height="12" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </span>
                                                <p class="text-color-14 dark:text-white font-medium font-Figtree text-[11px] leading-5 wrap-anywhere">Sample-document.pdf</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <img class="w-10 h-10 rounded-full" src="{{ asset('public/assets/image/sender-profile.png') }}"alt="{{ __('Image') }}">
                            </div>
                            <div class="receiver-container flex gap-3 mt-7">
                                <img class="w-10 h-10 rounded-full" src="{{ asset('public/assets/image/sender-profile.png') }}"alt="{{ __('Image') }}">
                                <div>
                                    <p class="text-color-89 text-left font-medium text-[12px] leading-4 mb-1">4 Jul 2023,
                                        6:30 PM</p>
                                    <p class="bg-[#F9F7F7] dark:bg-[#333332] p-4 rounded-lg text-color-14 dark:text-white font-Figtree font-normal text-sm text-left wrap-anywhere">
                                        Can I worked so hard and got so far but in the end it does’nt even matter. I had to fall to lose it all but in the end, it doesnt even matterrrrr....</p>
                                </div>
                            </div>
                            <div class="sender-container flex gap-3 mt-7">
                                <div>
                                    <p class="text-color-89 text-right font-medium text-[12px] leading-4 mb-1">just now</p>
                                    <p class="bg-color-3A p-4 rounded-lg text-white font-Figtree font-normal text-sm text-right wrap-anywhere">
                                        Can I worked so hard and got so far but in the end it does’nt even matter. I had to fall to lose it all but in the end, it doesnt even matterrrrr....</p>
                                </div>
                                <img class="w-10 h-10 rounded-full" src="{{ asset('public/assets/image/sender-profile.png') }}"alt="{{ __('Image') }}">
                            </div>
                            <div class="receiver-container flex gap-3 mt-7">
                                <img class="w-10 h-10 rounded-full" src="{{ asset('public/assets/image/sender-profile.png') }}"alt="{{ __('Image') }}">
                                <div>
                                    <p class="text-color-89 text-left font-medium text-[12px] leading-4 mb-1">4 Jul 2023,
                                        6:30 PM</p>
                                    <p class="bg-[#F9F7F7] dark:bg-[#333332] p-4 rounded-lg text-color-14 dark:text-white font-Figtree font-normal text-sm text-left wrap-anywhere">
                                        Can I worked so hard and got so far but in the end it does’nt even matter. I had to fall to lose it all but in the end, it doesnt even matterrrrr....</p>
                                </div>
                            </div>
                            <div class="sender-container flex gap-3 mt-7">
                                <div>
                                    <p class="text-color-89 text-right font-medium text-[12px] leading-4 mb-1">just now</p>
                                    <p class="bg-color-3A p-4 rounded-lg text-white font-Figtree font-normal text-sm text-right wrap-anywhere">
                                        Can I worked so hard and got so far but in the end it does’nt even matter. I had to fall to lose it all but in the end, it doesnt even matterrrrr....</p>
                                </div>
                                <img class="w-10 h-10 rounded-full" src="{{ asset('public/assets/image/sender-profile.png') }}"alt="{{ __('Image') }}">
                            </div>
                            <div class="receiver-container flex gap-3 mt-7">
                                <img class="w-10 h-10 rounded-full"
                                    src="{{ asset('public/assets/image/sender-profile.png') }}"alt="{{ __('Image') }}">
                                <div>
                                    <p class="text-color-89 text-left font-medium text-[12px] leading-4 mb-1">4 Jul 2023,
                                        6:30 PM</p>
                                    <p class="bg-[#F9F7F7] dark:bg-[#333332] p-4 rounded-lg text-color-14 dark:text-white font-Figtree font-normal text-sm text-left wrap-anywhere">
                                        Can I worked </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="border-b border-color-DF dark:border-[#474746]"></div>
                        <div class="9xl:px-[240px] 7xl:px-44 5xl:px-20 xl:px-6 px-5 pt-6 7xl:pb-6 pb-[110px]">
                            <div class="border border-color-89 rounded-xl p-3">
                                <textarea class="py-0 text-base overflow-y-scroll middle-sidebar-scroll leading-6 font-light !text-color-14 dark:!text-white bg-white dark:bg-[#292929] bg-clip-padding bg-no-repeat border border-none dark:!border-none mx-auto focus:text-color-14 focus:bg-white focus:border-none focus:dark:!border-none focus:outline-none px-0 outline-none form-control w-full" placeholder="{{ __('Type your message..') }}"></textarea>
                                <div class="flex justify-end items-center mt-2 gap-[18px]">
                                    <div class="flex justify-end gap-2 items-end">
                                        <div id="selectedFileName"
                                            class="text-color-14 dark:text-white text-[11px] font-Figtree font-medium">
                                        </div>
                                        <input type="file" id="fileInput" class="hidden" onchange="displayFileName()">
                                        <label for="fileInput" class="cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 20 20" fill="none">
                                                <g clip-path="url(#clip0_8364_4164)">
                                                    <path d="M13.0053 6.38728L11.7366 5.11978L5.39281 11.4623C5.14297 11.7122 4.94481 12.0089 4.80962 12.3354C4.67444 12.6619 4.6049 13.0118 4.60495 13.3652C4.60501 13.7186 4.67467 14.0685 4.80996 14.395C4.94525 14.7214 5.14352 15.0181 5.39344 15.2679C5.64336 15.5177 5.94004 15.7159 6.26655 15.8511C6.59306 15.9863 6.94299 16.0558 7.29638 16.0558C7.64976 16.0557 7.99968 15.986 8.32614 15.8508C8.6526 15.7155 8.94922 15.5172 9.19906 15.2673L16.8116 7.65603C17.6526 6.81479 18.1251 5.6739 18.125 4.48434C18.1248 3.29477 17.6522 2.15397 16.8109 1.3129C15.9697 0.471836 14.8288 -0.00060547 13.6392 -0.000488259C12.4497 -0.000371049 11.3089 0.472295 10.4678 1.31353L2.47531 9.30478L2.45781 9.32103C0.0140625 11.7648 0.0140625 15.7248 2.45781 18.1673C4.90156 20.6098 8.86156 20.6098 11.3053 18.1673L11.3216 18.1498L11.3228 18.151L16.7791 12.696L15.5103 11.4285L10.0541 16.8823L10.0378 16.8985C9.20048 17.7342 8.06581 18.2035 6.88281 18.2035C5.69982 18.2035 4.56514 17.7342 3.72781 16.8985C3.31276 16.4826 2.9839 15.9888 2.76008 15.4455C2.53626 14.9022 2.42188 14.32 2.42351 13.7324C2.42514 13.1448 2.54273 12.5633 2.76956 12.0212C2.99638 11.4791 3.32797 10.9872 3.74531 10.5735L3.74406 10.5723L11.7378 2.58103C12.7866 1.53103 14.4941 1.53103 15.5441 2.58103C16.5941 3.63103 16.5928 5.33728 15.5441 6.38603L7.93156 13.9973C7.76120 14.1540 7.53688 14.2388 7.30546 14.2340C7.07404 14.2293 6.85341 14.1353 6.68965 13.9717C6.52589 13.8081 6.43168 13.5875 6.42667 13.3561C6.42167 13.1247 6.50628 12.9003 6.66281 12.7298L13.0066 6.38603L13.0053 6.38728Z" fill="#898989" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_8364_4164">
                                                        <rect width="20" height="20" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </label>
                                    </div>
                                    <a class="magic-bg w-max rounded-lg text-[13px] text-white font-semibold py-2 px-6 flex text-center font-Figtree leading-5 cursor-pointer" href="javascript: void(0)"><span>{{ __('Reply') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/assets/js/user/custom-ticket-user.min.js') }}"></script>
@endsection
