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
                    <input type="text" class="form-control section_name inputFieldDesign crequired" maxlength="70" name="overline" id="overline"
                       value="{{ $component ? $component->overline : '' }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('Heading') }}</dt>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control inputFieldDesign crequired" name="heading" id="heading"
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
                    <textarea class="form-control crequired" name="body" id="body" required> {{ $component ? trim($component->body) : '' }}</textarea>
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
                            <div class="row">
                                <label class="col-md-12">{{ __('Border Style') }}</label>
                                <div class="col-md-12">
                                    <input type="text" name="border_style"
                                        value="{{ $component && $component->border_style ? $component->border_style : '' }}" placeholder="Solid"
                                        class="form-control inputFieldDesign">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="row">
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
                            <input type="text" class="form-control inputFieldDesign crequired" name="block1_heading" id="heading"
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
                        <div class="col-md-12">
                            @php $rand = uniqid(); @endphp
                            <div class="form-group row form-parent parent-class">
                                <label class="col-sm-12 control-label">{{ __('Image') }}</label>
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
                            <div class="row">
                                <label class="col-md-12">{{ __('Border Style') }}</label>
                                <div class="col-md-12">
                                    <input type="text" name="border_style2"
                                        value="{{ $component && $component->border_style2 ? $component->border_style2 : '' }}" placeholder="Solid"
                                        class="form-control inputFieldDesign">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="row">
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
                            <div class="row">
                                <label class="col-md-12">{{ __('Border Style') }}</label>
                                <div class="col-md-12">
                                    <input type="text" name="border_style3"
                                        value="{{ $component && $component->border_style3 ? $component->border_style3 : '' }}" placeholder="Solid"
                                        class="form-control inputFieldDesign">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="row">
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
                            @php $rand = uniqid(); @endphp
                            <div class="form-group row form-parent parent-class">
                                <label class="col-sm-12 control-label">{{ __('Image') }}</label>
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
                    <div class="row">
                        <label class="col-sm-12 control-label">{{ __('Heading') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputFieldDesign crequired" name="block3_heading"
                               value="{{ $component ? $component->block3_heading : '' }}">
                        </div>
                    </div>    
                    <div class="row">
                        <label class="col-sm-12 control-label">{{ __('First Body') }}</label>
                        <div class="col-sm-12">
                            <textarea class="form-control crequired" name="block3_body" required> {{ $component ? trim($component->block3_body) : '' }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-12 control-label">{{ __('Second Body') }}</label>
                        <div class="col-sm-12">
                            <textarea class="form-control crequired" name="block3_second_body" required> {{ $component ? trim($component->block3_second_body) : '' }}</textarea>
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
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Text Color (Light Mode)') }}</label>
                                        <div class="col-sm-12">
                                            <div>
                                                <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_text_color_light"
                                                    value="{{ $component ? $component->btn_text_color_light : '' }}">
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
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_text_color_dark"
                                                    value="{{ $component ? $component->btn_text_color_dark : '' }}">
                                            </div>
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