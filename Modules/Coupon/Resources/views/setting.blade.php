@extends('admin.layouts.app')
@section('page_title', __('Coupon Setting'))

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="coupon-settings-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-12 ps-0">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-20 border-bottom">
                            <h5>{{ __('Coupon Settings') }}</h5>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{ route('coupon.setting') }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="card-body p-0">  
                                    <div class="form-group row">
                                        <label class="col-4 control-label" for="apply_coupon_subscription">{{ __('Apply Coupon Subscription') }}</label>
                                        <div class="col-6">
                                            <input type="hidden" value="0" name="apply_coupon_subscription">
                                            <div class="switch switch-bg d-inline m-r-10 edit-is_default">
                                                <input type="checkbox" @checked(old('apply_coupon_subscription', preference('apply_coupon_subscription'))) value="1" name="apply_coupon_subscription" id="apply_coupon_subscription">
                                                <label for="apply_coupon_subscription" class="cr"></label>
                                            </div>
                                            <label class="mt-1">{{ __('Yes') }}</label>
                                        </div>
                                    </div>     
                                    <div class="form-group row">
                                        <label class="col-4 control-label" for="apply_coupon_onetime">{{ __('Apply Coupon Onetime') }}</label>
                                        <div class="col-6">
                                            <input type="hidden" value="0" name="apply_coupon_onetime">
                                            <div class="switch switch-bg d-inline m-r-10 edit-is_default">
                                                <input type="checkbox" @checked(old('apply_coupon_onetime', preference('apply_coupon_onetime'))) value="1" name="apply_coupon_onetime" id="apply_coupon_onetime">
                                                <label for="apply_coupon_onetime" class="cr"></label>
                                            </div>
                                            <label class="mt-1">{{ __('Yes') }}</label>
                                        </div>
                                    </div>                                
                                    <div class="form-group row">
                                        <label class="col-4 control-label" for="subscription_coupon_recurring">{{ __('Coupon Recurring') }}</label>
                                        <div class="col-6">
                                            <input type="hidden" value="0" name="subscription_coupon_recurring">
                                            <div class="switch switch-bg d-inline m-r-10 edit-is_default">
                                                <input type="checkbox" @checked(old('subscription_coupon_recurring', preference('subscription_coupon_recurring'))) value="1" name="subscription_coupon_recurring" id="subscription_coupon_recurring">
                                                <label for="subscription_coupon_recurring" class="cr"></label>
                                            </div>
                                            <label class="mt-1"><span class="badge badge-info">{{ __('Note') }}!</span> {{ __('If enabled, users with coupons get a discount on recurring payments. If disabled, the recurring gateway is not shown when a user has a coupon, but it appears for users without coupons.') }}</label>
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
