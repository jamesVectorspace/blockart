@extends('admin.layouts.app')
@section('page_title', __('Reports'))
@section('css')
  <link rel="stylesheet" href="{{ asset('public/dist/plugins/Responsive-2.2.5/css/responsive.dataTables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('public/dist/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('Modules/Report/Resources/assets/css/style.min.css') }}">
@endsection
@section('content')
<div class="col-sm-12 list-container">
    <div class="card-header d-md-flex justify-content-between align-items-center bg-white py-3 px-4">
        <h5 class="border-blue report-title mb-0">{{ __('Reports') }}</h5>
    </div>
        <div class="row">
            <div class="col-sm-7 col-md-7 col-lg-8 col-xl-9 mt-3">
                <div class="bg-white pr4 p-4" id="report-module">
                    <div id="report">
                    </div>
                </div>
            </div>
            <div class="col-sm-5 col-md-5 col-lg-4 col-xl-3 mt-3">
                <div class="p-3 pt-4 bg-white">
                    <h3 class="tab-content-title">{{ __('Filter') }}</h3>
                        <form action='' method="get" class="form-horizontal" id="reportForm">
                            <div class="form-group">
                            <label for="report-type">{{ __('Report Type') }}</label>
                            <select class="form-select inputFieldDesign cursor-pointer" id="report_name" name="type">
                                @foreach ($reportTypes as $key => $report)
                                <option value="{{ $key }}">{{ $report }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div id="filter-data">
                                <div id="filter-data">
                                    <div class="form-group filter-data SubscriptionReport date-picker-field" id="date-picker-field">
                                        <label for="to">{{ __('Date Range') }}</label>
                                        <button type="button" class="form-control date-range py-2 rounded-sm" id="daterange-btn">
                                            <span class="float-left">
                                            <i class="fa fa-calendar"></i>
                                            {{ __('Pick a date range') }}
                                            </span>
                                            <i class="fa fa-caret-down float-right pt-1"></i>
                                        </button>
                                        <input class="form-control" id="startfrom" type="hidden" name="from" value="{{ isset($from) ? $from : '' }}">
                                        <input class="form-control" id="endto" type="hidden" name="to" value="{{ isset($to) ? $to : '' }}">
                                    </div>
                                    <div class="form-group filter-data SubscriptionReport TransactionReport" id="coupon-field">
                                        <label for="customer-name">{{ __('Subscription Code') }}</label>
                                        <input type="text" name="subscription_code" class="form-control inputFieldDesign" id="subscription-code">
                                    </div>
                                    <div class="form-group filter-data ImageGenerateReport WordGenerateReport TransactionReport MinuteGenerateReport CharacterGenerateReport">
                                        <label for="customer-name">{{ __('Customer Name') }}</label>
                                        <input type="text" name="customer_name" class="form-control inputFieldDesign" id="customer-name">
                                    </div>
                                    <div class="form-group filter-data ImageGenerateReport WordGenerateReport MinuteGenerateReport CharacterGenerateReport">
                                        <label for="customer-email">{{ __('Customer Email') }}</label>
                                        <input type="text" name="customer_email" class="form-control inputFieldDesign" id="customer-email">
                                    </div>
                                    <div class="form-group filter-data SearchReport" id="search-field">
                                        <label for="customer-name">{{ __('Keyword') }}</label>
                                        <input type="text" name="search_field" class="form-control inputFieldDesign" id="search-keyword">
                                    </div>
                                    <button type="submit" class="btn custom-btn-submit search-btn" data-loading="">
                                        {{ __('Filter') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    'use strict';
    var startDate = "{!! isset($from) ? $from : 'undefined' !!}";
    var endDate   = "{!! isset($to) ? $to : 'undefined' !!}";
</script>
<script src="{{ asset('public/dist/js/moment.min.js') }}"></script>
<script src="{{ asset('public/dist/plugins/DataTables-1.10.21/js/jquery.dataTablesCus.min.js') }}"></script>
<script src="{{ asset('public/dist/plugins/Responsive-2.2.5/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/dist/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"></script>
<script src="{{ asset('Modules/Report/Resources/assets/js/report.min.js') }}"></script>
@endsection
