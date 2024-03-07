@extends('admin.layouts.app')
@section('page_title', __('System Information'))

@section('content')
    <!-- Main content -->
    <div>
        <div class="card min-h-100">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5>{{ __('Update your system') }}</h5>
                    <p>{{ __('Current verion') }} : <b>{{ $applicationVersion }}</b></p>
                </div>
            </div>
            <div class="card-body row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="d-flex justify-content-start alert alert-secondary mt-3">
                        <ul>
                            <li>{{ __('Make sure your server has matched with all requirements.') }} <a href="{{ route('systemInfo.index') }}" target="_blank">{{ __('Check Here') }}</a>
                            </li>
                            <li>{{ __('Download latest version Artifism from codecanyon.') }}  <a href="https://codecanyon.net/downloads" target="_blank"><i class="feather icon-external-link"></i> {{ __('Click here') }}</a></li>
                            <li>{{ __('Extract downloaded zip. You will find updates.zip file in those extraced files.') }}
                            </li>
                            <li>{{ __('Upload that zip file here and click update now.') }}</li>
                            <li>{{ __('If you are using any addon make sure to update those addons after system updated.') }}</li>
                            <li>{{ __('A successful update will lose custom works.') }}</li>
                        </ul>
                    </div>
                    <div class="d-flex justify-content-start alert alert-warning">
                        <b>{{ __('Before performing an update, it is strongly recommended to create a full backup of your current installation (files and database) and review the changelog') }}
                        <a href="https://help.techvill.net/backup-artifismfiles-and-database/" target="_blank"><i class="feather icon-external-link"></i> {{ __('See backup documentation') }}</a>
                    </b>
                    </div>
                    <div class="mt-5">
                        <form action="{{ route('systemUpdate.upgrade') }}" class="form-horizontal from-class-id" id="password-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="purchaseCode"
                                    class="col-sm-4 text-left col-form-label require">{{ __('Purchase code') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control inputFieldDesign" id="purchaseCode"
                                        name="purchaseCode" placeholder="{{ __('Purchase code') }}" required
                                        oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label
                                    class="col-sm-4 text-left col-form-label require">{{ __('Upload Zip File') }}</label>
                                <div class="col-sm-8">
                                    <div class="custom-file position-relative">
                                        <input type="file" class="form-control attachment d-none"
                                            name="attachment" id="validatedCustomFile" value="" required
                                            oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        <label
                                            class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile">{{ __('Choose file') }}</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 px-0 m-l-10 mt-3 pr-0 d-flex justify-content-end">
                                <a href="{{ route('dashboard') }}" class="btn custom-btn-cancel all-cancel-btn" type="submit">{{ __('Cancel') }}</a>
                                <button class="btn custom-btn-submit" type="submit">{{ __('Upload Now') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('Modules/Upgrader/Resources/assets/js/update.min.js') }}"></script>
@endsection
