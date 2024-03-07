@extends('affiliate::layouts.app')

@section('page_title', __('Referrals'))

@section('content')
    <div class="col-sm-12" id="affiliate-referral-purchase-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-12 col-12 {{ languageDirection() == 'ltr' ? 'ps-0' : 'pe-0' }}">
                    <div class="card card-info shadow-none mb-0 hide-export">
                        <div class="card-block table-border-style">
                            @include('admin.layouts.includes.yajra-data-table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
