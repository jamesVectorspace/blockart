@extends('gateway::layouts.payment')

@section('logo', asset(moduleConfig('ngenius.logo')))
@section('gateway', moduleConfig('ngenius.name'))

@section('content')
    <div class="straight-line"></div>
    @include('gateway::partial.instruction')
    <form action="{{ route('gateway.complete', withOldQueryIntegrity(['gateway' => moduleConfig('ngenius.alias')])) }}"
        method="post" id="payment-form" class="pay-form">
        @csrf
        <button type="submit" class="pay-button sub-btn">
            <span>{{ __('Pay with N-Genius') }}
        </button>
    </form>
@endsection
