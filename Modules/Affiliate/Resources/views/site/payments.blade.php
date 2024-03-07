@extends('affiliate::layouts.app')
@section('page_title', __('Payments'))

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="affiliate-payments-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-3 col-12 z-index-10 {{ languageDirection() == 'ltr' ? 'ps-md-3 pe-0 ps-0' : 'pe-md-3 ps-0 pe-0' }}">
                    @include('affiliate::layouts.includes.user_withdrawls_sub_menu')
                </div>
                <div class="col-lg-9 col-12 {{ languageDirection() == 'ltr' ? 'ps-0' : 'pe-0' }}">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-0 border-bottom">
                            <h5>{{ __('Payouts') }}</h5>
                        </div>
                        <div class="card-block pt-2 p-4">

                            @foreach ($methods as $method)
                                <div class="card col-md-8 col-12 border">
                                    <div class="card-header cursor-pointer" data-bs-toggle="collapse" data-bs-target="#collapseExample-{{ $method->id }}" aria-expanded="false">
                                        <h5>{{ $method->method_name }}</h5>
                                    </div>
                                    <div class="card-body px-3 collapse" id="collapseExample-{{ $method->id }}">

                                        <form action="{{ route('site.affiliate.payments') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $method->id }}">
                                            @php
                                                $withdrawalSetting = auth()->user()->withdrawalSettings()->where('withdrawal_method_id', $method->id)->first(['param', 'is_default']);
                                                $param = isset($withdrawalSetting['param']) ? (array) json_decode($withdrawalSetting['param']) : null;
                                            @endphp
                                            @if ($method->method_name == 'Paypal')
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label require" for="email">{{ __('Email') }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="email" placeholder="{{ __('Email') }}" maxlength="100" class="form-control inputFieldDesign" id="email" name="email" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')" data-type-mismatch="{{ __('Enter a valid :x.', [ 'x' => strtolower(__('Email'))]) }}" value="{{ !empty($param) ? $param['email'] : '' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3 mt-2 mt-md-0 control-label" for="is_default">{{ __('Default') }}</label>
                                                    <div class="col-8">
                                                        <input type="hidden" name="is_default" value="0">
                                                        <div class="switch switch-bg d-inline m-r-10">
                                                            <input class="status" type="checkbox" value="1" name="is_default"  id="is_default" {{ isset($withdrawalSetting) && $withdrawalSetting['is_default'] == 1 ? 'checked' : '' }} >
                                                            <label for="is_default" class="cr"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($method->method_name == 'Bank')
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label require text-left" for="account_holder_name">{{ __("Bank Account Holder's name") }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="{{ __("Bank Account Holder's name") }}" class="form-control inputFieldDesign" id="account_holder_name" maxlength="191" name="account_holder_name" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"  value="{{ !empty($param) ? $param['account_holder_name'] : '' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label require text-left" for="branch_name">{{ __("Branch Name") }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="{{ __("Branch Name") }}" class="form-control inputFieldDesign" id="branch_name" name="branch_name" maxlength="50" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"  value="{{ !empty($param) ? $param['branch_name'] : '' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label require text-left" for="bank_account_number">{{ __("Bank Account Number") . '/IBAN' }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="{{ __("Bank Account Number") . '/IBAN' }}" class="form-control inputFieldDesign" id="bank_account_number" name="bank_account_number" maxlength="50" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"  value="{{ !empty($param) ? $param['bank_account_number'] : '' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label require text-left" for="branch_city">{{ __("Branch City") }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="{{ __("Branch City") }}" class="form-control inputFieldDesign" id="branch_city" name="branch_city" maxlength="30" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"  value="{{ !empty($param) ? $param['branch_city'] : '' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label require text-left" for="swift_code">{{ __("SWIFT Code") }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="{{ __("SWIFT Code") }}" class="form-control inputFieldDesign" id="swift_code" name="swift_code" maxlength="15" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"  value="{{ !empty($param) ? $param['swift_code'] : '' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label require text-left" for="branch_address">{{ __("Branch Address") }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="{{ __("Branch Address") }}" class="form-control inputFieldDesign" id="branch_address" name="branch_address" maxlength="191" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"  value="{{ !empty($param) ? $param['branch_address'] : '' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label require text-left" for="bank_name">{{ __("Bank Name") }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="{{ __("Bank Name") }}" class="form-control inputFieldDesign" id="bank_name" name="bank_name" maxlength="60" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"  value="{{ !empty($param) ? $param['bank_name'] : '' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 control-label require text-left" for="country">{{ __("Country") }}</label>
                                                    <div class="col-sm-8">
                                                        <input type="text" placeholder="{{ __("Country") }}" class="form-control inputFieldDesign" id="country" name="country" maxlength="60" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"  value="{{ !empty($param) ? $param['country'] : '' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-3 mt-2 mt-md-0 control-label" for="is_default">{{ __('Default') }}</label>
                                                    <div class="col-8">
                                                        <input type="hidden" name="is_default" value="0">
                                                        <div class="switch switch-bg d-inline m-r-10">
                                                            <input class="status" type="checkbox" value="1" name="is_default"  id="is_default_bank" {{ isset($withdrawalSetting) && $withdrawalSetting['is_default'] == 1 ? 'checked' : '' }} >
                                                            <label for="is_default_bank" class="cr"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="col-11 mb-4 mt-n4 px-0 d-flex justify-content-end">
                                                <button class="btn custom-btn-submit" type="submit" id="submitBtn"><i class="comment_spinner spinner fa fa-spinner fa-spin custom-btn-small display_none"></i><span id="spinnerText">{{ __('Save') }}</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/js/payments.min.js') }}"></script>
@endsection
