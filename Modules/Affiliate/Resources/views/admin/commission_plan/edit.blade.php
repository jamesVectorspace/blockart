@extends('affiliate::layouts.app')
@section('page_title', __('Commission Plan'))

@section('css')
    {{-- Select2  --}}
    <link rel="stylesheet" href="{{ asset('public/datta-able/plugins/select2/css/select2.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="commission-plan-edit-container">
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
                            <h5>{{ __('Edit Plan') }}</h5>

                        </div>
                        <div class="card-body p-2 p-md-4 product-table">
                            <form action="{{ route('commission.plan.update', $commissionPlan->id) }}" method="post" class="form-horizontal">
                                @csrf

                                <div class="col-sm-12">
                                    <div class="row">
                                        <label class="col-sm-1 control-label require" for="inputEmail3">{{ __('Name') }}</label>

                                        <div class="col-sm-7">
                                            <input type="text" placeholder="{{ __('Name') }}" value="{{ $commissionPlan->name }}" class="form-control name inputFieldDesign" name="name" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                        @if(!$commissionPlan->isDefault())
                                        <label class="col-sm-1 control-label require" for="inputEmail3">{{ __('Status') }}</label>
                                        <div class="col-sm-3">
                                            <select class="js-example-basic-single-1 form-control" name="status">
                                                <option value="Active" @selected($commissionPlan->status == 'Active')>{{ __('Active') }}</option>
                                                <option value="Inactive" @selected($commissionPlan->status == 'Inactive')>{{ __('Inactive') }}</option>
                                            </select>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <h5 class="mt-3">{{ __('Commission') }}</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <input type="number" placeholder="{{ __('Commission') }}" value="{{ $commissionPlan->commission }}" class="form-control inputFieldDesign" name="commission" id="commission" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                            </div>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="commission_type" id="commission_type">
                                                    <option value="flat" @selected($commissionPlan->commission_type == 'flat')>{{ __('Flat') }} {{ currency()->symbol }}</option>
                                                    <option value="percentage" @selected($commissionPlan->commission_type == 'percentage')>{{ __('Percentage') }} %</option>
                                                </select>
                                            </div>
                                        </div>
                                        <label class="form-label mt-2">{{ __('Multi-level commission? How many tiers?') }}</label>
                                        <input type="number" class="form-control inputFieldDesign" id="level" name="level" value="{{ $commissionPlan->level }}">
                                        <div id="multi_level">
                                            @if($commissionPlan->level > 1)
                                                @php $totalCommission = 0; @endphp
                                                <label class="form-label mt-2">{{ __('Tier-wise commission distribution') }}</label>
                                                   <div class="row">
                                                @foreach($commissionPlan->level_commission as $key => $commission)
                                                       <label class="col-sm-1 control-label ${i != 0 && i != 1 ? 'mt-2' : ''}" for="inputEmail3">{{ $key }}</label>
                                                       <div class="col-sm-5 {{$key != 'T1' &&$key != 'T2' ? 'mt-2' : ''}}">
                                                           <input type="number" {{$key == 'T1' ? 'readonly' : ''}} class="form-control inputFieldDesign tier" name="level_commission[{{ $key }}]" value="{{ $commission }}">
                                                       </div>
                                                    @php $totalCommission += (int)($commission) @endphp
                                                @endforeach
                                                   </div>
                                                    <div class="col-sm-6 mt-4">
                                                        <label class="form-label" >{{ __('Total commissions')}} <span id="totalCommission">{{$commissionPlan->commission_type == 'flat' ? $totalCommission . currency()->symbol : $totalCommission . '%'}}</span></label>
                                                    </div>
                                            @endif
                                        </div>

                                    </div>
                                    @if(!$commissionPlan->isDefault())
                                    <div class="col-md-8">
                                        <h5 class="mt-3">{{ __('Rules') }}</h5>
                                        <hr>
                                        <div class="row">
                                            <label class="col-sm-2 control-label">{{ __('When') }}</label>
                                            <div class="col-sm-4">
                                                <select class="form-control" name="match_type">
                                                    <option value="AND" @selected($commissionPlan->match_type == 'AND')>{{ __('all') }}</option>
                                                    <option value="OR" @selected($commissionPlan->match_type == 'OR')>{{ __('at least one') }}</option>
                                                </select>
                                            </div>
                                            <label class="col-sm-6 control-label">{{ __('rule groups pass') }}</label>
                                        </div>

                                        <div class="mt-4" id="rules">
                                            @php $ruleCount = 0; $ruleGroupCount = 0 @endphp
                                            @foreach($commissionPlan->rule_groups as $key => $group)
                                            <div>
                                            @if((!$loop->first))<br>@endif
                                            <div class="bg-gray p-3">
                                                <div class="row">
                                                    <label class="col-sm-4 small mt-2">{{ __("This group is a 'pass' when") }}</label>
                                                    <div class="col-sm-4">
                                                        <select class="form-control" name="rule_groups[{{$key}}][match_type]">
                                                            <option value="AND" @selected($group['match_type'] == 'AND')>{{ __('all') }}</option>
                                                            <option value="OR" @selected($group['match_type'] == 'OR')>{{ __('at least one') }}</option>
                                                        </select>
                                                    </div>
                                                    <label class="col-sm-4 small mt-2">{{ __('of the following rules are true.') }}</label>
                                                </div>
                                                <div data-cid = {{ $customRuleId = 'custom_rule_'. uniqid() }}>
                                                    <div id="{{ $customRuleId }}">
                                                        @foreach($group['rules'] as $key2 => $rule)
                                                        <div class="row mt-2 custom_rule_div">
                                                            <div class="col-sm-3 mt-2">
                                                                <select class="form-control rule_name" name="rule_groups[{{$key }}][rules_{{$ruleCount}}][name]">
                                                                    <option value="affiliate_user" @selected($rule['name'] == 'affiliate_user')>{{ __('Affiliate') }}</option>
                                                                    <option value="affiliate_tag" @selected($rule['name'] == 'affiliate_tag')>{{ __('Affiliate Tag') }}</option>
                                                                    <option value="package" @selected($rule['name'] == 'package')>{{ __('Package') }}</option>
                                                                    <option value="credit" @selected($rule['name'] == 'credit')>{{ __('Credit') }}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-2 mt-2 condition">
                                                                <select class="form-control" name="rule_groups[{{$key}}][rules_{{$ruleCount}}][condition]">
                                                                    <option value="any" @selected($rule['condition'] == 'any')>{{ __('any of') }}</option>
                                                                    <option value="none" @selected($rule['condition'] == 'none')>{{ __('none of') }}</option>
                                                                </select>
                                                            </div>
                                                            @php $values = $commissionPlan->getRuleValuesName($rule['name'], $rule['value']); @endphp
                                                            <div class="col-sm-6 mt-2 rule_value_div">
                                                                <select class="form-control rule_value affiliate_user sl_common_bx" name="rule_groups[rules_{{$ruleCount}}][value][]" multiple id="{{ 'rule_value_div_' . uniqid() }}" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                                                    @foreach($values as $value)
                                                                        <option value="{{ $value->id }}" selected>{{ $rule['name'] == 'affiliate_user' ? $value->user?->name : $value->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-1 mt-2 mt-3 {{ $loop->first ? 'display_none' : '' }}">
                                                                <span class="text-dark cursor_pointer action-btn d-flex justify-content-center delete_rule" title="Delete Rule">
                                                                    <i class="fa fa-trash"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        @php $ruleCount++; @endphp
                                                        @endforeach

                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="col-sm-4">
                                                            <button type="button" class="small btn btn-default btn-sm add_rule" data-groupNumber = {{ $key }}><i class="fa fa-plus-circle" aria-hidden="true"></i>{{ __('Add a rule') }}</button>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            @if(!$loop->first)
                                                            <button type="button" class="small btn btn-default btn-sm float-right remove_rule_group"><i class="fa fa-minus-circle" aria-hidden="true"></i>{{ __('Remove group') }}</button>
                                                            @endif
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <button type="button" class="small btn btn-default btn-sm float-right add_rule_group"><i class="fas fa-folder-open" aria-hidden="true"></i>{{ __('Add a group') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            @php $ruleGroupCount = $key @endphp
                                            @endforeach

                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label for="btn_save" class="col-sm-3 control-label"></label>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn py-2 custom-btn-submit {{ languageDirection() == 'ltr' ? 'float-right' : 'float-left' }}">{{ __('Update') }}</button>
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
        var ruleCount = {{ $ruleCount ?? 1 }};
        var ruleGroupCount = {{ $ruleGroupCount ?? 1 }};
    </script>
    <script src="{{ asset('public/datta-able/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/js/commission_plan.min.js') }}"></script>
@endsection
