@extends('gateway::layouts.payment')

@section('logo', asset(moduleConfig('coinbase.logo')))
@section('gateway', moduleConfig('coinbase.name'))

@section('content')
    @include('gateway::partial.instruction')
    <form action="{{ route('gateway.complete', withOldQueryIntegrity(['gateway' => moduleConfig('coinbase.alias')])) }}"
        method="post" id="payment-form" class="pay-form">
        @csrf
        <button type="submit" class="pay-button sub-btn">{{ __('Pay With Coinbase') }}</button>
    </form>
@endsection
