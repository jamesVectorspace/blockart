@extends('admin.layouts.app')
@section('page_title', __('Account Settings'))
@section('css')

@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="account-settings-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-3 col-12 z-index-10 pe-0 ps-0 ps-md-3">
                    @include('admin.layouts.includes.account_settings_menu')
                </div>
                <div class="col-lg-9 col-12 ps-0">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-20 border-bottom">
                            <h5>{{ __('Options') }}</h5>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{ route('account.setting.option') }}" method="post" class="form-horizontal" id="preference_form">
                                @csrf
                                <div class="card-body p-0">
                                    <div class="form-group row">
                                        <label class="col-4 control-label" for="welcome_email">{{ __('Welcome Email') }}</label>
                                        <div class="col-6">
                                            <div class="switch switch-bg d-inline m-r-10 edit-is_default">
                                                <input class="customer-signup" type="checkbox" value="{{ $welcomeEmail }}" name="welcome_email" id="welcome_email" {{ $welcomeEmail == 1 ? 'checked' : '' }}>
                                                <label for="welcome_email" class="cr"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 control-label" for="customer_signup">{{ __('Customer Signup') }}</label>
                                        <div class="col-6">
                                            <div class="switch switch-bg d-inline m-r-10 edit-is_default">
                                                <input class="customer-signup" type="checkbox" value="{{ $customerSignup }}" name="customer_signup" id="customer_signup" {{ $customerSignup == 1 ? 'checked' : '' }}>
                                                <label for="customer_signup" class="cr"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 control-label" for="customer_default_signup_status">{{ __('Customer Default Signup Status') }}</label>
                                        <div class="col-6">
                                            <select name="user_default_signup_status" class="form-control select2-hide-search" >
                                                <option value="Pending" {{ preference('user_default_signup_status') == 'Pending' ? 'selected':"" }}>{{ __('Pending') }}</option>
                                                <option value="Active" {{ preference('user_default_signup_status') == 'Active' ? 'selected':"" }}>{{ __('Active') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 control-label" for="customer_default_signup_status">{{ __('The OTP and Token will expire') }}</label>
                                        <div class="col-sm-6 flex-wrap">
                                            <div class="input-group">
                                                <span class="input-group-text bg-white"><small>{{ __('Seconds') }}</small></span>
                                                <input type="text"
                                                    name="otp_expire_time"
                                                    class="form-control positive-int-number"
                                                    value="{{ preference('otp_expire_time') }}"
                                                    required
                                                    oninvalid="this.setCustomValidity('This field is required.')">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="card-footer p-0">
                                        <div class="form-group row">
                                            <label for="btn_save" class="col-sm-3 control-label"></label>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn form-submit custom-btn-submit float-right" id="footer-btn">
                                                    {{ __('Save') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('public/datta-able/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/settings.min.js') }}"></script>
@endsection
