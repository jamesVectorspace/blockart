@extends('layouts.user_master')
@section('page_title', __('Dashboard'))
@section('content')
{{-- main content --}}
<main class="w-[68.9%] 5xl:w-[85.9%] lg:pt-[88px] pt-20 9xl:px-[245px] 7xl:px-[135px] 5xl:px-[67px] px-5 pb-28 overflow-auto main-content flex flex-col flex-1 font-Figtree bg-color-F6 dark:bg-[#292929] border-l dark:border-[#474746] border-color-DF h-screen">
    <p class="tracking-[0.2em] uppercase text-color-14 dark:text-white font-normal text-[13px] leading-5 font-Figtree">
        {{ __('Welcome to :x', ['x' => preference('company_name')]) }}</p>
    <p class="text-color-14 dark:text-white font-bold text-[26px] leading-[34px] font-RedHat mt-2">
        {{ __('Unleash the power of Artificial Intelligence') }}</p>
    <div class="lg:mt-6 mt-5 grid 3xl:grid-cols-4 lg:grid-cols-2 grid-cols-1 md:gap-4 gap-3 w-full">
        <a class="bg-white dark:bg-color-3A rounded-xl 6xl:py-[26px] lg:py-5 py-4 6xl:px-5 lg:px-3 px-5 flex justify-between items-center" href="{{ route('user.documents') }}">
            <div>
                <p class="text-color-14 dark:text-white text-[13px] leading-5 font-normal font-Figtree">
                    {{ __('Number of') }}</p>
                <p class="text-color-14 dark:text-white font-semibold leading-6 font-Figtree text-[16px] mt-1 break-all">
                    {{ __('Documents Made') }}</p>
            </div>
            <p class="text-gradient-1 text-[28px] leading-9 font-RedHat font-bold">{{ $totalDocument }}</p>
        </a>
        <a class="bg-white dark:bg-color-3A rounded-xl 6xl:py-[26px] lg:py-5 py-4 6xl:px-5 lg:px-3 px-5 flex justify-between items-center 3xl:order-none lg:order-4" href="{{ route('user.imageList') }}">
            <div>
                <p class="text-color-14 dark:text-white text-[13px] leading-5 font-normal font-Figtree">
                    {{ __('Amount of') }}</p>
                <p class="text-color-14 dark:text-white font-semibold leading-6 font-Figtree text-[16px] mt-1 break-all">
                    {{ __('Images Created') }}</p>
            </div>
            <p class="text-gradient-1 text-[28px] leading-9 font-RedHat font-bold">{{ $totalImage }}</p>
        </a>
        <a class="bg-white dark:bg-color-3A rounded-xl 6xl:py-[26px] lg:py-5 py-4 6xl:px-5 lg:px-3 px-5 flex justify-between items-center 3xl:order-none lg:order-3" href="{{ route('user.codeList') }}">
            <div>
                <p class="text-color-14 dark:text-white text-[13px] leading-5 font-normal font-Figtree">
                    {{ __('Amount of') }}</p>
                <p class="text-color-14 dark:text-white font-semibold leading-6 font-Figtree text-[16px] mt-1 break-all">
                    {{ __('Codes Written') }}</p>
            </div>
            <p class="text-gradient-1 text-[28px] leading-9 font-RedHat font-bold">{{ $totalCode }}</p>
        </a>
        <div class="magic-bg rounded-xl lg:py-[25px] py-10 6xl:px-5 px-3 flex justify-between items-center relative 3xl:order-none lg:order-2 mt-14 lg:mt-0 dashboard-robo">
            <div>
                <p class="text-white text-[12px] leading-[18px] font-medium font-Figtree tracking-[0.2em] uppercase 3xl:w-[130px]">
                    {{ __('LET’S TALK') }}</p>
                <a href="javaScript:void(0);"
                    class="dashboard-chat text-white mt-1.5 font-semibold text-[18px] 3xl:w-[130px] 9xl:w-[130px] 7xl:w-[110px] font-Figtree justify-start gap-2.5 items-center inline-block">
                    <span>{{ __('Chat with AI') }}</span>
                    <span class="w-3 h-3 inline-block ml-2.5">
                        <svg class="w-3 h-3 neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="11" height="10" viewBox="0 0 11 10"
                        fill="none">
                        <path d="M10.7698 5.52948C11.0767 5.23663 11.0767 4.76103 10.7698 4.46818L6.84101 0.719641C6.53407 0.426786 6.0356 0.426786 5.72867 0.719641C5.42173 1.0125 5.42173 1.48809 5.72867 1.78094L8.31921 4.25029H0.785758C0.351136 4.25029 0 4.58532 0 5C0 5.41468 0.351136 5.74971 0.785758 5.74971H8.31676L5.73112 8.21905C5.42419 8.51191 5.42419 8.9875 5.73112 9.28036C6.03806 9.57321 6.53653 9.57321 6.84346 9.28036L10.7723 5.53182L10.7698 5.52948Z" fill="white" />
                        </svg>
                    </span>

                </a>
            </div>
            <img class="bottom-0 absolute right-0 3xl:w-[108px] 7xl:w-[137px] neg-transition-scale" src="{{ asset('public/assets/image/dashboard-robo.png') }}"
                alt="{{ __('Image') }}">
        </div>
    </div>

    <div class="lg:mt-6 mt-5 grid 3xl:grid-cols-4 lg:grid-cols-2 grid-cols-1 md:gap-4 gap-3 w-full">
        @foreach ($coupons as $coupon)
            <div class="bg-white dark:bg-color-3A rounded-xl 6xl:py-[26px] lg:py-5 py-4 6xl:px-5 lg:px-3 px-5">
                <div class="coupon-card">
                    <p class="text-color-14 dark:text-white font-RedHat font-bold">
                        <span class="text-4xl">{{ round($coupon->discount_amount) }}{{ $coupon->discount_type == 'Percentage' ? '%' : '' }}</span>
                        <span class="uppercase text-2xl ltr:ml-2 rtl:mr-2">{{ __("Off") }}</span>
                    </p>
                    <p class="mt-1 font-FigTree font-medium text-color-14 dark:text-white text-base">
                        {{ $coupon->name }}
                    </p>
                    <div class="mt-6 magic-bg rounded-lg px-2.5 py-2.5 flex justify-between">
                        <p class="font-FigTree font-bold text-white lg:text-base text-sm">
                            {{ __("Code") }} : {{ trimWords($coupon->code, 7) }} <span class="hidden" id="coupon-code">{{ $coupon->code }}</span>
                        </p>
                        <div class="relative flex gap-2 justify-center items-center copy-button cursor-pointer">
                            <span id="copied-message" class="top-[-36px] ltr:left-[-9px] rtl:right-[-9px] z-50 w-[114px] font-Figtree text-color-14 dark:text-color-DF items-center font-medium text-12 text-center rounded-lg px-2.5 py-[7px] absolute"></span>

                            <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18" fill="none"><g clip-path="url(#clip0_3914_2023)"><path d="M12.5 0.75H3.5C2.675 0.75 2 1.425 2 2.25V12.75H3.5V2.25H12.5V0.75ZM11.75 3.75L16.25 8.25V15.75C16.25 16.575 15.575 17.25 14.75 17.25H6.4925C5.6675 17.25 5 16.575 5 15.75L5.0075 5.25C5.0075 4.425 5.675 3.75 6.5 3.75H11.75ZM11 9H15.125L11 4.875V9Z" fill="#fff"></path></g><defs>
                                <clipPath id="clip0_3914_2023"><rect width="18" height="18" fill="white" transform="translate(0.5)"></rect></clipPath></defs>
                            </svg>
                            <p class="font-FigTree font-medium text-white lg:text-[13px] text-xs py-2p">
                                {{ __("Copy") }}
                            </p>
                        </div>
                    </div>
                    <ul class="mt-6 list-disc text-color-89 dark:text-color-DF md:text-sm text-13 roboto-medium font-medium ltr:pl-3.5 rtl:pr-3.5">
                        <li class="leading-6">
                            {{ __(':x to :y', ['x' => formatDate($coupon->start_date), 'y' => formatDate($coupon->end_date)]) }}
                        </li>     
                        @if (isset($coupon->plans) && count($coupon->plans) > 0)
                            <li class="leading-6 more">
                                {{ __('For these plans') . ' : ' . implode(', ', $coupon->plans->pluck('name')->all()) }}
                            </li>
                        @else
                            <li class="leading-6">{{ __('For all plans') }}</li>
                        @endif                                                                                                   
                        @if ($coupon->usage_limit_per_user)
                            <li class="leading-6">
                                {{ $coupon->usage_limit_per_user > 1 ? __('A customer can avail this offer maximum :x times', ['x' => $coupon->usage_limit_per_user]) : __('A customer can avail this offer maximum :x time', ['x' => $coupon->usage_limit_per_user]) }}
                            </li>
                        @endif
                        @if ($coupon->usage_limit_per_coupon)
                            <li class="leading-6">
                                {{ $coupon->usage_limit_per_coupon > 1 ? __('The coupon can be used a maximum of :x times', ['x' => $coupon->usage_limit_per_coupon]) : __('The coupon can be used a maximum of :x time', ['x' => $coupon->usage_limit_per_coupon]) }}
                            </li>
                        @endif
                        @if ($coupon->minimum_spend && $coupon->minimum_spend > 0)
                            <li class="leading-6">
                                {{ __('Minimum Spend :x', ['x' => formatNumber($coupon->minimum_spend)]) }}
                            </li>
                        @endif                                 
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
    @php
    $currcentPackage = session()->get('memberPackageData');
    if (isset($currcentPackage)) {
        $sessionUserId = $currcentPackage['packageUser'];
    } else {
        $sessionUserId = auth()->user()->id;
    }
    @endphp
    <div class="sm:mt-7 mt-6 flex lg:flex-row flex-col justify-between gap-5">
        {{-- graph --}}
        <div class="rounded-xl bg-white dark:bg-color-3A p-5 h-[348px] w-full relative {{$subscription != NULL && auth()->user()->id == $sessionUserId ? ' 2xl:w-[72%] xl:w-[64%] w-full' : 'w-full'}}">
            <div class="flex justify-between items-center">
                <p class="text-[18px] leading-[26px] text-color-14 dark:text-white font-RedHat font-bold usage-statistic">
                    {{ __('Usage Statistics') }}</p>
                    <p class="text-color-89 dark:text-color-DF font-Figtree text-[12px] leading-[18px] font-medium">{{ $currentMonth }}</p>
                </div>
                <canvas id="myChart" class="xl:!h-[303px] !h-[280px] !w-full 2xl:absolute top-5 left-0 xl:px-5 px-0 dashboard-chart"></canvas>
            </div>
        @if($subscription != NULL)
            @if (auth()->user()->id == $sessionUserId)
            {{-- profile --}}
            <div class="relative bg-color-14 lg:h-full h-max rounded-xl {{$subscription != NULL ? '2xl:w-[28%] xl:w-[36%] w-full' : 'w-full'}}">
                <div class="p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-white text-[14px] leading-[22px] font-medium font-Figtree">
                                {{ __('Subscription') }}
                            </p>
                            <p class="text-gradient-1 font-Figtree text-[28px] leading-9 font-semibold mt-1">
                                {{ optional($subscription->package)->name }}</p>
                        </div>
                        <div class="text-right">
                            <p class="text-white font-RedHat text-[24px] leading-8 font-bold">{{ $creditUsed }}</p>
                            <p class="text-white font-RedHat text-[12px] leading-[18px] font-normal mt-1">/
                                @if (!in_array($subscription->status, ['Active', 'Cancel']))
                                    0
                                @elseif ($creditLimit == -1)
                                    {{  __('Unlimited') }}
                                @else
                                    {{ $creditLimit }}
                                @endif
                        </div>
                    </div>
                    <div class="relative h-2 w-full bg-color-47 rounded-[25px] border border-color-47 mt-5">
                        <div class="progress-fill absolute h-2 w-full rounded-[60px]" style="width: {{ (100 - $creditPercentage) > 100 ? 100 : (100 - $creditPercentage) }}%"></div>
                    </div>
                    <p class="text-white font-Figtree mt-4 font-normal text-[12px] leading-[18px] break-words">
                        @if (!in_array($subscription->status, ['Active', 'Cancel']))
                            {{ __('To continue our service, please renew or subscribe to a new plan as your current plan is not active.') }}
                        @elseif ($subscription->renewable)
                            {{ __('Your next payment is :x Your payment will be automatically renewed each :y.', ['x' => formatNumber(optional($subscription->package)->sale_price[$subscription->billing_cycle]), 'y' => ($subscription->billing_cycle == 'days' ? $subscription->duration . ' ' : '') . $subscription->billing_cycle ]) }}</p>
                        @else
                            {{ __('Your plan will expire on :x as it is not renewable.', ['x' => timezoneFormatDate($subscription->next_billing_date)]) }}</p>
                        @endif
                    <a href="{{ route('user.package') }}"
                        class="font-Figtree text-[13px] text-white flex gap-[2px] items-center leading-5 font-medium mt-5">
                        <span class="underline">{{ __('See details') }}</span>
                        <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                            <path d="M10.0666 3.35133C10.0755 2.96917 9.7725 2.66614 9.39034 2.67512L4.49871 2.78997C4.11655 2.79894 3.79895 3.11654 3.78998 3.4987C3.78101 3.88086 4.08404 4.18388 4.46619 4.17491L7.69012 4.09769L2.89016 8.89765C2.61324 9.17457 2.60297 9.61176 2.86719 9.87598C3.1314 10.1402 3.56859 10.1299 3.84551 9.85301L8.64391 5.05461L8.56982 8.2754C8.56084 8.65756 8.86387 8.96059 9.24603 8.95162C9.62819 8.94264 9.94579 8.62505 9.95476 8.24289L10.0696 3.35126L10.0666 3.35133Z"fill="white" />
                        </svg>
                    </a>
                </div>
                <div class="dash-sub-plan w-full magic-bg rounded-xl p-5 pr-2 flex justify-between items-center mt-[26px] lg:absolute lg:bottom-0">
                    <div>
                        <p class="uppercase font-Figtree text-white tracking-[0.27em] text-[12px] leading-[18px] font-medium "> {{ __('PROFILE') }}</p>
                        <a href="{{ route('user.profile') }}" class="text-white mt-1.5 block font-semibold font-Figtree text-[18px] leading-[26px]">
                            {{ Auth::user()->name }}</a>
                    </div>
                    <div class="flex items-center mr-2">
                        <a class="text-white text-16 cursor-pointer font-normal font-Figtree flex text-center items-center justify-center rounded-full h-[60px] w-[60px]" href="{{ route('user.profile') }}">
                            <img class="rounded-full cursor-pointer bg-white h-[60px] w-[60px] neg-transition-scale"src="{{ Auth::user()->fileUrl() }}" alt="Avatar of User">
                        </a>
                    </div>
                </div>
            </div>
            @endif
        @endif
    </div>
    {{-- use case --}}
    @if (count($mostPopularUseCases) != 0)
    <div class="sm:mt-7 mt-6">
        <div class="flex justify-between items-center gap-3">
            <p class="text-[20px] font-medium font-Figtree leading-[26px] text-color-14 dark:text-white">
                {{ __('Most recent use cases') }}</p>
            <a href="{{ route('openai') }}" class="flex justify-center items-center gap-1 font-Figtree text-color-89 text-[14px] leading-[22px] font-medium">
                <span>{{ __('See All') }}</span>
                <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.18306 9.83263C4.42714 10.0558 4.82286 10.0558 5.06694 9.83263L8.81694 6.40406C9.06102 6.1809 9.06102 5.8191 8.81694 5.59594L5.06694 2.16737C4.82286 1.94421 4.42714 1.94421 4.18306 2.16737C3.93898 2.39052 3.93898 2.75233 4.18306 2.97549L7.49112 6L4.18306 9.02451C3.93898 9.24767 3.93898 9.60948 4.18306 9.83263Z" fill="currentColor" />
                </svg>
            </a>
        </div>
        <div class="mt-4 grid 2xl:grid-cols-4 xs:grid-cols-2 grid-cols-1 gap-4">
            @foreach($mostPopularUseCases as $useCase)
            <a class="bg-white dark:bg-color-3A md:p-6 p-4 rounded-xl" href="{{ route('user.template', ['slug' => $useCase->slug]) }}">
                <img class="w-8 h-8 rounded-full" src="{{ asset($useCase->fileUrl()) }}" alt="{{ __('Image') }}">
                <p class="mt-[18px] text-color-14 dark:text-white text-[15px] leading-[22px] font-Figtree font-medium">
                    {{ $useCase->name }}</p>
                <p class="font-[300px] pt-2 text-color-14 dark:text-white text-[13px] leading-5 font-Figtree break-all">
                    {{ $useCase->description }}
                </p>
            </a>
            @endforeach
        </div>
    </div>
    @endif
        {{-- banners --}}
    <div class="sm:mt-7 mt-6 grid lg:grid-cols-2 grid-cols-1 gap-4">
        <a  href="{{ route('user.imageTemplate') }}">
            <div class="rounded-l-[10px] bg-tem1 h-full">
                <div class="pt-8 pl-6 pb-6 banner-details-rtl neg-transition-scale">
                    <p class="text-gradient-1 font-Figtree uppercase text-[13px] leading-5 tracking-[0.15] font-semibold">
                        {{ __('Image Maker') }}</p>
                    <p class="mt-2 text-white font-bold font-RedHat text-[22px] leading-[30px] w-[250px]">
                        {{ __('Create whatever image you have in mind') }}</p>
                    <div class="mt-[38px] text-white text-[15px] leading-[22px] font-Figtree font-medium flex items-center gap-2 mb-3">
                        <span>{{ __('Create Images') }}</span>
                        <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="11" height="9" viewBox="0 0 11 9"
                            fill="none">
                            <path d="M10.7698 5.02948C11.0767 4.73663 11.0767 4.26103 10.7698 3.96818L6.84101 0.219641C6.53407 -0.0732136 6.0356 -0.0732136 5.72867 0.219641C5.42173 0.512495 5.42173 0.98809 5.72867 1.28094L8.31921 3.75029H0.785758C0.351136 3.75029 0 4.08532 0 4.5C0 4.91468 0.351136 5.24971 0.785758 5.24971H8.31676L5.73112 7.71905C5.42419 8.01191 5.42419 8.4875 5.73112 8.78036C6.03806 9.07321 6.53653 9.07321 6.84346 8.78036L10.7723 5.03182L10.7698 5.02948Z" fill="#E22861" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{ route('user.codeTemplate') }}">
            <div class="bg-tem2 rounded-l-[10px] h-full">
                <div class="pt-8 pl-6 mb-6 banner-details-rtl neg-transition-scale">
                    <p class="text-white font-Figtree uppercase text-[13px] leading-5 tracking-[0.15] font-semibold">
                        {{ __('Code Writer') }}</p>
                    <p class="mt-2 text-white font-bold font-RedHat text-[22px] leading-[30px] w-[250px]">
                        {{ __('Instantly get the code you are looking for') }}</p>
                    <div class="mt-[38px] text-white text-[15px] leading-[22px] font-Figtree font-medium flex items-center gap-2 mb-3">
                        <span>{{ __('Get codes') }}</span>
                        <svg class="text-white dark:text-[#FCCA19] neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="11" height="9" viewBox="0 0 11 9"
                            fill="none">
                            <path d="M10.7698 5.02948C11.0767 4.73663 11.0767 4.26103 10.7698 3.96818L6.84101 0.219641C6.53407 -0.0732136 6.0356 -0.0732136 5.72867 0.219641C5.42173 0.512495 5.42173 0.98809 5.72867 1.28094L8.31921 3.75029H0.785758C0.351136 3.75029 0 4.08532 0 4.5C0 4.91468 0.351136 5.24971 0.785758 5.24971H8.31676L5.73112 7.71905C5.42419 8.01191 5.42419 8.4875 5.73112 8.78036C6.03806 9.07321 6.53653 9.07321 6.84346 8.78036L10.7723 5.03182L10.7698 5.02948Z" fill="currentColor" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="mt-6 sm:mt-7 grid xl:grid-cols-2 grid-cols-1 sm:gap-4 gap-6">
        {{-- recent documents --}}
        @if(count($documents) != 0)
            <div>
                <p class="text-[20px] font-medium font-Figtree leading-[26px] text-color-14 dark:text-white">
                    {{ __('Recent documents') }}</p>
                <ul class="mt-4 bg-white dark:bg-color-3A md:p-6 p-5 py-3 last-border-remove rounded-xl">
                    @foreach( $documents as $document )
                    <li class="border-b border-color-F3 dark:border-color-47 py-3">
                        <a href="{{ route('user.editContent', ['slug' => $document->slug]) }}" class="flex items-center justify-between gap-3">
                            <div>
                                <p class="text-color-14 dark:text-white text-[14px] font-medium font-Figtree leading-[22px]">
                                    {{ trimWords($document->title, 50) }}</p>
                                <p class="mt-1 font-Figtree text-[13px] leading-[20px] font-medium text-color-89">
                                    {{ optional($document->useCase)->name }}</p>
                            </div>
                            <div class="flex gap-4 justify-end items-center">
                                <div class="relative">
                                    <div class="flex tooltips items-center border border-color-89 dark:border-color-47 text-color-14 dark:text-white bg-white dark:bg-color-3A dark:bg-color-47 p-2 rounded-lg justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <g clip-path="url(#clip0_2387_1688)">
                                                <path d="M7.99972 3C4.66638 3 1.81972 5.07333 0.666382 8C1.81972 10.9267 4.66638 13 7.99972 13C11.333 13 14.1797 10.9267 15.333 8C14.1797 5.07333 11.333 3 7.99972 3ZM7.99972 11.3333C6.15972 11.3333 4.66638 9.84 4.66638 8C4.66638 6.16 6.15972 4.66667 7.99972 4.66667C9.83972 4.66667 11.333 6.16 11.333 8C11.333 9.84 9.83972 11.3333 7.99972 11.3333ZM7.99972 6C6.89305 6 5.99972 6.89333 5.99972 8C5.99972 9.10667 6.89305 10 7.99972 10C9.10638 10 9.99972 9.10667 9.99972 8C9.99972 6.89333 9.10638 6 7.99972 6Z" fill="currentColor" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2387_1688">
                                                    <rect width="16" height="16" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span class="image-download-tooltip-text z-50 w-[114px] text-white items-center font-medium text-12 text-center rounded-lg px-2.5 py-[7px] absolute z-1 top-[138%] left-[50%] -ml-[57px]">{{ __('View Documents') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- latest image create --}}
        @if(count($images) != 0)
            <div>
                <p class="text-[20px] font-medium font-Figtree leading-[26px] text-color-14 dark:text-white">
                    {{ __('Last created images') }}</p>
                <div class="mt-4 bg-white dark:bg-color-3A 9xl:p-6 p-5 py-5 last-border-remove rounded-xl">
                    <div class="flex sm:flex-row flex-col gap-5">
                        <img class="rounded-xl md:w-[226px] w-full h-[226px] border border-color-DF dark:border-color-3A neg-transition-scale"
                            src="{{ $images[0]->imageUrl() }}" alt="{{ __('Image') }}">
                        <div>
                            <p class="text-color-89 text-[14px] font-medium leading-[22px] font-Figtree">
                                {{ __('Image Prompt') }}</p>
                            <p class="mt-2 font-Figtree text-color-14 dark:text-white text-base leading-6 font-medium line-clamp-double wrap-anywhere">
                                {{ $images[0]->name }}
                            </p>
                            <p class="flex items-center text-color-89 text-[13px] leading-[20px] font-Figtree font-medium gap-2 mt-4 flex-wrap">
                                <span>{{ $images[0]->size }}</span><svg xmlns="http://www.w3.org/2000/svg" width="4"
                                    height="4" viewBox="0 0 4 4" fill="none">
                                    <circle cx="2" cy="2" r="2" fill="#898989" />
                                </svg> <span>{{ timeToGo($images[0]->created_at, false, 'ago') }}</span>
                            </p>
                            <div class="flex gap-4 items-center md:mt-14 mt-4">
                                <div class="relative">
                                    <a class="flex items-center border border-color-89 dark:border-color-47 text-color-14 dark:text-white bg-white dark:bg-color-3A dark:bg-color-47 p-2 rounded-lg justify-center tooltips"
                                        href="{{ route("user.imageGallery") . "?slug={$images[0]->slug}" }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <g clip-path="url(#clip0_2387_1688)">
                                                <path d="M7.99972 3C4.66638 3 1.81972 5.07333 0.666382 8C1.81972 10.9267 4.66638 13 7.99972 13C11.333 13 14.1797 10.9267 15.333 8C14.1797 5.07333 11.333 3 7.99972 3ZM7.99972 11.3333C6.15972 11.3333 4.66638 9.84 4.66638 8C4.66638 6.16 6.15972 4.66667 7.99972 4.66667C9.83972 4.66667 11.333 6.16 11.333 8C11.333 9.84 9.83972 11.3333 7.99972 11.3333ZM7.99972 6C6.89305 6 5.99972 6.89333 5.99972 8C5.99972 9.10667 6.89305 10 7.99972 10C9.10638 10 9.99972 9.10667 9.99972 8C9.99972 6.89333 9.10638 6 7.99972 6Z" fill="currentColor" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_2387_1688">
                                                    <rect width="16" height="16" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <span
                                            class="image-download-tooltip-text z-50 w-[85px] text-center text-white items-center font-medium text-12 rounded-lg px-2.5 py-[7px] absolute z-1 top-[138%] left-[50%] -ml-10">{{ __('View Image') }}
                                        </span>
                                    </a>
                                </div>
                                <a class="relative flex items-center p-2 border border-color-89 dark:border-color-47 bg-white dark:bg-color-3A tooltips text-color-14 dark:text-white dark:bg-color-47 rounded-lg justify-center" href="{{ $images[0]->imageUrl() }}" download={{ $images[0]->name }}>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <g clip-path="url(#clip0_4019_2305)">
                                            <path d="M14 6.23529H10.8571V2H6.14286V6.23529H3L8.5 11.1765L14 6.23529ZM3 12.5882V14H14V12.5882H3Z" fill="currentColor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_4019_2305">
                                                <rect width="16" height="16" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <span class="image-download-tooltip-text z-50 w-28 text-center text-white items-center font-medium text-12 rounded-lg px-2.5 py-[7px] absolute z-1 top-[138%] left-[50%] ml-[-57px]">{{ __('Download Image') }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap 9xl:gap-5 gap-[11px] mt-5 items-center">
                        @foreach($images as $key => $image)
                            @if($key != 0)
                                <div class="relative download-image-container">
                                    <img class="5xl:w-[158px] m-auto sm:h-[158px] sm:w-[149px] w-[102px] h-[102px] cursor-pointer rounded-xl border border-color-DF dark:border-color-3A neg-transition-scale" src="{{ $image->imageUrl() }}" alt="{{ __('Image') }}">
                                    <div class="image-hover-overlay rounded-xl"></div>
                                    <div class="flex download-button absolute top-0 bottom-0 sm:left-[25%] sm:right-[25%] left-0 right-0 justify-center items-center gap-3">
                                        <a href="{{ route("user.imageGallery") . "?slug={$image->slug}" }}" class="relative bg-white dark:bg-color-3A tooltips w-9 h-9 flex items-center m-auto justify-center rounded-lg text-color-14 dark:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <g clip-path="url(#clip0_2387_1688)">
                                                    <path d="M7.99972 3C4.66638 3 1.81972 5.07333 0.666382 8C1.81972 10.9267 4.66638 13 7.99972 13C11.333 13 14.1797 10.9267 15.333 8C14.1797 5.07333 11.333 3 7.99972 3ZM7.99972 11.3333C6.15972 11.3333 4.66638 9.84 4.66638 8C4.66638 6.16 6.15972 4.66667 7.99972 4.66667C9.83972 4.66667 11.333 6.16 11.333 8C11.333 9.84 9.83972 11.3333 7.99972 11.3333ZM7.99972 6C6.89305 6 5.99972 6.89333 5.99972 8C5.99972 9.10667 6.89305 10 7.99972 10C9.10638 10 9.99972 9.10667 9.99972 8C9.99972 6.89333 9.10638 6 7.99972 6Z" fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_2387_1688">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="image-download-tooltip-text z-50 w-[85px] text-center text-white items-center font-medium text-12 rounded-lg px-2.5 py-[7px] absolute z-1 top-[138%] left-[50%] -ml-10">{{ __('View Image') }}
                                            </span>
                                        </a>
                                        <a href="{{ $image->imageUrl() }}" download={{ $image->name }} class="relative bg-white dark:bg-color-3A tooltips w-9 h-9 flex items-center m-auto justify-center rounded-lg text-color-14 dark:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <g clip-path="url(#clip0_4019_2305)">
                                                    <path d="M14 6.23529H10.8571V2H6.14286V6.23529H3L8.5 11.1765L14 6.23529ZM3 12.5882V14H14V12.5882H3Z" fill="currentColor" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_4019_2305">
                                                        <rect width="16" height="16" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <span class="image-download-tooltip-text z-50 w-28 text-center text-white items-center font-medium text-12 rounded-lg px-2.5 py-[7px] absolute z-1 top-[138%] left-[50%] ml-[-57px]">{{ __('Download Image') }}
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

    </div>
</main>
{{-- end main content --}}
@endsection

@section('js')
<script>
    const dates = {{ $dates }};
    const contents = {{ $documentReport }};
    const images = {{ $imageReport }};
    const codes = {{ $codeReport }};
    const chats = {{ $chatReport }};
</script>
<script src="{{ asset('public/assets/plugin/chart-js/chart.min.js') }}"></script>
<script src="{{ asset('public/assets/js/user/dashboard.min.js') }}"></script>
@endsection
