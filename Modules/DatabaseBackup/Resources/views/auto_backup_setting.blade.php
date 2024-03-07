@extends('admin.layouts.app')
@section('page_title', __('Auto Backup Settings'))
@section('css')

@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="auto-backup-settings-container">
        <div class="card">
            <div class="card-body row">
                <div
                    class="col-lg-3 col-12 z-index-10 pe-md-3 ps-0 pe-0">
                    @include('databasebackup::includes.menu_setting')
                </div>
                <div class="col-lg-9 col-12">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-20 border-bottom">
                            <h5>{{ __('Auto Backup Setup') }}</h5>
                            <div class="card-header-right">

                            </div>
                        </div>
                        <form id="add_schedule_form"
                            action="{{ route('auto-backup.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label id='app_key_label' class="col-sm-3 control-label require" for="app_key_label">
                                        {{ __('Schedule') }}
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="schedule-customer">
                                            <select id="schedule_id" class="form-control select2 sl_common_bx"
                                                name="schedule_type" required
                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                                @foreach (moduleConfig('databasebackup.schedule_type_value') as $item)
                                                    <option value="{{ $item }}"
                                                        {{ moduleConfig('databasebackup.schedule_type') == $item ? 'selected' : '' }}>
                                                        {{ ucwords($item) }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label id='app_secret_label' class="col-sm-3 control-label require"
                                        for="app_secret_label">
                                        {{ __('Storage') }}
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="schedule-customer">
                                            <select id="storage" class="form-control select2 sl_common_bx" name="storage"
                                                required
                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                                @foreach ($disks as $disk)
                                                    <option value="{{ $disk }}"
                                                        {{ moduleConfig('databasebackup.storage') == $disk ? 'selected' : '' }}>
                                                        {{ ucwords($disk) }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label id='app_token_label' class="col-sm-3 control-label require"
                                        for="app_token_label">
                                        {{ __('Is Active') }}
                                    </label>

                                    <div class="col-sm-9">
                                        <div class="switch switch-bg d-inline m-r-10 edit-is_default">
                                            <input class="is_database_automated_backup" type="checkbox"
                                                name="is_database_automated_backup" id="is_database_automated_backup"
                                                {{ moduleConfig('databasebackup.is_database_automated_backup') == true ? 'checked' : '' }}>
                                            <label for="is_database_automated_backup" class="cr"></label>
                                        </div>
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
