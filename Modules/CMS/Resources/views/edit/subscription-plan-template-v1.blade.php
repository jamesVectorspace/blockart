@php
    $component = isset($component) ? $component : null;
    $allPlans = \Modules\Subscription\Services\PackageSubscriptionService::getActivePlans();
    $allCredits =  \Modules\Subscription\Services\CreditService::getActiveCredits();
@endphp

<link rel="stylesheet" href="{{ asset('public/datta-able/plugins/mini-color/css/jquery.minicolors.min.css') }}">

<div class="card dd-content {{ $editorClosed ?? 'card-hide' }}">
    <div class="card-body">
        <form action="{{ route('builder.update', ['id' => '__id']) }}" data-type="component" method="post"
            class="component_form form-parent silent-form">
            @csrf
            @include('cms::hidden_fields')

            @include('cms::edit.sub.background')

            <div class="form-group row">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('Overline') }}</dt>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control section_name inputFieldDesign crequired" maxlength="70" name="overline"
                       value="{{ $component ? $component->overline : '' }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('Heading') }}</dt>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control inputFieldDesign crequired" name="heading"
                       value="{{ $component ? $component->heading : '' }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('Body') }}</dt>
                </label>
                <div class="col-sm-8">
                    <textarea class="form-control crequired" name="body" required> {{ $component ? trim($component->body) : '' }}</textarea>
                </div>
            </div>

            @include('cms::edit.sub.text-color')

            <hr>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label class="control-label text-left">
                        <dt>{{ __('Button') }}</dt>
                    </label>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Subscription Name') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control inputFieldDesign" name="plan_btn_name" maxlength="25"
                                            value="{{ $component ? $component->plan_btn_name : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Credit Name') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control inputFieldDesign" name="credit_btn_name" maxlength="25"
                                            value="{{ $component ? $component->credit_btn_name : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row  d-none">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Button Color (Light)') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_color_light"
                                            value="{{ $component ? $component->btn_color_light : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Button Color (Dark)') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_color_dark"
                                            value="{{ $component ? $component->btn_color_dark : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Button Text Color (Light)') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_text_color_light"
                                            value="{{ $component ? $component->btn_text_color_light : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Button Text Color (Dark)') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_text_color_dark"
                                            value="{{ $component ? $component->btn_text_color_dark : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <hr>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label class="control-label text-left">
                        <dt>{{ __('Subcription Plan') }}</dt>
                    </label>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Plan Type') }}</label>
                                <select type="text"class="form-control crequired select3 plan_type" name="plan_type">
                                    @foreach (\Modules\CMS\Service\Homepage::planOptions() as $key => $value)
                                        <option {{ $component && $component->plan_type == $key ? 'selected' : '' }}
                                            value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 plan-cats latestPlans {{ empty($component->plan_type) ||  $component->plan_type == 'latestPlans' ? '' : 'd-none' }}">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('No. of plans to show') }}</label>
                                <div>
                                    <input type="number" min="1" max="30" class="form-control crequired inputFieldDesign plan_limit" name="plan_limit"
                                        {{ empty($component->plan_type) ||  $component->plan_type == 'latestPlans' ? 'required' : '' }}
                                       value="{{ $component ? $component->plan_limit : 3 }}">
                                </div>
                                <div class="d-flex mt-2">
                                    <span class="badge badge-danger h-100 mt-1">{{ __('Note') }}!</span>
                                    <small
                                        class="mt-1 ltr:ms-2 rtl:me-2">{{ __('Default plan number is 3') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row plan-cats selectedPlans {{ $component && $component->plan_type == 'selectedPlans' ? '' : 'd-none' }}">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Plans') }}</label>
                                <select type="text" class="form-control select2 sl_common_bx select_plan" {{ $component && $component->plan_type == 'selectedPlans' ? 'required' : '' }} name="plans[]" multiple>
                                    @if ($component && is_array($component->plans))
                                        @foreach ($component->plans as $selected)
                                            @if (isset($allPlans[$selected]))
                                                <Option selected value="{{ $selected }}">{{ $allPlans[$selected] }}</Option>
                                                @php
                                                    unset($allPlans[$selected]);
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                    @foreach ($allPlans as $key => $value)
                                        <Option value="{{ $key }}">{{ $value }}</Option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Light)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="plan_text_color_light"
                                            value="{{ $component ? $component->plan_text_color_light : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Dark)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="plan_text_color_dark"
                                            value="{{ $component ? $component->plan_text_color_dark : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-4 col-md-3">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Color (Light)') }}</label>
                                        <div class="col-sm-12">
                                            <div>
                                                <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="plan_btn_color_light"
                                                    value="{{ $component ? $component->plan_btn_color_light : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Color (Dark)') }}</label>
                                        <div class="col-sm-12">
                                            <div>
                                                <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="plan_btn_color_dark"
                                                    value="{{ $component ? $component->plan_btn_color_dark : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Text Color (Light)') }}</label>
                                        <div class="col-sm-12">
                                            <div>
                                                <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="plan_btn_text_color_light"
                                                    value="{{ $component ? $component->plan_btn_text_color_light : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-3">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Text Color (Dark)') }}</label>
                                        <div class="col-sm-12">
                                            <div>
                                                <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="plan_btn_text_color_dark"
                                                    value="{{ $component ? $component->plan_btn_text_color_dark : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            
            <div class="form-group row">
                <div class="col-sm-3">
                    <label class="control-label text-left">
                        <dt>{{ __('Credit') }}</dt>
                    </label>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Credit Type') }}</label>
                                <select type="text"class="form-control crequired select3 credit_type" name="credit_type">
                                    @foreach (\Modules\CMS\Service\Homepage::creditOptions() as $key => $value)
                                        <option {{ $component && $component->credit_type == $key ? 'selected' : '' }}
                                            value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 credit-cats latestCredits {{ empty($component->credit_type) || $component->credit_type == 'latestCredits' ? '' : 'd-none' }}">
                            <div class="form-group">
                                <label class="col-sm-12 control-label"> {{ __('No. of credits to show') }}</label>
                                <div>
                                    <input type="number" min="1" max="30" class="form-control crequired inputFieldDesign credit_limit" name="credit_limit"
                                        {{ empty($component->credit_type) || $component->credit_type == 'latestCredits' ? 'required' : '' }}
                                       value="{{ $component ? $component->credit_limit : 3 }}">
                                </div>
                                <div class="d-flex mt-2">
                                    <span class="badge badge-danger h-100 mt-1">{{ __('Note') }}!</span>
                                    <small
                                        class="mt-1 ltr:ms-2 rtl:me-2">{{ __('Default credit plan number is 3') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row credit-cats selectedCredits {{ $component && $component->credit_type == 'selectedCredits' ? '' : 'd-none' }}">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Credits') }}</label>
                                <select type="text" class="form-control select2 sl_common_bx select_credit" {{ $component && $component->credit_type == 'selectedCredits' ? 'required' : '' }} name="credits[]" multiple>
                                    @if ($component && is_array($component->credits))
                                        @foreach ($component->credits as $selected)
                                            @if (isset($allCredits[$selected]))
                                                <Option selected value="{{ $selected }}">{{ $allCredits[$selected] }}</Option>
                                                @php unset($allCredits[$selected]); @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                    @foreach ($allCredits as $key => $value)
                                        <Option value="{{ $key }}">{{ $value }}</Option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Heading Text Color (Light)') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="credit_text_color_light_head"
                                                    value="{{ $component ? $component->credit_text_color_light_head : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Heading Text Color (Dark)') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="credit_text_color_dark_head"
                                                    value="{{ $component ? $component->credit_text_color_dark_head : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Text Color (Light)') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="credit_text_color_light"
                                                    value="{{ $component ? $component->credit_text_color_light : '' }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Text Color (Dark)') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="credit_text_color_dark"
                                                    value="{{ $component ? $component->credit_text_color_dark : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Color (Light)') }}</label>
                                        <div class="col-sm-12">
                                            <div>
                                                <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="credit_btn_color_light"
                                                    value="{{ $component ? $component->credit_btn_color_light : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Color (Dark)') }}</label>
                                        <div class="col-sm-12">
                                            <div>
                                                <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="credit_btn_color_dark"
                                                    value="{{ $component ? $component->credit_btn_color_dark : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Text Color (Light)') }}</label>
                                        <div class="col-sm-12">
                                            <div>
                                                <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="credit_btn_text_color_light"
                                                    value="{{ $component ? $component->credit_btn_text_color_light : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Text Color (Dark)') }}</label>
                                        <div class="col-sm-12">
                                            <div>
                                                <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="credit_btn_text_color_dark"
                                                    value="{{ $component ? $component->credit_btn_text_color_dark : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('cms::edit.sub.appearance', ['fields' => ['margin']])
            @include('cms::pieces.submit-btn')
        </form>
    </div>
</div>

<!-- form-picker-custom Js -->
<script src="{{ asset('public/datta-able/js/pages/form-picker-custom.min.js') }}"></script>
<script src="{{ asset('public/datta-able/plugins/mini-color/js/jquery.minicolors.min.js') }}"></script>
<script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
