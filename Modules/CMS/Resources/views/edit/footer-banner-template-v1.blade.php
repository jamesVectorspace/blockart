@php
    $component = isset($component) ? $component : null;
    $rand = uniqid();
@endphp

<link rel="stylesheet" href="{{ asset('public/datta-able/plugins/mini-color/css/jquery.minicolors.min.css') }}">

<div class="card dd-content {{ $editorClosed ?? 'card-hide' }}">
    <div class="card-body">
        <form action="{{ route('builder.update', ['id' => '__id']) }}" novalidate data-type="component" method="post"
            class="component_form form-parent silent-form">
            @csrf
            @include('cms::hidden_fields')

            {{-- Background Type --}}
            @include('cms::edit.sub.background')

            {{-- Title --}}
            <div class="form-group row">
                <label class="col-sm-3 control-label ">
                    <dt>{{ __('Heading') }}</dt>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control inputFieldDesign"
                    value="{{ $component ? $component->heading : '' }}" name="heading">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 control-label ">
                    <dt>{{ __('Body') }}</dt>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control inputFieldDesign"
                            value="{{ $component ? $component->body : '' }}" name="body">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3">
                    <label class="control-label text-left">
                        <dt>{{ __('Image') }}</dt>
                    </label>
                </div>
                <div class="col-sm-8">
                    <div class="form-group row form-parent parent-class">
                        <div class="col-sm-12">
                            <div class="custom-file media-manager" data-name="image" data-val="single"
                                id="image-status">
                                <input class="custom-file-input form-control d-none inputFieldDesign" name="image"
                                    id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                    for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                            </div>
                            <div class="preview-image">
                                @if ($component && $component->image)
                                    <div class="d-flex flex-wrap mt-2">
                                        <div
                                            class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                            <div
                                                class="position-absolute rounded-circle text-center img-remove-icon">
                                                <i class="fa fa-times"></i>
                                            </div>
                                            <img class="upl-img" class="p-1"
                                                src="{{ pathToUrl($component->image) }}"
                                                alt="{{ __('Image') }}">
                                            <input type="hidden" name="image"
                                                value="{{ $component->image }}">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('cms::edit.sub.text-color')

            <hr>
            <div class="form-group row">
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label class="control-label text-left">
                            <dt>{{ __('First Button') }}</dt>
                        </label>
                        <input type="hidden" name="first_button" value="0">
                        <div class="col-md-12">
                            <div class="switch switch-warning d-inline m-r-10">
                                <input type="checkbox" name="first_button"
                                    id="{{ $sw = uniqid('sw_') }}" value="1"
                                    {{ $component && $component->first_button == 1 ? 'checked' : '' }}>
                                <label for="{{ $sw }}" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Button Name') }}</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control inputFieldDesign" maxlength="30"
                                        value="{{ $component ? $component->btn_name1 : '' }}" name="btn_name1">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Link') }}</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control inputFieldDesign"
                                        value="{{ $component ? $component->btn_link1 : '' }}" name="btn_link1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Button Color (Light)') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_color_light1"
                                            value="{{ $component ? $component->btn_color_light1 : '' }}">
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
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_color_dark1"
                                            value="{{ $component ? $component->btn_color_dark1 : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_text_color_light1"
                                            value="{{ $component ? $component->btn_text_color_light1 : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_text_color_dark1"
                                            value="{{ $component ? $component->btn_text_color_dark1 : '' }}">
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
                    <div class="form-group row">
                        <label class="control-label text-left">
                            <dt>{{ __('Second Button') }}</dt>
                        </label>
                        <input type="hidden" name="second_button" value="0">
                        <div class="col-md-12">
                            <div class="switch switch-warning d-inline m-r-10">
                                <input type="checkbox" name="second_button"
                                    id="{{ $sw = uniqid('sw_') }}" value="1"
                                    {{ $component && $component->second_button == 1 ? 'checked' : '' }}>
                                <label for="{{ $sw }}" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Button Name') }}</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control inputFieldDesign" maxlength="30"
                                        value="{{ $component ? $component->btn_name2 : '' }}" name="btn_name2">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Link') }}</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control inputFieldDesign"
                                        value="{{ $component ? $component->btn_link2 : '' }}" name="btn_link2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Button Color (Light)') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_color_light2"
                                            value="{{ $component ? $component->btn_color_light2 : '' }}">
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
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_color_dark2"
                                            value="{{ $component ? $component->btn_color_dark2 : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_text_color_light2"
                                            value="{{ $component ? $component->btn_text_color_light2 : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_text_color_dark2"
                                            value="{{ $component ? $component->btn_text_color_dark2 : '' }}">
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