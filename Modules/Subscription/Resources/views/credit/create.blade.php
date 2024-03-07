@extends('admin.layouts.app')
@section('page_title', __('Create :x', ['x' => __('Credit')]))
@section('css')
    <link rel="stylesheet" href="{{ asset('Modules/Subscription/Resources/assets/css/subscription.min.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="credit-add-container">
        <div class="card">
            <div class="card-body row" id="credit-container">
                <div class="col-lg-3 col-12 z-index-10 pe-0 ps-0 ps-md-3" aria-labelledby="navbarDropdown">
                    <div class="card card-info shadow-none" id="nav">
                        <div class="card-header pt-4 border-bottom text-nowrap">
                            <h5 id="general-settings">{{ __('Credit Create') }}</h5>
                        </div>
                        <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <li><a class="nav-link text-left tab-name active" id="v-pills-general-tab" data-bs-toggle="pill"
                                    href="#v-pills-general" role="tab" aria-controls="v-pills-general"
                                    aria-selected="true" data-id="{{ __('General') }}">{{ __('General') }}</a></li>
                            <li><a class="nav-link text-left tab-name" id="v-pills-feature-tab" data-bs-toggle="pill"
                                    href="#v-pills-feature" role="tab" aria-controls="v-pills-feature"
                                    aria-selected="true" data-id="{{ __('Features') }}">{{ __('Features') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-12 ps-0">
                    <div class="card card-info shadow-none">
                        <div class="card-header pt-4 border-bottom">
                            <h5><span id="theme-title">{{ __('General') }}</span></h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('credit.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                <div class="tab-content p-0 box-shadow-unset" id="topNav-v-pills-tabContent">
                                    {{-- General --}}
                                    <div class="tab-pane fade active show" id="v-pills-general" role="tabpanel"
                                        aria-labelledby="v-pills-general-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <label for="name" class="control-label require">{{ __('Name') }}</label>
                                                        <input type="text" placeholder="{{ __('Name') }}"
                                                            class="form-control form-width inputFieldDesign" id="name"
                                                            name="name" required minlength="3" value="{{ old('name') }}"
                                                            oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"
                                                            data-min-length="{{ __(':x should contain at least :y characters.', ['x' => __('Name'), 'y' => 3]) }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="code" class="control-label require">{{ __('Code') }}</label>
                                                        <input type="text" placeholder="{{ __('Code') }}"
                                                            class="form-control form-width inputFieldDesign" id="code"
                                                            name="code" required minlength="3" value="{{ old('code') }}"
                                                            oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"
                                                            data-min-length="{{ __(':x should contain at least :y characters.', ['x' => __('Code'), 'y' => 3]) }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-4">
                                                        <label for="price" class="control-label">{{ __('Price') }}</label>
                                                        <input type="text" placeholder="{{ __('Price') }}"
                                                            class="form-control form-width inputFieldDesign positive-float-number" id="price"
                                                            name="price" value="{{ old('price') }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="sort_order" class="control-label require">{{ __('Sort Order') }}</label>
                                                        <input type="text" placeholder="{{ __('Sort Order') }}" required
                                                            class="form-control form-width inputFieldDesign positive-int-number" id="sort_order"
                                                            name="sort_order" value="{{ old('sort_order') }}">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="status" class="control-label">{{ __('Status') }}</label>
                                                        <select class="form-control select2-hide-search inputFieldDesign"
                                                            name="status" id="status">
                                                            <option value="Active"
                                                                {{ old('status') == 'Active' ? 'selected' : '' }}>{{ __('Active') }}</option>
                                                            <option value="Inactive"
                                                                {{ old('status') == 'Inactive' ? 'selected' : '' }}>{{ __('Inactive') }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Features --}}
                                    <div class="tab-pane fade" id="v-pills-feature" role="tabpanel"
                                        aria-labelledby="v-pills-feature-tab">
                                        @foreach($features as $key => $feature)
                                            @continue($feature['is_value_fixed'] == 1)
                                            <div class="form-group row">
                                                <div class="col-md-6">
                                                    <label for="{{ $key }}_limit" class="control-label require">{{ ucfirst($key) }}</label>
                                                    <input type="text" placeholder="{{ ucfirst($key) }}" required
                                                        class="form-control form-width inputFieldDesign int-number" id="{{ $key }}_limit"
                                                        name="features[{{ $key }}]" value="{{ $feature['value'] }}"
                                                        oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                                    <label class="mt-1"><span class="badge badge-warning me-2">{{ __('Note') }}</span>{{ __('-1 for unlimited') }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="footer py-0">
                                    <div class="form-group row">
                                        <label for="btn_save" class="col-sm-3 control-label"></label>
                                        <div class="m-auto">
                                            <button type="submit"
                                                class="btn form-submit custom-btn-submit float-right credit-submit-button"
                                                id="footer-btn">{{ __('Save') }}</button>
                                            <a href="{{ route('credit.index') }}"
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
        var dynamic_page = ['feature'];
    </script>
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('Modules/Subscription/Resources/assets/js/subscription.min.js') }}"></script>
@endsection
