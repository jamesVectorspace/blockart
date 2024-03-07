@extends('layouts.user_master')
@section('page_title', __('Team Members'))
@section('content')
<div class="w-[68.9%] 7xl:w-[83.9%] dark:bg-[#292929] flex flex-col flex-1 border-l dark:border-[#474746] border-color-DF h-screen">
    <div class="xl:flex justify-between subscription-main md:overflow-auto sidebar-scrollbar h-screen">
        @include('user.includes.account-sidebar')
        <div class="grow xl:pl-6 px-5 xl:pt-[74px] md:pt-5 pt-[74px] pb-24 dark:bg-[#292929] xl:overflow-auto sidebar-scrollbar 8xl:pr-[84px] main-profile-content xl:w-1/2">
            <div class="flex justify-start items-center font-Figtree text-color-14 dark:text-white text-15 font-normal gap-2.5 md:hidden pb-4">
                <a class="profile-back cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.875 6C15.875 5.68934 15.6232 5.4375 15.3125 5.4375L2.0455 5.4375L5.58525 1.89775C5.80492 1.67808 5.80492 1.32192 5.58525 1.10225C5.36558 0.882582 5.00942 0.882582 4.78975 1.10225L0.289752 5.60225C0.0700827 5.82192 0.0700827 6.17808 0.289752 6.39775L4.78975 10.8977C5.00942 11.1174 5.36558 11.1174 5.58525 10.8977C5.80492 10.6781 5.80492 10.3219 5.58525 10.1023L2.0455 6.5625L15.3125 6.5625C15.6232 6.5625 15.875 6.31066 15.875 6Z"
                            fill="currentColor" />
                    </svg>
                </a>
                <span>{{ __('Team Members') }}</span>
            </div>
            <div>
                <p class="font-semibold text-color-14 dark:text-white text-20 pb-3 pt-1.5">{{ __('Team Members')}}
                    @if(teamMemberAccountSidebarAccess(Auth::user()->id) && subscription('isSubscribed', Auth::user()->id))
                    <a href="javascript: void(0)" class="open-member-link-modal float-right px-2.5 py-1.5 border text-color-14 dark:text-white xs:text-15 text-14 font-medium border-color-DF dark:border-[#474746] bg-color-F6 dark:bg-[#333332] rounded-xl">
                        {{ __('Member Registration')}}
                    </a>
                @endif
                </p>
                <div class="border-b border-color-DF dark:border-[#474746]"></div>
            </div>
            <div class="bg-white dark:bg-[#292929] rounded-xl image-list-table border border-color-DF dark:border-color-47 mt-[22px] xl:w-[430px] 3xl:w-[600px] 4xl:w-[645px] 5xl:w-full bill-table overflow-hidden">
                <div class="flex flex-col">
                    <div class="rounded-xl p-3 overflow-x-auto overflow-y-hidden">
                        <table class="min-w-full">
                            <thead class="bg-color-DF dark:bg-[#474746] rounded-xl">
                                <tr class="rounded-lg">
                                    <th
                                        class="5xl:px-[34px] px-3 py-[9px] text-left font-Figtree text-14 font-medium text-color-14 dark:text-white">
                                        {{ __('Name') }}
                                    </th>
                                    <th
                                        class="5xl:px-6 px-3 py-[9px] font-Figtree text-left text-14 font-medium text-color-14 dark:text-white">
                                        {{ __('Email') }}
                                    </th>
                                    
                                    <th
                                        class="5xl:px-6 px-3 py-[9px] text-left font-Figtree text-14 font-medium text-color-14 dark:text-white">
                                        {{ __('Status') }}
                                    </th>
                                    <th
                                        class="5xl:px-6 px-3 py-[9px] text-left font-Figtree text-14 font-medium text-color-14 dark:text-white">
                                        {{ __('Usages') }}
                                    </th>
                                    
                                    <th
                                        class="5xl:px-10 px-3 py-[9px] text-right font-Figtree text-14 font-medium text-color-14 dark:text-white w-max">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($teamMembers as $member)
                                    <tr class="border-b dark:border-[#474746]">
                                        <td 
                                            class="text-14 font-Figtree py-[22px] text-color-14 dark:text-white font-normal 5xl:pl-[34px] 5xl:pr-0 px-3">
                                            {{ $member->user->name }}
                                        </td>
                                        <td
                                            class="text-14 font-Figtree py-[22px] text-color-14 dark:text-white font-normal 5xl:px-6 px-3 sm:w-40">
                                            {{ $member->user->email }}
                                        </td>
                                        <td
                                            class="text-14 font-Figtree py-[22px] text-color-14 dark:text-white font-normal 5xl:px-6 px-3 sm:w-40 whitespace-nowrap hidden xl:table-cell">
                                            {{ $member->status }}
                                        </td>
                                        <td class="text-14 font-Figtree py-[22px] text-color-14 dark:text-white font-normal 5xl:px-6 px-3 sm:w-40 whitespace-nowrap hidden xl:table-cell">
                                            @foreach ($member->memberMeta as $user)
                                            
                                            
                                                {!! ucfirst(str_replace('_', ' ', $user->field)) !!} :
                                                {!! $user->value !!}<br>
                                            
                                            
                                            @endforeach 
                                        </td>
                                        <td
                                            class="text-14 font-Figtree py-[22px] text-color-14 font-medium 5xl:pr-[30px] 5xl:pl-0 px-3">
                                            <div class="flex sm:gap-4 gap-3.5 justify-end items-center 8xl:mr-2.5">
                                                <div class="relative flex gap-1.5">
                                                    <a class="docs-tooltip-edit flex items-center border border-color-89 dark:border-color-47 text-color-14 dark:text-white bg-white dark:bg-color-47 p-2 rounded-lg justify-center" title="{{ __('Edit')}}" href="{{ route('user.subscription.teamMemberEdit', ['id' => $member->id]) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M2.73266 10.0443L2.01789 13.1291C1.99323 13.2419 1.99407 13.3587 2.02036 13.4711C2.04665 13.5835 2.09771 13.6886 2.16982 13.7787C2.24193 13.8689 2.33326 13.9418 2.43715 13.9921C2.54104 14.0424 2.65485 14.0689 2.77028 14.0696C2.82407 14.075 2.87826 14.075 2.93205 14.0696L6.03568 13.3548L11.9947 7.41841L8.66906 4.10034L2.73266 10.0443Z" fill="currentColor"/>
                                                            <path d="M13.8682 4.44626L11.6486 2.22669C11.5027 2.0815 11.3052 2 11.0993 2C10.8935 2 10.696 2.0815 10.5501 2.22669L9.31616 3.46062L12.638 6.78245L13.8719 5.54852C13.9441 5.47594 14.0013 5.38984 14.0402 5.29514C14.0791 5.20043 14.099 5.09899 14.0986 4.99661C14.0983 4.89423 14.0777 4.79292 14.0382 4.69849C13.9986 4.60405 13.9409 4.51834 13.8682 4.44626Z" fill="currentColor"/>
                                                        </svg>
                                                    </a>
                                                    <a href="javascript: void(0)"  class="docs-tooltip-delete flex items-center border border-color-89 dark:border-color-47 text-color-14 dark:text-white bg-white dark:bg-color-47 p-2 rounded-lg justify-center modal-toggle" title="{{ __('Delete')}}" id="{{ $member->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M3.84615 2.8C3.37884 2.8 3 3.15817 3 3.6V4.4C3 4.84183 3.37884 5.2 3.84615 5.2H4.26923V12.4C4.26923 13.2837 5.0269 14 5.96154 14H11.0385C11.9731 14 12.7308 13.2837 12.7308 12.4V5.2H13.1538C13.6212 5.2 14 4.84183 14 4.4V3.6C14 3.15817 13.6212 2.8 13.1538 2.8H10.1923C10.1923 2.35817 9.81347 2 9.34615 2H7.65385C7.18653 2 6.80769 2.35817 6.80769 2.8H3.84615ZM6.38462 6C6.61827 6 6.80769 6.17909 6.80769 6.4V12C6.80769 12.2209 6.61827 12.4 6.38462 12.4C6.15096 12.4 5.96154 12.2209 5.96154 12L5.96154 6.4C5.96154 6.17909 6.15096 6 6.38462 6ZM8.5 6C8.73366 6 8.92308 6.17909 8.92308 6.4V12C8.92308 12.2209 8.73366 12.4 8.5 12.4C8.26634 12.4 8.07692 12.2209 8.07692 12V6.4C8.07692 6.17909 8.26634 6 8.5 6ZM11.0385 6.4V12C11.0385 12.2209 10.849 12.4 10.6154 12.4C10.3817 12.4 10.1923 12.2209 10.1923 12V6.4C10.1923 6.17909 10.3817 6 10.6154 6C10.849 6 11.0385 6.17909 11.0385 6.4Z" fill="currentColor"/>
                                                        </svg>
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border-b dark:border-[#474746]">
                                        <td colspan="6" class="text-center text-14 font-Figtree py-[22px] text-color-14 dark:text-white font-normal 5xl:px-6 px-3 sm:w-40 whitespace-nowrap">
                                            {{ __('No record found') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal index-modal absolute z-50 top-0 left-0 right-0 w-full h-full">
                    <div class="modal-overlay fixed z-10 top-0 right-0 left-0 w-full h-full">
                    </div>
                    <div class="modal-wrapper  modal-wrapper modal-transition fixed inset-0 z-10">
                        <div class="modal-body flex h-full justify-center p-4 text-center items-center sm:p-0">
                            <div class="modal-content modal-transition rounded-xl py-6 md:px-[54px] bg-white dark:bg-color-3A px-8">
                                <p class="font-Figtree text-color-14 dark:text-white text-16 font-medium text-center">
                                {{ __('Are you sure you want to delete this Image?') }}</p>
                                <div class="flex justify-center items-center mt-7 gap-[16px]">
                                    <a href="javascript: void(0)"
                                        class="font-Figtree text-color-14 dark:text-white font-semibold text-15 py-[11px] px-[42px] border border-color-89 dark:border-color-47 bg-color-F6 dark:bg-color-47 rounded-xl modal-toggle">
                                        {{ __('Cancel') }}</a>
                                    <a href="javascript: void(0)"
                                        class="font-Figtree text-white font-semibold text-15 py-[11px] px-[30px] modal-toggle bg-color-DFF rounded-xl delete-member"
                                        >
                                        {{ __('Yes, Delete') }} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                {{ $teamMembers->links('site.layout.partials.pagination') }}
            </div>
            <div>
                <div class="fixed hidden items-center inset-0 bg-color-14 bg-opacity-50 overflow-y-auto z-50 member-link-modal">
                    <div class="relative md:mt-40 xl:mt-20 xxs:mx-auto mx-4 md:px-6 px-3 py-5 w-max rounded-xl bg-white dark:bg-[#3A3A39] modal-h modal-box-shadow transition-all ease-in-out"
                        id="modal-main">
                        <form name="memberLinkSendEmail" id="memberLinkSendEmail">
                            {!! csrf_field() !!}
                            <div class="member-link-show relative">
                                <p class="font-Figtree text-color-14 dark:text-white text-20 font-semibold text-left border-b border-color-DF dark:border-color-47 pb-3">
                                    {{ __('Member Invitation')}}</p>
                                <div class="mt-2 md:w-[426px]">
                                    <input class="border-color-DF dark:border-[#474746] dark:bg-[#333332] dark:text-white  px-4 py-3 mt-1.5 leading-6  font-normal text-base text-gray-10 form-control border-color-89 dark:!border-color-47 rounded-xl m-0 focus:text-color-14 focus:bg-white focus:!border-color-DF focus:dark:!border-color-47 focus:outline-none md:w-[418px] w-full email-placeholder-text-color mt-10" 
                                    placeholder="{{ __('Member Email')}}"
                                    type="email" 
                                    value="" 
                                    name="member_email"
                                    id="member_email" required
                                    oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"
                                    data-type-mismatch="{{ __('Enter a valid :x.', ['x' => strtolower(__('Email'))]) }}">
                                </div>
                                <p class="font-medium text-13 font-Figtree text-color-89 text-left mt-3"> 
                                    {{  __("Send a link to your member to join in your team") }}
                                </p>
                                <div class="flex justify-left items-center mt-6 gap-[16px] float-right">
                                    <button type="submit" class="font-Figtree flex gap-2 cursor-pointer verification-code-button-1 text-white font-semibold xs:text-14 text-12 py-[11px] xs:px-[26px] px-2.5 bg-color-14 rounded-xl"> 
                                        {{ __('Invite Member')}}
                                        <div class="loader-template member-loader hidden">
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
                                        </div>
                                    </button>
                                    <a href="javaScript:void(0);" class="font-Figtree modal-close-btn text-color-14 dark:text-white font-semibold text-12 xs:text-14 py-2.5 px-[42px] border border-color-89 dark:border-color-47 bg-color-F6 dark:bg-color-47 rounded-xl">{{ __('Cancel')}}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    "use strict";
    const MEMBER_INVITATION_EMAIL = "{{ route('user.memberEmailInvitation') }}";

</script>
<script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
<script src="{{ asset('public/dist/js/custom/subscription-team-list.min.js') }}"></script>
@endsection

