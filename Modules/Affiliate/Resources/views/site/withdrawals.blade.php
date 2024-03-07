@extends('affiliate::layouts.app')
@section('page_title', __('Withdraw Commissions'))

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="affiliate-withdraw-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-3 col-12 z-index-10 {{ languageDirection() == 'ltr' ? 'ps-md-3 pe-0 ps-0' : 'pe-md-3 ps-0 pe-0' }}">
                    @include('affiliate::layouts.includes.user_withdrawls_sub_menu')
                </div>
                <div class="col-lg-9 col-12 {{ languageDirection() == 'ltr' ? 'ps-0' : 'pe-0' }}">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-0 border-bottom">
                            <h5>{{ __('Withdraw Commissions') }}</h5>
                        </div>
                        <div class="card-block table-border-style hide-export">
                            @include('admin.layouts.includes.yajra-data-table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

