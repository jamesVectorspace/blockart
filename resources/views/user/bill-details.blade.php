@extends('layouts.user_master')
@section('page_title', __('Bill details'))
@section('content')
    <div
        class="w-[68.9%] 5xl:w-[85.9%] dark:bg-[#292929] flex flex-col flex-1 border-l dark:border-[#474746] border-color-DF h-screen">
        <div class="xl:flex justify-between h-full subscription-main md:overflow-auto sidebar-scrollbar md:h-screen">
            @include('user.includes.account-sidebar')
            <div
                class="xl:w-[76%] details-body 5xl:w-[71.2%] px-6 pt-[74px] pb-[124px] dark:bg-[#292929] xl:overflow-auto sidebar-scrollbar 8xl:pr-[84px] main-profile-content">
                <a class="font-normal text-color-14 dark:text-white text-15 flex justify-start gap-3 items-center pb-3 w-full border-b border-white dark:border-color-47"
                    href="{{ route('user.subscription.history') }}">
                    <svg class="neg-transition-scale" xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M15.875 6C15.875 5.68934 15.6232 5.4375 15.3125 5.4375L2.0455 5.4375L5.58525 1.89775C5.80492 1.67808 5.80492 1.32192 5.58525 1.10225C5.36558 0.882582 5.00942 0.882582 4.78975 1.10225L0.289752 5.60225C0.0700827 5.82192 0.0700827 6.17808 0.289752 6.39775L4.78975 10.8977C5.00942 11.1174 5.36558 11.1174 5.58525 10.8977C5.80492 10.6781 5.80492 10.3219 5.58525 10.1023L2.0455 6.5625L15.3125 6.5625C15.6232 6.5625 15.875 6.31066 15.875 6Z"
                            fill="currentColor" />
                    </svg>
                    <span>{{ __('Billing History') }}</span>
                </a>
                <p class="font-semibold text-color-14 font-RedHat text-20 text-left mt-6 dark:text-white">
                    {{ __('Bill details') }}</p>
                <div
                    class="bg-white dark:bg-[#292929] rounded-xl image-list-table border border-color-DF dark:border-color-47 mt-5">
                    <div>
                        <div class="p-4">
                            <div class="grid md:grid-cols-3 grid-cols-1 gap-4">
                                <div>
                                    <div><strong class="company-name text-color-14 dark:text-white">{{ preference('company_name') }}</strong></div>
                                    <div>
                                        <span class="company-info text-color-14 dark:text-white">{{ preference('company_street') }},
                                            {{ preference('company_city') }}</span>
                                        <span class="company-info text-color-14 dark:text-white">{{ preference('company_zipCode') }}</span>
                                    </div>
                                    <span class="company-info text-color-14 dark:text-white">
                                        {{ __('Web') }}: <a class="company-info-url"
                                            href="{{ url('/') }}">{{ url('/') }}</a>
                                    </span>
                                </div>
                                <div>
                                    <strong class="text-color-14 dark:text-white">{{ __('Bill To') }}</strong><br>
                                    <strong class="text-color-14 dark:text-white">{{ $subscription?->user?->name }}</strong><br>
                                    <strong>{{ $subscription?->user?->address }}</strong><br>
                                </div>
                                <div>
                                    <div>
                                        <strong class="text-color-14 dark:text-white">
                                            {{ __('Code') }}: {{ $subscription->code }}
                                        </strong>
                                    </div>
                                    <div class="text-color-14 dark:text-white">
                                        {{ __('Billing Date') }} : {{ timezoneFormatDate($subscription->billing_date) }}
                                    </div>
                                    <div class="text-color-14 dark:text-white">
                                        {{ __('Next Billing Date') }} : {{ ($subscription->billing_cycle == 'lifetime' && $subscription->is_trial == 0) ? __('Not Applicable') : timezoneFormatDate($subscription->next_billing_date) }}
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div>
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-color-14 dark:text-white">
                                    <thead class="text-xs uppercase text-color-14 dark:text-white">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-color-14 dark:text-white">
                                                {{ __('Plan') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-color-14 dark:text-white">
                                                {{ __('Billing Cycle') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-color-14 dark:text-white">
                                                {{ __('Gateway') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-color-14 dark:text-white">
                                                {{ __('Renewable') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-color-14 dark:text-white">
                                                {{ __('Total') }}
                                                ({{ \App\Models\Currency::getAll()->where('id', preference('dflt_currency_id'))->first()->symbol }})
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr class="border-b border-gray-200 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium whitespace-nowrap text-color-14 dark:text-white">
                                                @if ($subscription->billing_cycle)
                                                    {{ $subscription?->package?->name ?? __('Unknown') }}
                                                @else
                                                    {{ $subscription?->credit?->name ?? __('Unknown') }}
                                                @endif
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ ucfirst($subscription->billing_cycle ?? __('One time')) }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ ucfirst($subscription->payment_method ?? __('Unknown')) }}
                                            </td>
                                            <td class="px-6 py-4 text-color-14 dark:text-white">
                                                {{ $subscription->renewable ? __('Yes') : __('No') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ formatCurrencyAmount($subscription->billing_price) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="right">
                                                {{ __('Discount') }}
                                            </td>
                                            <td class="px-6 py-1">
                                                {{ formatCurrencyAmount($subscription->billing_price - $subscription->amount_billed) }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" align="right">
                                                <strong>{{ __('Grand Total') }}</strong>
                                            </td>
                                            <td class="px-6 py-1">
                                                <strong>{{ formatCurrencyAmount($subscription->amount_billed) }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="right">{{ __('Paid') }}</td>
                                            <td class="px-6 py-1">
                                                {{ formatCurrencyAmount($subscription->amount_received) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" align="right">
                                                <strong>{{ __('Due') }}</strong>
                                            </td>

                                            <td class="px-6 py-1">
                                                <strong>
                                                    {{ formatCurrencyAmount($subscription->amount_billed - $subscription->amount_received) }}
                                                </strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
