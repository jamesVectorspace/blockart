@extends('admin.layouts.app')
@section('page_title', __('Dashboard'))
@section('css')
    <link rel="stylesheet" href="{{ asset('public/datta-able/fonts/material/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/plugins/Responsive-2.2.5/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/css/custom.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-4">
        <a href="{{ route('users.index') }}" target="_blank">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="feather icon-user-plus f-30 text-c-yellow rides-icon"></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">{{ $newUsers }}
                                @include('admin.dashboxes.partials.compare', [
                                    'change' => $newUsersCompare,
                                ])
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">{{ __("Users") }} <small class="font-weight-600 c-gray-5">({{ __('last :x days', ['x' => 30]) }})</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('package.subscription.index') }}" target="_blank">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="feather icon-shopping-cart f-30 text-c-yellow"></i>

                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">{{ $thisMonthSubscribersCount }}
                                @include('admin.dashboxes.partials.compare', [
                                    'change' => $thisMonthSubscribersCompare,
                                ])
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">{{ __('Subscriptions') }} <small class="font-weight-600 c-gray-5">({{ __('last :x days', ['x' => 30]) }})</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('package.subscription.payment') }}" target="_blank">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-donate f-30 text-c-yellow rides-icon"></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">{{ formatNumber($incomeThisMonth) }}
                                @include('admin.dashboxes.partials.compare', [
                                    'change' => $incomeThisMonthCompare,
                                ])
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">{{ __('Total Income') }} <small class="font-weight-600 c-gray-5">({{ __('last :x days', ['x' => 30]) }})</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('admin.features.code.list') }}" target="_blank">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="far fa-file-code f-30 text-c-yellow rides-icon"></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">{{ $codeGeneratedThisMonth }}
                                @include('admin.dashboxes.partials.compare', [
                                    'change' => $codeGeneratedThisMonthCompare,
                                ])
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">{{ __('Generated Codes') }} <small class="font-weight-600 c-gray-5">({{ __('last :x days', ['x' => 30]) }})</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('admin.features.contents') }}" target="_blank">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-file-alt f-30 text-c-yellow rides-icon"></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">{{ $documentCreatedThisMonth }}
                                @include('admin.dashboxes.partials.compare', [
                                    'change' => $documentCreatedThisMonthCompare,
                                ])
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">{{ __('Generated Documents') }} <small class="font-weight-600 c-gray-5">({{ __('last :x days', ['x' => 30]) }})</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('admin.features.imageList') }}" target="_blank">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-file-image f-30 text-c-yellow rides-icon"></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">{{ $imageGeneratedThisMonth }}
                                @include('admin.dashboxes.partials.compare', [
                                    'change' => $imageGeneratedThisMonthCompare,
                                ])
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">{{ __('Generated Images') }} <small class="font-weight-600 c-gray-5">({{ __('last :x days', ['x' => 30]) }})</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('admin.features.contents') }}" target="_blank">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-file-word f-30 text-c-yellow rides-icon"></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">{{ $wordGeneratedThisMonth }}
                                @include('admin.dashboxes.partials.compare', [
                                    'change' => $wordGeneratedThisMonthCompare,
                                ])
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">{{ __('Generated Words') }} <small class="font-weight-600 c-gray-5">({{ __('last :x days', ['x' => 30]) }})</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-4">
        <a href="{{ route('package.subscription.payment') }}" target="_blank">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-donate f-30 text-c-yellow rides-icon"></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">{{ $transactionsThisMonth }}
                                @include('admin.dashboxes.partials.compare', [
                                    'change' => $transactionsThisMonthCompare,
                                ])
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">{{ __('Transactions') }} <small class="font-weight-600 c-gray-5">({{ __('last :x days', ['x' => 30]) }})</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-4">
        <div>
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-comments f-30 text-c-yellow rides-icon"></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">{{ $chatGeneratedThisMonth }}
                                @include('admin.dashboxes.partials.compare', [
                                    'change' => $chatGeneratedThisMonthCompare,
                                ])
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">{{ __('Total Chat Generated') }} <small class="font-weight-600 c-gray-5">({{ __('last :x days', ['x' => 30]) }})</small></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        @include('admin.dashboxes.bar-chart')
    </div>
    <div class="col-md-7">
        @include('admin.dashboxes.heatmap')
    </div>
    <div class="col-md-5">
        @include('admin.dashboxes.latest-registration')
    </div>
    <div class="col-md-7">
        @include('admin.dashboxes.latest-transaction')
    </div>
@endsection

@section('js')
    <script>
        const localeString = "{{ app()->getLocale() }}";
        const saleOfThisMonth = "{{ route('dashboard.sale-of-the-month') }}";
        const latestRegistrationUrl = "{{ route('dashboard.latest-registration') }}";
        const latestTransactionUrl = "{{ route('dashboard.latest-transaction') }}";
    </script>

    <script src="{{ asset('public/dist/plugins/DataTables-1.10.21/js/jquery.dataTablesCus.min.js') }}"></script>
    <script src="{{ asset('public/dist/plugins/Responsive-2.2.5/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/moment.min.js') }}"></script>
    <script src="{{ asset('public/dist/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('public/datta-able/plugins/chart-chartjs/js/Chart-2019.min.js') }}"></script>
    <script src="{{ asset('public/datta-able/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/dashboard.min.js') }}"></script>
@endsection
