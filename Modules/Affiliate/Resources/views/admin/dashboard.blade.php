@extends('affiliate::layouts.app')
@section('page_title', __('Dashboard'))
@section('css')

@endsection

@section('content')
    <!-- Main content -->
    <div class="row" id="affiliate_dashboard_container">

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-donate f-30 text-c-yellow rides-icon neg-transition-scale-svg "></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ formatNumber($dashboard['totalRevenue']) }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">{{ __('Total Revenue') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-donate f-30 text-c-yellow rides-icon neg-transition-scale-svg "></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ formatNumber($dashboard['netCommission']) }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">
                                 <span class="d-block text-uppercase font-weight-600 c-gray-5">{{ __('Net Commission') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-donate f-30 text-c-yellow rides-icon neg-transition-scale-svg "></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ formatNumber($dashboard['grossCommission']) }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">
                                 <span class="d-block text-uppercase font-weight-600 c-gray-5">{{ __('Gross Commission') }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-donate f-30 text-c-yellow rides-icon neg-transition-scale-svg "></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ formatNumber($dashboard['totalPaid']) }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">
                                {{ __('Total Paid') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <span class="f-30 text-c-yellow neg-transition-scale-svg "><i class="fab fa-affiliatetheme"></i></span>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ $dashboard['totalAffiliateUser'] }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">
                                {{ __('Total Affiliates') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <span class="f-30 text-c-yellow neg-transition-scale-svg "><i class="fas fa-users"></i></span>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ $dashboard['totalVisitor'] }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">
                                {{ __('Total Visitor') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <span class="wallet-symbol f-30 text-c-yellow neg-transition-scale-svg "><i class="fas fa-user-circle"></i></span>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ $dashboard['totalCustomer'] }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">
                                {{ __('Total Customer') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
@section('js')

@endsection
