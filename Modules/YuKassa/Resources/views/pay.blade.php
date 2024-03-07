@extends('gateway::layouts.payment')

@section('logo', asset(moduleConfig('yukassa.logo')))
@section('gateway', moduleConfig('yukassa.name'))

@section('content')
    <div class="straight-line"></div>
    @include('gateway::partial.instruction')
    <form action="{{ route('gateway.complete', withOldQueryIntegrity(['gateway' => moduleConfig('yukassa.alias')])) }}"
        method="post" id="payment-form" class="pay-form">
        @csrf
        <button type="submit" class="pay-button sub-btn">
            <span>{{ __('Pay With YuKassa') }}
        </button>
    </form>
@endsection
