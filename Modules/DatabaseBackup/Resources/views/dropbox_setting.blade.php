@extends('admin.layouts.app')
@section('page_title', __('Dropbox Settings'))
@section('css')

@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="dropbox-settings-container">
        <div class="card">
            <div class="card-body row">
                <div
                    class="col-lg-3 col-12 z-index-10">
                    @include('databasebackup::includes.menu_setting')
                </div>
                <div class="col-lg-9 col-12">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-20 border-bottom">
                            <h5>{{ __('Dropbox Setup') }}</h5>
                            <div class="card-header-right">

                            </div>
                        </div>
                        <form method="POST" action="{{ route('dropbox_setting.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label id='app_key_label' class="col-sm-3 control-label require" for="app_key_label">
                                        {{ __('App Key') }}
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" name="app_key"
                                            value="{{ config('openAI.is_demo') ? 'xxxxxxxxxxxxxxxxx' : config('filesystems.disks.dropbox.key') ?? '' }}" id="app_key"
                                            class="form-control form-height" required
                                            oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label id='app_secret_label' class="col-sm-3 control-label require"
                                        for="app_secret_label">
                                        {{ __('App Secret') }}
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" name="app_secret"
                                            value="{{ config('openAI.is_demo') ? 'xxxxxxxxxxxxxxxxx' : config('filesystems.disks.dropbox.secret') ?? '' }}" id="app_secret"
                                            class="form-control form-height" required
                                            oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label id='app_token_label' class="col-sm-3 control-label require"
                                        for="app_token_label">
                                        {{ __('Auth Token ') }}
                                    </label>

                                    <div class="col-sm-9">
                                        <input type="text" name="auth_token"
                                            value="{{ config('openAI.is_demo') ? 'xxxxxxxxxxxxxxxxx' : config('filesystems.disks.dropbox.authorization_token') ?? '' }}"
                                            id="auth_token" class="form-control form-height" required
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
