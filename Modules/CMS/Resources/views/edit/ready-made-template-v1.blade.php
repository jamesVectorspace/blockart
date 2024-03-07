@php
    $component = isset($component) ? $component : null;
@endphp

<link rel="stylesheet" href="{{ asset('public/datta-able/plugins/mini-color/css/jquery.minicolors.min.css') }}">

<div class="card dd-content {{ $editorClosed ?? 'card-hide' }}">
    <div class="card-body">
        <form action="{{ route('builder.update', ['id' => '__id']) }}" novalidate data-type="component" method="post"
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
                <div class="col-sm-3">
                    <label class="control-label text-left">
                        <dt>{{ __('Body') }}</dt>
                    </label>
                </div>
                <div class="col-sm-8">
                    <textarea class="form-control crequired" name="body" required> {{ $component ? trim($component->body) : '' }}</textarea>
                </div>
            </div>

            @include('cms::edit.sub.text-color')

            <hr>
            {{-- First Block --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label class="control-label text-left">
                            <dt>{{ __('First Block') }}</dt>
                        </label>
                        <input type="hidden" name="first_block" value="0">
                        <div class="col-md-12">
                            <div class="switch switch-warning d-inline m-r-10">
                                <input type="checkbox" name="first_block"
                                    id="{{ $sw = uniqid('sw_') }}" value="1"
                                    {{ $component && $component->first_block == 1 ? 'checked' : '' }}>
                                <label for="{{ $sw }}" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Background Color (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="bg_color_light"
                                        value="{{ $component ? $component->bg_color_light : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Background Color (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="bg_color_dark"
                                        value="{{ $component ? $component->bg_color_dark : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="first_block_text_color_light"
                                        value="{{ $component ? $component->first_block_text_color_light : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="first_block_text_color_dark"
                                        value="{{ $component ? $component->first_block_text_color_dark : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="row">
                                <label class="col-md-12">{{ __('Border Width') }}</label>
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded-0 rounded-start h-40" id="basic-addon1">PX</span>
                                        </div>
                                        <input type="number" name="border_width"
                                            value="{{ $component && $component->border_width ? $component->border_width : '' }}" placeholder="1"
                                            class="form-control inputFieldDesign">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group row">
                                <label class="col-md-12">{{ __('Border Style') }}</label>
                                <div class="col-md-12">
                                    <input type="text" name="border_style"
                                        value="{{ $component && $component->border_style ? $component->border_style : '' }}" placeholder="Solid"
                                        class="form-control inputFieldDesign">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group row">
                                <label class="col-md-12">{{ __('Border Color') }}</label>
                                <div class="col-md-12">
                                    <input type="text" name="border_color" data-control="hue"
                                        value="{{ $component && $component->border_color ? $component->border_color : '' }}"
                                        class="form-control demo layout-primary-color inputFieldDesign">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-12 control-label">{{ __('Heading') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputFieldDesign crequired" name="block1_heading"
                               value="{{ $component ? $component->block1_heading : '' }}">
                        </div>
                    </div>    
                    <div class="row">
                        <label class="col-sm-12 control-label">{{ __('First Body') }}</label>
                        <div class="col-sm-12">
                            <textarea class="form-control crequired" name="block1_body" required> {{ $component ? trim($component->block1_body) : '' }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-12 control-label">{{ __('Second Body') }}</label>
                        <div class="col-sm-12">
                            <textarea class="form-control crequired" name="block1_second_body" required> {{ $component ? trim($component->block1_second_body) : '' }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            @php $rand = uniqid(); @endphp
                            <div class="form-group row form-parent parent-class">
                                <label class="col-sm-12 control-label">{{ __('Image (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div class="custom-file media-manager" data-name="image_light_mode" data-val="single"
                                        id="image-status">
                                        <input class="custom-file-input form-control d-none inputFieldDesign" name="image_light_mode"
                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                    </div>
                                    <div class="preview-image">
                                        @if ($component && $component->image_light_mode)
                                            <div class="d-flex flex-wrap mt-2">
                                                <div
                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                    <div
                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <img class="upl-img" class="p-1"
                                                        src="{{ pathToUrl($component->image_light_mode) }}"
                                                        alt="{{ __('Image') }}">
                                                    <input type="hidden" name="image_light_mode"
                                                        value="{{ $component->image_light_mode }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @php $rand = uniqid(); @endphp
                            <div class="form-group row form-parent parent-class">
                                <label class="col-sm-12 control-label">{{ __('Image (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div class="custom-file media-manager" data-name="image_dark_mode" data-val="single"
                                        id="image-status">
                                        <input class="custom-file-input form-control d-none inputFieldDesign" name="image_dark_mode"
                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                    </div>
                                    <div class="preview-image">
                                        @if ($component && $component->image_dark_mode)
                                            <div class="d-flex flex-wrap mt-2">
                                                <div
                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                    <div
                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <img class="upl-img" class="p-1"
                                                        src="{{ pathToUrl($component->image_dark_mode) }}"
                                                        alt="{{ __('Image') }}">
                                                    <input type="hidden" name="image_dark_mode"
                                                        value="{{ $component->image_dark_mode }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            @php $rand = uniqid(); @endphp
                            <div class="form-group row form-parent parent-class">
                                <label class="col-sm-12 control-label">{{ __('Floating Image (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div class="custom-file media-manager" data-name="floating_image_light_mode" data-val="single"
                                        id="image-status">
                                        <input class="custom-file-input form-control d-none inputFieldDesign" name="floating_image_light_mode"
                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                    </div>
                                    <div class="preview-image">
                                        @if ($component && $component->floating_image_light_mode)
                                            <div class="d-flex flex-wrap mt-2">
                                                <div
                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                    <div
                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <img class="upl-img" class="p-1"
                                                        src="{{ pathToUrl($component->floating_image_light_mode) }}"
                                                        alt="{{ __('Image') }}">
                                                    <input type="hidden" name="floating_image_light_mode"
                                                        value="{{ $component->floating_image_light_mode }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            @php $rand = uniqid(); @endphp
                            <div class="form-group row form-parent parent-class">
                                <label class="col-sm-12 control-label">{{ __('Floating Image (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div class="custom-file media-manager" data-name="floating_image_dark_mode" data-val="single"
                                        id="image-status">
                                        <input class="custom-file-input form-control d-none inputFieldDesign" name="floating_image_dark_mode"
                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                    </div>
                                    <div class="preview-image">
                                        @if ($component && $component->floating_image_dark_mode)
                                            <div class="d-flex flex-wrap mt-2">
                                                <div
                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                    <div
                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <img class="upl-img" class="p-1"
                                                        src="{{ pathToUrl($component->floating_image_dark_mode) }}"
                                                        alt="{{ __('Image') }}">
                                                    <input type="hidden" name="floating_image_dark_mode"
                                                        value="{{ $component->floating_image_dark_mode }}">
                                                </div>
                                            </div>
                                        @endif
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
                                        <label class="col-sm-12 control-label">{{ __('Button Name') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control inputFieldDesign" maxlength="40"
                                                value="{{ $component ? $component->block1_btn_name : '' }}" name="block1_btn_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Link') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control inputFieldDesign"
                                                value="{{ $component ? $component->block1_btn_link : '' }}" name="block1_btn_link">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Text Color (Light Mode)') }}</label>
                                        <div class="col-sm-12">
                                            <div>
                                                <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="block1_btn_text_color_light"
                                                    value="{{ $component ? $component->block1_btn_text_color_light : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Text Color (Dark Mode)') }}</label>
                                        <div class="col-sm-12">
                                            <div>
                                                <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="block1_btn_text_color_dark"
                                                    value="{{ $component ? $component->block1_btn_text_color_dark : '' }}">
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
            {{-- Second Block --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label class="control-label text-left">
                            <dt>{{ __('Second Block') }}</dt>
                        </label>
                        <input type="hidden" name="second_block" value="0">
                        <div class="col-md-12">
                            <div class="switch switch-warning d-inline m-r-10">
                                <input type="checkbox" name="second_block"
                                    id="{{ $sw = uniqid('sw_') }}" value="1"
                                    {{ $component && $component->second_block == 1 ? 'checked' : '' }}>
                                <label for="{{ $sw }}" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Background Color (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="bg_color_light2"
                                        value="{{ $component ? $component->bg_color_light2 : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Background Color (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="bg_color_dark2"
                                        value="{{ $component ? $component->bg_color_dark2 : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="second_block_text_color_light"
                                        value="{{ $component ? $component->second_block_text_color_light : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="second_block_text_color_dark"
                                        value="{{ $component ? $component->second_block_text_color_dark : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="row">
                                <label class="col-md-12">{{ __('Border Width') }}</label>
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded-0 rounded-start h-40" id="basic-addon1">PX</span>
                                        </div>
                                        <input type="number" name="border_width2"
                                            value="{{ $component && $component->border_width2 ? $component->border_width2 : '' }}" placeholder="1"
                                            class="form-control inputFieldDesign">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group row">
                                <label class="col-md-12">{{ __('Border Style') }}</label>
                                <div class="col-md-12">
                                    <input type="text" name="border_style2"
                                        value="{{ $component && $component->border_style2 ? $component->border_style2 : '' }}" placeholder="Solid"
                                        class="form-control inputFieldDesign">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group row">
                                <label class="col-md-12">{{ __('Border Color') }}</label>
                                <div class="col-md-12">
                                    <input type="text" name="border_color2" data-control="hue"
                                        value="{{ $component && $component->border_color2 ? $component->border_color2 : '' }}"
                                        class="form-control demo layout-primary-color inputFieldDesign">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-12 control-label">{{ __('Heading') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputFieldDesign crequired" name="block2_heading"
                               value="{{ $component ? $component->block2_heading : '' }}">
                        </div>
                    </div>    
                    <div class="row">
                        <label class="col-sm-12 control-label">{{ __('Body') }}</label>
                        <div class="col-sm-12">
                            <textarea class="form-control crequired" name="block2_body" required> {{ $component ? trim($component->block2_body) : '' }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @php $rand = uniqid(); @endphp
                            <div class="form-group row form-parent parent-class">
                                <label class="col-sm-12 control-label">{{ __('Image (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div class="custom-file media-manager" data-name="image_light_mode2" data-val="single"
                                        id="image-status">
                                        <input class="custom-file-input form-control d-none inputFieldDesign" name="image_light_mode2"
                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                    </div>
                                    <div class="preview-image">
                                        @if ($component && $component->image_light_mode2)
                                            <div class="d-flex flex-wrap mt-2">
                                                <div
                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                    <div
                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <img class="upl-img" class="p-1"
                                                        src="{{ pathToUrl($component->image_light_mode2) }}"
                                                        alt="{{ __('Image') }}">
                                                    <input type="hidden" name="image_light_mode2"
                                                        value="{{ $component->image_light_mode2 }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            {{-- Third Block --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label class="control-label text-left">
                            <dt>{{ __('Third Block') }}</dt>
                        </label>
                        <input type="hidden" name="third_block" value="0">
                        <div class="col-md-12">
                            <div class="switch switch-warning d-inline m-r-10">
                                <input type="checkbox" name="third_block"
                                    id="{{ $sw = uniqid('sw_') }}" value="1"
                                    {{ $component && $component->third_block == 1 ? 'checked' : '' }}>
                                <label for="{{ $sw }}" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Background Color (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="bg_color_light3"
                                        value="{{ $component ? $component->bg_color_light3 : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Background Color (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="bg_color_dark3"
                                        value="{{ $component ? $component->bg_color_dark3 : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="third_block_text_color_light"
                                        value="{{ $component ? $component->third_block_text_color_light : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="third_block_text_color_dark"
                                        value="{{ $component ? $component->third_block_text_color_dark : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="row">
                                <label class="col-md-12">{{ __('Border Width') }}</label>
                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text rounded-0 rounded-start h-40" id="basic-addon1">PX</span>
                                        </div>
                                        <input type="number" name="border_width3"
                                            value="{{ $component && $component->border_width3 ? $component->border_width3 : '' }}" placeholder="1"
                                            class="form-control inputFieldDesign">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group row">
                                <label class="col-md-12">{{ __('Border Style') }}</label>
                                <div class="col-md-12">
                                    <input type="text" name="border_style3"
                                        value="{{ $component && $component->border_style3 ? $component->border_style3 : '' }}" placeholder="Solid"
                                        class="form-control inputFieldDesign">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group row">
                                <label class="col-md-12">{{ __('Border Color') }}</label>
                                <div class="col-md-12">
                                    <input type="text" name="border_color3" data-control="hue"
                                        value="{{ $component && $component->border_color3 ? $component->border_color3 : '' }}"
                                        class="form-control demo layout-primary-color inputFieldDesign">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="accordion step-accordion {{ $accordId = uniqid('accord_') }}" id="accordionExample">
                                @php
                                    $steps = $component && is_array($component->step) ? $component->step : [];
                                    $totalSteps = count($steps);
                                @endphp
                                @forelse ($steps as $step)
        
                                    @php $step = miniCollection($step); @endphp
        
                                    <div class="card cta-card mb-3">
                                        <div class="card-header p-2" id="headingOne">
                                            <div class="mb-0 ac-switch collapsed d-flex closed justify-content-between align-items-center w-full curson-pointer"
                                                data-bs-toggle="collapse" data-bs-target="#{{ $ac = 'ac' . randomString() }}"
                                                aria-expanded="true" aria-controls="{{ $ac }}">
                                                <div>{{ __('Step') }}</div>
                                                <span class="b-icon">
                                                    <i class="feather icon-chevron-down collapse-status"></i>
                                                    <span class="accordion-action-group">
                                                        @if ($loop->last)
                                                            @if ($totalSteps > 1)
                                                                <span class="accordion-row-action remove-row-btn"
                                                                    data-parent="{{ $accordId }}"
                                                                    data-index="{{ $loop->index + 1 }}"><i
                                                                        class="feather icon-minus"></i></span>
                                                            @endif
                                                            <span class="accordion-row-action add-row-btn"
                                                                data-parent="{{ $accordId }}"
                                                                data-index="{{ $loop->index + 1 }}"><i
                                                                    class="feather icon-plus"></i></span>
                                                        @else
                                                            <span class="accordion-row-action remove-row-btn"
                                                                data-index="{{ $loop->index + 1 }}"
                                                                data-parent="{{ $accordId }}"><i
                                                                    class="feather icon-minus"></i></span>
                                                        @endif
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="{{ $ac }}" class="card-body collapse parent-class"
                                            aria-labelledby="headingOne" data-parent=".{{ $accordId }}">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 control-label">{{ __('Title') }}</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control inputFieldDesign"
                                                                value="{!! $step['title'] !!}" name="step[{{ $loop->index }}][title]">
        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 control-label">{{ __('Description') }}</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control inputFieldDesign"
                                                                value="{!! $step['description'] !!}" name="step[{{ $loop->index }}][description]">
        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="card cta-card mb-3">
                                        <div class="card-header p-2" id="headingOne">
                                            <div class="mb-0 ac-switch collapsed d-flex closed justify-content-between align-items-center w-full curson-pointer"
                                                data-bs-toggle="collapse" data-bs-target="#{{ $ac = 'ac' . randomString() }}"
                                                aria-expanded="true" aria-controls="{{ $ac }}">
                                                <div>{{ __('Step') }}</div>
                                                <span class="b-icon">
                                                    <i class="feather icon-chevron-down collapse-status"></i>
                                                    <span class="accordion-action-group">
                                                        <span class="accordion-row-action add-row-btn"
                                                            data-parent="{{ $accordId }}" data-index="1"><i
                                                                class="feather icon-plus"></i></span>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="{{ $ac }}" class="card-body collapse parent-class"
                                            aria-labelledby="headingOne" data-parent=".{{ $accordId }}">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-12 control-label">{{ __('Title') }}</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control inputFieldDesign"
                                                                        name="step[0][title]">
                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-12 control-label">{{ __('Description') }}</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control inputFieldDesign"
                                                                        name="step[0][description]">
                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @php $rand = uniqid(); @endphp
                            <div class="form-group row form-parent parent-class">
                                <label class="col-sm-12 control-label">{{ __('Image (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div class="custom-file media-manager" data-name="image_light_mode3" data-val="single"
                                        id="image-status">
                                        <input class="custom-file-input form-control d-none inputFieldDesign" name="image_light_mode3"
                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                    </div>
                                    <div class="preview-image">
                                        @if ($component && $component->image_light_mode3)
                                            <div class="d-flex flex-wrap mt-2">
                                                <div
                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                    <div
                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <img class="upl-img" class="p-1"
                                                        src="{{ pathToUrl($component->image_light_mode3) }}"
                                                        alt="{{ __('Image') }}">
                                                    <input type="hidden" name="image_light_mode3"
                                                        value="{{ $component->image_light_mode3 }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <hr>
            {{-- Forth Block --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label class="control-label text-left">
                            <dt>{{ __('Forth Block') }}</dt>
                        </label>
                        <input type="hidden" name="forth_block" value="0">
                        <div class="col-md-12">
                            <div class="switch switch-warning d-inline m-r-10">
                                <input type="checkbox" name="forth_block"
                                    id="{{ $sw = uniqid('sw_') }}" value="1"
                                    {{ $component && $component->forth_block == 1 ? 'checked' : '' }}>
                                <label for="{{ $sw }}" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="accordion content-accordion {{ $accordId = uniqid('accord_') }}" id="accordionExample">
                                @php
                                    $contents = $component && is_array($component->content) ? $component->content : [];
                                    $totalContents = count($contents);
                                @endphp
                                @forelse ($contents as $content)
        
                                    @php $content = miniCollection($content); @endphp
        
                                    <div class="card cta-card mb-3">
                                        <div class="card-header p-2" id="headingOne">
                                            <div class="mb-0 ac-switch collapsed d-flex closed justify-content-between align-items-center w-full curson-pointer"
                                                data-bs-toggle="collapse" data-bs-target="#{{ $ac = 'ac' . randomString() }}"
                                                aria-expanded="true" aria-controls="{{ $ac }}">
                                                <div>{{ __('Content') }}</div>
                                                <span class="b-icon">
                                                    <i class="feather icon-chevron-down collapse-status"></i>
                                                    <span class="accordion-action-group">
                                                        @if ($loop->last)
                                                            @if ($totalContents > 1)
                                                                <span class="accordion-row-action remove-row-btn"
                                                                    data-parent="{{ $accordId }}"
                                                                    data-index="{{ $loop->index + 1 }}"><i
                                                                        class="feather icon-minus"></i></span>
                                                            @endif
                                                            <span class="accordion-row-action add-row-btn"
                                                                data-parent="{{ $accordId }}"
                                                                data-index="{{ $loop->index + 1 }}"><i
                                                                    class="feather icon-plus"></i></span>
                                                        @else
                                                            <span class="accordion-row-action remove-row-btn"
                                                                data-index="{{ $loop->index + 1 }}"
                                                                data-parent="{{ $accordId }}"><i
                                                                    class="feather icon-minus"></i></span>
                                                        @endif
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div id="{{ $ac }}" class="card-body collapse parent-class"
                                            aria-labelledby="headingOne" data-parent=".{{ $accordId }}">
                                            <div class="form-group row">
                                                <label class="col-sm-12 control-label">{{ __('Icon') }}</label>
                                                @php $rand = uniqid(); @endphp
                                                <div class="col-md-12">
                                                    <div class="custom-file media-manager"
                                                        data-name="content[{{ $loop->index }}][icon_light]"
                                                        data-val="single" id="image-status">
                                                        <input class="custom-file-input form-control d-none"
                                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                                    </div>

                                                    <div class="d-flex mt-2">
                                                        <span class="badge badge-danger h-100 mt-1">{{ __('Note') }}!</span>
                                                        <small
                                                            class="mt-1 ltr:ms-2 rtl:me-2 ps-1">{{ __('For better resolution and superior quality, it is recommended to use SVG format.') }}</small>
                                                    </div>
                                                    
                                                    <div class="preview-image">
                                                        @if ($content['icon_light'])
                                                            <div class="d-flex flex-wrap mt-2">
                                                                <div
                                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                                    <div
                                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                                        <i class="fa fa-times"></i>
                                                                    </div>
                                                                    <img class="upl-img" class="p-1"
                                                                        src="{{ pathToUrl($content['icon_light']) }}"
                                                                        alt="{{ __('Image') }}">
                                                                    <input type="hidden"
                                                                        name="content[{{ $loop->index }}][icon_light]"
                                                                        id="validatedCustomFile"
                                                                        value="{{ $content['icon_light'] }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 control-label">{{ __('Title') }}</label>
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control inputFieldDesign"
                                                                value="{!! $content['title'] !!}" name="content[{{ $loop->index }}][title]">
        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="card cta-card mb-3">
                                        <div class="card-header p-2" id="headingOne">
                                            <div class="mb-0 ac-switch collapsed d-flex closed justify-content-between align-items-center w-full curson-pointer"
                                                data-bs-toggle="collapse" data-bs-target="#{{ $ac = 'ac' . randomString() }}"
                                                aria-expanded="true" aria-controls="{{ $ac }}">
                                                <div>{{ __('Content') }}</div>
                                                <span class="b-icon">
                                                    <i class="feather icon-chevron-down collapse-status"></i>
                                                    <span class="accordion-action-group">
                                                        <span class="accordion-row-action add-row-btn"
                                                            data-parent="{{ $accordId }}" data-index="1"><i
                                                                class="feather icon-plus"></i></span>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div id="{{ $ac }}" class="card-body collapse parent-class"
                                            aria-labelledby="headingOne" data-parent=".{{ $accordId }}">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 control-label">{{ __('Icon') }}</label>
        
                                                        @php $rand = uniqid(); @endphp
                                                        <div class="col-md-12">
                                                            <div class="custom-file media-manager"
                                                                data-name="content[0][icon_light]" data-val="single"
                                                                id="image-status">
                                                                <input class="custom-file-input form-control d-none"
                                                                    id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                                                <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                                                    for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                                            </div>
                                                            <div class="preview-image"></div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <div class="form-group row">
                                                                <label class="col-sm-12 control-label">{{ __('Title') }}</label>
                                                                <div class="col-sm-12">
                                                                    <input type="text" class="form-control inputFieldDesign"
                                                                        name="content[0][title]">
                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-12 control-label">{{ __('Heading') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputFieldDesign crequired" name="block4_heading"
                               value="{{ $component ? $component->block4_heading : '' }}">
                        </div>
                    </div>    
                    <div class="row">
                        <label class="col-sm-12 control-label">{{ __('Body') }}</label>
                        <div class="col-sm-12">
                            <textarea class="form-control crequired" name="block4_body" required> {{ $component ? trim($component->block4_body) : '' }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="forth_block_text_color_light"
                                        value="{{ $component ? $component->forth_block_text_color_light : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Text Color (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="forth_block_text_color_dark"
                                        value="{{ $component ? $component->forth_block_text_color_dark : '' }}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Name') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control inputFieldDesign" maxlength="40"
                                                value="{{ $component ? $component->btn_name : '' }}" name="btn_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Link') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control inputFieldDesign"
                                                value="{{ $component ? $component->btn_link : '' }}" name="btn_link">
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
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_color_light"
                                                    value="{{ $component ? $component->btn_color_light : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Color (dark)') }}</label>
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
                                        <label class="col-sm-12 control-label">{{ __('Text Color (Light Mode)') }}</label>
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
                                        <label class="col-sm-12 control-label">{{ __('Text Color (Dark Mode)') }}</label>
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
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <div class="row">
                                        <label class="col-md-12">{{ __('Border Width') }}</label>
                                        <div class="col-md-12">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text rounded-0 rounded-start h-40" id="basic-addon1">PX</span>
                                                </div>
                                                <input type="number" name="border_width4"
                                                    value="{{ $component && $component->border_width4 ? $component->border_width4 : '' }}" placeholder="1"
                                                    class="form-control inputFieldDesign">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="row">
                                        <label class="col-md-12">{{ __('Border Style') }}</label>
                                        <div class="col-md-12">
                                            <input type="text" name="border_style4"
                                                value="{{ $component && $component->border_style4 ? $component->border_style4 : '' }}" placeholder="Solid"
                                                class="form-control inputFieldDesign">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <div class="row">
                                        <label class="col-md-12">{{ __('Border Color') }}</label>
                                        <div class="col-md-12">
                                            <input type="text" name="border_color4" data-control="hue"
                                                value="{{ $component && $component->border_color4 ? $component->border_color4 : '' }}"
                                                class="form-control demo layout-primary-color inputFieldDesign">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            @include('cms::edit.sub.appearance', ['fields' => ['padding-vertical']])
            @include('cms::pieces.submit-btn')
        </form>
    </div>
</div>


<!-- form-picker-custom Js -->
<script src="{{ asset('public/datta-able/js/pages/form-picker-custom.min.js') }}"></script>
<script src="{{ asset('public/datta-able/plugins/mini-color/js/jquery.minicolors.min.js') }}"></script>