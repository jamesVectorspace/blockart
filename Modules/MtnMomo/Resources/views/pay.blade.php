@extends('gateway::layouts.payment')

@section('logo', asset(moduleConfig('mtnmomo.logo')))

@section('gateway', moduleConfig('mtnmomo.name'))

@section('content')

    <p class="para-6">{{ __('Fill in the required information') }}</p>
    <div class="straight-line"></div>
    @include('gateway::partial.instruction')
    <form class="pay-form needs-validation"
        action="{{ route('gateway.complete', withOldQueryIntegrity(['gateway' => moduleConfig('mtnmomo.alias')])) }}" method="post"
        id="payment-form">
        @csrf
        <div>
            <div id="card-element">
                <!-- a mtn momo Element will be inserted here. -->
                <div class="email-field">
                    <label class="para-4">{{ __('Enter Your Phone Number') }} *</label>
                    <div class="credit-card ">
                        <div class="input-svg">
                            <svg id="Layer_1" class="icon" enable-background="new 0 0 20 20" height="14" viewBox="0 0 20 20" width="18" xmlns="http://www.w3.org/2000/svg"><path d="m14.5 0h-9c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h9c1.1 0 2-.9 2-2v-16c0-1.1-.9-2-2-2zm-4 18h-1c-.5 0-1-.4-1-1 0-.5.5-1 1-1h1c.6 0 1 .5 1 1 0 .6-.4 1-1 1zm4-4h-9v-12h9z"/></svg>
                            <svg class="divider" xmlns="http://www.w3.org/2000/svg" width="3" height="28"
                                viewBox="0 0 1 28" fill="none">
                                <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="28" stroke="#DFDFDF" />
                            </svg>
                        </div>
                        <input required type="phone" name="phone" class="form-control card-input-field"
                            aria-label="Phone" aria-describedby="phone" />
                    </div>
                </div>
            </div>
            <!-- Used to display form errors -->
            <div id="card-errors"></div>
        </div>
        <button type="submit" class="pay-button sub-btn">{{ __('Pay With MTN Momo') }}</button>
    </form>
@endsection

@section('css')

@endsection

@section('js')

@endsection
