@extends('gateway::layouts.payment')

@section('logo', asset(moduleConfig('esewa.logo')))
@section('gateway', moduleConfig('esewa.name'))

@section('content')
    <div class="straight-line"></div>
    @include('gateway::partial.instruction')
    <form class="pay-form needs-validation"
        action="{{ route('gateway.complete', withOldQueryIntegrity(['gateway' => moduleConfig('esewa.alias')])) }}" method="post"
        id="payment-form">
        @csrf
        <div>
            <!-- Used to display form errors -->
            <div id="card-errors"></div>
        </div>
        <button type="submit" class="pay-button sub-btn">{{ __('Pay With Esewa') }}</button>
    </form>
@endsection
