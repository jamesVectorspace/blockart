@extends('admin.layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('public/dist/css/user-activity-list.min.css') }}">
@endsection
@section('page_title', __('Users Activity'))

<!-- Main content -->
@section('content')
    <div class="col-sm-12 list-container" id="activity-list-container">
        <div class="card">
            <div class="card-header bb-none pb-0 mb-2">
                <h5>{{ __('Users Activity') }}</h5>
                <div class="card-header-right my-2 mx-md-0 mx-sm-4">
                    <x-backend.button.filter class="me-0" />
                </div>
            </div>
            <x-backend.datatable.filter-panel class="mx-1">
                <div class="col-md-9">
                    <x-backend.datatable.input-search />
                </div>
                <div class="col-md-3">
                    <select class="select2 filter" name="log_name">
                        <option value="">{{ __('All Types') }}</option>
                        @foreach ($logTypes as $logType)
                            <option value="{{ $logType }}">{{ $logType }}</option>
                        @endforeach
                    </select>
                </div>
            </x-backend.datatable.filter-panel>

            <x-backend.datatable.table-wrapper class="user_activity_list">
                @include('admin.layouts.includes.yajra-data-table')
            </x-backend.datatable.table-wrapper>

            @include('admin.layouts.includes.delete-modal')
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        var searchURI = "{{ route('find.users.ajax') }}";
    </script>
    <script src="{{ asset('public/dist/js/custom/users-activity-list.min.js') }}"></script>
@endsection
