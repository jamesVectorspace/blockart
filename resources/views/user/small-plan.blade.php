@extends('layouts.user_master')
@section('page_title', __('Credit'))
@section('content')
<div class="w-[68.9%] 7xl:w-[83.9%] dark:bg-[#292929] flex flex-col flex-1 border-l dark:border-[#474746] border-color-DF h-screen">
    <div class="xl:flex justify-between subscription-main md:overflow-auto sidebar-scrollbar h-screen">
        @include('user.includes.account-sidebar')
        <div class="grow xl:px-6 px-5 xl:pt-[74px] md:pt-5 pt-[74px] pb-24 dark:bg-[#292929] xl:overflow-auto sidebar-scrollbar main-profile-content xl:w-1/2">
            <div class="flex justify-start items-center font-Figtree text-color-14 dark:text-white text-15 font-normal gap-2.5 md:hidden pb-4">
                <a class="profile-back cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.875 6C15.875 5.68934 15.6232 5.4375 15.3125 5.4375L2.0455 5.4375L5.58525 1.89775C5.80492 1.67808 5.80492 1.32192 5.58525 1.10225C5.36558 0.882582 5.00942 0.882582 4.78975 1.10225L0.289752 5.60225C0.0700827 5.82192 0.0700827 6.17808 0.289752 6.39775L4.78975 10.8977C5.00942 11.1174 5.36558 11.1174 5.58525 10.8977C5.80492 10.6781 5.80492 10.3219 5.58525 10.1023L2.0455 6.5625L15.3125 6.5625C15.6232 6.5625 15.875 6.31066 15.875 6Z"
                            fill="currentColor" />
                    </svg>
                </a>
                <span>{{ __('Credit') }}</span>
            </div>
            <div class="hidden lg:block">
                <p class="font-semibold text-color-14 dark:text-white text-20 pb-3 pt-1.5 wrap-anywhere">{{ __('Credit')}}</p>
                <div class="border-b border-color-DF dark:border-[#474746]"></div>
            </div>
            
            @if (!is_null(auth()->user()->getMeta('word_limit')))
                <div class="bg-color-F6 dark:bg-color-3A rounded-xl lg:p-6 p-4 w-full xl:w-full details-body 8xl:w-[71.2%] mt-3">
                    <div class="flex justify-between items-center">
                        <p class="text-color-14 dark:text-white text-24 font-Figtree font-semibold">
                            {{ __('Current Plan') }}:
                            <span class="heading-3">{{ $plan?->name }}</span>
                            <span class="text-sm text-color-14 dark:text-white">({{ __('Active') }})</span>
                        </p>
                    </div>
                    @foreach (array_keys($defaultFeatures) as $key => $feature)
                        @php
                            $limit = auth()->user()->getMeta($feature . '_limit');
                            $used = auth()->user()->getMeta($feature . '_used');
                            if (!$limit) {
                                continue;
                            }
                        @endphp
                        <p class="text-color-14 dark:text-white text-15 font-medium font-Figtree mt-6">
                            {{ ucfirst($feature) }}
                        </p>
                        <div
                            class="relative h-2 w-full bg-white dark:bg-color-3A rounded-[25px] border border-color-DF dark:border-color-47 mt-3">
                            <div
                                class="progress-fill absolute h-2 rounded-[60px]" style="width: {{ $limit == 0 ? 0 : ($limit == -1 ? 0 : (floor($used / $limit * 100) > 100 ? 100 : floor($used / $limit * 100))) }}%">
                            </div>
                        </div>
                        <div
                            class="flex justify-between items-center mt-3 text-12 font-Figtree text-color-14 dark:text-white font-normal">
                            <p>{{ __('Credits Used') }}:
                                @if ($limit == -1)
                                    {{ $used }}/{{ __('Unlimited') }}</p>
                                @else
                                    {{ $used . '/' . $limit }}</p>
                                @endif

                            <p>{{ $limit == 0 ? 0 : (floor($used / $limit * 100) > 100 ? 100 : floor($used / $limit * 100)) }}%</p>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-color-F6 dark:bg-color-3A rounded-xl lg:p-6 p-4 w-full xl:w-full details-body 8xl:w-[71.2%] mt-3">
                    <div
                        class="bg-color-F6 dark:bg-color-3A lg:p-6 p-4 rounded-xl 8xl:w-[66.5%] subscription-profile-card h-[220px] w-full flex flex-col justify-between">
                        <div>
                            <p class="text-color-14 dark:text-white text-20 lg:pr-6 pr-4 font-Figtree font-semibold">
                                {{ __('You do not have any credit') }}</p>
                            <p class="mt-3 text-color-14 dark:text-white font-Figtree font-normal text-14 pr-5">
                                {{ __('You can enhance your experience and gain access to our complete range of services by acquiring credit.') }}
                            </p>
                        </div>
                        <div class="flex mt-[26px] justify-start gap-5 flex-wrap">
                            <a href="{{ route('frontend.pricing', ['type' => 'credit']) }}" class="magic-bg w-max rounded-xl text-16 text-white font-semibold py-3 px-[25px]">
                                {{ __('All Credit') }}
                            </a>
                            <div class="fixed z-index-999999 hidden items-center inset-0 bg-color-14 bg-opacity-50 overflow-y-auto upgradePlan-information-modal">
                                <div class="xxs:m-auto mx-5">
                                    <div class="relative my-5 z-index-999999 md:px-5 px-3 py-5 sm:w-[520px] w-max rounded-xl bg-white dark:bg-[#3A3A39] modal-h modal-box-shadow transition-all ease-in-out billing-modal-main" id="billing-modal-main">
                                        <svg class="absolute top-2.5 right-2.5 text-color-14 dark:text-white modal-close-btn p-[1px] cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.00749 3.00773C3.41754 2.59768 4.08236 2.59768 4.49241 3.00773L8.99995 7.51527L13.5075 3.00773C13.9175 2.59768 14.5824 2.59768 14.9924 3.00773C15.4025 3.41778 15.4025 4.08261 14.9924 4.49266L10.4849 9.0002L14.9924 13.5077C15.4025 13.9178 15.4025 14.5826 14.9924 14.9927C14.5824 15.4027 13.9175 15.4027 13.5075 14.9927L8.99995 10.4851L4.49241 14.9927C4.08236 15.4027 3.41754 15.4027 3.00749 14.9927C2.59744 14.5826 2.59744 13.9178 3.00749 13.5077L7.51503 9.0002L3.00749 4.49266C2.59744 4.08261 2.59744 3.41778 3.00749 3.00773Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('public/assets/js/user/subscription.min.js') }}"></script>
@endsection
