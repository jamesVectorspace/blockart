@extends('admin.layouts.app')
@section('page_title', __('Google drive Settings'))
@section('css')

@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="google-drive-settings-container">
        <div class="card">
            <div class="card-body row">
                <div
                    class="col-lg-3 col-12 z-index-10">
                    @include('databasebackup::includes.menu_setting')
                </div>
                <div class="col-lg-9 col-12">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-20 border-bottom">
                            <h5>{{ __('Google drive Setup') }}</h5>
                            <div class="card-header-right">

                            </div>
                        </div>
                        <form action="{{ route('google_drive_setting.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label id='client_id_label' class="col-sm-3 control-label require"
                                        for="client_id_label">
                                        {{ __('Client Id') }}
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" name="client_id"
                                            value="{{ config('openAI.is_demo') ? 'xxxxxxxxxxxxxxxxx' : config('filesystems.disks.google.clientId') ?? '' }}" id="client_id"
                                            class="form-control form-height" required
                                            oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label id='client_secret_label' class="col-sm-3 control-label require"
                                        for="client_secret_label">
                                        {{ __('Client Secret') }}
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" name="client_secret"
                                            value="{{ config('openAI.is_demo') ? 'xxxxxxxxxxxxxxxxx' : config('filesystems.disks.google.clientSecret') ?? '' }}" id="client_secret"
                                            class="form-control form-height" required
                                            oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label id='refresh_token_label' class="col-sm-3 control-label require"
                                        for="refresh_token_label">
                                        {{ __('Refresh Token ') }}
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" name="refresh_token"
                                            value="{{ config('openAI.is_demo') ? 'xxxxxxxxxxxxxxxxx' : config('filesystems.disks.google.refreshToken') ?? '' }}"
                                            id="refresh_token" class="form-control form-height" required
                                            oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer p-0">
                                <div class="form-group row">
                                    <label for="btn_save" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-12">
                                        <button type="submit"
                                            class="btn form-submit custom-btn-submit"
                                            id="footer-btn">
                                            {{ __('Save') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
<script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
@endsection
