@extends('gateway::layouts.payment')

@section('logo', asset(moduleConfig('paypalrecurring.logo')))
@section('gateway', moduleConfig('paypalrecurring.name'))

@section('content')
    <div class="straight-line"></div>
    @include('gateway::partial.instruction')
    <form action="{{ route('gateway.complete', withOldQueryIntegrity(['gateway' => moduleConfig('paypalrecurring.alias')])) }}"
        method="post" id="payment-form" class="pay-form">
        @csrf
        <button type="submit" class="pay-button sub-btn">
            <span>{{ __('Pay With Paypal Recurring') }}
        </button>
    </form>
@endsection
