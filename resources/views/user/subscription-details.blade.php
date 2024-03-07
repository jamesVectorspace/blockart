@extends('layouts.user_master')
@section('page_title', __('Subscription Details'))
@section('content')
    <div class="w-[68.9%] 6xl:w-[85.9%] dark:bg-[#292929] flex flex-col flex-1 border-l dark:border-[#474746] border-color-DF subscription-details border-right">
        <div class="xl:flex w-full h-full subscription-main md:overflow-auto sidebar-scrollbar md:h-screen">
            @include('user.includes.account-sidebar')
            @if (!subscription('getUserSubscription', auth()->user()->id))
                <div
                    class="grow 2xl:pl-6 8xl:pr-[84px] px-5 xl:pt-[74px] md:pt-5 pt-[74px] pb-[46px] dark:bg-[#292929] xl:overflow-auto sidebar-scrollbar main-profile-content md:h-screen xl:w-1/2">
                    <a
                        class="flex justify-start items-center font-Figtree text-color-14 dark:text-white text-15 font-normal gap-2.5 md:hidden xl:px-6 pb-4 profile-back cursor-pointer"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.875 6C15.875 5.68934 15.6232 5.4375 15.3125 5.4375L2.0455 5.4375L5.58525 1.89775C5.80492 1.67808 5.80492 1.32192 5.58525 1.10225C5.36558 0.882582 5.00942 0.882582 4.78975 1.10225L0.289752 5.60225C0.0700827 5.82192 0.0700827 6.17808 0.289752 6.39775L4.78975 10.8977C5.00942 11.1174 5.36558 11.1174 5.58525 10.8977C5.80492 10.6781 5.80492 10.3219 5.58525 10.1023L2.0455 6.5625L15.3125 6.5625C15.6232 6.5625 15.875 6.31066 15.875 6Z"
                                fill="currentColor" />
                        </svg> <span>{{ __('Subscriptions') }}</span> </a>
                    <div class="show-current-subscription">
                        <p class="font-semibold text-color-14 dark:text-white text-20 pb-3">{{ __('Subscription') }}</p>
                        <div class="border-b border-color-DF dark:border-[#474746]"></div>
                    </div>
                    <div class="show-all-plans hidden">
                        <div class="back-to-current flex items-center cursor-pointer">
                            <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.875 6C15.875 5.68934 15.6232 5.4375 15.3125 5.4375L2.0455 5.4375L5.58525 1.89775C5.80492 1.67808 5.80492 1.32192 5.58525 1.10225C5.36558 0.882582 5.00942 0.882582 4.78975 1.10225L0.289752 5.60225C0.0700827 5.82192 0.0700827 6.17808 0.289752 6.39775L4.78975 10.8977C5.00942 11.1174 5.36558 11.1174 5.58525 10.8977C5.80492 10.6781 5.80492 10.3219 5.58525 10.1023L2.0455 6.5625L15.3125 6.5625C15.6232 6.5625 15.875 6.31066 15.875 6Z" fill="url(#paint0_linear_3040_2060)"></path>
                            </svg>
                            <p class="font-semibold text-color-14 dark:text-white text-20 ml-3">{{ __('Subscription Plans') }}</p>
                        </div>
                        <div class="border-b border-color-DF dark:border-[#474746] pt-3"></div>
                        
                    </div>
                    <section class="show-all-plans hidden mt-6">
                        <p class="font-semibold text-color-14 dark:text-white text-20 pb-3">{{ __('Plans that suits your needs and budget.') }}
                        </p>
                        <p class="font-medium text-color-14 dark:text-white text-15 pb-3">{{ __('We have plans for everyone, whether you are a solo marketer or a large agency. 100% secured payment and no hidden fees.') }}
                        </p>
                        <div class="mt-5">
                            <div class="xl:flex justify-between items-center w-full gap-5">
                                <div
                                    class="flex items-center border border-color-DF dark:border-[#474746] rounded-xl bg-white dark:bg-[#474746] relative overflow-hidden nav-scroller-wrapper">
                                    <div class="nav-scroller relative overflow-x-auto scroll-hide overflow-y-hidden whitespace-nowrap">
                                        <ul class="nav nav-tabs flex justify-around float-left px-1.5 items-center whitespace-nowrap flex-row list-none py-1.5 nav-scroller-content relative w-min min-w-full">
                                            @php
                                                $hasMonthlyBilling = array_key_exists('monthly', $billingCycles);
                                            @endphp
                                            @foreach($billingCycles as $key => $value)
                                                <li class="nav-item nav-scroller-item" role="presentation">
                                                    <button 
                                                        class="nav-link-activity nav-link rounded-lg block font-normal text-color-14 dark:text-white text-15 px-6 py-[7px] {{ ($hasMonthlyBilling && $key == 'monthly') || (!$hasMonthlyBilling && $loop->first) ? 'active' : '' }}" data-val="{{ $key }}">
                                                        {{ $value }}
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
            
                                    <button
                                        class="nav-scroller-btn nav-scroller-btn--left bg-white dark:bg-[#474746] px-1.5 absolute top-0 bottom-0 left-0;">
                                        <svg class="text-color-89 dark:text-white neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                            fill="none">
                                            <g clip-path="url(#clip0_360_1562)">
                                                <path
                                                    d="M8.25 8.78063L5.46862 5.625L8.25 2.46937L7.39372 1.5L3.75 5.625L7.39372 9.75L8.25 8.78063Z"
                                                    fill="currentColor" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_360_1562">
                                                    <rect width="12" height="12" fill="white"
                                                        transform="matrix(-1 0 0 1 12 0)" />
                                                </clipPath>
                                            </defs>
                                        </svg></button>
            
                                    <button
                                        class="nav-scroller-btn nav-scroller-btn--right bg-white dark:bg-[#474746] px-1.5 absolute top-0 bottom-0 right-0"><svg class="text-color-89 dark:text-white neg-transition-scale"
                                            xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                            fill="none">
                                            <g clip-path="url(#clip0_360_1559)">
                                                <path
                                                    d="M3.75 8.78063L6.53138 5.625L3.75 2.46937L4.60628 1.5L8.25 5.625L4.60628 9.75L3.75 8.78063Z"
                                                    fill="currentColor" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_360_1559">
                                                    <rect width="12" height="12" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg></button>
            
                                </div>
                            </div>
                            <div class="tab-content mt-6 xl:mt-8" id="tabs-tabContent">
                                <div class="tab-pane fade show active" id="tabs-home" role="tabpanel"
                                    aria-labelledby="tabs-home-tab">
                                    <div class="plan-root 6xl:gap-10 lg:gap-5 gap-6 lg:px-0 md:px-10 px-5 w-full flex flex-wrap justify-center {{count($packages) != 0 ? 'lg:mb-[140px] mb-[90px] 6xl:mt-[60px] mt-11' : ''}}">
                                        @foreach($packages as $key => $package)
                                            @foreach ($package['billing_cycle'] as $billing_cycle => $value)
                                                @continue($value == 0)
                                                <div  class="{{ $package['parent_class'] }} plan-parent plan-{{ $billing_cycle }} {{ ($hasMonthlyBilling && $billing_cycle == 'monthly') || (!$hasMonthlyBilling && $loop->first) ? '' : 'hidden' }} disable-gradient-border">
                                                    <div class="rounded-[30px] border border-color-89 dark:border-color-47 bg-white dark:bg-color-14 pt-6 pb-5 sub-plan-rtl dark:bg-color-29 single-plan-container"> 
                                                        @if ($subscription?->package?->id == $package['id'] && $billing_cycle == $subscription?->billing_cycle && $subscription?->package?->renewable)
                                                        <p class="current-plan-text absolute bg-black text-white  py-2 rounded-full font-Figtree">{{ __('Current Plan') }}</p>
                                                        @endif
                                                        <p class="text-color-14 dark:text-white text-22 font-medium font-Figtree break-words text-center package-name">{{ $package['name'] }}</p>
                                        
                                                        <p class="text-36 font-medium font-RedHat text-color-14 text-color-89 mt-1 text-center billing-cycle">
                                                            @if($package['discount_price'][$billing_cycle] > 0)
                                                                <span class=" plan-price">{{ formatNumber($package['discount_price'][$billing_cycle]) }}</span>
                                                            @else
                                                                <span class="text-36 font-bold heading-1 break-all plan-price plan-price">{{ $package['sale_price'][$billing_cycle] == 0 ? __('Free') : formatNumber($package['sale_price'][$billing_cycle]) }}</span>
                                                            @endif
                                                            <span class="text-15 billing-text">/{{ ($billing_cycle == 'days' ? $package['duration'] . ' ' : '') . ucfirst($billing_cycle) }}</span>
                                                        </p>
                                                        
                                                        @php
                                                        
                                                            $mainFeature = [];
                                                            foreach (Modules\Subscription\Services\PackageService::features() as $key => $value) {
                                                                if (isset($package['features'][$key])) {
                                                                    $mainFeature[$key] = $package['features'][$key];
                                                                    unset($package['features'][$key]);
                                                                }
                                                            }
                                                            
                                                            $features = $mainFeature + $package['features'];
                                                            $package['features'] = $mainFeature + $package['features'];
                                                        @endphp
                                                        
                                                        <div class="flex flex-col gap-[18px] mt-6 6xl:pl-11 lg:pl-5 pl-8 pr-4">
                                                            @php
                                                                $visibleFeatures = array_slice($features, 0, 5);
                                                                $hiddenFeatures = array_slice($features, 5);
                                                             @endphp

                                                            @foreach($visibleFeatures as $meta)
                                                                @continue(empty($meta['title']))
                                                            
                                                                @if ($meta['is_visible'])
                                                                    <div class="flex items-center text-color-14 dark:text-white text-14 font-medium font-Figtree gap-[9px]">
                                                                        @php $randomId = md5(uniqid(rand(), true)) @endphp
                                                                        @if($meta['status'] == 'Active')
                                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M13.02 2.88455C13.366 3.23062 13.366 3.79264 13.02 4.13871L5.93246 11.2262C5.58639 11.5723 5.02437 11.5723 4.6783 11.2262L1.13455 7.68246C0.788483 7.33639 0.788483 6.77437 1.13455 6.4283C1.48062 6.08223 2.04264 6.08223 2.38871 6.4283L5.30676 9.34359L11.7686 2.88455C12.1146 2.53848 12.6767 2.53848 13.0227 2.88455H13.02Z" fill="url(#paint0_linear_13006_{{ $randomId }})"/>
                                                                                <defs>
                                                                                <linearGradient id="paint0_linear_13006_{{ $randomId }}" x1="8.94006" y1="10.3952" x2="6.55093" y2="2.84747" gradientUnits="userSpaceOnUse">
                                                                                <stop stop-color="#E60C84"/>
                                                                                <stop offset="1" stop-color="#FFCF4B"/>
                                                                                </linearGradient>
                                                                                </defs>
                                                                            </svg>
                                                                                
                                                                        @else
                                                                            <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.09014 1.59014C1.46032 1.21995 2.06051 1.21995 2.4307 1.59014L6.5 5.65944L10.5693 1.59014C10.9395 1.21995 11.5397 1.21995 11.9099 1.59014C12.28 1.96032 12.28 2.56051 11.9099 2.9307L7.84056 7L11.9099 11.0693C12.28 11.4395 12.28 12.0397 11.9099 12.4099C11.5397 12.78 10.9395 12.78 10.5693 12.4099L6.5 8.34056L2.4307 12.4099C2.06051 12.78 1.46032 12.78 1.09014 12.4099C0.719954 12.0397 0.719954 11.4395 1.09014 11.0693L5.15944 7L1.09014 2.9307C0.719954 2.56051 0.719954 1.96032 1.09014 1.59014Z" fill="#DF2F2F"/>
                                                                            </svg>
                                                                        @endif
                                                                        @if ($meta['type'] != 'number')
                                                                            <span class="break-words"> {{ $meta['title'] }} </span>
                                                                        @elseif ($meta['title_position'] == 'before')
                                                                            <span class="break-words"> {{ $meta['title'] . ': ' }} {{ ($meta['value'] == -1) ? __('Unlimited') : $meta['value'] }} </span>
                                                                        @else
                                                                            <span class="break-words"> {{ ($meta['value'] == -1 ? __('Unlimited') : $meta['value']) }} {{ $meta['title'] }} </span>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            @foreach($hiddenFeatures as $meta)
                                                                @continue(empty($meta['title']))
                                                        
                                                                @if ($meta['is_visible'])
                                                                    <div class="flex items-center text-color-14 dark:text-white text-14 font-medium font-Figtree gap-[9px] hidden">
                                                                        @php $randomId = md5(uniqid(rand(), true)) @endphp
                                                                        @if($meta['status'] == 'Active')
                                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M13.02 2.88455C13.366 3.23062 13.366 3.79264 13.02 4.13871L5.93246 11.2262C5.58639 11.5723 5.02437 11.5723 4.6783 11.2262L1.13455 7.68246C0.788483 7.33639 0.788483 6.77437 1.13455 6.4283C1.48062 6.08223 2.04264 6.08223 2.38871 6.4283L5.30676 9.34359L11.7686 2.88455C12.1146 2.53848 12.6767 2.53848 13.0227 2.88455H13.02Z" fill="url(#paint0_linear_13006_{{ $randomId }})"/>
                                                                                <defs>
                                                                                <linearGradient id="paint0_linear_13006_{{ $randomId }}" x1="8.94006" y1="10.3952" x2="6.55093" y2="2.84747" gradientUnits="userSpaceOnUse">
                                                                                <stop stop-color="#E60C84"/>
                                                                                <stop offset="1" stop-color="#FFCF4B"/>
                                                                                </linearGradient>
                                                                                </defs>
                                                                            </svg>
                                                                                
                                                                        @else
                                                                            <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.09014 1.59014C1.46032 1.21995 2.06051 1.21995 2.4307 1.59014L6.5 5.65944L10.5693 1.59014C10.9395 1.21995 11.5397 1.21995 11.9099 1.59014C12.28 1.96032 12.28 2.56051 11.9099 2.9307L7.84056 7L11.9099 11.0693C12.28 11.4395 12.28 12.0397 11.9099 12.4099C11.5397 12.78 10.9395 12.78 10.5693 12.4099L6.5 8.34056L2.4307 12.4099C2.06051 12.78 1.46032 12.78 1.09014 12.4099C0.719954 12.0397 0.719954 11.4395 1.09014 11.0693L5.15944 7L1.09014 2.9307C0.719954 2.56051 0.719954 1.96032 1.09014 1.59014Z" fill="#DF2F2F"/>
                                                                            </svg>
                                                                        @endif
                                                                        @if ($meta['type'] != 'number')
                                                                            <span class="break-words"> {{ $meta['title'] }} </span>
                                                                        @elseif ($meta['title_position'] == 'before')
                                                                            <span class="break-words"> {{ $meta['title'] . ': ' }} {{ ($meta['value'] == -1) ? __('Unlimited') : $meta['value'] }} </span>
                                                                        @else
                                                                            <span class="break-words"> {{ ($meta['value'] == -1 ? __('Unlimited') : $meta['value']) }} {{ $meta['title'] }} </span>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @endforeach  
                                                            @if (count($hiddenFeatures) > 0)
                                                                <button  class="text-color-14 dark:text-white text-13 font-regular font-Figtree underline cursor-pointer mt-2 text-left upgrade-allPlans">
                                                                    {{ __('Show All') }}
                                                                </button>
                                                    
                                                             @endif
                                                        </div>
                                                        @if (preference('apply_coupon_subscription') && (($package['sale_price'][$billing_cycle] > 0 && !$package['trial_day']) || ($package['trial_day'] && subscription('isUsedTrial', $package['id']))))
                                                        <form action="{{ route('user.subscription.checkout') }}" method="GET" class="plan-disable-btn">
                                                        @else
                                                        <form action="{{ route('user.subscription.store') }}" method="POST" class="plan-disable-btn flex justify-center">
                                                            @csrf
                                                        @endif
                                                            <div class="current-subscription-plan">
                                                                <input type="hidden" name="package_id" value="{{ $package['id'] }}">
                                                                <input type="hidden" name="sending_url" value="{{ techEncrypt(route('user.subscription.store')) }}">
                                                                <input type="hidden" name="billing_cycle" value="{{ $billing_cycle }}">
                                                            </div>
                                                            @if (auth()->user() && $package['trial_day'] && !subscription('isUsedTrial', $package['id']))
                                                                <button type="submit"  class="mt-[34px] text-white dark:text-color-14 text-16 font-semibold py-[13px] px-8 rounded-lg bg-color-14 dark:bg-white font-Figtree plan-loader submit-btn flex justify-center gap-3">{{ __('Start :x Days Trial', ['x' => $package['trial_day']]) }}</button>
                                                            @elseif (!$subscription?->package?->id)
                                                                <button type="submit"  class="mt-[34px] text-white dark:text-color-14 text-16 font-semibold py-[13px] px-8 rounded-lg bg-color-14 dark:bg-white font-Figtree plan-loader submit-btn flex justify-center gap-3">{{ __('Subscribe') }}</button>
                                                            @elseif ($subscription?->package?->id == $package['id'] && $billing_cycle == $subscription?->billing_cycle)
                                                                @if ($subscription?->package?->renewable)
                                                                    <button type="submit"  class="mt-[34px] text-white  text-16 font-semibold py-[13px] px-8 rounded-lg  font-Figtree plan-loader mx-5 submit-btn current-plan flex justify-center gap-3">{{ __('Renew') }}</button>
                                                                @endif
                                                            @elseif (preference('subscription_change_plan') && $subscription?->package?->sale_price[$subscription?->billing_cycle] < $package['sale_price'][$billing_cycle])
                                                                <button type="submit"  class="mx-5 mt-[34px] text-white dark:text-color-14 text-16 font-semibold py-[13px] px-8 rounded-lg bg-color-14 dark:bg-white font-Figtree plan-loader  submit-btn flex justify-center gap-3">{{ __('Upgrade') }}</button>
                                                            @elseif (preference('subscription_change_plan') && preference('subscription_downgrade') && $subscription?->package?->sale_price[$subscription?->billing_cycle] >= $package['sale_price'][$billing_cycle])
                                                                <button type="submit" class="mx-5 mt-[34px] text-white dark:text-color-14 text-16 font-semibold py-[13px] px-8 rounded-lg bg-color-14 dark:bg-white font-Figtree plan-loader  submit-btn flex justify-center gap-3">{{ __('Downgrade') }}</button>
                                                            @endif
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                        </p>
                                    </div>
                                    <div class="fixed z-index-999999 hidden items-center inset-0 bg-color-14 bg-opacity-50 overflow-y-auto upgradePlan-allPlans-modal">
                                        <div class="m-auto">
                                            <div class="relative my-5 z-index-999999 md:px-5 px-3 py-5 sm:w-[520px] w-max rounded-xl bg-white dark:bg-[#3A3A39] modal-h modal-box-shadow transition-all ease-in-out billing-modal-main" id="billing-modal-main">
                                                <svg class="absolute top-2.5 right-2.5 text-color-14 dark:text-white modal-close-btn p-[1px] cursor-pointer modal-cross" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.00749 3.00773C3.41754 2.59768 4.08236 2.59768 4.49241 3.00773L8.99995 7.51527L13.5075 3.00773C13.9175 2.59768 14.5824 2.59768 14.9924 3.00773C15.4025 3.41778 15.4025 4.08261 14.9924 4.49266L10.4849 9.0002L14.9924 13.5077C15.4025 13.9178 15.4025 14.5826 14.9924 14.9927C14.5824 15.4027 13.9175 15.4027 13.5075 14.9927L8.99995 10.4851L4.49241 14.9927C4.08236 15.4027 3.41754 15.4027 3.00749 14.9927C2.59744 14.5826 2.59744 13.9178 3.00749 13.5077L7.51503 9.0002L3.00749 4.49266C2.59744 4.08261 2.59744 3.41778 3.00749 3.00773Z" fill="currentColor"/>
                                                </svg>
                                                <div class="upgradePlan-allPlans-container">
                                                    <p class="font-Figtree text-color-14 dark:text-white text-20 font-semibold text-left border-b border-color-DF dark:border-color-47 pb-3">
                                                        {{ __("Current Plan") }}</p>
                                                    <div class="mt-6 mb-7">
                                                        <div class="grid xxs:grid-cols-2 bg-color-F6 dark:bg-color-47 p-5 rounded-lg gap-4">
                                                            <div>
                                                                <p class="text-color-89 font-semibold text-16 font-Figtree">{{ __("Plan") }}</p>
                                                                <p class="mt-1.5 heading-1 xs:text-28 text-lg font-semibold font-Figtree xxs:w-[130px] sm:w-full modal-package-name"></p>
                                                            </div>
                                                            
                                                            <div>
                                                                <p class="text-color-89 font-semibold text-16 font-Figtree">{{ __("Amount") }}</p>
                                                               <div class="flex items-end">
                                                                    <p class="mt-1.5 text-color-14 dark:text-white xs:text-28 text-lg font-semibold font-Figtree xxs:w-[130px] sm:w-full modal-selling-price">
                                                                    </p>
                                                               </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-col gap-4 mt-6 sub-modal-rtl h-80 pr-6 overflow-auto sidebar-scrollbar modal-plan">
                                                            
                                                        </div>
                                                    </div>
                                                    @if (preference('apply_coupon_subscription') && ((isset($activePackage['sale_price'][$activeSubscription?->billing_cycle]) && $activePackage['sale_price'][$activeSubscription?->billing_cycle] > 0 && !$activePackage['trial_day']) || ($activePackage['trial_day'] && subscription('isUsedTrial', $activePackage['id']))))
                                                    <form action="{{ route('user.subscription.checkout') }}" method="GET" class="plan-form">
                                                    @else
                                                    <form action="{{ route('user.subscription.store') }}" method="POST" class="button-need-disable">
                                                        @csrf
                                                    @endif
                                                        <div class="current-subscription-plan-modal">
                                                            <input type="hidden" name="package_id" value="{{ $activePackage->id }}">
                                                            <input type="hidden" name="sending_url" value="{{ techEncrypt(route('user.subscription.store')) }}">
                                                            <input type="hidden" name="billing_cycle" value="{{ $activeSubscription?->billing_cycle }}">
                                                        </div>
                                                        <button type="submit" class="font-Figtree text-white font-semibold text-15 py-[11px] px-10 bg-color-14 rounded-xl flex justify-center items-center gap-3 modal-btn plan-modal-btn">{{ __("Update") }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </section>
                    <section class="show-current-subscription">
                            <div class="mt-6 flex 8xl:flex-row flex-col justify-between gap-4 w-full">
                            @include('user.includes.current-plan')
                            <div
                                class="bg-color-F6 dark:bg-color-3A lg:p-6 p-4 rounded-xl 8xl:w-[66.5%] subscription-profile-card h-[220px] w-full flex flex-col justify-between">
                                <div>
                                    <p class="text-color-14 dark:text-white text-20 lg:pr-6 pr-4 font-Figtree font-semibold any-sub-p">
                                        {{ __('You do not have any subscription') }}</p>
                                    <p class="mt-3 text-color-14 dark:text-white font-Figtree font-normal text-14 pr-5">
                                        {{ __('Subscribe to our more featured plan for more credits & benefits.') }}
                                    </p>
                                </div>
                                <div class="flex mt-[26px] justify-start gap-5 flex-wrap">
                                    <a  class="all-plans-toggle magic-bg w-max rounded-xl text-16 text-white font-semibold py-3 px-[25px] cursor-pointer">
                                        {{ __('All Plan') }}
                                    </a>
                                    <div class="fixed z-index-999999 hidden items-center inset-0 bg-color-14 bg-opacity-50 overflow-y-auto upgradePlan-information-modal">
                                        <div class="xxs:m-auto mx-5">
                                            <div class="relative my-5 z-index-999999 md:px-5 px-3 py-5 sm:w-[520px] w-max rounded-xl bg-white dark:bg-[#3A3A39] modal-h modal-box-shadow transition-all ease-in-out billing-modal-main" id="billing-modal-main">
                                                <svg class="absolute top-2.5 right-2.5 text-color-14 dark:text-white modal-close-btn p-[1px] cursor-pointer modal-cross" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.00749 3.00773C3.41754 2.59768 4.08236 2.59768 4.49241 3.00773L8.99995 7.51527L13.5075 3.00773C13.9175 2.59768 14.5824 2.59768 14.9924 3.00773C15.4025 3.41778 15.4025 4.08261 14.9924 4.49266L10.4849 9.0002L14.9924 13.5077C15.4025 13.9178 15.4025 14.5826 14.9924 14.9927C14.5824 15.4027 13.9175 15.4027 13.5075 14.9927L8.99995 10.4851L4.49241 14.9927C4.08236 15.4027 3.41754 15.4027 3.00749 14.9927C2.59744 14.5826 2.59744 13.9178 3.00749 13.5077L7.51503 9.0002L3.00749 4.49266C2.59744 4.08261 2.59744 3.41778 3.00749 3.00773Z" fill="currentColor"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10">
                            <p class="font-semibold text-color-14 dark:text-white text-20 pb-3">{{ __('Billing & Payment') }}
                            </p>
                            <div class="border-b border-color-DF dark:border-[#474746]"></div>
                        </div>
                        <div class="mt-6">
                            <div
                                class="bg-color-F6 dark:bg-color-3A rounded-xl p-6 8xl:w-[66.5%] subscription-profile-card">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-Figtree text-color-14 dark:text-white text-20 font-semibold">
                                            {{ auth()->user()->name }}</p>
                                        <p class="font-Figtree text-15 text-color-89 font-medium pt-2">
                                            {{ config('openAI.is_demo') ? 'xxxxxxx@xx.xx' : auth()->user()->email }}</p>
                                    </div>
                                    <img class="w-[67px] h-[67px] rounded-full pr-0.5"
                                        src="{{ auth()->user()->fileUrl() }}"
                                        alt="{{ __('Image') }}">
                                </div>
                                <div class="mt-11 flex flex-wrap items-center gap-4  justify-start">

                                    <div class="">
                                        <p class="font-normal text-13 font-Figtree text-color-14 dark:text-white">
                                            {{ __('Billing Price') }}</p>
                                        <p class="font-semibold text-16 font-Figtree text-color-14 dark:text-white pt-1">
                                            0.00
                                        </p>
                                    </div>
                                    <div class="">
                                        <p class="font-normal text-13 font-Figtree text-color-14 dark:text-white">
                                            {{ __('Billing Cycle') }}</p>
                                        <p class="font-semibold text-16 font-Figtree text-color-14 dark:text-white pt-1">
                                            ...
                                        </p>
                                    </div>
                                    <div class="">
                                        <p class="font-normal text-13 font-Figtree text-color-14 dark:text-white">
                                            {{ __('Payment Status') }}</p>
                                        <p class="font-semibold text-16 font-Figtree text-color-14 dark:text-white pt-1">
                                            ...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <p class="font-semibold text-color-14 dark:text-white text-20 pb-3">{{ __('Unsubscribe') }}
                            </p>
                            <div class="border-b border-color-DF dark:border-[#474746]"></div>
                        </div>
                        <div class="pt-6 pb-24">
                            <p class="text-color-14 dark:text-white font-normal font-Figtree text-15 6xl:w-[650px] 4xl:w-[500px] xl:w-[400px]">
                            {{ __('Cancelling your subscription will not cause you to lose all your credits and plan benefits. But you can subscribe again anytime and get to keep all your saved documents & history.')}}
                            </p>
                            <a href="javaScript:void(0);"
                                class="text-color-14 dark:text-white rounded-xl px-[18px] whitespace-nowrap py-[12px] text-15 mt-6 mb-10 flex w-max border border-color-89 dark:border-color-47 bg-color-F6 dark:bg-color-47 font-semibold modal-toggle cursor-default">{{ __('Cancel Subscription') }}</a>
                        </div>
                    </section>
                   
                </div>
            @else
                <div class="grow 2xl:pl-6 8xl:pr-[84px] px-5 xl:pt-[74px] md:pt-5 pt-[74px] pb-[46px] dark:bg-[#292929] xl:overflow-auto sidebar-scrollbar main-profile-content md:h-screen xl:w-1/2 show-current-plan">
                   <div class="flex justify-start items-center font-Figtree text-color-14 dark:text-white text-15 font-normal gap-2.5 md:hidden xl:px-6 pb-4">
                        <a class="profile-back cursor-pointer">
                            <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.875 6C15.875 5.68934 15.6232 5.4375 15.3125 5.4375L2.0455 5.4375L5.58525 1.89775C5.80492 1.67808 5.80492 1.32192 5.58525 1.10225C5.36558 0.882582 5.00942 0.882582 4.78975 1.10225L0.289752 5.60225C0.0700827 5.82192 0.0700827 6.17808 0.289752 6.39775L4.78975 10.8977C5.00942 11.1174 5.36558 11.1174 5.58525 10.8977C5.80492 10.6781 5.80492 10.3219 5.58525 10.1023L2.0455 6.5625L15.3125 6.5625C15.6232 6.5625 15.875 6.31066 15.875 6Z"
                                fill="currentColor" />
                            </svg>
                        </a>
                        <span>{{ __('Subscriptions') }}</span>
                   </div>
                    <div class="show-current-subscription">
                        <p class="font-semibold text-color-14 dark:text-white text-20 pb-3">{{ __('Subscription') }}</p>
                        <div class="border-b border-color-DF dark:border-[#474746]"></div>
                    </div>
                    <div class="show-all-plans hidden">
                        <div class="back-to-current flex items-center cursor-pointer">
                            <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.875 6C15.875 5.68934 15.6232 5.4375 15.3125 5.4375L2.0455 5.4375L5.58525 1.89775C5.80492 1.67808 5.80492 1.32192 5.58525 1.10225C5.36558 0.882582 5.00942 0.882582 4.78975 1.10225L0.289752 5.60225C0.0700827 5.82192 0.0700827 6.17808 0.289752 6.39775L4.78975 10.8977C5.00942 11.1174 5.36558 11.1174 5.58525 10.8977C5.80492 10.6781 5.80492 10.3219 5.58525 10.1023L2.0455 6.5625L15.3125 6.5625C15.6232 6.5625 15.875 6.31066 15.875 6Z" fill="url(#paint0_linear_3040_2060)"></path>
                            </svg>
                            <p class="font-semibold text-color-14 dark:text-white text-20 ml-3">{{ __('Subscription Plans') }}</p>
                        </div>
                        <div class="border-b border-color-DF dark:border-[#474746] pt-3"></div>
                        
                    </div>
                    <section class="show-current-subscription">
                         <div class="mt-6 flex 8xl:flex-row flex-col justify-between gap-4 w-full">
                        @include('user.includes.current-plan')
                            <div
                                class="bg-color-F6 dark:bg-color-3A lg:p-6 p-4 ltr:!pr-0 rounded-xl upgrade-plan-card 9xl:w-[34.9%] 8xl:w-[42%] w-full flex flex-col justify-between rtl:pl-2">
                            <div>
                                    <p class="text-color-14 dark:text-white text-20 lg:pr-6 pr-4 font-Figtree font-semibold any-sub-p">
                                        {{ __('Running out of credits too soon?') }}</p>
                                    <p class="mt-3 text-color-14 dark:text-white font-Figtree font-normal text-14 pr-5">
                                        {{ __('Upgrade to our more featured plan for more credits & benefits.') }}
                                    </p>
                            </div>
                                <div class="flex mt-[26px] justify-start gap-5 flex-wrap">
                                    @if ($activeSubscription->package?->renewable)
                                    <button class="magic-bg h-max upgrade-plan w-max rounded-xl text-16 text-white font-semibold py-3 px-[25px] whitespace-nowrap mr-2">
                                        {{ __('Renew Plan') }}
                                    </button>
                                    @endif
                                    <a  class="all-plans-toggle magic-bg w-max rounded-xl text-16 text-white font-semibold py-3 px-[25px]  cursor-pointer">
                                        {{ __('All Plan') }}
                                    </a>
                                    @if ($activeSubscription->package)
                                    <div class="fixed z-index-999999 hidden items-center inset-0 bg-color-14 bg-opacity-50 overflow-y-auto upgradePlan-information-modal">
                                        <div class="m-auto">
                                            <div class="relative my-5 z-index-999999 md:px-5 px-3 py-5 sm:w-[520px] w-max rounded-xl bg-white dark:bg-[#3A3A39] modal-h modal-box-shadow transition-all ease-in-out billing-modal-main" id="billing-modal-main">
                                                <svg class="absolute top-2.5 right-2.5 text-color-14 dark:text-white modal-close-btn p-[1px] cursor-pointer modal-cross" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.00749 3.00773C3.41754 2.59768 4.08236 2.59768 4.49241 3.00773L8.99995 7.51527L13.5075 3.00773C13.9175 2.59768 14.5824 2.59768 14.9924 3.00773C15.4025 3.41778 15.4025 4.08261 14.9924 4.49266L10.4849 9.0002L14.9924 13.5077C15.4025 13.9178 15.4025 14.5826 14.9924 14.9927C14.5824 15.4027 13.9175 15.4027 13.5075 14.9927L8.99995 10.4851L4.49241 14.9927C4.08236 15.4027 3.41754 15.4027 3.00749 14.9927C2.59744 14.5826 2.59744 13.9178 3.00749 13.5077L7.51503 9.0002L3.00749 4.49266C2.59744 4.08261 2.59744 3.41778 3.00749 3.00773Z" fill="currentColor"/>
                                                </svg>
                                                <div class="upgradePlan-modal-container">
                                                    <p class="font-Figtree text-color-14 dark:text-white text-20 font-semibold text-left border-b border-color-DF dark:border-color-47 pb-3">
                                                        {{ __("Current Plan") }}</p>
                                                    <div class="mt-6 mb-7">
                                                        <div class="grid xxs:grid-cols-2 bg-color-F6 dark:bg-color-47 p-5 rounded-lg gap-4">
                                                            <div>
                                                                <p class="text-color-89 font-semibold text-16 font-Figtree">{{ __("Plan") }}</p>

                                                                <p class="mt-1.5 heading-1 xs:text-28 text-lg font-semibold font-Figtree xxs:w-[130px] sm:w-full">{{ $activePackage->name }}</p>
                                                            </div>
                                                            
                                                            <div>
                                                                <p class="text-color-89 font-semibold text-16 font-Figtree">{{ __("Amount") }}</p>
                                                                <p class="mt-1.5 text-color-14 dark:text-white xs:text-28 text-lg font-semibold font-Figtree xxs:w-[130px] sm:w-full">
                                                                    {{ $activeSubscription->package?->discount_price[$activeSubscription->billing_cycle] > 0 ? formatNumber($activeSubscription->package?->discount_price[$activeSubscription->billing_cycle]) : formatNumber($activeSubscription->package?->sale_price[$activeSubscription->billing_cycle]) }}
                                                                    <span class="text-14 font-medium">/{{ ($activeSubscription->billing_cycle == 'days' ? $activePackage->duration . ' ' : '') . ucfirst($activeSubscription->billing_cycle) }}</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-col gap-4 mt-6 sub-modal-rtl h-80 pr-6 overflow-auto sidebar-scrollbar">
                                                            @foreach ($activePackageDescription['features'] as $key => $feature)
                                                                @if ($feature->is_visible)
                                                                    <div
                                                                        class="flex items-center text-color-14 dark:text-white text-15 font-normal font-Figtree gap-[9px]">
                                                                        <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="12" height="9"
                                                                            viewBox="0 0 12 9" fill="none">
                                                                            <path
                                                                                d="M11.1433 1.10826C11.4609 1.42579 11.4609 1.94146 11.1433 2.25899L4.64036 8.76197C4.32283 9.0795 3.80717 9.0795 3.48964 8.76197L0.238146 5.51048C-0.0793821 5.19295 -0.0793821 4.67728 0.238146 4.35976C0.555675 4.04223 1.07134 4.04223 1.38887 4.35976L4.06627 7.03462L9.99516 1.10826C10.3127 0.790735 10.8284 0.790735 11.1459 1.10826H11.1433Z"
                                                                                fill="url(#paint0_linear_950_2001)" />
                                                                            <defs>
                                                                                <linearGradient id="paint0_linear_950_2001" x1="7.39992"
                                                                                    y1="7.99947" x2="5.20783" y2="1.07424"
                                                                                    gradientUnits="userSpaceOnUse">
                                                                                    <stop offset="0" stop-color="#E60C84" />
                                                                                    <stop offset="1" stop-color="#FFCF4B" />
                                                                                </linearGradient>
                                                                            </defs>
                                                                        </svg>
                                                                        <span>
                                                                            @if ($feature->type != 'number')
                                                                                {{ $feature->title }}
                                                                            @elseif ($feature->title_position == 'before')
                                                                                {{ $feature->title . ': ' }}
                                                                                {{ $feature->value == -1 ? __('Unlimited') : $feature->value }}
                                                                            @else
                                                                                {{ $feature->value == -1 ? __('Unlimited') : $feature->value }}
                                                                                {{ $feature->title }}
                                                                            @endif
                                                                        </span>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    @if (preference('apply_coupon_subscription') && (($activePackage['sale_price'][$activeSubscription->billing_cycle] > 0 && !$activePackage['trial_day']) || ($activePackage['trial_day'] && subscription('isUsedTrial', $activePackage['id']))))
                                                    <form action="{{ route('user.subscription.checkout') }}" method="GET" class="plan-form">
                                                    @else
                                                    <form action="{{ route('user.subscription.store') }}" method="POST" class="button-need-disable">
                                                        @csrf
                                                    @endif
                                                        <input type="hidden" name="package_id" value="{{ $activePackage->id }}">
                                                        <input type="hidden" name="sending_url" value="{{ techEncrypt(route('user.subscription.store')) }}">
                                                        <input type="hidden" name="billing_cycle" value="{{ $activeSubscription->billing_cycle }}">
                                                        <button type="submit" class="font-Figtree text-white font-semibold text-15 py-[11px] px-10 bg-color-14 rounded-xl flex justify-center items-center gap-3 plan-modal-btn">{{ __("Update") }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <div class="fixed z-index-999999 hidden items-center inset-0 bg-color-14 bg-opacity-50 overflow-y-auto upgradePlan-information-modal">
                                        <div class="m-auto">
                                            <div class="relative my-5 z-index-999999 md:px-5 px-3 py-5 sm:w-[520px] w-max rounded-xl bg-white dark:bg-[#3A3A39] modal-h modal-box-shadow transition-all ease-in-out billing-modal-main" id="billing-modal-main">
                                                {{ __('The Plan is not available.') }}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            </div>
                            <div class="mt-10">
                                <p class="font-semibold text-color-14 dark:text-white text-20 pb-3">{{ __('Billing & Payment') }}
                                </p>
                                <div class="border-b border-color-DF dark:border-[#474746]"></div>
                            </div>
                            <div class="mt-6">
                                <div
                                    class="bg-color-F6 dark:bg-color-3A rounded-xl p-6 8xl:w-[66.5%] subscription-profile-card">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="font-Figtree text-color-14 dark:text-white text-20 font-semibold">
                                                {{ auth()->user()->name }}</p>
                                            <p class="font-Figtree text-15 text-color-89 font-medium pt-2">
                                                {{ config('openAI.is_demo') ? 'xxxxxxx@xx.xx' : auth()->user()->email }}</p>
                                        </div>
                                        <img class="w-[67px] h-[67px] rounded-full pr-0.5"
                                            src="{{ auth()->user()->fileUrl() }}"
                                            alt="{{ __('Image') }}">
                                    </div>
                                    <div class="mt-11 flex flex-wrap items-center 3xl:gap-10 gap-4 justify-start 6xl:w-[500px] 4xl:w-[450px] xl:w-[400px]">
                                        <div>
                                            <p class="font-normal text-13 font-Figtree text-color-14 dark:text-white">
                                                {{ __('Billing Price') }}</p>
                                            <p class="font-semibold text-16 font-Figtree text-color-14 dark:text-white pt-1">
                                                {{ formatNumber($activeSubscription->amount_billed) }}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="font-normal text-13 font-Figtree text-color-14 dark:text-white">
                                                {{ __('Billing Cycle') }}</p>
                                            <p class="font-semibold text-16 font-Figtree text-color-14 dark:text-white pt-1">
                                                {{ ($activeSubscription->billing_cycle == 'days' ? $activeSubscription->duration . ' ' : '') . ucFirst($activeSubscription->billing_cycle) }}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="font-normal text-13 font-Figtree text-color-14 dark:text-white">
                                                {{ __('Payment Status') }}</p>
                                            <p class="font-semibold text-16 font-Figtree text-color-14 dark:text-white pt-1">
                                                {{ ucFirst($activeSubscription->payment_status) }}
                                            </p>
                                        </div>
                                        @if (subscription('isTrialMode', $activeSubscription->id) || ($activeSubscription->status != 'Pending' && $activeSubscription->billing_cycle != 'lifetime'))
                                        <div>
                                            <p class="font-normal text-13 font-Figtree text-color-14 dark:text-white">
                                                {{ $activeSubscription->status == 'Cancel' ? __('Expired Date') : __('Next Billing Date') }}</p>
                                            <p class="font-semibold text-16 font-Figtree text-color-14 dark:text-white pt-1">
                                                {{ timezoneFormatDate($activeSubscription->next_billing_date) }}
                                            </p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="mt-10">
                                <p class="font-semibold text-color-14 dark:text-white text-20 pb-3">{{ __('Unsubscribe') }}
                                </p>
                                <div class="border-b border-color-DF dark:border-[#474746]"></div>
                            </div>
                            <div class="pt-6 pb-24">
                                <p class="text-color-14 dark:text-white font-normal font-Figtree text-15 6xl:w-[650px] 4xl:w-[500px] xl:w-[400px]">
                                    {{ __('Cancelling your subscription will not cause you to lose your current existing credits and plan benefits. But you can subscribe again anytime and get to keep all your saved documents & history.')}}
                                </p>
                                @php
                                    $isActiveSubscription = subscription('getUserSubscription', auth()->user()->id)->status == 'Active';
                                @endphp

                                <a href="javaScript:void(0);" title="{{ $isActiveSubscription ? '' : __('Cancellable plans are limited to only active subscriptions.') }}"
                                    class="{{ $isActiveSubscription ? '' : 'cancel-tooltip' }} text-color-14 dark:text-white rounded-xl px-[18px] whitespace-nowrap py-[12px] text-15 mt-6 mb-10 flex w-max border border-color-89 dark:border-color-47 bg-color-F6 dark:bg-color-47 font-semibold modal-toggle {{ $isActiveSubscription ? '' : 'cursor-default' }}">{{ __('Cancel Subscription') }}</a>
                                <div class="modal {{ $isActiveSubscription ? 'index-modal' : '' }}  absolute z-50 top-0 left-0 right-0 w-full h-full">
                                    <div class="modal-overlay fixed z-10 top-0 right-0 left-0 w-full h-full">
                                    </div>
                                    <div class="modal-wrapper modal-wrapper modal-transition fixed inset-0 z-10">
                                        <div class="modal-body flex h-full justify-center p-4 text-center items-center sm:p-0">
                                            <div class="modal-content modal-transition rounded-xl py-6 md:px-[54px] bg-white dark:bg-color-3A px-8">
                                                <p class="text-color-14 font-semibold text-20 font-Figtree dark:text-white text-center">{{ __('Cancel Subscription') }}?</p>
                                                <p class="font-Figtree text-color-14 dark:text-white text-15 font-normal mt-3 text-center md:w-[332px]">
                                                    {{ __('You will not lose any of your existing credits or plan benefits.') }}
                                                </p>
                                                <div class="flex justify-center items-center mt-7 gap-[16px]">
                                                    <a href="javaScript:void(0);" class="font-Figtree text-color-14 dark:text-white font-semibold xs:text-15 text-14 py-[11px] xs:px-[42px] px-[30px] border border-color-89 dark:border-color-47 bg-color-F6 dark:bg-color-47 rounded-xl modal-toggle">{{ __("Not Really") }}</a>
                                                    <a href="{{ route('user.subscription.cancel', ['user_id' => auth()->user()->id]) }}" class="font-Figtree text-white font-semibold xs:text-15 text-14 py-[11px] xs:px-[30px] px-5 bg-color-DFF rounded-xl">{{ __('Yes, Cancel') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    <section class="show-all-plans hidden mt-6">
                        <p class="font-semibold text-color-14 dark:text-white text-20 pb-3">{{ __('Plans that suits your needs and budget.') }}
                        </p>
                        <p class="font-medium text-color-14 dark:text-white text-15 pb-3">{{ __('We have plans for everyone, whether you are a solo marketer or a large agency. 100% secured payment and no hidden fees.') }}
                        </p>
                        <div class="mt-5">
                            <div class="xl:flex justify-between items-center w-full gap-5">
                                <div
                                    class="flex items-center border border-color-DF dark:border-[#474746] rounded-xl bg-white dark:bg-[#474746] relative overflow-hidden nav-scroller-wrapper">
                                    <div class="nav-scroller relative overflow-x-auto scroll-hide overflow-y-hidden whitespace-nowrap">
                                        <ul class="nav nav-tabs flex justify-around float-left px-1.5 items-center whitespace-nowrap flex-row list-none py-1.5 nav-scroller-content relative w-min min-w-full">
                                            @php
                                                $hasMonthlyBilling = array_key_exists('monthly', $billingCycles);
                                            @endphp
                                            @foreach($billingCycles as $key => $value)
                                                <li class="nav-item nav-scroller-item" role="presentation">
                                                    <button 
                                                        class="nav-link-activity nav-link rounded-lg block font-normal text-color-14 dark:text-white text-15 px-6 py-[7px] {{ ($hasMonthlyBilling && $key == 'monthly') || (!$hasMonthlyBilling && $loop->first) ? 'active' : '' }}" data-val="{{ $key }}">
                                                        {{ $value }}
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
            
                                    <button
                                        class="nav-scroller-btn nav-scroller-btn--left bg-white dark:bg-[#474746] px-1.5 absolute top-0 bottom-0 left-0;">
                                        <svg class="text-color-89 dark:text-white neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                            fill="none">
                                            <g clip-path="url(#clip0_360_1562)">
                                                <path
                                                    d="M8.25 8.78063L5.46862 5.625L8.25 2.46937L7.39372 1.5L3.75 5.625L7.39372 9.75L8.25 8.78063Z"
                                                    fill="currentColor" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_360_1562">
                                                    <rect width="12" height="12" fill="white"
                                                        transform="matrix(-1 0 0 1 12 0)" />
                                                </clipPath>
                                            </defs>
                                        </svg></button>
            
                                    <button
                                        class="nav-scroller-btn nav-scroller-btn--right bg-white dark:bg-[#474746] px-1.5 absolute top-0 bottom-0 right-0"><svg class="text-color-89 dark:text-white neg-transition-scale"
                                            xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12"
                                            fill="none">
                                            <g clip-path="url(#clip0_360_1559)">
                                                <path
                                                    d="M3.75 8.78063L6.53138 5.625L3.75 2.46937L4.60628 1.5L8.25 5.625L4.60628 9.75L3.75 8.78063Z"
                                                    fill="currentColor" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_360_1559">
                                                    <rect width="12" height="12" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg></button>
            
                                </div>
                            </div>
                            <div class="tab-content mt-6 xl:mt-8" id="tabs-tabContent">
                                <div class="tab-pane fade show active" id="tabs-home" role="tabpanel"
                                    aria-labelledby="tabs-home-tab">
                                    <div class="plan-root 6xl:gap-10 lg:gap-5 gap-6 lg:px-0 md:px-10 px-5 w-full flex flex-wrap justify-center {{count($packages) != 0 ? 'lg:mb-[140px] mb-[90px] 6xl:mt-[60px] mt-11' : ''}}">
                                        @foreach($packages as $key => $package)
                                            @foreach ($package['billing_cycle'] as $billing_cycle => $value)
                                                @continue($value == 0)
                                                <div  class="{{ $package['parent_class'] }} plan-parent plan-{{ $billing_cycle }} {{ ($hasMonthlyBilling && $billing_cycle == 'monthly') || (!$hasMonthlyBilling && $loop->first) ? '' : 'hidden' }} disable-gradient-border">
                                                    <div class="rounded-[30px] border border-color-89 dark:border-color-DFF bg-white dark:bg-color-14 pt-6 pb-5 sub-plan-rtl dark:bg-color-29 single-plan-container"> 
                                                        @if ($subscription?->package?->id == $package['id'] && $billing_cycle == $subscription?->billing_cycle && $subscription?->package?->renewable)
                                                        <p class="current-plan-text absolute bg-black text-white  py-2 rounded-full font-Figtree">{{ __('Current Plan') }}</p>
                                                        @endif
                                                        <p class="text-color-14 dark:text-white text-22 font-medium font-Figtree break-words text-center package-name">{{ $package['name'] }}</p>
                                        
                                                        <p class="text-36 font-medium font-RedHat text-color-14 text-color-89 mt-1 text-center billing-cycle">
                                                            @if($package['discount_price'][$billing_cycle] > 0)
                                                                <span class=" plan-price">{{ formatNumber($package['discount_price'][$billing_cycle]) }}</span>
                                                            @else
                                                                <span class="text-36 font-bold heading-1 break-all plan-price plan-price">{{ $package['sale_price'][$billing_cycle] == 0 ? __('Free') : formatNumber($package['sale_price'][$billing_cycle]) }}</span>
                                                            @endif
                                                            <span class="text-15 billing-text">/{{ ($billing_cycle == 'days' ? $package['duration'] . ' ' : '') . ucfirst($billing_cycle) }}</span>
                                                        </p>
                                                        
                                                        @php
                                                        
                                                            $mainFeature = [];
                                                            foreach (Modules\Subscription\Services\PackageService::features() as $key => $value) {
                                                                if (isset($package['features'][$key])) {
                                                                    $mainFeature[$key] = $package['features'][$key];
                                                                    unset($package['features'][$key]);
                                                                }
                                                            }
                                                            
                                                            $features = $mainFeature + $package['features'];
                                                            $package['features'] = $mainFeature + $package['features'];
                                                        @endphp
                                                        
                                                        <div class="flex flex-col gap-[18px] mt-6 6xl:pl-11 lg:pl-5 pl-8 pr-4">
                                                            @php
                                                                $visibleFeatures = array_slice($features, 0, 5);
                                                                $hiddenFeatures = array_slice($features, 5);
                                                             @endphp

                                                            @foreach($visibleFeatures as $meta)
                                                                @continue(empty($meta['title']))
                                                            
                                                                @if ($meta['is_visible'])
                                                                    <div class="flex items-center text-color-14 dark:text-white text-14 font-medium font-Figtree gap-[9px]">
                                                                        @php $randomId = md5(uniqid(rand(), true)) @endphp
                                                                        @if($meta['status'] == 'Active')
                                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M13.02 2.88455C13.366 3.23062 13.366 3.79264 13.02 4.13871L5.93246 11.2262C5.58639 11.5723 5.02437 11.5723 4.6783 11.2262L1.13455 7.68246C0.788483 7.33639 0.788483 6.77437 1.13455 6.4283C1.48062 6.08223 2.04264 6.08223 2.38871 6.4283L5.30676 9.34359L11.7686 2.88455C12.1146 2.53848 12.6767 2.53848 13.0227 2.88455H13.02Z" fill="url(#paint0_linear_13006_{{ $randomId }})"/>
                                                                                <defs>
                                                                                <linearGradient id="paint0_linear_13006_{{ $randomId }}" x1="8.94006" y1="10.3952" x2="6.55093" y2="2.84747" gradientUnits="userSpaceOnUse">
                                                                                <stop stop-color="#E60C84"/>
                                                                                <stop offset="1" stop-color="#FFCF4B"/>
                                                                                </linearGradient>
                                                                                </defs>
                                                                            </svg>
                                                                                
                                                                        @else
                                                                            <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.09014 1.59014C1.46032 1.21995 2.06051 1.21995 2.4307 1.59014L6.5 5.65944L10.5693 1.59014C10.9395 1.21995 11.5397 1.21995 11.9099 1.59014C12.28 1.96032 12.28 2.56051 11.9099 2.9307L7.84056 7L11.9099 11.0693C12.28 11.4395 12.28 12.0397 11.9099 12.4099C11.5397 12.78 10.9395 12.78 10.5693 12.4099L6.5 8.34056L2.4307 12.4099C2.06051 12.78 1.46032 12.78 1.09014 12.4099C0.719954 12.0397 0.719954 11.4395 1.09014 11.0693L5.15944 7L1.09014 2.9307C0.719954 2.56051 0.719954 1.96032 1.09014 1.59014Z" fill="#DF2F2F"/>
                                                                            </svg>
                                                                        @endif
                                                                        @if ($meta['type'] != 'number')
                                                                            <span class="break-words"> {{ $meta['title'] }} </span>
                                                                        @elseif ($meta['title_position'] == 'before')
                                                                            <span class="break-words"> {{ $meta['title'] . ': ' }} {{ ($meta['value'] == -1) ? __('Unlimited') : $meta['value'] }} </span>
                                                                        @else
                                                                            <span class="break-words"> {{ ($meta['value'] == -1 ? __('Unlimited') : $meta['value']) }} {{ $meta['title'] }} </span>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                            @foreach($hiddenFeatures as $meta)
                                                                @continue(empty($meta['title']))
                                                        
                                                                @if ($meta['is_visible'])
                                                                    <div class="flex items-center text-color-14 dark:text-white text-14 font-medium font-Figtree gap-[9px] hidden">
                                                                        @php $randomId = md5(uniqid(rand(), true)) @endphp
                                                                        @if($meta['status'] == 'Active')
                                                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M13.02 2.88455C13.366 3.23062 13.366 3.79264 13.02 4.13871L5.93246 11.2262C5.58639 11.5723 5.02437 11.5723 4.6783 11.2262L1.13455 7.68246C0.788483 7.33639 0.788483 6.77437 1.13455 6.4283C1.48062 6.08223 2.04264 6.08223 2.38871 6.4283L5.30676 9.34359L11.7686 2.88455C12.1146 2.53848 12.6767 2.53848 13.0227 2.88455H13.02Z" fill="url(#paint0_linear_13006_{{ $randomId }})"/>
                                                                                <defs>
                                                                                <linearGradient id="paint0_linear_13006_{{ $randomId }}" x1="8.94006" y1="10.3952" x2="6.55093" y2="2.84747" gradientUnits="userSpaceOnUse">
                                                                                <stop stop-color="#E60C84"/>
                                                                                <stop offset="1" stop-color="#FFCF4B"/>
                                                                                </linearGradient>
                                                                                </defs>
                                                                            </svg>
                                                                                
                                                                        @else
                                                                            <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.09014 1.59014C1.46032 1.21995 2.06051 1.21995 2.4307 1.59014L6.5 5.65944L10.5693 1.59014C10.9395 1.21995 11.5397 1.21995 11.9099 1.59014C12.28 1.96032 12.28 2.56051 11.9099 2.9307L7.84056 7L11.9099 11.0693C12.28 11.4395 12.28 12.0397 11.9099 12.4099C11.5397 12.78 10.9395 12.78 10.5693 12.4099L6.5 8.34056L2.4307 12.4099C2.06051 12.78 1.46032 12.78 1.09014 12.4099C0.719954 12.0397 0.719954 11.4395 1.09014 11.0693L5.15944 7L1.09014 2.9307C0.719954 2.56051 0.719954 1.96032 1.09014 1.59014Z" fill="#DF2F2F"/>
                                                                            </svg>
                                                                        @endif
                                                                        @if ($meta['type'] != 'number')
                                                                            <span class="break-words"> {{ $meta['title'] }} </span>
                                                                        @elseif ($meta['title_position'] == 'before')
                                                                            <span class="break-words"> {{ $meta['title'] . ': ' }} {{ ($meta['value'] == -1) ? __('Unlimited') : $meta['value'] }} </span>
                                                                        @else
                                                                            <span class="break-words"> {{ ($meta['value'] == -1 ? __('Unlimited') : $meta['value']) }} {{ $meta['title'] }} </span>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @endforeach  
                                                            @if (count($hiddenFeatures) > 0)
                                                                <button  class="text-color-14 dark:text-white text-13 font-regular font-Figtree underline cursor-pointer mt-2 text-left upgrade-allPlans">
                                                                    {{ __('Show All') }}
                                                                </button>
                                                    
                                                             @endif
                                                        </div>

                                                        @if (preference('apply_coupon_subscription') && (($package['sale_price'][$billing_cycle] > 0 && !$package['trial_day']) || ($package['trial_day'] && subscription('isUsedTrial', $package['id']))))
                                                        <form action="{{ route('user.subscription.checkout') }}" method="GET" class="plan-disable-btn">
                                                        @else
                                                        <form action="{{ route('user.subscription.store') }}" method="POST" class="plan-disable-btn flex justify-center">
                                                            @csrf
                                                        @endif
                                                            <div class="current-subscription-plan">
                                                                <input type="hidden" name="package_id" value="{{ $package['id'] }}">
                                                                <input type="hidden" name="sending_url" value="{{ techEncrypt(route('user.subscription.store')) }}">
                                                                <input type="hidden" name="billing_cycle" value="{{ $billing_cycle }}">
                                                            </div>
                                                            @if (auth()->user() && $package['trial_day'] && !subscription('isUsedTrial', $package['id']))
                                                                <button type="submit"  class="mx-5 mt-[34px] text-white dark:text-color-14 text-16 font-semibold py-[13px] px-8 rounded-lg bg-color-14 dark:bg-white font-Figtree plan-loader  submit-btn flex justify-center gap-3">{{ __('Start :x Days Trial', ['x' => $package['trial_day']]) }}</button>
                                                            @elseif (!$subscription?->package?->id)
                                                                <button type="submit"  class="mx-5 mt-[34px] text-white dark:text-color-14 text-16 font-semibold py-[13px] px-8 rounded-lg bg-color-14 dark:bg-white font-Figtree plan-loader  submit-btn flex justify-center gap-3">{{ __('Subscribe') }}</button>
                                                            @elseif ($subscription?->package?->id == $package['id'] && $billing_cycle == $subscription?->billing_cycle)
                                                                @if ($subscription?->package?->renewable)
                                                                    <button type="submit"  class="mt-[34px] text-white  text-16 font-semibold py-[13px] px-8 rounded-lg  font-Figtree plan-loader mx-5 submit-btn current-plan flex justify-center gap-3">{{ __('Renew') }}</button>
                                                                @endif
                                                            @elseif (preference('subscription_change_plan') && $subscription?->package?->sale_price[$subscription?->billing_cycle] < $package['sale_price'][$billing_cycle])
                                                                <button type="submit"  class="mx-5  mt-[34px] text-white dark:text-color-14 text-16 font-semibold py-[13px] px-8 rounded-lg bg-color-14 dark:bg-white font-Figtree plan-loader  submit-btn flex justify-center gap-3">{{ __('Upgrade') }}</button>
                                                            @elseif (preference('subscription_change_plan') && preference('subscription_downgrade') && $subscription?->package?->sale_price[$subscription?->billing_cycle] >= $package['sale_price'][$billing_cycle])
                                                                <button type="submit" class="mx-5 mt-[34px] text-white dark:text-color-14 text-16 font-semibold py-[13px] px-8 rounded-lg bg-color-14 dark:bg-white font-Figtree plan-loader submit-btn flex justify-center gap-3 ">{{ __('Downgrade') }}</button>
                                                            @endif
                                                        </form>
                                                        
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                        </p>
                                    </div>
                                    <div class="fixed z-index-999999 hidden items-center inset-0 bg-color-14 bg-opacity-50 overflow-y-auto upgradePlan-allPlans-modal">
                                        <div class="m-auto">
                                            <div class="relative my-5 z-index-999999 md:px-5 px-3 py-5 sm:w-[520px] w-max rounded-xl bg-white dark:bg-[#3A3A39] modal-h modal-box-shadow transition-all ease-in-out billing-modal-main" id="billing-modal-main">
                                                <svg class="absolute top-2.5 right-2.5 text-color-14 dark:text-white modal-close-btn p-[1px] cursor-pointer modal-cross" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.00749 3.00773C3.41754 2.59768 4.08236 2.59768 4.49241 3.00773L8.99995 7.51527L13.5075 3.00773C13.9175 2.59768 14.5824 2.59768 14.9924 3.00773C15.4025 3.41778 15.4025 4.08261 14.9924 4.49266L10.4849 9.0002L14.9924 13.5077C15.4025 13.9178 15.4025 14.5826 14.9924 14.9927C14.5824 15.4027 13.9175 15.4027 13.5075 14.9927L8.99995 10.4851L4.49241 14.9927C4.08236 15.4027 3.41754 15.4027 3.00749 14.9927C2.59744 14.5826 2.59744 13.9178 3.00749 13.5077L7.51503 9.0002L3.00749 4.49266C2.59744 4.08261 2.59744 3.41778 3.00749 3.00773Z" fill="currentColor"/>
                                                </svg>
                                                <div class="upgradePlan-allPlans-container">
                                                    <p class="font-Figtree text-color-14 dark:text-white text-20 font-semibold text-left border-b border-color-DF dark:border-color-47 pb-3">
                                                        {{ __("Current Plan") }}</p>
                                                    <div class="mt-6 mb-7">
                                                        <div class="grid xxs:grid-cols-2 bg-color-F6 dark:bg-color-47 p-5 rounded-lg gap-4">
                                                            <div>
                                                                <p class="text-color-89 font-semibold text-16 font-Figtree">{{ __("Plan") }}</p>
                                                                <p class="mt-1.5 heading-1 xs:text-28 text-lg font-semibold font-Figtree xxs:w-[130px] sm:w-full modal-package-name"></p>
                                                            </div>
                                                            
                                                            <div>
                                                                <p class="text-color-89 font-semibold text-16 font-Figtree">{{ __("Amount") }}</p>
                                                               <div class="flex items-end">
                                                                    <p class="mt-1.5 text-color-14 dark:text-white xs:text-28 text-lg font-semibold font-Figtree xxs:w-[130px] sm:w-full modal-selling-price">
                                                                    </p>
                                                               </div>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-col gap-4 mt-6 sub-modal-rtl h-80 pr-6 overflow-auto sidebar-scrollbar modal-plan">
                                                            
                                                        </div>
                                                    </div>
                                                    @if (preference('apply_coupon_subscription') && (($activePackage['sale_price'][$activeSubscription->billing_cycle] > 0 && !$activePackage['trial_day']) || ($activePackage['trial_day'] && subscription('isUsedTrial', $activePackage['id']))))
                                                    <form action="{{ route('user.subscription.checkout') }}" method="GET" class="plan-form">
                                                    @else
                                                    <form action="{{ route('user.subscription.store') }}" method="POST" class="button-need-disable">
                                                        @csrf
                                                    @endif
                                                        <div class="current-subscription-plan-modal">
                                                            <input type="hidden" name="package_id" value="{{ $activePackage->id }}">
                                                            <input type="hidden" name="sending_url" value="{{ techEncrypt(route('user.subscription.store')) }}">
                                                            <input type="hidden" name="billing_cycle" value="{{ $activeSubscription->billing_cycle }}">
                                                        </div>
                                                        <button type="submit" class="font-Figtree text-white font-semibold text-15 py-[11px] px-10 bg-color-14 rounded-xl flex justify-center items-center gap-3 modal-btn plan-modal-btn">{{ __("Update") }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </section>
                   
                </div>
            @endif
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/assets/js/user/subscription.min.js') }}"></script>
@endsection
