@extends('admin.layouts.app')
@section('page_title', __('System Information'))

@section('content')
    <!-- Main content -->
    <div>
        <div class="card min-h-100">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5>{{ __('Update your system') }}</h5>
                </div>
            </div>
            <div class="card-body row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="row align-items-center justify-content-center alert alert-{{ $upgrader['status'] ? 'secondary' : 'danger' }} mt-3">
                        <div class="col">
                            <h5 class="m-0">{{ $upgrader['message'] }}</h5>
                        </div>
                        @if ($upgrader['status'])
                            <div class="col-auto">
                                <a href="{{ route('systemUpdate.upgrade', ['waiting' => true]) }}" class="btn custom-btn-submit" id="update_now">{{ __('Update Now') }}</a>
                            </div>
                        @endif
                    </div>
                    @if ($upgrader['status'])
                    <div class="row alert alert-warning">
                        {!! $upgrader['json']['description'] !!}
                    </div>
                    @elseif (isset($upgrader['needPermission']) && $upgrader['needPermission'])
                        <table>
                            <tr>
                                <th>{{ __('Directory Name') }}</th>
                                <th>{{ __('Need Permission') }}</th>
                            </tr>
                            @foreach ($upgrader['permissionRequire'] as $directory)
                                <tr>
                                    <td>{{ $directory }}</td>
                                    <td class="text-center">{{ config('app.filePermission') }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
@endsection
