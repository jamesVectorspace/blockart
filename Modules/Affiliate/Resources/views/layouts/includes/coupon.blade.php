@if(preference('coupon_referral') == 1)
<div class="form-group row">
    <label class="col-sm-2 control-label"
           for="affiliate_id">{{ __('Assign to Affiliate') }}</label>
    <div class="col-sm-6">
        @php
            $affiliateUser = null;
           if (isset($coupon)) {
              $affiliateUser = \Modules\Affiliate\Entities\AffiliateUser::getAffiliateCoupon($coupon);
           }
        @endphp
        <select class="form-control select_affiliate_user sl_common_bx"
                id="affiliate_id" name="affiliate_id">
            @if(isset($affiliateUser->user))
            <option value="{{ $affiliateUser->id }}">{{ $affiliateUser->user?->name }}</option>
            @endif
        </select>
    </div>
</div>
@endif
