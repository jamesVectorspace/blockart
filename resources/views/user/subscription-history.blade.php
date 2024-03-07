@extends('layouts.user_master')
@section('page_title', __('Billing History'))
@section('content')
<div class="w-[68.9%] 7xl:w-[83.9%] dark:bg-[#292929] flex flex-col flex-1 border-l dark:border-[#474746] border-color-DF h-screen border-right">
    <div class="xl:flex justify-between subscription-main md:overflow-auto sidebar-scrollbar h-screen">
        @include('user.includes.account-sidebar')
        <div class="grow xl:pl-6 px-5 xl:pt-[74px] md:pt-5 pt-[74px] pb-24 dark:bg-[#292929] xl:overflow-auto sidebar-scrollbar 8xl:pr-[84px] main-profile-content xl:w-1/2">
            <div class="flex justify-start items-center font-Figtree text-color-14 dark:text-white text-15 font-normal gap-2.5 md:hidden pb-4">
                <a class="profile-back cursor-pointer">
                    <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.875 6C15.875 5.68934 15.6232 5.4375 15.3125 5.4375L2.0455 5.4375L5.58525 1.89775C5.80492 1.67808 5.80492 1.32192 5.58525 1.10225C5.36558 0.882582 5.00942 0.882582 4.78975 1.10225L0.289752 5.60225C0.0700827 5.82192 0.0700827 6.17808 0.289752 6.39775L4.78975 10.8977C5.00942 11.1174 5.36558 11.1174 5.58525 10.8977C5.80492 10.6781 5.80492 10.3219 5.58525 10.1023L2.0455 6.5625L15.3125 6.5625C15.6232 6.5625 15.875 6.31066 15.875 6Z"
                            fill="currentColor" />
                    </svg>
                </a>
                <span>{{ __('Billing History') }}</span>
            </div>

            <div>
                <p class="font-semibold text-color-14 dark:text-white text-20 pb-3 pt-1.5">{{ __('Billing History')}}</p>
                <div class="border-b border-color-DF dark:border-[#474746]"></div>
            </div>
            <div class="bg-white dark:bg-[#292929] rounded-xl image-list-table border border-color-DF dark:border-color-47 mt-[22px] xl:w-[430px] 3xl:w-[600px] 4xl:w-[645px] 5xl:w-full bill-table">
                <div class="flex flex-col">
                    <div class="rounded-xl p-3 overflow-x-auto overflow-y-hidden">
                        <table class="min-w-full">
                            <thead class="bg-color-DF dark:bg-[#474746] rounded-xl">
                                <tr class="rounded-lg">
                                    <th
                                        class="5xl:px-[34px] px-3 py-[9px] text-left font-Figtree text-14 font-medium text-color-14 dark:text-white">
                                        {{ __('Plan') }}
                                    </th>
                                    <th
                                        class="5xl:px-6 px-3 py-[9px] font-Figtree text-left text-14 font-medium text-color-14 dark:text-white">
                                        {{ __('Amount') }}
                                    </th>
                                    <th
                                        class="5xl:px-6 px-3 py-[9px] text-left font-Figtree text-14 font-medium text-color-14 dark:text-white hidden xl:table-cell 9xl:whitespace-nowrap whitespace-nowrap 6xl:whitespace-normal">
                                        <span class="5xl:w-[74px]">{{ __('Start Date') }}</span>
                                    </th>
                                    <th
                                        class="5xl:px-6 px-3 py-[9px] text-left font-Figtree text-14 font-medium text-color-14 dark:text-white hidden xl:table-cell 9xl:whitespace-nowrap whitespace-nowrap 6xl:whitespace-normal">
                                       <span class="5xl:w-[74px]">{{ __('Expire Date') }}</span>
                                    </th>
                                    <th
                                        class="5xl:px-6 px-3 py-[9px] text-left font-Figtree text-14 font-medium text-color-14 dark:text-white">
                                        {{ __('Status') }}
                                    </th>
                                    <th
                                        class="5xl:px-10 px-3 py-[9px] text-right font-Figtree text-14 font-medium text-color-14 dark:text-white w-max">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($payments as $payment)
                                    <tr class="border-b dark:border-[#474746]">
                                        <td class="text-14 font-Figtree py-[22px] text-color-14 dark:text-white font-normal 5xl:pl-[34px] 5xl:pr-0 px-3">
                                            <p class="lg:w-28 w-20 break-words">
                                                @empty($payment->package || $payment->credit)
                                                    {{ __('Unknown') }}
                                                @else
                                                    @if ($payment->billing_cycle)
                                                        {{ optional($payment->package)->name }}
                                                    @else
                                                        {{ $payment->credit?->name }}
                                                        @if ($payment->credit?->type == 'default')
                                                            <small class="block">({{ __('Default') }}) </small>
                                                        @else
                                                            <small class="block">({{ __('Onetime') }}) </small>
                                                        @endif
                                                    @endif
                                                @endempty
                                            </p>
                                        </td>
                                        <td
                                            class="text-14 font-Figtree py-[22px] text-color-14 dark:text-white font-normal 5xl:px-6 px-3 sm:w-40">
                                            {{ formatNumber($payment->billing_price) }}
                                        </td>
                                        <td
                                            class="text-14 font-Figtree py-[22px] text-color-14 dark:text-white font-normal 5xl:px-6 px-3 sm:w-40 whitespace-nowrap hidden xl:table-cell">
                                            {{ timeZoneFormatDate($payment->billing_date) }}
                                        </td>
                                        <td
                                            class="text-14 font-Figtree py-[22px] text-color-14 dark:text-white font-normal 5xl:px-6 px-3 sm:w-40 whitespace-nowrap hidden xl:table-cell">
                                            {{ $payment->next_billing_date ? 
                                                (($payment->billing_cycle == 'lifetime' && $payment->is_trial == 0) ? __('Not Applicable') : timeZoneFormatDate($payment->next_billing_date)) 
                                                : '' }}
                                        </td>
                                        <td
                                            class="text-13 font-Figtree py-[22px] font-medium 5xl:px-6 px-3 sm:w-40">
                                            @php
                                                if (!$payment->billing_cycle) {
                                                   $payment->status = $payment->status == 'Expired' ? 'Active' : $payment->status; 
                                                }
                                            @endphp
                                            <p class="w-max py-1 px-2.5 rounded-md {{ billingStatusBadges($payment->status) }}">{{ ucfirst($payment->status) }}</p>
                                        </td>
                                        <td
                                            class="text-14 font-Figtree py-[22px] text-color-14 font-medium 5xl:pr-[30px] 5xl:pl-0 px-3 bill-action-rtl">
                                            <div class="flex sm:gap-4 gap-3.5 justify-end items-center 8xl:mr-2.5">
                                                <div class="relative">
                                                    @if (preference('apply_coupon'))
                                                    <form action="{{ route('user.subscription.checkout') }}" method="GET" class="plan-form">
                                                    @else
                                                    <form action="{{ route('user.pay.pending_subscription', ['id' => $payment->id]) }}" method="POST" class="button-need-disable">
                                                        @csrf
                                                    @endif
                                                        <input type="hidden" name="package_id" value="{{ $payment->package?->id }}">
                                                        <input type="hidden" name="sending_url" value="{{ techEncrypt(route('user.pay.pending_subscription', ['id' => $payment->id])) }}">
                                                        <button type="submit" class="payNowButton tooltips flex items-center sm:p-2 p-[7px] border dark:border-color-47 bg-white text-color-14 dark:text-white dark:bg-color-47 rounded-lg justify-center {{ $payment->payment_status == 'Unpaid' && $payment->status == 'Pending' ? 'border-color-89' : 'border-color-DF' }}" title="{{ __('Pay Now') }}" {{ $payment->payment_status == 'Unpaid' && $payment->status == 'Pending' ? '' : 'disabled' }}>
                                                            <span class="text-color-14 dark:text-white h-4 w-4">
                                                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                                                <path d="M8.19533 15.5252C8.58008 15.5233 8.99108 15.5216 9.23295 15.5216C9.83595 15.5216 10.3454 15.0302 10.3454 14.4486C10.3454 13.8669 9.83602 13.3755 9.23295 13.3755H8.18945C8.19058 13.7926 8.19333 15.1262 8.19533 15.5252Z" fill="currentColor"/>
                                                                <path d="M15.2148 16.7755H16.7973L16.0097 14.6885L15.2148 16.7755Z" fill="currentColor"/>
                                                                <path d="M27.9375 7.3125H4.0625C1.82244 7.3125 0 9.13494 0 11.375V20.625C0 22.8651 1.82244 24.6875 4.0625 24.6875H27.9375C30.1776 24.6875 32 22.8651 32 20.625V11.375C32 9.13494 30.1776 7.3125 27.9375 7.3125ZM18.767 11.4983H21.0063L22.7745 14.2064L24.5374 11.4983H26.7747L23.7126 16.2023L23.702 20.5021L21.827 20.4975L21.8376 16.2009L18.767 11.4983ZM6.3125 11.5002H9.23375C10.881 11.5002 12.2212 12.8227 12.2212 14.4482C12.2212 16.0738 10.8811 17.3963 9.23375 17.3963C8.99119 17.3963 8.57475 17.3981 8.1875 17.4V20.4998H6.3125V11.5002ZM18.2004 20.4954L17.5041 18.6503H14.4999L13.7972 20.4954H11.7908L15.2164 11.5011L16.8096 11.4995L20.2044 20.4953H18.2004V20.4954Z" fill="currentColor"/>
                                                                </svg>
                                                            </span>
                                                            <span class="image-download-tooltip-text z-50 w-max text-white items-center font-medium text-12 text-center rounded-lg px-2.5 py-[5px] absolute z-1 top-[119%] pay-tooltips">{{ __('Pay Now') }}
                                                            </span>
                                                        </button>
                                                    </form>
                                                </div>

                                                <div class="relative">
                                                     <a class="flex bill-tooltips tooltips items-center border border-color-89 dark:border-color-47 text-color-14 dark:text-white bg-white dark:bg-color-47 sm:p-2 p-[7px] rounded-lg justify-center " title="{{ __('View Bill')}}"
                                                    href="{{ route('user.bill-details', $payment->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 16 16" fill="none">
                                                        <g clip-path="url(#clip0_2387_1688)">
                                                            <path
                                                                d="M7.99972 3C4.66638 3 1.81972 5.07333 0.666382 8C1.81972 10.9267 4.66638 13 7.99972 13C11.333 13 14.1797 10.9267 15.333 8C14.1797 5.07333 11.333 3 7.99972 3ZM7.99972 11.3333C6.15972 11.3333 4.66638 9.84 4.66638 8C4.66638 6.16 6.15972 4.66667 7.99972 4.66667C9.83972 4.66667 11.333 6.16 11.333 8C11.333 9.84 9.83972 11.3333 7.99972 11.3333ZM7.99972 6C6.89305 6 5.99972 6.89333 5.99972 8C5.99972 9.10667 6.89305 10 7.99972 10C9.10638 10 9.99972 9.10667 9.99972 8C9.99972 6.89333 9.10638 6 7.99972 6Z"
                                                                fill="currentColor" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2387_1688">
                                                                <rect width="16" height="16"
                                                                    fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    <span class="image-download-tooltip-text z-50 w-max text-white items-center font-medium text-12 text-center rounded-lg px-2.5 py-[5px] absolute z-1 top-[119%] view-bill">{{ __('View Bill') }}
                                                    </span>
                                                </a>
                                                </div>

                                                <div class="relative">
                                                    <a class="bill-tooltips tooltips flex items-center sm:p-2 p-[7px] border border-color-89 dark:border-color-47 bg-white text-color-14 dark:text-white dark:bg-color-47 rounded-lg justify-center" title="{{ __('Download Bill')}}"
                                                 href="{{ route('user.bill-pdf', $payment->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                        height="16" viewBox="0 0 16 16" fill="none">
                                                        <g clip-path="url(#clip0_2387_1692)">
                                                            <path
                                                                d="M14 6.23529H10.8571V2H6.14286V6.23529H3L8.5 11.1765L14 6.23529ZM3 12.5882V14H14V12.5882H3Z"
                                                                fill="currentColor" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_2387_1692">
                                                                <rect width="16" height="16"
                                                                    fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                    <span class="image-download-tooltip-text z-50 w-max text-white items-center font-medium text-12 text-center rounded-lg px-2.5 py-[5px] absolute z-1 top-[119%] view-bill">{{ __('Download Bill') }}
                                                    </span>
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
            </div>
            <div class="mt-5">
                {{ $payments->links('site.layout.partials.pagination') }}
            </div>

        </div>
    </div>
</div>
@endsection
