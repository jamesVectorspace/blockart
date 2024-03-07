@extends('admin.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('public/dist/css/user-list.min.css') }}">
@endsection
@section('page_title', __('Archive List'))
@section('content')
    <!-- Main content -->
    <div class="col-sm-12 list-container" id="database-backup-list-container">
        <div class="card">
            <div class="card-h pt-24p pe-3 pl-3-res d-flex justify-content-between align-items-center">
                <h4> <a class="text-dark" href="{{route('database.manual.backup')}}">{{ __('Manual Backup') }}</a> /
                    <span class="f-13">{{ __('Archive List') }}</span>
                </h4>
                <div class="m-2">
                <a  href="{{ route('database.manual.backup.store') }}" class="btn btn-outline-primary custom-btn-small mb-0 collapsed filterbtn me-0"
                aria-controls="filterPanel"><span class="fas fa-hdd me-1"></span>{{ __('Manual Backup') }}</a>
                <a  href="{{ route('database.automated.backup') }}" class="btn btn-outline-primary custom-btn-small mb-0 collapsed filterbtn me-0 ms-2"
                aria-controls="filterPanel"><span class="fas fa-cog neg-transition-scale"></span> {{ __('Setting') }}</a>
                </div>
            </div>
            <div class="card-body p-0 user-list-wallet user-list-processing-message" data-column="id">
                <div class="card-block pt-2 px-2">
                    <div class="col-sm-12 form-tabs px-3">
                        @include('admin.layouts.includes.yajra-data-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.includes.delete-modal')
@endsection

@section('js')
    <script src="{{ asset('public/dist/js/custom/yajra-export.min.js') }}"></script>
@endsection
