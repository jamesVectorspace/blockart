@extends('layouts.user_master')
@section('page_title', __('New ticket'))
@section('content')
<div class="w-[68.9%] 6xl:w-[85.9%] dark:bg-[#292929] bg-[#F6F3F2] flex flex-col flex-1 border-l dark:border-[#474746] border-color-DF">
    <div class="9xl:px-[185px] 7xl:px-[140px] px-5 pt-[74px] 9xl:pb-[22px] pb-28">
        <div class="lg:w-[556px] mx-auto">
            <a href="{{ route('user.ticketList') }}" class="flex justify-start items-center gap-3 text-color-14 dark:text-white text-[15px] leading-[22px] font-normal font-Figtree">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.875 9C16.875 8.68934 16.6232 8.4375 16.3125 8.4375H3.0455L6.58525 4.89775C6.80492 4.67808 6.80492 4.32192 6.58525 4.10225C6.36558 3.88258 6.00942 3.88258 5.78975 4.10225L1.28975 8.60225C1.07008 8.82192 1.07008 9.17808 1.28975 9.39775L5.78975 13.8977C6.00942 14.1174 6.36558 14.1174 6.58525 13.8977C6.80492 13.6781 6.80492 13.3219 6.58525 13.1023L3.0455 9.5625H16.3125C16.6232 9.5625 16.875 9.31066 16.875 9Z" fill="currentColor"/>
                </svg>                    
                <p>{{ __('Back')}}</p>
            </a>
            <form action="{{ route('user.ticketStore') }}" method="post" 
                class="form-horizontal col-sm-12 ticketForm button-need-disable" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $object_type }}" name="object_type">
                <div class="mt-4 bg-white dark:bg-color-3A md:p-7 p-4 rounded-xl">
                    <p class="text-color-14 dark:text-white font-semibold font-RedHat text-[24px] leading-[32px]">{{ preference('company_name') . ' ' . __('Support')}}</p>
                    <p class="mt-2 text-color-89 font-Figtree font-medium leading-[22px] text-sm break-words">{{ __('Please fill in the form below with precise information. Our dedicated support team will get in touch with you soon.')}}</p>
                    <div class="relative flex flex-col mt-6">
                        <label class="text-color-14 dark:text-white font-Figtree text-14 font-normal">{{ __('Subject')}}</label>
                        <input type="text" value="{{ old('subject') }}" class="w-full px-4 h-12 py-1.5 text-base mt-1.5 font-normal placeholder-color-89 text-color-14 dark:!text-white bg-white dark:bg-[#333332] bg-clip-padding bg-no-repeat border border-solid border-color-89 dark:!border-color-47 rounded-xl focus:text-color-14 focus:dark:!text-white focus:bg-white focus:border-color-89 focus:outline-none form-control"
                        name="subject" id="subject" required  oninvalid="this.setCustomValidity('This field is required.')" 
                        placeholder="Studio" type="text">
                    </div>
                    <div class="flex flex-col mt-6">
                        <label class="font-normal text-14 font-Figtree text-color-14 dark:text-white mb-1.5">{{ __("Message")}}</label>
                        <textarea class="h-[144px] py-1.5 mt-1.5 text-base overflow-y-scroll middle-sidebar-scroll font-light placeholder-color-89 text-color-14 dark:text-white bg-white dark:bg-[#333332] bg-clip-padding bg-no-repeat border border-solid border-color-89 dark:!border-color-47 rounded-xl m-0 focus:text-color-14 focus:bg-white focus:border-color-89 focus:dark:!border-color-47 focus:outline-none min-h-[auto] w-full px-4 outline-none form-control" 
                        placeholder="Write in details about the problem you are facing.." 
                        required oninvalid="this.setCustomValidity('This field is required.')" 
                        rows="6" name="messages"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-6 justify-between mt-6 new-ticket-select">
                        <div class="font-normal custom-dropdown-arrow text-14 font-Figtree text-color-14 dark:text-white flex gap-1 flex-col">
                            <label class="text-color-14 dark:text-white font-Figtree text-14 font-normal mb-0.5">{{ __('Priority') }}</label>
                            <select name="priority_id" required class="select block w-full text-base leading-6 font-medium text-color-FFR bg-white bg-clip-padding bg-no-repeat dark:bg-[#333332] rounded-xl dark:rounded-2xl m-0 focus:text-color-2C focus:bg-white focus:border-color-89 focus:outline-none">
                                @foreach ( $priorities as $key => $priority)
                                    <option value="{{ $priority->id }}">{{ $priority->name }}</option> 
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-6">
                        <p class="text-color-14 dark:text-white font-Figtree text-14 font-normal">{{ __('Image Sample')}}</p>
                        <div class="drop-zone border border-dashed border-color-89 rounded-xl bg-color-F3 dark:bg-color-33 dark:border-color-47 mt-[7px] cursor-pointer">
                            <div class="text-[13px] leading-[18px] font-normal font-Figtree text-colo-14 wrap-anywhere text-center py-[37px] px-4 file-info-container">
                                <div class="file-info-text justify-center items-center flex gap-2 text-color-14 dark:text-color-89">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99935 2.6665C8.36754 2.6665 8.66602 2.96498 8.66602 3.33317V7.33317H12.666C13.0342 7.33317 13.3327 7.63165 13.3327 7.99984C13.3327 8.36803 13.0342 8.6665 12.666 8.6665H8.66602V12.6665C8.66602 13.0347 8.36754 13.3332 7.99935 13.3332C7.63116 13.3332 7.33268 13.0347 7.33268 12.6665V8.6665H3.33268C2.96449 8.6665 2.66602 8.36803 2.66602 7.99984C2.66602 7.63165 2.96449 7.33317 3.33268 7.33317H7.33268V3.33317C7.33268 2.96498 7.63116 2.6665 7.99935 2.6665Z" fill="currentColor"/>
                                    </svg>
                                        
                                    <p>{{ __('Click or drag a file here')}}</p>
                                </div>
                            </div>
                            <input type="file" id="imgInp" name="file[]" class="drop-zone__input hidden"  multiple>
                        </div>
                        <div id="error-message" class="error-message hidden font-Figtree text-[11px] text-[#FF4500] font-medium">{{ __("invalid files")}}</div>
                        <p class="text-color-89 text-[13px] leading-5 font-medium font-Figtree mt-1"><span class="text-color-14 dark:text-white">{{ __('Note') }}: </span>{{ __('Supported files are ') . $files }}</p>
                        <div id="file-container" class="flex items-center gap-x-4 gap-y-1 flex-wrap"></div>
                        <button type="submit" id="BtnSubmit" class="background-gradient-one magic-bg w-full rounded-xl text-16 text-white font-semibold py-3 flex justify-center items-center gap-3 mt-[23px]">
                            <span>{{ __('Create Ticket')}}</span>
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
                    </div>
                </div>
            </form>
            <div class="index-modal modal absolute z-50 top-0 left-0 right-0 w-full h-full">
                <div class="modal-overlay fixed z-10 top-0 right-0 left-0 w-full h-full">
                </div>
                <div class="modal-wrapper modal-wrapper modal-transition fixed inset-0 z-10">
                    <div class="modal-body flex h-full justify-center p-4 text-center items-center sm:p-0">
                        <div class="modal-content modal-transition rounded-xl py-6 md:px-[54px] bg-white dark:bg-color-3A px-8">
                            <p class="font-Figtree text-color-14 dark:text-white text-16 font-medium text-center">
                                {{ __('Are you sure you want to delete this File?') }}</p>
                            <div class="flex justify-center items-center mt-7 gap-[16px]">
                                <a href="javascript: void(0)"
                                    class="font-Figtree text-color-14 dark:text-white font-semibold text-15 py-[11px] px-[42px] border border-color-89 dark:border-color-47 bg-color-F6 dark:bg-color-47 rounded-xl modal-toggle">
                                    {{ __('Cancel') }}</a>
                                <a href="javascript: void(0)" class="font-Figtree text-white font-semibold text-15 py-[11px] px-[30px] modal-toggle bg-color-DFF rounded-xl delete-files">
                                    {{ __('Yes, Delete') }} </a>
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

<script src="{{ asset('public/assets/js/user/new-ticket-user.min.js') }}"></script>
<script src="{{ asset('public/assets/js/user/ticket-list.min.js') }}"></script>
@endsection
