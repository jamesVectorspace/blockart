<nav class="pcoded-navbar">
    <div class="navbar-wrapper">

        <div class="navbar-brand header-logo">
            <a href="{{ route('admin.affiliate.dashboard') }}" class="b-brand">
                @php
                    $logo = App\Models\Preference::getLogo('company_logo');
                @endphp
                <img class="admin-panel-header-logo neg-transition-scale" src="{{ $logo }}" alt="{{ trimWords(preference('company_name'), 17)}}">
            </a>
            <a class="mobile-menu neg-transition-scale" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>

        <div class="navbar-content scroll-div">
            @if(auth()->user()->roles()->first()->slug == 'admin' ||
                hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@dashboard') ||
                hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@users') ||
                hasPermission('Modules\Affiliate\Http\Controllers\CommissionPlanController@index') ||
                hasPermission('Modules\Affiliate\Http\Controllers\CampaignController@index') ||
                hasPermission('Modules\Affiliate\Http\Controllers\AffiliateTagController@index') ||
                hasPermission('Modules\Affiliate\Http\Controllers\WithdrawalsController@index') ||
                hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@settings')
               )
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>{{ __('Admin') }}</label>
                </li>
                @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@dashboard'))
                <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'dashboard' ? 'pcoded-trigger active' : '' }}">
                    <a href='{{ route('admin.affiliate.dashboard') }}' class="nav-link">
                        <span class="pcoded-micon">
                            <i class="fas fa-home neg-transition-scale neg-transition-scale"></i>
                        </span><span class="pcoded-mtext">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                @endif
                @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@users'))
                <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'users' ? 'pcoded-trigger active' : '' }}">
                    <a href='{{ route('affiliate.users') }}' class="nav-link">
                        <span class="pcoded-micon">
                            <i class="fas fa-users neg-transition-scale neg-transition-scale"></i>
                        </span><span class="pcoded-mtext">{{ __('Affiliates') }}</span>
                    </a>
                </li>
                @endif
                @if(hasPermission('Modules\Affiliate\Http\Controllers\CommissionPlanController@index'))
                <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'commission' ? 'pcoded-trigger active' : '' }}">
                    <a href='{{ route('commission.plan.index') }}' class="nav-link">
                        <span class="pcoded-micon">
                            <i class="far fa-lightbulb neg-transition-scale neg-transition-scale"></i>
                        </span><span class="pcoded-mtext">{{ __('Commission Plans') }}</span>
                    </a>
                </li>
                @endif
                @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateTagController@index'))
                <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'tags' ? 'pcoded-trigger active' : '' }}">
                    <a href='{{ route('tags.index') }}' class="nav-link">
                        <span class="pcoded-micon">
                            <i class="fas fa-tag neg-transition-scale neg-transition-scale"></i>
                        </span><span class="pcoded-mtext">{{ __('Affiliate Tags') }}</span>
                    </a>
                </li>
                @endif
                @if(hasPermission('Modules\Affiliate\Http\Controllers\CampaignController@index'))
                <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'campaign' ? 'pcoded-trigger active' : '' }}">
                    <a href='{{ route('campaign.index') }}' class="nav-link">
                        <span class="pcoded-micon">
                            <i class="fab fa-free-code-camp neg-transition-scale neg-transition-scale"></i>
                        </span><span class="pcoded-mtext">{{ __('Campaigns') }}</span>
                    </a>
                </li>
                @endif
                @if(hasPermission('Modules\Affiliate\Http\Controllers\WithdrawalsController@index'))
                <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'withdraw' ? 'pcoded-trigger active' : '' }}">
                    <a href='{{ route('affiliate.users.withdrawals') }}' class="nav-link">
                        <span class="pcoded-micon">
                            <i class="fas fa-money-bill-alt neg-transition-scale neg-transition-scale"></i>
                        </span><span class="pcoded-mtext">{{ __('Withdrawals') }}</span>
                    </a>
                </li>
                @endif
                @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@settings'))
                <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'settings' ? 'pcoded-trigger active' : '' }}">
                    <a href='{{ route('affiliate.settings') }}' class="nav-link">
                        <span class="pcoded-micon">
                            <i class="fas fa-cog neg-transition-scale neg-transition-scale"></i>
                        </span><span class="pcoded-mtext">{{ __('Settings') }}</span>
                    </a>
                </li>
                @endif
            </ul>
            @endif

            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
                    <label>{{ __('user') }}</label>
                </li>
                <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'affiliate_dashboard' ? 'pcoded-trigger active' : '' }}">
                    <a href='{{ route('site.affiliate.dashboard') }}' class="nav-link">
                        <span class="pcoded-micon">
                            <i class="fas fa-home neg-transition-scale neg-transition-scale"></i>
                        </span><span class="pcoded-mtext">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                @if(auth()->user()->affiliateUser()->activeUser()->exists())
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'profile' ? 'pcoded-trigger active' : '' }}">
                        <a href='{{ route('site.affiliate.profile') }}' class="nav-link">
                    <span class="pcoded-micon">
                        <i class="feather icon-user neg-transition-scale neg-transition-scale"></i>
                    </span><span class="pcoded-mtext">{{ __('Profile') }}</span>
                        </a>
                    </li>
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'referrals' ? 'pcoded-trigger active' : '' }}">
                        <a href='{{ route('site.affiliate.referrals') }}' class="nav-link">
                    <span class="pcoded-micon">
                        <i class="fab fa-affiliatetheme neg-transition-scale neg-transition-scale"></i>
                    </span><span class="pcoded-mtext">{{ __('Referrals') }}</span>
                        </a>
                    </li>
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'top_packages' ? 'pcoded-trigger active' : '' }}">
                        <a href='{{ route('site.affiliate.topPackages') }}' class="nav-link">
                    <span class="pcoded-micon">
                        <i class="fas fa-database neg-transition-scale neg-transition-scale"></i>
                    </span><span class="pcoded-mtext">{{ __('Top Packages') }}</span>
                        </a>
                    </li>
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'withdrawals' ? 'pcoded-trigger active' : '' }}">
                        <a href='{{ route('site.affiliate.payments') }}' class="nav-link">
                    <span class="pcoded-micon">
                        <i class="fas fa-money-bill-alt neg-transition-scale neg-transition-scale"></i>
                    </span><span class="pcoded-mtext">{{ __('Withdrawals') }}</span>
                        </a>
                    </li>

                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'networks' ? 'pcoded-trigger active' : '' }}">
                        <a href='{{ route('site.affiliate.networks') }}' class="nav-link">
                    <span class="pcoded-micon">
                        <i class="fas fa-anchor neg-transition-scale neg-transition-scale"></i>
                    </span><span class="pcoded-mtext">{{ __('Networks') }}</span>
                        </a>
                    </li>

                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'campaign_user' ? 'pcoded-trigger active' : '' }}">
                        <a href='{{ route('site.affiliate.campaign') }}' class="nav-link">
                    <span class="pcoded-micon">
                        <i class="fab fa-free-code-camp neg-transition-scale neg-transition-scale"></i>
                    </span><span class="pcoded-mtext">{{ __('Campaigns') }}</span>
                        </a>
                    </li>
                @elseif(!auth()->user()->affiliateUser()->exists())
                    <li data-username="form elements advance componant validation masking wizard picker select" class="nav-item {{ $menu == 'be_affiliate' ? 'pcoded-trigger active' : '' }}">
                        <a href='{{ route('site.affiliate.be-affiliate') }}' class="nav-link">
                        <span class="pcoded-micon">
                            <i class="feather icon-user neg-transition-scale neg-transition-scale"></i>
                        </span><span class="pcoded-mtext">{{ __('Be a affiliate user') }}</span>
                        </a>
                    </li>
                @endif
            </ul>

        </div>
    </div>
</nav>
