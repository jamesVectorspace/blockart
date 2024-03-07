<div class="card card-info shadow-none" id="nav">
    <div class="card-header p-t-20 border-bottom mb-2">
        <h5>{{ __('Affiliate Settings') }}</h5>
    </div>
    <ul class="nav nav-pills nav-stacked" id="mcap-tab" role="tablist">

            <li class="nav-item">
                <a class="nav-link h-lightblue text-left {{ isset($list_menu) &&  $list_menu == 'settings' ? 'active' : ''}}" href="{{ route('affiliate.settings') }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Settings') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link h-lightblue text-left {{ isset($list_menu) &&  $list_menu == 'commission_plan' ? 'active' : ''}}" href="{{ route('commission.plan.index') }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Commission Plan') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link h-lightblue text-left {{ isset($list_menu) &&  $list_menu == 'campaign' ? 'active' : ''}}" href="{{ route('campaign.index') }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Campaign') }}</a>
            </li>

            <li class="nav-item">
                <a class="nav-link h-lightblue text-left {{ isset($list_menu) &&  $list_menu == 'affiliate_tags' ? 'active' : ''}}" href="{{ route('tags.index') }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Affiliate Tags') }}</a>
            </li>
    </ul>
</div>
