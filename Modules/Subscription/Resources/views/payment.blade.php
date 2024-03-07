@extends('admin.layouts.app')
@section('page_title', __('Payment'))

@section('content')

<!-- Main content -->
<div class="col-sm-12 list-container" id="payment-list-container">
    <div class="card">
        <div class="card-header d-md-flex justify-content-between align-items-center">
            <h5>{{ __('Payments') }}</h5>
            <div class="mt-md-0 mt-2">
                <button class="btn btn-outline-primary mb-0 custom-btn-small me-0 collapsed filterbtn" type="button" data-bs-toggle="collapse" data-bs-target="#filterPanel" aria-expanded="true" aria-controls="filterPanel">
                    <span class="fas fa-filter">&nbsp;</span>{{ __('Filter') }}
                </button>
            </div>
        </div>
        
        <div class="card-header p-0 collapse" id="filterPanel">
            <div class="row mx-2 my-3">
                <div class="col-md-3">
                    <select class="select2-hide-search filter" name="status">
                        <option>{{ __('All Status') }}</option>
                        <option value="Active">{{ __('Active') }}</option>
                        <option value="Inactive">{{ __('Inactive') }}</option>
                        <option value="Pending">{{ __('Pending') }}</option>
                        <option value="Expired">{{ __('Expired') }}</option>
                        <option value="Cancel">{{ __('Cancel') }}</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="select2-hide-search filter" name="type">
                        <option>{{ __('All Type') }}</option>
                        <option value="subscription">{{ __('Subscription') }}</option>
                        <option value="onetime">{{ __('Onetime') }}</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="card-body px-4 product-table payment-table">
            <div class="card-block pt-2 px-0">
                <div class="col-sm-12">
                    @include('admin.layouts.includes.yajra-data-table')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="{{ asset('Modules/Subscription/Resources/assets/js/subscription.min.js') }}"></script>
@endsection
