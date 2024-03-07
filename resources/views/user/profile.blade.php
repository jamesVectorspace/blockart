@extends('layouts.user_master')
@section('page_title', __('Profile'))
@section('content')
    <div class="w-[68.9%] 6xl:w-[85.9%] dark:bg-[#292929] flex flex-col flex-1 border-l dark:border-[#474746] border-color-DF border-right">
        <div class="w-full xl:flex xl:h-full subscription-main md:overflow-auto sidebar-scrollbar h-screen">
            @include('user.includes.account-sidebar')
            <div class="grow xl:pl-6 px-5 8xl:pr-[84px] xl:pt-[74px] md:pt-5 pt-[74px] pb-[46px] dark:bg-[#292929] xl:overflow-auto sidebar-scrollbar main-profile-content md:h-screen xl:w-1/2">
                <div class="flex justify-start items-center font-Figtree text-color-14 dark:text-white text-15 font-normal gap-2.5 md:hidden pb-4">
                    <a class="profile-back cursor-pointer">
                        <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.875 6C15.875 5.68934 15.6232 5.4375 15.3125 5.4375L2.0455 5.4375L5.58525 1.89775C5.80492 1.67808 5.80492 1.32192 5.58525 1.10225C5.36558 0.882582 5.00942 0.882582 4.78975 1.10225L0.289752 5.60225C0.0700827 5.82192 0.0700827 6.17808 0.289752 6.39775L4.78975 10.8977C5.00942 11.1174 5.36558 11.1174 5.58525 10.8977C5.80492 10.6781 5.80492 10.3219 5.58525 10.1023L2.0455 6.5625L15.3125 6.5625C15.6232 6.5625 15.875 6.31066 15.875 6Z"
                                fill="currentColor" />
                        </svg>
                    </a> 
                    <span>{{ __('Profile') }}</span>
                </div>
                
                <div class="">
                    <p class="font-semibold text-color-14 dark:text-white text-20 pb-3">{{ __("Basic Details")}}</p>
                    <div class="border-b border-color-DF dark:border-[#474746]"></div>
                </div>
                <div class="mt-6 sm:mt-0  sm:py-6">
                    <div>
                        @php
                            $msg = __('This field is required.');
                        @endphp
                        <form class="mainForm" enctype='multipart/form-data' name="mainForm">
                            {!! csrf_field() !!}
                            <div class="flex items-center gap-6 ">
                                <span>
                                    <img id="frame" class="rounded-full w-[108px] h-[108px] dark:bg-white"
                                        src="{{ $user->fileUrl() }}"
                                        alt="{{ __('Image') }}">
                                </span>
                                <div class="cursor-pointer overflow-hidden relative">
                                    <button class="text-color-14 dark:text-white text-15 font-medium cursor-pointer">{{ __('Add Profile Picture') }}</button>
                                    <input class="cursor-pointer w-28 h-6 text-[0px] absolute left-0 top-0 opacity-0" type="file"
                                        onchange="preview()" name="image" id="image" />
                                </div>
                                
                            </div>
                            <div class="mt-6 md:w-[426px]">
                                <label class="text-14 font-nomrmal text-color-14 dark:text-white" for="email">{{ __('Email') }}</label>
                                <input class="border-color-DF dark:border-[#474746] dark:bg-[#333332] dark:text-white  px-4 py-3 mt-1.5 leading-6  font-normal text-base text-color-14 opacity-90 form-control border-color-89 dark:!border-color-47 rounded-xl m-0 focus:text-color-14 focus:bg-white focus:!border-color-DF focus:dark:!border-color-47 focus:outline-none md:w-[418px] w-full email-placeholder-text-color" type="email" id="update_email" placeholder="{{ config('openAI.is_demo') ? 'xxxxxxx@xx.xx' : $user->email }}" disabled>
                            </div>
                            <div class="mt-6 md:w-[426px]">
                                <label class="text-14 font-nomrmal text-color-14 dark:text-white mb-1" for="name">{{ __('Name') }} </label>
                                <input class="border-color-DF dark:border-[#474746] dark:bg-[#333332] dark:text-white  px-4 py-3 mt-1.5 leading-6 font-normal text-base text-gray-10 form-control border-color-89 dark:!border-color-47 rounded-xl m-0 focus:text-color-14 focus:bg-white focus:!border-color-DF focus:dark:!border-color-47 focus:outline-none md:w-[418px] w-full email-placeholder-text-color" type="text" id="name" name="name"
                                value="{{ $user->name }}" required oninvalid="this.setCustomValidity('{{ $msg }}')">
                            </div>
                            <div class="flex gap-[17px] items-center mt-6">
                                @if( empty($user->sso_service) )
                                <a class="px-3 open-password-modal sm:px-6 py-[13px] border text-color-14 dark:text-white xs:text-15 text-14 font-medium border-color-DF dark:border-[#474746] bg-color-F6 dark:bg-[#333332] rounded-xl"
                                    href="javascript: void(0)">{{ __('Change Password')}}</a>
                                @endif
                                <a href="javascript: void(0)"
                                    class="open-email-modal px-[30px] sm:px-6 py-[13px] border text-color-14 dark:text-white xs:text-15 text-14 font-medium border-color-DF dark:border-[#474746] bg-color-F6 dark:bg-[#333332] rounded-xl">{{ __('Change Email')}}</a>

                                
                            </div>
                            <div class="flex mt-6">
                                <button type="submit" class="px-6 py-[13px] update-profile-button flex item-center gap-3 border border-color-DF dark:border-[#474746] background-gradient-one rounded-xl text-15 font-semibold text-white"> {{ __('Update Profile') }}
                                    <div class="items-center update-profile-loader hidden">
                                        <svg class="animate-spin h-5 w-5 m-auto" xmlns="http://www.w3.org/2000/svg" width="72"
                                            height="72" viewBox="0 0 72 72" fill="none">
                                            <mask id="path-1-inside-1_1032_3036" fill="white">
                                                <path
                                                    d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z" />
                                            </mask>
                                            <path
                                                d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z"
                                                stroke="url(#paint0_linear_1032_3036)" stroke-width="24"
                                                mask="url(#path-1-inside-1_1032_3036)" />
                                            <defs>
                                                <linearGradient id="paint0_linear_1032_3036" x1="46.8123" y1="63.1382" x2="21.8195"
                                                    y2="6.73779" gradientUnits="userSpaceOnUse">
                                                    <stop offset="0" stop-color="#E60C84" />
                                                    <stop offset="1" stop-color="#FFCF4B" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </div>
                                </button>
                            </div>
                        </form>
                        <div class="fixed hidden items-center inset-0 bg-color-14 bg-opacity-50 overflow-y-auto z-50 password-modal">
                            <div class="relative md:mt-40 xl:mt-20 xxs:mx-auto mx-4 md:px-6 px-3 py-5 w-max rounded-xl bg-white dark:bg-[#3A3A39] modal-h modal-box-shadow transition-all ease-in-out" id="modal-main">
                                <form method="post" name="updatePasswordForm" id="updatePasswordForm">
                                    {!! csrf_field() !!}
                                    <div class="password-modal-container">
                                        <p class="font-Figtree text-color-14 dark:text-white text-20 font-semibold text-left border-b border-color-DF dark:border-color-47 pb-3">{{ __('Change Password')}}</p>
                                        <div>
                                            <p class="font-Figtree text-14 font-normal text-color-14 dark:text-white pt-6 text-left mb-1.5">{{ __('Current Password')}}</p>
                                            <div class="relative password-container">
                                                <div class="flex flex-col gap-2">
                                                    <input class="password password-field border-color-DF dark:border-[#474746] dark:bg-[#333332] dark:text-white px-4 py-3 mt-1.5 leading-6 font-normal text-base text-gray-10 form-control border-color-89 dark:!border-color-47 rounded-xl m-0 focus:text-color-14 focus:bg-white focus:!border-color-DF focus:dark:!border-color-47 focus:outline-none md:w-[418px] w-full" type="password" name="old_password" id="old_password" required oninvalid="this.setCustomValidity('{{ $msg }}')">
                                                </div>
                                                <a href="javascript: void(0)">
                                                    <svg class="absolute right-[14px] top-[15px] pass-eye" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g>
                                                            <path d="M9.99967 3.75C5.83301 3.75 2.27467 6.34167 0.833008 10C2.27467 13.6583 5.83301 16.25 9.99967 16.25C14.1663 16.25 17.7247 13.6583 19.1663 10C17.7247 6.34167 14.1663 3.75 9.99967 3.75ZM9.99967 14.1667C7.69967 14.1667 5.83301 12.3 5.83301 10C5.83301 7.7 7.69967 5.83333 9.99967 5.83333C12.2997 5.83333 14.1663 7.7 14.1663 10C14.1663 12.3 12.2997 14.1667 9.99967 14.1667ZM9.99967 7.5C8.61634 7.5 7.49967 8.61667 7.49967 10C7.49967 11.3833 8.61634 12.5 9.99967 12.5C11.383 12.5 12.4997 11.3833 12.4997 10C12.4997 8.61667 11.383 7.5 9.99967 7.5Z" fill="#898989"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath>
                                                                <rect width="20" height="20" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    <svg class="password-show absolute right-[14px] top-[15px]" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g>
                                                            <path d="M9.99967 3.75C5.83301 3.75 2.27467 6.34167 0.833008 10C2.27467 13.6583 5.83301 16.25 9.99967 16.25C14.1663 16.25 17.7247 13.6583 19.1663 10C17.7247 6.34167 14.1663 3.75 9.99967 3.75ZM9.99967 14.1667C7.69967 14.1667 5.83301 12.3 5.83301 10C5.83301 7.7 7.69967 5.83333 9.99967 5.83333C12.2997 5.83333 14.1663 7.7 14.1663 10C14.1663 12.3 12.2997 14.1667 9.99967 14.1667ZM9.99967 7.5C8.61634 7.5 7.49967 8.61667 7.49967 10C7.49967 11.3833 8.61634 12.5 9.99967 12.5C11.383 12.5 12.4997 11.3833 12.4997 10C12.4997 8.61667 11.383 7.5 9.99967 7.5Z" fill="#898989"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath>
                                                                <rect width="20" height="20" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>

                                                    <svg class="password-hide absolute right-[14px] top-[15px]" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.2706 2.47187C16.0262 2.2275 15.6312 2.2275 15.3868 2.47187L13.6593 4.19937C12.5662 3.75937 11.3456 3.47562 9.99932 3.47562C3.99994 3.47562 0.252442 9.29625 0.0961922 9.54437C0.00369221 9.69125 -0.0200578 9.86187 0.0161922 10.0187C-0.0138078 10.1675 0.00556721 10.3269 0.0911922 10.4669C0.178067 10.6094 1.41744 12.585 3.61744 14.2425L2.16557 15.6937C1.92119 15.9381 1.92119 16.3331 2.16557 16.5775C2.28744 16.6994 2.44744 16.7606 2.60744 16.7606C2.76744 16.7606 2.92744 16.6994 3.04932 16.5775L16.2706 3.35562C16.5143 3.11187 16.5143 2.71625 16.2706 2.47187ZM6.39932 9.96312C6.39932 7.97812 8.01432 6.36312 9.99932 6.36312C10.4443 6.36312 10.8693 6.44687 11.2624 6.59562L10.2243 7.63375C10.1493 7.62562 10.0762 7.61312 9.99932 7.61312C8.70369 7.61312 7.64932 8.6675 7.64932 9.96312C7.64932 10.04 7.66244 10.1131 7.66994 10.1881L6.63182 11.2262C6.48307 10.8337 6.39932 10.4081 6.39932 9.96312ZM19.9024 10.4556C19.7462 10.7031 15.9987 16.5244 9.99932 16.5244C8.43307 16.5244 7.03307 16.1437 5.81119 15.5762L8.26932 13.1175C8.78307 13.4006 9.37307 13.5625 9.99994 13.5625C11.9849 13.5625 13.5999 11.9475 13.5999 9.9625C13.5999 9.33562 13.4381 8.74625 13.1549 8.23187L15.9487 5.43812C18.4199 7.14937 19.8162 9.38125 19.9081 9.5325C19.9937 9.6725 20.0131 9.83187 19.9831 9.98062C20.0187 10.1387 19.9956 10.3087 19.9024 10.4556ZM9.21807 12.1694L12.2056 9.1825C12.2931 9.42812 12.3493 9.68875 12.3493 9.96375C12.3493 11.2594 11.2949 12.3137 9.99932 12.3137C9.72432 12.3131 9.46369 12.2569 9.21807 12.1694Z" fill="#898989"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        <div>
                                            <p class="font-Figtree text-14 font-normal text-color-14 dark:text-white pt-6 text-left mb-1.5">{{ __('Enter New Password')}}</p>
                                            <div class="relative password-container">
                                                <div class="flex flex-col gap-2">
                                                    <input class="password password-field border-color-DF dark:border-[#474746] dark:bg-[#333332] dark:text-white px-4 py-3 mt-1.5 leading-6 font-normal text-base text-gray-10 form-control border-color-89 dark:!border-color-47 rounded-xl m-0 focus:text-color-14 focus:bg-white focus:!border-color-DF focus:dark:!border-color-47 focus:outline-none md:w-[418px] w-full" type="password" name="new_password" id="new_password" required oninvalid="this.setCustomValidity('{{ $msg }}')">
                                                </div>
                                                <a href="javascript: void(0)">
                                                    <svg class="absolute right-[14px] top-[15px] pass-eye" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g>
                                                            <path d="M9.99967 3.75C5.83301 3.75 2.27467 6.34167 0.833008 10C2.27467 13.6583 5.83301 16.25 9.99967 16.25C14.1663 16.25 17.7247 13.6583 19.1663 10C17.7247 6.34167 14.1663 3.75 9.99967 3.75ZM9.99967 14.1667C7.69967 14.1667 5.83301 12.3 5.83301 10C5.83301 7.7 7.69967 5.83333 9.99967 5.83333C12.2997 5.83333 14.1663 7.7 14.1663 10C14.1663 12.3 12.2997 14.1667 9.99967 14.1667ZM9.99967 7.5C8.61634 7.5 7.49967 8.61667 7.49967 10C7.49967 11.3833 8.61634 12.5 9.99967 12.5C11.383 12.5 12.4997 11.3833 12.4997 10C12.4997 8.61667 11.383 7.5 9.99967 7.5Z" fill="#898989"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath>
                                                                <rect width="20" height="20" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    <svg class="password-show absolute right-[14px] top-[15px]" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g>
                                                            <path d="M9.99967 3.75C5.83301 3.75 2.27467 6.34167 0.833008 10C2.27467 13.6583 5.83301 16.25 9.99967 16.25C14.1663 16.25 17.7247 13.6583 19.1663 10C17.7247 6.34167 14.1663 3.75 9.99967 3.75ZM9.99967 14.1667C7.69967 14.1667 5.83301 12.3 5.83301 10C5.83301 7.7 7.69967 5.83333 9.99967 5.83333C12.2997 5.83333 14.1663 7.7 14.1663 10C14.1663 12.3 12.2997 14.1667 9.99967 14.1667ZM9.99967 7.5C8.61634 7.5 7.49967 8.61667 7.49967 10C7.49967 11.3833 8.61634 12.5 9.99967 12.5C11.383 12.5 12.4997 11.3833 12.4997 10C12.4997 8.61667 11.383 7.5 9.99967 7.5Z" fill="#898989"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath>
                                                                <rect width="20" height="20" fill="white"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>

                                                    <svg class="password-hide absolute right-[14px] top-[15px]" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M16.2706 2.47187C16.0262 2.2275 15.6312 2.2275 15.3868 2.47187L13.6593 4.19937C12.5662 3.75937 11.3456 3.47562 9.99932 3.47562C3.99994 3.47562 0.252442 9.29625 0.0961922 9.54437C0.00369221 9.69125 -0.0200578 9.86187 0.0161922 10.0187C-0.0138078 10.1675 0.00556721 10.3269 0.0911922 10.4669C0.178067 10.6094 1.41744 12.585 3.61744 14.2425L2.16557 15.6937C1.92119 15.9381 1.92119 16.3331 2.16557 16.5775C2.28744 16.6994 2.44744 16.7606 2.60744 16.7606C2.76744 16.7606 2.92744 16.6994 3.04932 16.5775L16.2706 3.35562C16.5143 3.11187 16.5143 2.71625 16.2706 2.47187ZM6.39932 9.96312C6.39932 7.97812 8.01432 6.36312 9.99932 6.36312C10.4443 6.36312 10.8693 6.44687 11.2624 6.59562L10.2243 7.63375C10.1493 7.62562 10.0762 7.61312 9.99932 7.61312C8.70369 7.61312 7.64932 8.6675 7.64932 9.96312C7.64932 10.04 7.66244 10.1131 7.66994 10.1881L6.63182 11.2262C6.48307 10.8337 6.39932 10.4081 6.39932 9.96312ZM19.9024 10.4556C19.7462 10.7031 15.9987 16.5244 9.99932 16.5244C8.43307 16.5244 7.03307 16.1437 5.81119 15.5762L8.26932 13.1175C8.78307 13.4006 9.37307 13.5625 9.99994 13.5625C11.9849 13.5625 13.5999 11.9475 13.5999 9.9625C13.5999 9.33562 13.4381 8.74625 13.1549 8.23187L15.9487 5.43812C18.4199 7.14937 19.8162 9.38125 19.9081 9.5325C19.9937 9.6725 20.0131 9.83187 19.9831 9.98062C20.0187 10.1387 19.9956 10.3087 19.9024 10.4556ZM9.21807 12.1694L12.2056 9.1825C12.2931 9.42812 12.3493 9.68875 12.3493 9.96375C12.3493 11.2594 11.2949 12.3137 9.99932 12.3137C9.72432 12.3131 9.46369 12.2569 9.21807 12.1694Z" fill="#898989"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>

                                        <p class="font-Figtree text-14 font-normal text-color-14 dark:text-white pt-6 text-left mb-1.5">{{ __('Repeat Password')}}</p>
                                        <div class="flex flex-col gap-2">
                                            <input class="border-color-DF dark:border-[#474746] dark:bg-[#333332] dark:text-white px-4 py-3 mt-1.5 leading-6 font-normal text-base text-gray-10 form-control border-color-89 dark:!border-color-47 rounded-xl m-0 focus:text-color-14 focus:bg-white focus:!border-color-DF focus:dark:!border-color-47 focus:outline-none md:w-[418px] w-full" type="password" name="confirm_password" id="confirm_password" required oninvalid="this.setCustomValidity('{{ $msg }}')">
                                        </div>

                                        <div class="flex justify-left items-center mt-6 gap-[16px]">
                                            <button type="submit" class="font-Figtree verification-code-button text-white font-semibold text-12 xs:text-14 py-[11px] px-[42px] bg-color-14 rounded-xl">{{ __('Update')}}
                                            </button>
                                            <a href="javaScript:void(0);" class="font-Figtree text-color-14 dark:text-white font-semibold xs:text-14 text-12 py-2.5 px-[42px] border border-color-89 dark:border-color-47 bg-color-F6 dark:bg-color-47 rounded-xl modal-close-btn" id="close-btn">{{ __('Cancel')}}</a>
                                        </div>
                                    </div>
                                </form>
                                <div class="loader-template mx-auto items-center dark:bg-color-3A absolute w-[90%] h-full top-0 flex flex-col justify-center !bg-opacity-50 bg-white password-loader hidden">
                                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="72"
                                    height="72" viewBox="0 0 72 72" fill="none">
                                    <mask id="path-1-inside-1_1032_3036" fill="white">
                                        <path
                                            d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z" />
                                    </mask>
                                    <path
                                        d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z"
                                        stroke="url(#paint0_linear_1032_3036)" stroke-width="24"
                                        mask="url(#path-1-inside-1_1032_3036)" />
                                    <defs>
                                        <linearGradient id="paint0_linear_1032_3036" x1="46.8123" y1="63.1382" x2="21.8195"
                                            y2="6.73779" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#E60C84" />
                                            <stop offset="1" stop-color="#FFCF4B" />
                                        </linearGradient>
                                    </defs>
                                    </svg>
                                    <p class="text-center text-color-14 dark:text-white text-12 font-normal font-Figtree ">{{ __('Processing..')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="fixed hidden items-center inset-0 bg-color-14 bg-opacity-50 overflow-y-auto z-50 profile-modal">
                            <div class="relative md:mt-40 xl:mt-20 xxs:mx-auto mx-4 md:px-6 px-3 py-5 w-max rounded-xl bg-white dark:bg-[#3A3A39] modal-h modal-box-shadow transition-all ease-in-out"
                                id="modal-main">
                                <form name="checkEmailForm" id="checkEmailForm">
                                    {!! csrf_field() !!}
                                    <div class="existing-mail-container relative">
                                        <p class="font-Figtree text-color-14 dark:text-white text-20 font-semibold text-left border-b border-color-DF dark:border-color-47 pb-3">
                                            {{ __('Change Email')}}</p>
                                        <p class="font-Figtree text-14 font-normal text-color-14 dark:text-white pt-6 text-left mb-1.5">{{ __('Verify existing email address')}}</p>
                                        <input class="border-color-DF dark:border-[#474746] dark:bg-[#333332] dark:text-white  px-4 py-3 mt-1.5 leading-6  font-normal text-base text-gray-10 form-control border-color-89 dark:!border-color-47 rounded-xl m-0 focus:text-color-14 focus:bg-white focus:!border-color-DF focus:dark:!border-color-47 focus:outline-none md:w-[418px] w-full email-placeholder-text-color" type="email" value="{{ config('openAI.is_demo') ? 'xxxxxxx@xx.xx' : $user->email }}" id="email" name="email" disabled>
                                        <p class="font-medium text-13 font-Figtree text-color-89 text-left mt-3"> {{  __("You will receive a verification :x to this email", ['x'=> ((preference('email') == 'both') ? __('Link & Code') : ( preference('email') == 'otp' ? __('Code') : __('Link') ))]) }}</p>
                                        <div class="flex justify-left items-center mt-6 gap-[16px]">
                                            <button type="submit" class="font-Figtree cursor-pointer verification-code-button-1 text-white font-semibold xs:text-14 text-12 py-[11px] xs:px-[26px] px-2.5 bg-color-14 rounded-xl"> {{ __("Send Verification :x", [ 'x' => ((preference('email') == 'both') ? __('Link & Code') : ( preference('email') == 'otp' ? __('Code') : __('Link') )) ]) }} </button>
                                            <a href="javaScript:void(0);" class="font-Figtree modal-close-btn text-color-14 dark:text-white font-semibold text-12 xs:text-14 py-2.5 px-[42px] border border-color-89 dark:border-color-47 bg-color-F6 dark:bg-color-47 rounded-xl">{{ __('Cancel')}}</a>
                                        </div>
                                    </div>
                                    <div class="loader-template mx-auto items-center dark:bg-color-3A absolute w-[90%] h-full top-0 flex flex-col justify-center !bg-opacity-50 bg-white email-loader hidden">
                                        <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="72"
                                        height="72" viewBox="0 0 72 72" fill="none">
                                        <mask id="path-1-inside-1_1032_3036" fill="white">
                                            <path
                                                d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z" />
                                        </mask>
                                        <path
                                            d="M67 36C69.7614 36 72.0357 38.2493 71.6534 40.9841C70.685 47.9121 67.7119 54.4473 63.048 59.7573C57.2779 66.3265 49.3144 70.5713 40.644 71.6992C31.9736 72.8271 23.1891 70.761 15.9304 65.8866C8.67173 61.0123 3.4351 53.6628 1.19814 45.2104C-1.03881 36.7579 -0.123172 27.7803 3.77411 19.9534C7.67139 12.1266 14.2839 5.98568 22.3772 2.67706C30.4704 -0.631565 39.4912 -0.881694 47.7554 1.97337C54.4353 4.28114 60.2519 8.49021 64.5205 14.0322C66.2056 16.2199 65.3417 19.2997 62.9417 20.6656L60.8567 21.8524C58.4567 23.2183 55.4379 22.3325 53.5977 20.2735C50.9338 17.2927 47.5367 15.0161 43.7066 13.6929C38.2888 11.8211 32.3749 11.9851 27.0692 14.1542C21.7634 16.3232 17.4284 20.3491 14.8734 25.4802C12.3184 30.6113 11.7181 36.4969 13.1846 42.0381C14.6511 47.5794 18.0842 52.3975 22.8428 55.5931C27.6014 58.7886 33.3604 60.1431 39.0445 59.4037C44.7286 58.6642 49.9494 55.8814 53.7321 51.5748C56.4062 48.5302 58.2325 44.8712 59.0732 40.9628C59.6539 38.2632 61.8394 36 64.6008 36H67Z"
                                            stroke="url(#paint0_linear_1032_3036)" stroke-width="24"
                                            mask="url(#path-1-inside-1_1032_3036)" />
                                        <defs>
                                            <linearGradient id="paint0_linear_1032_3036" x1="46.8123" y1="63.1382" x2="21.8195"
                                                y2="6.73779" gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-color="#E60C84" />
                                                <stop offset="1" stop-color="#FFCF4B" />
                                            </linearGradient>
                                        </defs>
                                        </svg>
                                        <p class="text-center text-color-14 dark:text-white text-12 font-normal font-Figtree ">{{ __('Processing..')}}</p>
                                    </div>
                                </form>

                                <form name="otpForm" id="otpForm">
                                    {!! csrf_field() !!}
                                    <div class="otp-container hidden">
                                        <p class="font-Figtree text-color-14 dark:text-white text-20 font-semibold text-left border-b border-color-DF dark:border-color-47 pb-3">
                                            {{ __('Change Email')}}</p>
                                        <p class="font-Figtree text-14 font-normal text-color-14 dark:text-white pt-6 text-left mb-1.5">{{ __('Enter code')}}</p>
                                        <div class='flex flex-col gap-2'>
                                            <input class="border-color-DF dark:border-[#474746] dark:bg-[#333332] dark:text-white px-4 py-3 mt-1.5 leading-6 font-normal text-base text-gray-10 form-control border-color-89 dark:!border-color-47 rounded-xl m-0 focus:text-color-14 focus:bg-white focus:!border-color-DF focus:dark:!border-color-47 focus:outline-none md:w-[418px] w-full" type="text" name="otp" id="otp" required oninvalid="this.setCustomValidity('{{ $msg }}')">
                                        </div>
                                        <p class="font-medium text-13 font-Figtree text-color-89 text-left mt-3">{{ __('You will receive a verification code to this email')}}</p>
                                        <div class="flex justify-left items-center mt-6 gap-[16px]">
                                            <button type="submit" class="font-Figtree verify-otp-button cursor-pointer text-white font-semibold text-14 py-[11px] px-[46px] bg-color-14 rounded-xl">{{ __('Verify')}}</button>
                                            <a href="javaScript:void(0);" class="font-Figtree modal-close-btn text-color-14 dark:text-white font-semibold text-14 py-2.5 px-[42px] border border-color-89 dark:border-color-47 bg-color-F6 dark:bg-color-47 rounded-xl" id="otpForm-close-btn">{{ __('Cancel')}}</a>
                                        </div>
                                    </div>
                                </form>

                                <form name="updateEmailForm" id="updateEmailForm">
                                    {!! csrf_field() !!}
                                    <div class="new-email-container hidden">
                                        <p class="font-Figtree text-color-14 dark:text-white text-20 font-semibold text-left border-b border-color-DF dark:border-color-47 pb-3">{{ __('Change Email')}}</p>
                                        <p class="font-Figtree text-14 font-normal text-color-14 dark:text-white pt-6 text-left mb-1.5">{{ __('Enter new email address')}}</p>
                                        <div class='flex flex-col gap-2'>
                                            <input class="border-color-DF dark:border-[#474746] dark:bg-[#333332] dark:text-white px-4 py-3 mt-1.5 leading-6 font-normal text-base text-gray-10 form-control border-color-89 dark:!border-color-47 rounded-xl m-0 focus:text-color-14 focus:bg-white focus:!border-color-DF focus:dark:!border-color-47 focus:outline-none md:w-[418px] w-full" type="email" name="new_email" id="new_email" required oninvalid="this.setCustomValidity('{{ $msg }}')">
                                        </div>
                                        <p class="font-medium text-13 font-Figtree text-color-89 text-left mt-3">{{ __('You will receive a verification code to this email')}}</p>
                                        <div class="flex justify-left items-center mt-6 gap-[16px]">
                                            <button type="submit" class="font-Figtree update-email-button cursor-pointer text-white font-semibold text-14 py-[11px] px-[46px] bg-color-14 rounded-xl">{{ __('Update')}}</button>
                                            <a href="javaScript:void(0);" class="font-Figtree modal-close-btn text-color-14 dark:text-white font-semibold text-14 py-2.5 px-[42px] border border-color-89 dark:border-color-47 bg-color-F6 dark:bg-color-47 rounded-xl" id="updateEmailForm-close-btn">{{ __('Cancel')}}</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const UPDATE_PROFILE = "{{ route('user.userProfileUpdate') }}";
        const VERIFY_EMAIL = "{{ route('user.userProfileEmailVerifyByAjax') }}";
        const MEMBER_INVITATION_EMAIL_FROFILE = "{{ route('user.memberEmailInvitation') }}";
        const VERIFY_OTP = "{{ route('user.userProfileOtpVerifyByAjax') }}";
        const UPDATE_EMAIL = "{{ route('user.userProfileUpdateEmailByAjax') }}";
        const UPDATE_PASSWORD = "{{ route('user.userProfileUpdatePassword') }}";
    </script>
    <script src="{{ asset('public/assets/js/user/profile.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
@endsection
