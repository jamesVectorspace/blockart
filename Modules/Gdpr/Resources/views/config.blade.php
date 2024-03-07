@extends('admin.layouts.app')
@section('page_title', __('GDPR Settings'))
@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="gdpr-settings-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-3 col-12 z-index-10  ltr:ps-md-3 ltr:pe-0 ltr:ps-0 rtl:pe-md-3 rtl:ps-0 rtl:pe-0">
                    @include('admin.layouts.includes.general_settings_menu')
                </div>
                <div class="col-lg-9 col-12 ltr:ps-0 rtl:pe-0">
                    <div class="card card-info shadow-none mb-0">
                        @if (session('errorMgs'))
                            <div class="alert alert-warning fade in alert-dismissable">
                                <strong>{{ __('Warning') }}!</strong> {{ session('errorMgs') }}. <a class="close"
                                    href="#" data-dismiss="alert" aria-label="close" title="close">×</a>
                            </div>
                        @endif
                        <span id="smtp_head">
                            <div class="card-header p-t-20 border-bottom">
                                <h5>{{ __('GDPR Service') }}</h5>
                            </div>
                        </span>
                        <div class="col-sm-12 m-t-20 form-tabs">
                            <ul class="nav nav-tabs " id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-uppercase" id="information-tab" data-bs-toggle="tab"
                                        href="#information" role="tab" aria-controls="information"
                                        aria-selected="true">{{ __('GDPR Settings') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link text-uppercase" id="translate-tab" data-bs-toggle="tab"
                                        href="#translate" role="tab" aria-controls="translate"
                                        aria-selected="false">{{ __('Translate') }}</a>
                                </li>
                            </ul>

                            <div class="row">
                                <div class="col-sm-12">
                                    <form action='{{ route('gdpr.store') }}' method="post" class="form-horizontal">
                                        @csrf
                                        <div class="col-sm-12 tab-content shadow-none" id="myTabContent">
                                            <div class="tab-pane fade show active" id="information" role="tabpanel"
                                                aria-labelledby="information-tab">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row">
                                                            <label for="rating"
                                                                class="col-sm-3 control-label text-left">{{ __('GDPR') }}</label>
                                                            <div class="col-9 d-flex mt-neg-2">
                                                                <div class="ltr:me-3 rtl:ms-3">
                                                                    <div class="switch switch-bg d-inline m-r-10">
                                                                        <input type="checkbox" name="is_gdpr_enable"
                                                                            class="checkActivity" id="is_gdpr_enable"
                                                                            value="{{ preference('is_gdpr_enable') }}"
                                                                            {{ preference('is_gdpr_enable') == 1 ? 'checked' : '' }}>
                                                                        <label for="is_gdpr_enable" class="cr"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <span>{{ __('Enable GDRP') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-3 control-label align-left">{{ __('Life time :x', ['x' => '( days )']) }}</label>

                                                            <div class="col-sm-8">
                                                                <input type="number"
                                                                    value="{{ preference('gdpr_life_time') }}"
                                                                    class="form-control removeSpace inputFieldDesign"
                                                                    name="gdpr_life_time">
                                                            </div>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                        @php
                                                            $langText = json_decode(preference('gdpr_text_en'));
                                                        @endphp
                                                        <div class="form-group row">
                                                            <label for="meta_title"
                                                                class="col-sm-3 text-left col-form-label">{{ __('Message') }}</label>
                                                            <div class="col-sm-8">
                                                                <textarea class="form-control custom" rows="4" name="gdpr_text_en[gdpr_message]">{{ $langText?->gdpr_message }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-3 control-label align-left">{{ __('Confirm button text') }}</label>

                                                            <div class="col-sm-8">
                                                                <input type="text"
                                                                    value="{{ $langText?->gdpr_confirm_button_text }}"
                                                                    class="form-control removeSpace " inputFieldDesign
                                                                    name="gdpr_text_en[gdpr_confirm_button_text]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-3 control-label align-left">{{ __('Policy link button text') }}</label>

                                                            <div class="col-sm-8">
                                                                <input type="text"
                                                                    value="{{ $langText?->gdpr_policy_button_text }}"
                                                                    class="form-control removeSpace" inputFieldDesign
                                                                    name="gdpr_text_en[gdpr_policy_button_text]">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-3 control-label align-left">{{ __('Policy Link') }}</label>

                                                            <div class="col-sm-8">
                                                                <input type="text"
                                                                    value="{{ preference('gdpr_policy_link') }}"
                                                                    class="form-control removeSpace" inputFieldDesign
                                                                    name="gdpr_policy_link">
                                                            </div>
                                                        </div>
                                                        <hr class="mt-2">

                                                        <div class="form-group row">
                                                            <label for="rating"
                                                                class="col-sm-3 control-label text-left">{{ __('GDPR Service') }}</label>
                                                            <div class="col-9 d-flex mt-neg-2">
                                                                <div class="ltr:me-3 rtl:ms-3">
                                                                    <div class="switch switch-bg d-inline m-r-10">
                                                                        <input type="checkbox"
                                                                            name="is_external_gdpr_enable"
                                                                            class="checkActivity"
                                                                            id="is_external_gdpr_enable"
                                                                            value="{{ preference('is_external_gdpr_enable') }}"
                                                                            {{ preference('is_external_gdpr_enable') == 1 ? 'checked' : '' }}>
                                                                        <label for="is_external_gdpr_enable"
                                                                            class="cr"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <span>{{ __('Enable Service GDPR') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="meta_title"
                                                                class="col-sm-3 text-left col-form-label">{{ __('GDPR Service Script') }}</label>
                                                            <div class="col-sm-8">
                                                                <textarea class="form-control custom" rows="4" spellcheck="true" name="gdpr_external_script">{{ preference('gdpr_external_script') }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="translate" role="tabpanel"
                                                aria-labelledby="translate-tab">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        @if ($languages->isNotEmpty())
                                                            @foreach ($languages as $language)
                                                                <!-- Escape the english details -->
                                                                @if ($language->short_name == 'en')
                                                                    @continue
                                                                @endif
                                                                @php
                                                                    $gdprText = json_decode(preference('gdpr_text_' . $language->short_name));
                                                                @endphp


                                                                <div class="border-bottom">
                                                                    <div class="p-1">
                                                                        <img src='{{ url('public/datta-able/fonts/flag/flags/4x3/' . getSVGFlag($language->short_name) . '.svg') }}'
                                                                            height="20" alt="{{ $language->flag }}">
                                                                        <span class="text-uppercase f-18 font-weight-bold">{{ $language->name }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="row p-2">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label pr-0">{{ __('Confirm button text') }}</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text"
                                                                                    placeholder="{{ __('confirm button text') }}"
                                                                                    class="form-control inputFieldDesign"
                                                                                    name="gdpr_text_{{ $language->short_name }}[gdpr_confirm_button_text]"
                                                                                    value="{{ $gdprText?->gdpr_confirm_button_text }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label pr-0">{{ __('Policy link button text') }}</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text"
                                                                                    placeholder="{{ __('policy link button text') }}"
                                                                                    class="form-control inputFieldDesign"
                                                                                    name="gdpr_text_{{ $language->short_name }}[gdpr_policy_button_text]"
                                                                                    value="{{ $gdprText?->gdpr_policy_button_text }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row">
                                                                            <label
                                                                                class="col-sm-4 col-form-label pr-0">{{ __('Message') }}</label>
                                                                            <div class="col-sm-8" id="code-mirror-parent">
                                                                                <textarea id="translateBody" name="gdpr_text_{{ $language->short_name }}[gdpr_message]" class="form-control">{{ $gdprText?->gdpr_message }}</textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-10 px-0 m-l-5">
                                                <a href="{{ route('emailTemplates.index') }}"
                                                    class="py-2 custom-btn-cancel ltr:me-2 rtl:ms-2">{{ __('Cancel') }}</a>
                                                <button class="btn py-2 custom-btn-submit" type="submit"
                                                    id="btnSubmit">{{ __('Save') }}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('Modules/Gdpr/Resources/assets/js/setting.min.js') }}"></script>
@endsection
