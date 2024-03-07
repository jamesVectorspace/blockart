<div class="card card-info shadow-none" id="nav">
    <ul class="nav nav-pills nav-stacked" id="mcap-tab" role="tablist">
        @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@referrals'))
        <li class="nav-item">
            <a class="nav-link h-lightblue text-left {{ isset($list_menu) &&  $list_menu == 'referrals' ? 'active' : ''}}" href="{{ route('affiliate.users.referrals', $user->id) }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Referrals') }}</a>
        </li>
        @endif
        @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@payouts'))
        <li class="nav-item">
            <a class="nav-link h-lightblue text-left {{ isset($list_menu) &&  $list_menu == 'payouts' ? 'active' : ''}}" href="{{ route('affiliate.users.payouts', $user->id) }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Payouts') }}</a>
        </li>
        @endif
        @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@topPackages'))
        <li class="nav-item">
            <a class="nav-link h-lightblue text-left {{ isset($list_menu) &&  $list_menu == 'top_packages' ? 'active' : ''}}" href="{{ route('affiliate.users.topPackages', $user->id) }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Top Packages') }}</a>
        </li>
        @endif
        @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@profile') && hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@userProfileUpdate'))
        <li class="nav-item">
            <a class="nav-link h-lightblue text-left {{ isset($list_menu) &&  $list_menu == 'profile' ? 'active' : ''}}" href="{{ route('affiliate.users.profile', $user->id) }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Profile') }}</a>
        </li>
        @endif
        @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@multiTier'))
        <li class="nav-item">
            <a class="nav-link h-lightblue text-left {{ isset($list_menu) &&  $list_menu == 'multi_tier' ? 'active' : ''}}" href="{{ route('affiliate.users.multiTier', $user->id) }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Multi-Tier') }}</a>
        </li>
        @endif
    </ul>
</div>
