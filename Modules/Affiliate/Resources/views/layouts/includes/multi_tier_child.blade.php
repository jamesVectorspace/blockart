<ul>
    @foreach($grandChilds as $grand)
        <li><a href="javascript:void(0)">{{ $grand->affiliateUser?->user?->name }}</a>
            @php $grandChilds = $grand->affiliateUser?->referralAffiliateUsers->whereNotNull('affiliate_user_id') @endphp
            @if(!empty($grandChilds) && count($grandChilds) > 0)
                @include('affiliate::layouts.includes.multi_tier_child', ['grandChilds' => $grandChilds])
            @endif
        </li>
    @endforeach
</ul>

