<!DOCTYPE html>

<html lang="{{ App::getLocale() }}" dir="ltr" class="{{ \Illuminate\Support\Facades\Cookie::get('theme_preference') }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon icon -->
    @include('gateway::partial.favicon')
    <title>{{ __('Gateway') }}</title>
    <link href="{{ asset('Modules/Gateway/Resources/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('Modules/Gateway/Resources/assets/css/gateway.min.css') }}">
    @yield('css')
</head>

<body>
    <section class="card1">
        <div class="payment-loader">
            <div class="sp sp-circle"></div>
        </div>
        <div class="svg-1">
            @include('gateway::partial.logo')
        </div>
        <p class="para-1">{{ __('Amount to be paid') }}</p>
        <p class="para-2">{{ formatNumber($purchaseData->total) }}</p>
        <p class="para-1">{{ __('currency') }}</p>
        <p class="para-3 para-2">{{ $purchaseData->currency_code }}</p>
        <p class="para-6">{{ __('Choose Payments from below') }}</p>
        <div class="straight-line"></div>

        <div>
            @include('gateway::partial.errors')
            <div class="test justify-content-center">
                @yield('content')
            </div>
        </div>
        <a  href="#" class="close-payment process-prev position-relative d-flex justify-content-center align-items-center cursor-pointer return">
            <svg class="position-absolute me-3" width="11" height="7" viewBox="0 0 11 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.59216 0L4.6714 1.05155L2.92161 2.75644H10.2369C10.6583 2.75644 11 3.08934 11 3.5C11 3.91066 10.6583 4.24356 10.2369 4.24356H2.92161L4.6714 5.94845L3.59216 7L0 3.5L3.59216 0Z" fill="currentColor"></path>
            </svg>
            <p class="prev mb-0">{{ __('Close')}}</p>
        </a>
    </section>
    <script>
        var response = {
            status: "failed",
            message: "{{ __('Payment cancelled.') }}"
        }
    </script>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/app.min.js') }}"></script>
    @yield('js')
</body>

</html>
