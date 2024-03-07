@extends('gateway::layouts.payment')
@section('logo', asset(moduleConfig('iyzico.logo')))
@section('gateway', moduleConfig('iyzico.name'))
@section('content')
    <p class="para-6">{{ __('Fill in the required information') }}</p>
    <div class="straight-line"></div>
    @include('gateway::partial.instruction')
    <form class="pay-form needs-validation"
        action="{{ route('gateway.complete', withOldQueryIntegrity(['gateway' => moduleConfig('iyzico.alias')])) }}" method="post"
        id="payment-form">
        @csrf
        <div>
            <div id="card-element">
                <div class="email-field">
                    <label class="para-4">{{ __('Card Number') }} *</label>
                    <div class="credit-card ">
                        <div class="input-svg">
                            <img src="{{ asset('Modules/Iyzico/Resources/assets/card.png') }}" class="mbIcon">
                            <svg class="divider" xmlns="http://www.w3.org/2000/svg" width="3" height="28"
                                viewBox="0 0 1 28" fill="none">
                                <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="28" stroke="#DFDFDF" />
                            </svg>
                        </div>
                        <input required type="text" name="card_number" class="form-control card-input-field"
                            id="kartNum" placeholder="5528790000000008" />
                    </div>
                </div>
                <div class="email-field">
                    <label class="para-4">{{ __('Card owner') }} *</label>
                    <div class="credit-card ">
                        <div class="input-svg">
                            <img src="{{ asset('Modules/Iyzico/Resources/assets/card_holder.png') }}" class="mbIcon">
                            <svg class="divider" xmlns="http://www.w3.org/2000/svg" width="3" height="28"
                                viewBox="0 0 1 28"fill="none">
                                <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="28" stroke="#DFDFDF" />
                            </svg>
                        </div>
                        <input required type="text" name="card_owner" class="form-control card-input-field"
                            aria-label="Email" aria-describedby="text" placeholder="Test Kart" />
                    </div>
                </div>
                <div class="row">
                    <div class="email-field col-md-4">
                        <label class="para-4">{{ __('Expiration Month') }} *</label>
                        <div class="credit-card ">
                            <div class="input-svg">
                                <img src="{{ asset('Modules/Iyzico/Resources/assets/date.png') }}" class="mbIcon">
                                <svg class="divider" xmlns="http://www.w3.org/2000/svg" width="3" height="28"
                                    viewBox="0 0 1 28" fill="none">
                                    <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="28" stroke="#DFDFDF" />
                                </svg>
                            </div>
                            <select class="form-control card-input-field" name="expiration_month">
                                @foreach (range(1, 12) as $month)
                                    <option value="{{ $month }}"
                                        {{ old('expiration_month') == $month ? 'selected' : '' }}>
                                        {{ DateTime::createFromFormat('!m', $month)->format('F') }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="email-field col-md-4">
                        <label class="para-4">{{ __('Expiration Year') }} *</label>
                        <div class="credit-card ">
                            <div class="input-svg">
                                <img src="{{ asset('Modules/Iyzico/Resources/assets/date.png') }}" class="mbIcon">
                                <svg class="divider" xmlns="http://www.w3.org/2000/svg" width="3" height="28"
                                    viewBox="0 0 1 28" fill="none">
                                    <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="28" stroke="#DFDFDF" />
                                </svg>
                            </div>
                            <select class="form-control card-input-field" name="expiration_year">
                                @for ($year = date('Y'); $year <= date('Y') + 10; $year++)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="email-field col-md-4">
                        <label class="para-4">{{ __('CVV') }} *</label>
                        <div class="credit-card ">
                            <div class="input-svg">
                                <img src="{{ asset('Modules/Iyzico/Resources/assets/card-behind.png') }}"
                                    class="mbIcon">
                                <svg class="divider" xmlns="http://www.w3.org/2000/svg" width="3" height="28"
                                    viewBox="0 0 1 28" fill="none">
                                    <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="28"
                                        stroke="#DFDFDF" />
                                </svg>
                            </div>
                            <input required type="text" name="cvv" class="form-control card-input-field"
                                aria-label="Email" aria-describedby="email" placeholder="222" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="email-field col-md-4">
                        <label class="para-4">{{ __('City') }} *</label>
                        <div class="credit-card ">
                            <div class="input-svg">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="18" height="14"
                                    viewBox="0 0 18 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.87868 0.87868C0 1.75736 0 3.17157 0 6V8C0 10.8284 0 12.2426 0.87868 13.1213C1.75736 14 3.17157 14 6 14H12C14.8284 14 16.2426 14 17.1213 13.1213C18 12.2426 18 10.8284 18 8V6C18 3.17157 18 1.75736 17.1213 0.87868C16.2426 0 14.8284 0 12 0H6C3.17157 0 1.75736 0 0.87868 0.87868ZM3.5547 3.16795C3.09517 2.8616 2.4743 2.98577 2.16795 3.4453C1.8616 3.90483 1.98577 4.5257 2.4453 4.83205L7.8906 8.46225C8.5624 8.91012 9.4376 8.91012 10.1094 8.46225L15.5547 4.83205C16.0142 4.5257 16.1384 3.90483 15.8321 3.4453C15.5257 2.98577 14.9048 2.8616 14.4453 3.16795L9 6.79815L3.5547 3.16795Z"
                                        fill="#898989" />
                                </svg>
                                <svg class="divider" xmlns="http://www.w3.org/2000/svg" width="3" height="28"
                                    viewBox="0 0 1 28" fill="none">
                                    <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="28"
                                        stroke="#DFDFDF" />
                                </svg>
                            </div>
                            <input required type="text" name="city" class="form-control card-input-field" />
                        </div>
                    </div>
                    <div class="email-field col-md-4">
                        <label class="para-4">{{ __('State') }} *</label>
                        <div class="credit-card ">
                            <div class="input-svg">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="18" height="14"
                                    viewBox="0 0 18 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.87868 0.87868C0 1.75736 0 3.17157 0 6V8C0 10.8284 0 12.2426 0.87868 13.1213C1.75736 14 3.17157 14 6 14H12C14.8284 14 16.2426 14 17.1213 13.1213C18 12.2426 18 10.8284 18 8V6C18 3.17157 18 1.75736 17.1213 0.87868C16.2426 0 14.8284 0 12 0H6C3.17157 0 1.75736 0 0.87868 0.87868ZM3.5547 3.16795C3.09517 2.8616 2.4743 2.98577 2.16795 3.4453C1.8616 3.90483 1.98577 4.5257 2.4453 4.83205L7.8906 8.46225C8.5624 8.91012 9.4376 8.91012 10.1094 8.46225L15.5547 4.83205C16.0142 4.5257 16.1384 3.90483 15.8321 3.4453C15.5257 2.98577 14.9048 2.8616 14.4453 3.16795L9 6.79815L3.5547 3.16795Z"
                                        fill="#898989" />
                                </svg>
                                <svg class="divider" xmlns="http://www.w3.org/2000/svg" width="3" height="28"
                                    viewBox="0 0 1 28" fill="none">
                                    <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="28"
                                        stroke="#DFDFDF" />
                                </svg>
                            </div>
                            <input required type="text" name="state" class="form-control card-input-field" />
                        </div>
                    </div>
                    <div class="email-field col-md-4">
                        <label class="para-4">{{ __('Zip Code') }} *</label>
                        <div class="credit-card ">
                            <div class="input-svg">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="18" height="14"
                                    viewBox="0 0 18 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.87868 0.87868C0 1.75736 0 3.17157 0 6V8C0 10.8284 0 12.2426 0.87868 13.1213C1.75736 14 3.17157 14 6 14H12C14.8284 14 16.2426 14 17.1213 13.1213C18 12.2426 18 10.8284 18 8V6C18 3.17157 18 1.75736 17.1213 0.87868C16.2426 0 14.8284 0 12 0H6C3.17157 0 1.75736 0 0.87868 0.87868ZM3.5547 3.16795C3.09517 2.8616 2.4743 2.98577 2.16795 3.4453C1.8616 3.90483 1.98577 4.5257 2.4453 4.83205L7.8906 8.46225C8.5624 8.91012 9.4376 8.91012 10.1094 8.46225L15.5547 4.83205C16.0142 4.5257 16.1384 3.90483 15.8321 3.4453C15.5257 2.98577 14.9048 2.8616 14.4453 3.16795L9 6.79815L3.5547 3.16795Z"
                                        fill="#898989" />
                                </svg>
                                <svg class="divider" xmlns="http://www.w3.org/2000/svg" width="3" height="28"
                                    viewBox="0 0 1 28" fill="none">
                                    <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="28"
                                        stroke="#DFDFDF" />
                                </svg>
                            </div>
                            <input required type="text" name="zip_code" class="form-control card-input-field" />
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="email-field col-md-6">
                        <label class="para-4">{{ __('Country') }} *</label>
                        <div class="credit-card ">
                            <div class="input-svg">
                                <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="18" height="14"
                                    viewBox="0 0 18 14" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.87868 0.87868C0 1.75736 0 3.17157 0 6V8C0 10.8284 0 12.2426 0.87868 13.1213C1.75736 14 3.17157 14 6 14H12C14.8284 14 16.2426 14 17.1213 13.1213C18 12.2426 18 10.8284 18 8V6C18 3.17157 18 1.75736 17.1213 0.87868C16.2426 0 14.8284 0 12 0H6C3.17157 0 1.75736 0 0.87868 0.87868ZM3.5547 3.16795C3.09517 2.8616 2.4743 2.98577 2.16795 3.4453C1.8616 3.90483 1.98577 4.5257 2.4453 4.83205L7.8906 8.46225C8.5624 8.91012 9.4376 8.91012 10.1094 8.46225L15.5547 4.83205C16.0142 4.5257 16.1384 3.90483 15.8321 3.4453C15.5257 2.98577 14.9048 2.8616 14.4453 3.16795L9 6.79815L3.5547 3.16795Z"
                                        fill="#898989" />
                                </svg>
                                <svg class="divider" xmlns="http://www.w3.org/2000/svg" width="3" height="28"
                                    viewBox="0 0 1 28" fill="none">
                                    <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="28"
                                        stroke="#DFDFDF" />
                                </svg>
                            </div>
                            <input required type="text" name="country" class="form-control card-input-field" />
                        </div>
                    </div>
                    <div class="email-field col-md-6">
                        <label class="para-4">{{ __('Phone') }} *</label>
                        <div class="credit-card ">
                            <div class="input-svg">
                                <svg id="Layer_1" class="icon" enable-background="new 0 0 20 20" height="14"
                                    viewBox="0 0 20 20" width="18" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m14.5 0h-9c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h9c1.1 0 2-.9 2-2v-16c0-1.1-.9-2-2-2zm-4 18h-1c-.5 0-1-.4-1-1 0-.5.5-1 1-1h1c.6 0 1 .5 1 1 0 .6-.4 1-1 1zm4-4h-9v-12h9z"
                                        fill="#898989" />
                                </svg>
                                <svg class="divider" xmlns="http://www.w3.org/2000/svg" width="3" height="28"
                                    viewBox="0 0 1 28" fill="none">
                                    <line x1="0.5" y1="2.18557e-08" x2="0.499999" y2="28"
                                        stroke="#DFDFDF" />
                                </svg>
                            </div>
                            <input required type="text" name="phone" class="form-control card-input-field" />
                        </div>
                    </div>

                </div>
            </div>
            <!-- Used to display form errors -->
            <div id="card-errors"></div>
        </div>
        <button type="submit" class="pay-button sub-btn">{{ __('Pay with Iyzico') }}</button>
    </form>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('Modules/Iyzico/Resources/assets/css/style.min.css') }}">
@endsection
@section('js')
@endsection
