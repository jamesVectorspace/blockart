@extends('layouts.user_master')
@section('page_title', __('Member Update'))
@section('content')

    <div class="w-[68.9%] 6xl:w-[85.9%] dark:bg-[#292929] flex flex-col flex-1 border-l dark:border-[#474746] border-color-DF">
        <div class="w-full xl:flex xl:h-full subscription-main md:overflow-auto sidebar-scrollbar h-screen">
            @include('user.includes.account-sidebar')
            <div class="grow xl:pl-6 px-5 8xl:pr-[84px] xl:pt-[74px] md:pt-5 pt-[74px] pb-[46px] dark:bg-[#292929] xl:overflow-auto sidebar-scrollbar main-profile-content md:h-screen xl:w-1/2">
                <div class="flex justify-start items-center font-Figtree text-color-14 dark:text-white text-15 font-normal gap-2.5 md:hidden pb-4">
                    <a class="profile-back cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.875 6C15.875 5.68934 15.6232 5.4375 15.3125 5.4375L2.0455 5.4375L5.58525 1.89775C5.80492 1.67808 5.80492 1.32192 5.58525 1.10225C5.36558 0.882582 5.00942 0.882582 4.78975 1.10225L0.289752 5.60225C0.0700827 5.82192 0.0700827 6.17808 0.289752 6.39775L4.78975 10.8977C5.00942 11.1174 5.36558 11.1174 5.58525 10.8977C5.80492 10.6781 5.80492 10.3219 5.58525 10.1023L2.0455 6.5625L15.3125 6.5625C15.6232 6.5625 15.875 6.31066 15.875 6Z"
                                fill="currentColor" />
                        </svg>
                    </a> 
                    <span>{{ __('Member Update') }}</span>
                </div>
                
                <div class="">
                    <p class="font-semibold text-color-14 dark:text-white text-20 pb-3">{{ __("Team Member Update")}}</p>
                    <div class="border-b border-color-DF dark:border-[#474746]"></div>
                </div>
                <div class="mt-6 sm:mt-0  sm:py-6">
                    <div>
                        @php
                            $msg = __('This field is required.');
                        @endphp
                        <form class="memberForm" enctype='multipart/form-data' name="memberForm">
                            {!! csrf_field() !!}
                            <input type="hidden" name="team_id" value="{{ $memberData->id }}">
                            <div class="mt-6 md:w-[426px]">
                                <label class="text-14 font-nomrmal text-color-14 dark:text-white" for="name">{{ __('Name') }} </label>
                                <input class="border-color-DF dark:border-[#474746] dark:bg-[#333332] dark:text-white  px-4 py-3 mt-1.5 leading-6 font-normal text-base text-gray-10 form-control border-color-89 dark:!border-color-47 rounded-xl m-0 focus:text-color-14 focus:bg-white focus:!border-color-DF focus:dark:!border-color-47 focus:outline-none md:w-[418px] w-full email-placeholder-text-color" 
                                type="text" id="name" name="name" disabled
                                value="{{ $memberData->user->name }}" required oninvalid="this.setCustomValidity('{{ $msg }}')">
                            </div>
                            <div class="mt-6 md:w-[426px]">
                                <label class="text-14 font-nomrmal text-color-14 dark:text-white" for="email">{{ __('Email') }}</label>
                                <input class="border-color-DF dark:border-[#474746] dark:bg-[#333332] dark:text-white  px-4 py-3 mt-1.5 leading-6  font-normal text-base text-color-14 opacity-90 form-control border-color-89 dark:!border-color-47 rounded-xl m-0 focus:text-color-14 focus:bg-white focus:!border-color-DF focus:dark:!border-color-47 focus:outline-none md:w-[418px] w-full email-placeholder-text-color" 
                                type="email" id="update_email" placeholder="{{ $memberData->user->email }}" disabled>
                            </div>
                            
                            <div class="font-normal custom-dropdown-arrow text-14 text-color-2C dark:text-white mt-6 md:w-[426px]">
                                <label>{{ __('Status') }}</label>
                                <select
                                    class="select block w-full text-base leading-6 font-medium text-color-2C bg-white bg-clip-padding bg-no-repeat rounded-xl dark:bg-[#333332] dark:rounded-2xl m-0 focus:text-color-2C focus:bg-white focus:border-color-89 focus:outline-none"
                                    name="status"
                                    id="status" >
                                    <option value="Active"
                                        {{ old('status', $memberData->status) == 'Active' ? 'selected' : '' }}>
                                        {{ __('Active') }}</option>

                                    <option value="Inactive"
                                        {{ old('status', $memberData->status) == 'Inactive' ? 'selected' : '' }}>
                                        {{ __('Inactive') }}</option>
                                </select>
                            </div>
                            <div class="flex gap-[17px]">
                                @forelse ($memberMetaData as $metas)
                                <div class="flex gap-1 items-center mt-6">
                                    <label class="text-14 font-nomrmal text-color-14 dark:text-white" for="meta_{{ $metas->field }}">
                                        {{ ucfirst(str_replace('_', ' ', $metas->field)) }}
                                    </label>

                                    <input type="checkbox" id="meta_{{ $metas->field }}" class="member-meta-value"
                                    onchange="metaValueChange('{{ $metas->field }}')" name="{{ $metas->field }}" 
                                    value="{{ $metas->value }}" 
                                    {{ $metas->value == 1?'checked':'' }} >
                                    <input type="hidden" id="metaField_{{ $metas->field }}" value="{{ $metas->field }}" >
                                    
                                </div>
                                @empty
                                @endforelse
                            </div>
                            <div class="flex mt-6">
                                <button type="submit" class="px-6 py-[13px] update-profile-button flex item-center gap-3 border border-color-DF dark:border-[#474746] background-gradient-one rounded-xl text-15 font-semibold text-white"> {{ __('Update Member') }}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- loader -->
    <div class="loader-template mx-auto items-center dark:bg-color-3A absolute w-full h-full top-0 flex flex-col justify-center !bg-opacity-50 bg-white member-loader hidden">
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
@endsection
@section('js')
<script>
    const UPDATE_MEMBER = "{{ route('user.subscription.teamMemberUpdate') }}";
    const UPDATE_MEMBER_META = "{{ route('user.subscription.memberMetaUpdate') }}";
</script>
<script src="{{ asset('public/assets/js/user/profile.min.js') }}"></script>
<script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
@endsection
