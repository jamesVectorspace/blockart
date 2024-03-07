@extends('affiliate::layouts.app')
@section('page_title', __('Commission Plan'))

@section('css')
    {{-- Select2  --}}
    <link rel="stylesheet" href="{{ asset('public/datta-able/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="commission-plan-create-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-12 col-12 {{ languageDirection() == 'ltr' ? 'ps-0' : 'pe-0' }}">
                    <div class="card card-info shadow-none mb-0">
                        @if (session('errorMgs'))
                            <div class="alert alert-warning fade in alert-dismissable">
                                <strong>{{ __('Warning') }}!</strong> {{ session('errorMgs') }}. <a class="close" href="#" data-bs-dismiss="alert" aria-label="close" title="close">×</a>
                            </div>
                        @endif
                        <div class="card-header p-t-0 border-bottom">
                            <h5>{{ __('Create Plan') }}</h5>

                        </div>
                        <div class="card-body p-2 p-md-4 product-table">
                            <form action="{{ route('commission.plan.store') }}" method="post" class="form-horizontal">
                                @csrf

                                <div class="col-sm-12">
                                    <div class="row">
                                        <label class="col-sm-1 control-label require" for="inputEmail3">{{ __('Name') }}</label>

                                        <div class="col-sm-7">
                                            <input type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" class="form-control name inputFieldDesign" name="name" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>

                                        <label class="col-sm-1 control-label require" for="inputEmail3">{{ __('Status') }}</label>
                                        <div class="col-sm-3">
                                            <select class="js-example-basic-single-1 form-control" name="status">
                                                <option value="Active">{{ __('Active') }}</option>
                                                <option value="Inactive">{{ __('Inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <h5 class="mt-3">{{ __('Commission') }}</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <input type="number" placeholder="{{ __('Commission') }}" value="{{ old('commission') }}" class="form-control inputFieldDesign" name="commission" id="commission" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="commission_type" id="commission_type">
                                                    <option value="flat">{{ __('Flat') }} {{ currency()->symbol }}</option>
                                                    <option value="percentage">{{ __('Percentage') }} %</option>
                                                </select>
                                            </div>
                                        </div>
                                        <label class="form-label mt-2">{{ __('Multi-level commission? How many tiers?') }}</label>
                                        <input type="number" class="form-control inputFieldDesign" id="level" name="level">
                                        <div id="multi_level">

                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                        <h5 class="mt-3">{{ __('Rules') }}</h5>
                                        <hr>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">{{ __('When') }}</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="match_type">
                                                    <option value="AND">{{ __('all') }}</option>
                                                    <option value="OR">{{ __('at least one') }}</option>
                                                </select>
                                            </div>
                                            <label class="col-sm-6 control-label">{{ __('rule groups pass') }}</label>
                                        </div>

                                        <div class="mt-4" id="rules">
                                            <div>
                                              <div class="bg-gray p-3">
                                                <div class="row">
                                                    <label class="col-sm-4 small mt-2">{{ __("This group is a 'pass' when") }}</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" name="rule_groups[0][match_type]">
                                                            <option value="AND">{{ __('all') }}</option>
                                                            <option value="OR">{{ __('at least one') }}</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-4 small mt-2">{{ __('of the following rules are true.') }}</label>
                                                </div>
                                                <div data-cid = {{ $customRuleId = 'custom_rule_'. uniqid() }}>
                                                    <div id="{{ $customRuleId }}">
                                                        <div class="row mt-2 custom_rule_div">
                                                            <div class="col-sm-3 mt-2">
                                                                <select class="form-control rule_name" name="rule_groups[0][rules_{{0}}][name]">
                                                                    <option value="affiliate_user">{{ __('Affiliate') }}</option>
                                                                    <option value="affiliate_tag">{{ __('Affiliate Tag') }}</option>
                                                                    <option value="package">{{ __('Package') }}</option>
                                                                    <option value="credit">{{ __('Credit') }}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2 mt-2 condition">
                                                                <select class="form-control" name="rule_groups[0][rules_{{0}}][condition]">
                                                                    <option value="any">{{ __('any of') }}</option>
                                                                    <option value="none">{{ __('none of') }}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6 mt-2 rule_value_div">
                                                                <select class="form-control rule_value affiliate_user sl_common_bx" name="rule_groups[rules_{{0}}][value][]" multiple id="{{ 'rule_value_div_' . uniqid() }}" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">

                                                                </select>
                                                            </div>
                                                            <div class="col-sm-1 mt-2 mt-3 display_none">
                                                                <span class="text-dark cursor_pointer action-btn d-flex justify-content-center delete_rule" title="Delete Rule">
                                                                    <i class="fa fa-trash"></i>
                                                                </span>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-4">
                                                            <button type="button" class="small btn btn-default btn-sm add_rule" data-groupNumber = 0><i class="fa fa-plus-circle" aria-hidden="true"></i>{{ __('Add a rule') }}</button>
                                                        </div>
                                                        <div class="col-sm-4">

                                                        </div>
                                                        <div class="col-sm-4">
                                                            <button type="button" class="small btn btn-default btn-sm float-right add_rule_group"><i class="fas fa-folder-open" aria-hidden="true"></i>{{ __('Add a group') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="btn_save" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn py-2 custom-btn-submit {{ languageDirection() == 'ltr' ? 'float-right' : 'float-left' }}">{{ __('Create') }}</button>
                                        <a href="{{ route('commission.plan.index') }}" class="py-2 custom-btn-cancel {{ languageDirection() == 'ltr' ? 'float-right me-2' : 'float-left ms-2' }}">{{ __('Cancel') }}</a>
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
    <script>
        var ruleCount = 1;
        var ruleGroupCount = 0;
    </script>
    <script src="{{ asset('public/datta-able/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/js/commission_plan.min.js') }}"></script>
@endsection
