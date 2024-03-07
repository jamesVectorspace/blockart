<div class="card card-info shadow-none" id="nav">
    <div class="card-header p-t-20 border-bottom mb-2">
        <h5>{{ __('Withdrawals') }}</h5>
    </div>
    <ul class="nav nav-pills nav-stacked" id="mcap-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link h-lightblue text-left {{ isset($list_menu) &&  $list_menu == 'payment' ? 'active' : ''}}" href="{{ route('site.affiliate.payments') }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Configure Payout') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link h-lightblue text-left {{ isset($list_menu) &&  $list_menu == 'requests' ? 'active' : ''}}" href="{{ route('site.affiliate.requests') }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Request') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link h-lightblue text-left {{ isset($list_menu) &&  $list_menu == 'withdraw_commission' ? 'active' : ''}}" href="{{ route('site.affiliate.withdrawals') }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Withdraw Commissions') }}</a>
        </li>
    </ul>
</div>
