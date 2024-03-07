@extends('admin.layouts.app')
@section('page_title', __('Subscription Setting'))

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="account-settings-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-12 ps-0">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-20 border-bottom">
                            <h5>{{ __('Subscription Settings') }}</h5>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{ route('package.subscription.setting') }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="card-body p-0">
                                    <div class="form-group row">
                                        <label class="col-4 control-label" for="subscription_downgrade">{{ __('Downgrade') }}</label>
                                        <div class="col-6">
                                            <input type="hidden" value="0" name="subscription_downgrade">
                                            <div class="switch switch-bg d-inline m-r-10 edit-is_default">
                                                <input type="checkbox" @checked(old('subscription_downgrade', preference('subscription_downgrade'))) value="1" name="subscription_downgrade" id="subscription_downgrade">
                                                <label for="subscription_downgrade" class="cr"></label>
                                            </div>
                                            <label class="mt-1">{{ __('Allow subscription downgrade') }}</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4 control-label" for="subscription_change_plan">{{ __('Change Plan') }}</label>
                                        <div class="col-6">
                                            <input type="hidden" value="0" name="subscription_change_plan">
                                            <div class="switch switch-bg d-inline m-r-10 edit-is_default">
                                                <input type="checkbox" @checked(old('subscription_change_plan', preference('subscription_change_plan'))) value="1" name="subscription_change_plan" id="subscription_change_plan">
                                                <label for="subscription_change_plan" class="cr"></label>
                                            </div>
                                            <label class="mt-1">{{ __('Allow change plan one to another') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-4 control-label" for="customer_default_signup_status">{{ __('Subscription Renewal') }}</label>
                                        <div class="col-6">
                                            <select name="subscription_renewal" class="form-control select2-hide-search" >
                                                <option @selected(old('subscription_renewal', preference('subscription_renewal')) == 'automate') value="automate">{{ __('Automate') }}</option>
                                                <option @selected(old('subscription_renewal', preference('subscription_renewal')) == 'manual') value="manual">{{ __('Manual') }}</option>
                                                <option @selected(old('subscription_renewal', preference('subscription_renewal')) == 'customer_choice') value="customer_choice">{{ __('Customer Choice') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-4 control-label">{{ __('Balance Priority') }}</label>
                                        <div class="col-6">
                                            <select name="credit_balance_priority" class="form-control select2-hide-search" >
                                                <option @selected(old('credit_balance_priority', preference('credit_balance_priority')) == 'subscription') value="subscription">{{ __('Subscription') }}</option>
                                                <option @selected(old('credit_balance_priority', preference('credit_balance_priority')) == 'onetime') value="onetime">{{ __('Onetime') }}</option>
                                            </select>
                                            <label class="mt-1"><span class="badge badge-info">{{ __('Note') }}</span> {{ __('The balance priority indicate whether the subscription credit balance or the one-time credit balance is deducted first if both are available.') }}</label>
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
@endsection
