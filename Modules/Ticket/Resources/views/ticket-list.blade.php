@extends('layouts.user_master')
@section('page_title', __('Support ticket'))
@section('content')
<div class="dark:bg-[#292929] bg-[#F6F3F2] sidebar-scrollbar overflow-auto flex flex-col flex-1 font-Figtree border-l dark:border-[#474746] border-color-DF h-screen">
    <div class="9xl:px-[185px] 7xl:px-[140px] px-5 pt-[74px] 9xl:pb-[22px] pb-28">
        <div class="mt-2.5 mb-4 gap-3">
            <p class="font-semibold text-color-14 dark:text-white text-20 font-RedHat">
                {{ __('Support Tickets') }}
            </p>
           <div class="mt-5">
                <div class="flex gap-2 sm:items-center flex-wrap flex-col sm:flex-row ticket-select-container">
                    <form action="{{ route('user.searchList') }}" method="post" 
                        class="form-horizontal ticketForm button-need-disable flex gap-2 flex-wrap" enctype="multipart/form-data">
                        @csrf
                        <div class="font-normal custom-dropdown-arrow text-14 font-Figtree text-color-14 dark:text-white flex gap-1 flex-col">
                            <select name="priority_search" required class="select relative block w-[152px] text-base leading-6 font-medium text-color-FFR bg-white bg-clip-padding bg-no-repeat dark:bg-[#333332] rounded-xl dark:rounded-2xl m-0 focus:text-color-2C focus:bg-white focus:border-color-89 focus:outline-none">
                                <option value="all" >{{ __('All Priority')}}</option>
                                @foreach ( $priorities as $key => $priority)
                                    <option value="{{ $priority->id }}"
                                        {{$priority_search == $priority->id ? 'selected' : ''}}
                                        >{{ $priority->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        
                        <div class="font-normal custom-dropdown-arrow text-14 font-Figtree text-color-14 dark:text-white flex gap-1 flex-col">
                            <select id="status_search" name="status_search" class="select block w-[152px] text-base leading-6 font-medium text-color-FFR bg-white bg-clip-padding bg-no-repeat dark:bg-[#333332] rounded-xl dark:rounded-2xl m-0 focus:text-color-2C focus:bg-white focus:border-color-89 focus:outline-none">
                                <option value="all" >{{ __('All Status') }}</option>
                                @foreach ($statuses as $key => $status)
                                    <option value="{{ $status->id }}"
                                        {{ $status_search == $status->id? 'selected' : '' }}
                                        >{{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>  
                        <button type="submit" class="background-gradient-one w-max rounded-lg font-Figtree text-14 text-white font-medium px-7 py-[9px] flex justify-center items-center gap-2 ">
                            <span>
                                {{ __('Search') }}
                            </span>
                            <span class="items-center ticket-loader hidden">
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
                            </span>
                        </button>
                    </form>
                    <a class="magic-bg w-max rounded-lg font-Figtree text-14 text-white font-medium py-[9px] px-[27px] flex justify-center items-center gap-2 lg:ml-auto sm:mt-0 mt-3" href="{{route("user.ticketAdd")}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 1.75C7.24162 1.75 7.4375 1.94588 7.4375 2.1875V6.5625H11.8125C12.0541 6.5625 12.25 6.75838 12.25 7C12.25 7.24162 12.0541 7.4375 11.8125 7.4375H7.4375V11.8125C7.4375 12.0541 7.24162 12.25 7 12.25C6.75837 12.25 6.5625 12.0541 6.5625 11.8125V7.4375H2.1875C1.94588 7.4375 1.75 7.24162 1.75 7C1.75 6.75838 1.94588 6.5625 2.1875 6.5625H6.5625V2.1875C6.5625 1.94588 6.75838 1.75 7 1.75Z" fill="white"/>
                        </svg>
                        <span>
                            {{ __('New Ticket') }}
                        </span>
                    </a>
                </div>
           </div>
        </div>
        <div class="bg-white dark:bg-[#3A3A39] rounded-xl image-list-table">
            <div class="flex flex-col">
                <div class="xl:overflow-y-auto overflow-auto xs:overflow-y-hidden rounded-xl p-1.5">
                    <table class="min-w-full">
                        <thead class="bg-color-DF dark:bg-[#474746] rounded-xl">
                            <tr class="rounded-lg">
                                <th class="pl-3 lg:pl-[34px] md:pr-6 px-3 py-[9px] font-Figtree text-left text-14 font-medium text-color-14 md:w-[200px] w-28 dark:text-white">
                                    {{ __('Name') }}
                                </th>

                                <th
                                    class="xs:px-6 py-[9px] text-left font-Figtree text-14 font-medium text-color-14 dark:text-white hidden xl:table-cell">
                                    {{ __('Priority') }}
                                </th>
                                <th class="xs:px-6 py-[9px] text-left font-Figtree text-14 font-medium text-color-14 dark:text-white hidden lg:table-cell">
                                    {{ __('Last Reply') }}
                                </th>
                                <th class="xs:px-6 py-[9px] text-left font-Figtree text-14 font-medium text-color-14 dark:text-white ">
                                    {{ __('Status') }}
                                </th>
                               
                                <th class="pr-3 xl:pr-[34px] py-[9px] text-right font-Figtree text-14 font-medium text-color-14 dark:text-white w-max">
                                    {{ __('Actions') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($threads as $thread)
                            <tr class="border-b dark:border-[#474746]" id="document_{{ $thread->id }}">
                                <td class="text-14 font-Figtree py-[14px] text-color-14 dark:text-white font-medium md:pl-[34px] md:pr-6 px-3">
                                    <a href="javascript: void(0)" class="flex items-center justify-start">
                                        <span class="w-[138px] xs:w-[170px] min-[450px]:w-[215px] min-[550px]:w-[240px]
                                       sm:w-[300px] md:w-[170px] min-[850px]:w-[285px] lg:w-[300px] break-words flex items-center line-clamp-2">
                                            {{ $thread->subject }}
                                        </span>
                                    </a>

                                    <span class="text-[13px] font-Figtree text-color-89 font-medium mt-2 xl:hidden block break-words">
                                        {{ $thread->priority->name }}
                                    </span>
                                    <span class="text-[13px] font-Figtree text-color-89 font-medium mt-2 lg:hidden block">
                                    {{ timeToGo($thread->last_reply, false, 'ago') }}
                                    </span>
                                </td>

                                <td class="text-13 font-Figtree py-6 text-color-89 font-medium px-6 w-64 whitespace-nowrap hidden xl:table-cell">
                                    {{ $thread->priority->name }}
                                </td>
                                <td class="py-6 xs:px-3 sm:px-6 w-64 whitespace-nowrap align-top xl:align-middle hidden lg:table-cell">
                                    <div class="flex items-center flex-wrap gap-3">
                                        <p class="text-13 font-Figtree text-color-89 font-medium">{{ timeToGo($thread->last_reply, false, 'ago')}}</p>
                                    </div>
                                </td>

                                <td class="py-6 xs:px-3 sm:px-6 w-64 whitespace-nowrap align-top xl:align-middle">
                                    <div class="flex items-center flex-wrap gap-3">
                                        <p class="text-13 font-semibold font-Figtree w-max py-1 px-2.5 rounded-md text-[#763CD4] pending-bg">
                                        {{ $thread->threadStatus->name }}
                                        </p>
                                    </div>
                                </td>
                                <td class="text-14 font-Figtree py-6 text-color-14 dark:text-white font-medium pr-3 xl:pr-[34px] w-max align-top xl:align-middle text-right">
                                    <div class="gap-4 justify-end items-center hidden xl:flex">
                                        <div class="relative">
                                            <a class="tooltipSupport-edit flex items-center border border-color-89 dark:border-color-47 text-color-14 dark:text-white bg-white dark:bg-color-47 p-[7px] rounded-lg justify-center" title = "{{ __('View Ticket')}}"
                                                href="{{route("user.threadReply",$thread->id)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" viewBox="0 0 16 16" fill="none">
                                                    <g clip-path="url(#clip0_2387_1688)">
                                                        <path d="M7.99972 3C4.66638 3 1.81972 5.07333 0.666382 8C1.81972 10.9267 4.66638 13 7.99972 13C11.333 13 14.1797 10.9267 15.333 8C14.1797 5.07333 11.333 3 7.99972 3ZM7.99972 11.3333C6.15972 11.3333 4.66638 9.84 4.66638 8C4.66638 6.16 6.15972 4.66667 7.99972 4.66667C9.83972 4.66667 11.333 6.16 11.333 8C11.333 9.84 9.83972 11.3333 7.99972 11.3333ZM7.99972 6C6.89305 6 5.99972 6.89333 5.99972 8C5.99972 9.10667 6.89305 10 7.99972 10C9.10638 10 9.99972 9.10667 9.99972 8C9.99972 6.89333 9.10638 6 7.99972 6Z" fill="currentColor" />
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_2387_1688">
                                                            <rect width="16" height="16"
                                                                fill="white" />
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </a>
                                        </div>

                                    </div>
                                    <div class="relative xl:hidden inline-block">
                                        <button class="table-dropdown-click">
                                            <a href="javascript: void(0)" class="cursor-pointer p-2 bg-color-47 rounded-lg flex justify-end">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.5 13C9.5 13.8284 8.82843 14.5 8 14.5C7.17157 14.5 6.5 13.8284 6.5 13C6.5 12.1716 7.17157 11.5 8 11.5C8.82843 11.5 9.5 12.1716 9.5 13ZM9.5 8C9.5 8.82843 8.82843 9.5 8 9.5C7.17157 9.5 6.5 8.82843 6.5 8C6.5 7.17157 7.17157 6.5 8 6.5C8.82843 6.5 9.5 7.17157 9.5 8ZM9.5 3C9.5 3.82843 8.82843 4.5 8 4.5C7.17157 4.5 6.5 3.82843 6.5 3C6.5 2.17157 7.17157 1.5 8 1.5C8.82843 1.5 9.5 2.17157 9.5 3Z" fill="white"/>
                                                </svg>                                                    
                                            </a>
                                        </button>
                                        <div class="absolute right-0 mt-2 w-[201px] border border-color-89 dark:border-color-47 rounded-lg bg-white dark:bg-[#333332] z-50 table-drop-body dropdown-shadow">
                                            <div>
                                                <a href="{{ route('user.threadReply', $thread->id) }}" id="{{ $thread->id }}" class="flex justify-start items-center gap-1.5 text-14 font-normal text-color-14 dark:text-white font-Figtree px-4 py-2 hover:bg-color-F6 dark:hover:bg-[#3A3A39] rounded-t-lg text-left">
                                                    <span class="w-4 h-4">
                                                        <svg class="w-4 h-4" width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.99984 0C4.6665 0 1.81984 2.07333 0.666504 5C1.81984 7.92667 4.6665 10 7.99984 10C11.3332 10 14.1798 7.92667 15.3332 5C14.1798 2.07333 11.3332 0 7.99984 0ZM7.99984 8.33333C6.15984 8.33333 4.6665 6.84 4.6665 5C4.6665 3.16 6.15984 1.66667 7.99984 1.66667C9.83984 1.66667 11.3332 3.16 11.3332 5C11.3332 6.84 9.83984 8.33333 7.99984 8.33333ZM7.99984 3C6.89317 3 5.99984 3.89333 5.99984 5C5.99984 6.10667 6.89317 7 7.99984 7C9.1065 7 9.99984 6.10667 9.99984 5C9.99984 3.89333 9.1065 3 7.99984 3Z" fill="currentColor"/>
                                                        </svg>
                                                    </span>
                                                    <p>{{ __('View Ticket')}}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr class="border-b dark:border-[#474746]">
                                    <td colspan="5" class="w-full">
                                        <p class="text-center font-Figtree text-16 font-medium text-color-14 py-5 dark:text-white">{{ __('No Ticket is available to be displayed.') }}</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- pagination --}}
        {{ $threads->links('site.layout.partials.pagination') }}
    </div>
</div>
{{-- modal --}}
<div class="index-modal modal absolute z-50 top-0 left-0 right-0 w-full h-full">
    <div class="modal-overlay fixed z-10 top-0 right-0 left-0 w-full h-full">
    </div>
    <div class="modal-wrapper modal-wrapper modal-transition fixed inset-0 z-10">
        <div class="modal-body flex h-full justify-center p-4 text-center items-center sm:p-0">
            <div class="modal-content modal-transition rounded-xl py-6 md:px-[54px] bg-white dark:bg-color-3A px-8">
                <p class="font-Figtree text-color-14 dark:text-white text-16 font-medium text-center">
                    {{ __('Are you sure you want to delete this Ticket?') }}</p>
                <div class="flex justify-center items-center mt-7 gap-[16px]">
                    <a href="javascript: void(0)"
                        class="font-Figtree text-color-14 dark:text-white font-semibold text-15 py-[11px] px-[42px] border border-color-89 dark:border-color-47 bg-color-F6 dark:bg-color-47 rounded-xl ticket-modal-toggle">
                        {{ __('Cancel') }}</a>
                    <a href="javascript: void(0)" class="font-Figtree text-white font-semibold text-15 py-[11px] px-[30px] ticket-modal-toggle bg-color-DFF rounded-xl ticket-delete-content">
                        {{ __('Yes, Delete') }} </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        const SEARCH_LIST = "{{ route('user.userProfileUpdate') }}";

    </script>

<script src="{{ asset('public/assets/js/user/ticket-list.min.js') }}"></script>
@endsection