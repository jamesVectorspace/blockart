@extends('layouts.user_master')
@section('page_title', __('Subscriptions'))
@section('content')
    <div class="w-[68.9%] 5xl:w-[85.9%] dark:bg-[#292929] flex flex-col flex-1 border-l dark:border-[#474746] border-color-DF">
        <div class="w-full xl:flex xl:h-full subscription-main md:overflow-auto sidebar-scrollbar md:h-screen">
            @include('user.includes.account-sidebar')
            <div
                class="grow px-6 pt-[74px] pb-[46px] dark:bg-[#292929] xl:overflow-auto sidebar-scrollbar 8xl:pr-[84px] main-profile-content h-full">
                <a
                    class="flex justify-start items-center font-Figtree text-color-14 dark:text-white text-15 font-normal gap-2.5 lg:hidden xl:px-6 pb-4 profile-back"><svg class="neg-transition-scale"
                        xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.875 6C15.875 5.68934 15.6232 5.4375 15.3125 5.4375L2.0455 5.4375L5.58525 1.89775C5.80492 1.67808 5.80492 1.32192 5.58525 1.10225C5.36558 0.882582 5.00942 0.882582 4.78975 1.10225L0.289752 5.60225C0.0700827 5.82192 0.0700827 6.17808 0.289752 6.39775L4.78975 10.8977C5.00942 11.1174 5.36558 11.1174 5.58525 10.8977C5.80492 10.6781 5.80492 10.3219 5.58525 10.1023L2.0455 6.5625L15.3125 6.5625C15.6232 6.5625 15.875 6.31066 15.875 6Z"
                            fill="currentColor" />
                    </svg> <span>{{ __('Subscriptions') }}</span> </a>
                <div>
                    <p class="font-semibold text-color-14 dark:text-white text-20 pb-3">{{ __('Account Credits') }}</p>
                    <div class="border-b border-color-DF dark:border-[#474746]"></div>
                </div>
                <div class="mt-6 flex 8xl:flex-row flex-col justify-between gap-4 w-full">
                    @include('user.includes.current-plan')
                </div>

                <div class="mt-10">
                    <p class="font-semibold text-color-14 dark:text-white text-20 pb-3">{{ __('Subscription Plans') }}
                    </p>
                    <div class="border-b border-color-DF dark:border-[#474746]"></div>
                </div>
                <div class="mt-6 bg-color-F6 dark:bg-color-3A rounded-xl lg:p-6 p-4 xl:w-max w-full flex 8xl:flex-row flex-col justify-between lg:gap-8 gap-7 checked-loader"
                    id="plans">
                    <div class="plan-description">
                        <div>
                            <form action="{{ route('user.subscription.store') }}" method="POST">
                                @csrf

                                <div>
                                    <p class="text-color-14 dark:text-white text-16 font-medium font-Figtree">
                                        {{ __('Select Subscription Plan') }} *</p>
                                    <div class="flex mt-4 gap-3 flex-wrap xs:flex-nowrap">
                                        @forelse ($packages as $package)
                                            <label class="custom-radio"
                                                {{ !preference('subscription_change_plan') || (!preference('subscription_downgrade') && $package->sort_order < $activeSubscriptionPackage?->sort_order) ? 'disabled' : '' }}>
                                                <input type="radio" class="hidden radio-test plan" name="package_id"
                                                    value="{{ $package->id }}"
                                                    {{ $activePackageDescription['package']->id == $package->id ? 'checked' : '' }}
                                                    {{ !preference('subscription_change_plan') || (!preference('subscription_downgrade') && $package->sort_order < $activeSubscriptionPackage?->sort_order) ? 'disabled' : '' }} />
                                                <div
                                                    class="radio-btn border border-color-DF dark:border-color-47 lg:w-[140px] w-28 h-[60px] rounded-lg cursor-pointer relative flex items-center justify-center bg-white dark:bg-color-29 font-semibold text-center font-Figtree text-16 text-color-14 dark:text-white">
                                                    {{ $package->name }}</div>
                                            </label>
                                        @empty
                                        @endforelse
                                    </div>
                                    <p class="mt-2 text-color-89 text-13 font-medium font-Figtree">
                                        {{ $activePackageDescription['package']->short_description }}
                                    </p>
                                </div>
                                @if ($activeSubscription?->status == 'Active' && $activeSubscription?->package_id)
                                    <button type="submit"
                                        class="mt-[34px] text-white text-16 font-semibold flex w-max py-[13px] px-8 rounded-xl font-Figtree subscription-button">{{ $activePackage->id == $activeSubscription->package_id ? __('Renew Plan') : __('Upgrade Plan') }}</button>
                                @else
                                    <button type="submit"
                                        class="mt-[34px] text-white text-16 font-semibold flex w-max py-[13px] px-8 rounded-xl font-Figtree subscription-button">{{ __('Subscribe to Plan') }}</button>
                                @endif

                                <p class="font-Figtree text-color-89 text-12 font-medium mt-3"></p>
                            </form>
                        </div>
                        <div>
                            <div class="package-description">
                                <div class="h-max">
                                    <div class="rounded-xl bg-color-14 pl-6 pt-5 pb-2 sub-plan-pack-des">
                                        <p class="text-white text-20 font-semibold font-Figtree">
                                            {{ $activePackageDescription['package']->name }}
                                        </p>
                                        <div class="bg-color-47 rounded-lg py-2.5 pl-4 pr-[97px] mt-3 mr-6 active-package">
                                            <p class="text-24 font-medium font-RedHat text-white leading-8">
                                                <span
                                                    class="text-36 font-bold leading-[44px]">{{ formatNumber($activePackageDescription['package']->sale_price) }}</span>
                                                <span
                                                    class="text-14 font-Figtree leading-6">{{ $activePackageDescription['package']->billing_cycle }}</span>
                                            </p>
                                        </div>

                                        <div class="flex flex-col gap-4 h-80 mt-5 overflow-auto sidebar-scrollbar py-5 pr-6">
                                            @foreach ($activePackageDescription['features'] as $key => $feature)
                                                @if ($feature->is_visible)
                                                    <div
                                                        class="flex items-center text-white text-14 font-medium font-Figtree gap-[9px]">
                                                        <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="12"
                                                            height="9" viewBox="0 0 12 9" fill="none">
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
    <script src="{{ asset('public/assets/js/user/subscription.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/jquery.blockUI.min.js') }}"></script>
@endsection
