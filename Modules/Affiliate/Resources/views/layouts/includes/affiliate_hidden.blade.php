@php
$perameter = \Modules\Affiliate\Entities\Referral::getReferenceKey();
@endphp

<input type="hidden" name="reference" value="{{ request()->$perameter }}">
