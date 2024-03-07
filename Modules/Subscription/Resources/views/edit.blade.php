@extends('admin.layouts.app')
@section('page_title', __('Edit :x', ['x' => __('Subscription')]))
@section('css')
    <link rel="stylesheet" href="{{ asset('public/dist/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Modules/Subscription/Resources/assets/css/subscription.min.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="subscription-edit-container">
        <div class="card">
            <div class="card-body row" id="subscription-container">
                <div class="col-lg-3 col-12 z-index-10 pe-0 ps-0 ps-md-3" aria-labelledby="navbarDropdown">
                    <div class="card card-info shadow-none" id="nav">
                        <div class="card-header pt-4 border-bottom text-nowrap">
                            <h5 id="general-settings">{{ __('Subscription Edit') }}</h5>
                        </div>
                        <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <li><a class="nav-link text-left tab-name active" id="v-pills-general-tab" data-bs-toggle="pill"
                                    href="#v-pills-general" role="tab" aria-controls="v-pills-general"
                                    aria-selected="true" data-id="{{ __('General') }}">{{ __('General') }}</a></li>
                            <li><a class="nav-link text-left tab-name" id="v-pills-transaction-tab" data-bs-toggle="pill"
                                    href="#v-pills-transaction" role="tab" aria-controls="v-pills-transaction"
                                    aria-selected="true" data-id="{{ __('Transaction') }}">{{ __('Transaction') }}</a></li>
                            <li><a class="nav-link text-left tab-name" id="v-pills-status-tab" data-bs-toggle="pill"
                                    href="#v-pills-status" role="tab" aria-controls="v-pills-status"
                                    aria-selected="true" data-id="{{ __('Status') }}">{{ __('Status') }}</a></li>
                            <li><a class="nav-link text-left tab-name" id="v-pills-usecase-tab" data-bs-toggle="pill"
                                href="#v-pills-usecase" role="tab" aria-controls="v-pills-usecase"
                                aria-selected="true" data-id="{{ __('Use Case') }}">{{ __('Use Case') }}</a></li>
                            <li><a class="nav-link text-left tab-name" id="v-pills-chat-assistants-tab" data-bs-toggle="pill"
                                href="#v-pills-chat-assistants" role="tab" aria-controls="v-pills-chat-assistants"
                                aria-selected="true" data-id="{{ __('Chat Assitants') }}">{{ __('Chat Assitants') }}</a></li>
                            <li class="featuers mt-2 font-bold text-dark ms-3">{{ __('Features') }}</li>
                            @foreach ($features as $key => $value)
                                <li class="ms-3 {{ str_contains($key, 'custom') ? 'custom-feature-nav' : '' }}">
                                    <a class="nav-link text-left tab-name" id="v-pills-{{ $key }}-tab" data-bs-toggle="pill"
                                        href="#v-pills-{{ $key }}" role="tab" aria-controls="v-pills-{{ $key }}"
                                        aria-selected="true"
                                        data-id="{{ ucwords(str_replace('-', ' ', $key)) }}">{{ str_replace('-', ' ', $key) }}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-12 ps-0">
                    <div class="card card-info shadow-none">
                        <div class="card-header pt-4 border-bottom">
                            <h5><span id="theme-title">{{ __('General') }}</span></h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('package.subscription.update', ['id' => $subscription->id]) }}" method="post">
                                @csrf
                                @method('PUT')

                                <div class="tab-content p-0 box-shadow-unset" id="topNav-v-pills-tabContent">
                                    {{-- General --}}
                                    <div class="tab-pane fade active show" id="v-pills-general" role="tabpanel"
                                        aria-labelledby="v-pills-general-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="package_id" class="control-label">{{ __('Plan') }}</label>
                                                        <input type="hidden" name="package_id" value="{{ $subscription->package_id }}">
                                                        <input type="text" placeholder="{{ __('Plan') }}"
                                                            class="form-control form-width inputFieldDesign" id="package_id"
                                                            name="package_id" value="{{ old('package_id', $subscription->package?->name) }}" disabled>
                                                        @if(!count($packages))
                                                            <span class="text-danger">{{ __("Please create a packge") }}
                                                                <a class="ms-1" href="{{ route('package.create') }}" target="_blank">{{ __('Click Here') }}</a>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="user_id" class="control-label">{{ __('User') }}</label>
                                                        <input type="hidden" name="user_id" value="{{ $subscription->user_id }}">
                                                        <input type="text" class="form-control form-width inputFieldDesign" value="{{ $subscription?->user?->name }}" disabled>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="billing_price" class="control-label">{{ __('Billing Price') }}</label>
                                                        <input type="text" placeholder="{{ __('Billing Price') }}"
                                                            class="form-control form-width inputFieldDesign positive-float-number" id="billing_price"
                                                            name="billing_price" value="{{ formatCurrencyAmount(old('billing_price', $subscription->billing_price)) }}" readonly>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label for="billing_price" class="control-label">{{ __('Billing Cycle') }}</label>
                                                        <input type="text" placeholder="{{ __('Billing Cycle') }}"
                                                            class="form-control form-width inputFieldDesign text-capitalize" id="billing_cycle"
                                                            name="billing_cycle" value="{{ old('billing_cycle', $subscription->billing_cycle) }}" readonly>
                                                    </div>
                                                    <div class="col-md-6 {{ old('billing_cycle', $subscription->billing_cycle) == 'days' ? '' : 'd-none' }}" id="duration_days">
                                                        <label for="duration" class="control-label">{{ __('Duration') }}</label>
                                                        <input type="text" placeholder="{{ __('Days') }}"
                                                            class="form-control form-width inputFieldDesign positive-int-number" id="duration"
                                                            name="meta[0][duration]" value="{{ $subscription->duration }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="activation_date" class="control-label">{{ __('Activation Date') }}</label>
                                                        <div class="d-flex date">
                                                            <div class="input-group-prepend">
                                                                <i class="fas border-end-0 fa-calendar-alt input-group-text bg-white rounded-0 rounded-start h-40"></i>
                                                            </div>
                                                            <input type="text" placeholder="{{ __('Activation Date') }}"
                                                                class="form-control form-width inputFieldDesign positive-int-number" id="activation_date"
                                                                name="activation_date" value="{{ old('activation_date', $subscription->activation_date) }}" readonly disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="billing_date" class="control-label">{{ __('Billing Date') }}</label>
                                                        <div class="d-flex date">
                                                            <div class="input-group-prepend">
                                                                <i class="fas border-end-0 fa-calendar-alt input-group-text bg-white rounded-0 rounded-start h-40"></i>
                                                            </div>
                                                            <input type="text" placeholder="{{ __('Billing Date') }}"
                                                                class="form-control form-width inputFieldDesign positive-int-number" id="billing_date"
                                                                name="billing_date" value="{{ old('billing_date', $subscription->billing_date) }}" readonly disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 {{ $subscription->billing_cycle == 'lifetime' ? 'd-none' : '' }}">
                                                        <label for="next_billing_date" class="control-label">{{ __('Next Billing Date') }}</label>
                                                         <div class="d-flex date">
                                                            <div class="input-group-prepend">
                                                                <i class="fas border-end-0 fa-calendar-alt input-group-text bg-white rounded-0 rounded-start h-40"></i>
                                                            </div>
                                                            <input type="text" placeholder="{{ __('Next Billing Date') }}"
                                                                class="form-control form-width inputFieldDesign positive-int-number" id="next_billing_date"
                                                                name="next_billing_date" value="{{ old('next_billing_date', $subscription->next_billing_date) }}" readonly disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Transaction --}}
                                    <div class="tab-pane fade" id="v-pills-transaction" role="tabpanel"
                                        aria-labelledby="v-pills-transaction-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="amount_billed" class="control-label">{{ __('Amount Billed') }}</label>
                                                        <input type="text" placeholder="{{ __('Amount Billed') }}"
                                                            class="form-control form-width inputFieldDesign positive-float-number" id="amount_billed"
                                                            name="amount_billed" value="{{ formatCurrencyAmount(old('amount_billed', $subscription->amount_billed)) }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="amount_received" class="control-label">{{ __('Amount Received') }}</label>
                                                        <input type="text" placeholder="{{ __('Amount Received') }}"
                                                            class="form-control form-width inputFieldDesign positive-float-number" id="amount_received"
                                                            name="amount_received" value="{{ formatCurrencyAmount(old('amount_received', $subscription->amount_received)) }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="amount_due" class="control-label">{{ __('Amount Due') }}</label>
                                                        <input type="text" placeholder="{{ __('Amount Due') }}"
                                                            class="form-control form-width inputFieldDesign positive-float-number" id="amount_due"
                                                            name="amount_due" value="{{ formatCurrencyAmount(old('amount_due', $subscription->amount_due)) }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Status --}}
                                    <div class="tab-pane fade" id="v-pills-status" role="tabpanel"
                                        aria-labelledby="v-pills-status-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <input type="hidden" name="is_customized" value="1">
                                                    <input type="hidden" name="renewable" id="renewable" value="{{ $subscription->renewable }}">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="payment_status" class="control-label">{{ __('Payment Status') }}</label>
                                                        <select class="form-control select2-hide-search inputFieldDesign"
                                                            name="payment_status" id="payment_status">
                                                            <option value="Paid" @selected(old('payment_status', $subscription->payment_status) == 'Paid')>{{ __('Paid') }}</option>
                                                            <option value="Unpaid" @selected(old('payment_status', $subscription->payment_status) == 'Unpaid')>{{ __('Unpaid') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="status" class="control-label">{{ __('Status') }}</label>
                                                        <select class="form-control select2-hide-search inputFieldDesign"
                                                            name="status" id="status">
                                                            @foreach (subscription('getStatuses') as $status)
                                                                <option value="{{ $status }}" @selected(old('status', $subscription->status) == $status)>{{ $status }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="py-1" id="note_txt_1">
                                                        <div class="d-flex mt-1 mb-3">
                                                            <span class="badge badge-danger h-100 mt-1"> {{__('Note') }}!</span>
                                                            <ul class="list-unstyled ml-3">
                                                                <li>{{ __('If the status is changed then recurring will stop functioning.') }} </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Use Case --}}
                                    <div class="tab-pane fade" id="v-pills-usecase" role="tabpanel"
                                        aria-labelledby="v-pills-usecase-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="usecase-category" class="control-label require">{{ __('Use Case Category') }}</label>
                                                        <select class="form-control select2 inputFieldDesign"
                                                            name="meta[0][usecaseCategory][]" id="usecase-category" multiple required>
                                                            @foreach ($useCaseCategory as $category)
                                                                <option value="{{ $category->id }}" {{ in_array($category->id, json_decode($subscription->usecaseCategory) ?? []) ? 'selected' : '' }}>{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="usecase-template" class="control-label require">{{ __('Use Case Template') }}</label>
                                                        <select class="form-control select2 inputFieldDesign"
                                                            name="meta[0][usecaseTemplate][]" id="usecase-template" multiple required>
                                                            @foreach ($useCaseTemplate as $template)
                                                                <option value="{{ $template->slug }}" {{ in_array($template->slug, json_decode($subscription->usecaseTemplate) ?? []) ? 'selected' : '' }}>{{ $template->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- Multiple Chat --}}
                                    <div class="tab-pane fade" id="v-pills-chat-assistants" role="tabpanel"
                                        aria-labelledby="v-pills-chat-assistants-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="chat-category" class="control-label require">{{ __('Chat Category') }}</label>
                                                        <select class="form-control select2 inputFieldDesign"
                                                            name="meta[0][chatCategory][]" id="chat-category" multiple required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                                            @foreach ($chatCategory as $category)
                                                                <option value="{{ $category->id }}" {{ in_array($category->id, json_decode($subscription->chatCategory) ?? []) ? 'selected' : '' }}>{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-12">
                                                        <label for="chat-template" class="control-label require">{{ __('Chat Assistants') }}</label>
                                                        <select class="form-control select2 inputFieldDesign"
                                                            name="meta[0][chatAssistants][]" id="chat-template" multiple required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                                            @foreach ($chatAssistants as $assistant)
                                                                <option value="{{ $assistant->code }}" {{ in_array($assistant->code, json_decode($subscription->chatAssistants) ?? []) ? 'selected' : '' }}>{{ $assistant->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Features --}}
                                    @foreach ($features as $key => $feature)
                                        <input type="hidden" name="meta[{{ $key }}][status]" value="Active">
                                        <div class="tab-pane fade" id="v-pills-{{ $key }}" role="tabpanel"
                                            aria-labelledby="v-pills-{{ $key }}-tab">
                                            <input type="hidden" name="meta[{{ $key }}][type]" value="{{ $feature->type }}">
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="title" class="control-label">{{ __('Title') }}</label>
                                                    <input type="text" placeholder="{{ __('Title') }}"
                                                        class="form-control form-width inputFieldDesign" id="title"
                                                        name="meta[{{ $key }}][title]" value="{{ $feature->title }}">
                                                </div>
                                                @if ($feature->type == 'number')
                                                    <div class="col-sm-6">
                                                        <label for="title_position" class="control-label">{{ __('Position') }}</label>
                                                        <select class="form-control select2-hide-search inputFieldDesign"
                                                            name="meta[{{ $key }}][title_position]" id="{{ $key }}title_position">
                                                            <option value="before"
                                                                {{ $feature->title_position == 'before' ? 'selected' : '' }}>{{ __('Before the value') }}</option>
                                                            <option value="after"
                                                                {{ $feature->title_position == 'after' ? 'selected' : '' }}>{{ __('After the value') }}</option>
                                                        </select>
                                                    </div>
                                                @endif
                                            </div>
                                            @if ($feature->type <> 'string')
                                                <div class="form-group row">
                                                    @if ($feature->title == 'Max Image Resolution')
                                                        <div class="col-sm-6">
                                                            <label for="value" class="control-label">{{ __('Value') }}</label>
                                                            <select class="form-control select2-hide-search inputFieldDesign"
                                                                name="meta[{{ $key }}][value]" id="{{ $key }}value">
                                                                @foreach (sortResolution($meta) as $value)
                                                                    <option value="{{ $value }}"
                                                                        {{ old('value', $feature->value ?? '') == $value ? 'selected' : '' }}>{{ $value }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @elseif ($feature->type == 'number')
                                                        <div class="col-md-6">
                                                            <label for="value" class="control-label">{{ __('Value') }}</label>
                                                            <input type="text" placeholder="{{ __('Value') }}"
                                                                class="form-control form-width inputFieldDesign int-number" id="value"
                                                                name="meta[{{ $key }}][value]" value="{{ $feature->value }}">
                                                            <label class="mt-1"><span class="badge badge-warning me-2">{{ __('Note') }}</span>{{ __('-1 for unlimited') }}</label>
                                                        </div>
                                                    @elseif ($feature->type == 'bool')
                                                        <div class="col-sm-6">
                                                            <label for="value" class="control-label">{{ __('Value') }}</label>
                                                            <select class="form-control select2-hide-search inputFieldDesign"
                                                                name="meta[{{ $key }}][value]" id="{{ $key }}value">
                                                                <option value="1"
                                                                    {{ $feature->value == '1' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                                                <option value="0"
                                                                    {{ $feature->value == '0' ? 'selected' : '' }}>{{ __('No') }}</option>
                                                            </select>
                                                        </div>
                                                    @endif
                                                    <div class="col-md-6">
                                                        <label for="usage" class="control-label">{{ __('Used') }}</label>
                                                        <input type="text" placeholder="{{ __('Used') }}"
                                                            class="form-control form-width inputFieldDesign int-number" id="usage"
                                                            name="meta[{{ $key }}][usage]" value="{{ $feature->usage }}" readonly>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="is_visible" class="control-label">{{ __('Is Visible?') }}</label>
                                                    <select class="form-control select2-hide-search inputFieldDesign"
                                                        name="meta[{{ $key }}][is_visible]" id="{{ $key }}is_visible">
                                                        <option value="1"
                                                            {{ $feature->is_visible == '1' ? 'selected' : '' }}>{{ __('Yes') }}</option>
                                                        <option value="0"
                                                            {{ $feature->is_visible == '0' ? 'selected' : '' }}>{{ __('No') }}</option>
                                                    </select>
                                                    <label class="mt-1"><span class="badge badge-warning me-2">{{ __('Note') }}</span>{{ __('This option is applicable only for the plan details section') }}</label>
                                                </div>
                                            </div>

                                            <input type="hidden" name="meta[{{ $key }}][description]" value="">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="footer py-0">
                                    <div class="form-group row">
                                        <label for="btn_save" class="col-sm-3 control-label"></label>
                                        <div class="m-auto">
                                            <button type="submit"
                                                class="btn form-submit custom-btn-submit float-right package-submit-button"
                                                id="footer-btn">{{ __('Save') }}</button>
                                            <a href="{{ route('package.subscription.index') }}"
                                                class="py-2 me-2 form-submit custom-btn-cancel float-right submit-button all-cancel-btn">{{ __('Cancel') }}</a>
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
    <script>
        var dynamic_page = ['usecase', 'chat-assistants', 'word', 'image', 'image-resolution'];
    </script>
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/moment.min.js') }}"></script>
    <script src="{{ asset('public/dist/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('Modules/Subscription/Resources/assets/js/subscription.min.js') }}"></script>
@endsection
