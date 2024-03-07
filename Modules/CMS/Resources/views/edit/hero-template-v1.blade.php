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

            <div class="form-group row">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('Background') }}</dt>
                </label>
                <div class="col-sm-8">
                    <div class="row">
                        <label class="col-md-12 control-label">{{ __('Type') }}</label>
                        <div class="col-sm-12">
                            <select type="text"class="form-control crequired select3" name="background_type"
                            id="background_type">
                                @foreach (\Modules\CMS\Service\Homepage::backgroundOptions() as $key => $value)
                                    <option {{ $component && $component->background_type == $key ? 'selected' : '' }}
                                        value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row background-image-cats {{ (empty($component->background_type) || $component->background_type == 'backgroundImage') ? '' : 'd-none' }}">
                        @php $rand = uniqid(); @endphp
                        <div class="col-md-6">
                            <div class="form-group row form-parent parent-class">
                                <label class="col-sm-12 control-label">{{ __('Image (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div class="custom-file media-manager" data-name="bg_image_light" data-val="single"
                                        id="image-status">
                                        <input class="custom-file-input form-control d-none inputFieldDesign" name="bg_image_light"
                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                    </div>
                                    <div class="preview-image">
                                        @if ($component && $component->bg_image_light)
                                            <div class="d-flex flex-wrap mt-2">
                                                <div
                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                    <div
                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <img class="upl-img" class="p-1"
                                                        src="{{ pathToUrl($component->bg_image_light) }}"
                                                        alt="{{ __('Image') }}">
                                                    <input type="hidden" name="bg_image_light"
                                                        value="{{ $component->bg_image_light }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row form-parent parent-class">
                                @php $rand = uniqid(); @endphp
                                <label class="col-sm-12 control-label">{{ __('Image (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div class="custom-file media-manager" data-name="bg_image_dark" data-val="single"
                                        id="image-status">
                                        <input class="custom-file-input form-control d-none inputFieldDesign" name="bg_image_dark"
                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                    </div>
                                    <div class="preview-image">
                                        @if ($component && $component->bg_image_dark)
                                            <div class="d-flex flex-wrap mt-2">
                                                <div
                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                    <div
                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <img class="upl-img" class="p-1"
                                                        src="{{ pathToUrl($component->bg_image_dark) }}"
                                                        alt="{{ __('Image') }}">
                                                    <input type="hidden" name="bg_image_dark"
                                                        value="{{ $component->bg_image_dark }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row background-image-cats {{ (empty($component->background_type) || $component->background_type == 'backgroundImage') ? '' : 'd-none' }}">
                        @php $rand = uniqid(); @endphp
                        <div class="col-md-6">
                            <div class="form-group row form-parent parent-class">
                                <label class="col-sm-12 control-label">{{ __('Mob Image (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div class="custom-file media-manager" data-name="bg_image_light_mob" data-val="single"
                                        id="image-status">
                                        <input class="custom-file-input form-control d-none inputFieldDesign" name="bg_image_light_mob"
                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                    </div>
                                    <div class="preview-image">
                                        @if ($component && $component->bg_image_light_mob)
                                            <div class="d-flex flex-wrap mt-2">
                                                <div
                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                    <div
                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <img class="upl-img" class="p-1"
                                                        src="{{ pathToUrl($component->bg_image_light_mob) }}"
                                                        alt="{{ __('Image') }}">
                                                    <input type="hidden" name="bg_image_light_mob"
                                                        value="{{ $component->bg_image_light_mob }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row form-parent parent-class">
                                @php $rand = uniqid(); @endphp
                                <label class="col-sm-12 control-label">{{ __('Mob Image (Dark Mode)') }}</label>
                                <div class="col-sm-12">
                                    <div class="custom-file media-manager" data-name="bg_image_dark_mob" data-val="single"
                                        id="image-status">
                                        <input class="custom-file-input form-control d-none inputFieldDesign" name="bg_image_dark_mob"
                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                    </div>
                                    <div class="preview-image">
                                        @if ($component && $component->bg_image_dark_mob)
                                            <div class="d-flex flex-wrap mt-2">
                                                <div
                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                    <div
                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <img class="upl-img" class="p-1"
                                                        src="{{ pathToUrl($component->bg_image_dark_mob) }}"
                                                        alt="{{ __('Image') }}">
                                                    <input type="hidden" name="bg_image_dark_mob"
                                                        value="{{ $component->bg_image_dark_mob }}">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row background-color-cats {{ $component && $component->background_type == 'backgroundColor' ? '' : 'd-none' }}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Background Color (Light Mode)') }}</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="bg_color_light"
                                        value="{{ $component ? $component->bg_color_light : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('Overline') }}</dt>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control inputFieldDesign crequired" maxlength="70" name="overline"
                       value="{{ $component ? $component->overline : '' }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('Heading') }}</dt>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control inputFieldDesign crequired" maxlength="70" name="heading"
                       value="{{ $component ? $component->heading : '' }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3">
                    <label class="control-label text-left">
                        <dt>{{ __('Sliders') }}</dt>
                    </label>
                </div>
                <div class="col-md-8">
                    <div class="accordion slider-accordion {{ $accordId = uniqid('accord_') }}" id="accordionExample">
                        @php
                            $sliders = $component && is_array($component->slider) ? $component->slider : [];
                            $totalSliders = count($sliders);
                        @endphp
                        @forelse ($sliders as $slider)

                            @php $slider = miniCollection($slider); @endphp

                            <div class="card cta-card mb-3">
                                <div class="card-header p-2" id="headingOne">
                                    <div class="mb-0 ac-switch collapsed d-flex closed justify-content-between align-items-center w-full curson-pointer"
                                        data-bs-toggle="collapse" data-bs-target="#{{ $ac = 'ac' . randomString() }}"
                                        aria-expanded="true" aria-controls="{{ $ac }}">
                                        <div>{{ __('Slider') }}</div>
                                        <span class="b-icon">
                                            <i class="feather icon-chevron-down collapse-status"></i>
                                            <span class="accordion-action-group">
                                                @if ($loop->last)
                                                    @if ($totalSliders > 1)
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
                                                    <input type="text" maxlength="25" class="form-control inputFieldDesign"
                                                        value="{!! $slider['title'] !!}" name="slider[{{ $loop->index }}][title]">
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
                                        <div>{{ __('Slider') }}</div>
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
                                <div id="{{ $ac }}" class="card-body collapse parent-class" aria-labelledby="headingOne" data-parent=".{{ $accordId }}">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-sm-12 control-label">{{ __('Title') }}</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control inputFieldDesign"
                                                        name="slider[0][title]">
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

            <div class="form-group row">
                <div class="col-sm-3">
                    <label class="control-label text-left">
                        <dt>{{ __('Body') }}</dt>
                    </label>
                </div>
                <div class="col-sm-8">
                    <textarea class="form-control crequired" maxlength="150" name="body" required> {{ $component ? trim($component->body) : '' }}</textarea>
                </div>
            </div>

            @include('cms::edit.sub.text-color')

            <hr>
            <div class="form-group row">
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label class="control-label text-left">
                            <dt>{{ __('Button') }}</dt>
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
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Button Name') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control inputFieldDesign"
                                                value="{{ $component ? $component->btn_name1 : '' }}" maxlength="40" name="btn_name1">
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
                                        <label class="col-sm-12 control-label">{{ __('Text Color (Light)') }}</label>
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
                                        <label class="col-sm-12 control-label">{{ __('Text Color (Dark)') }}</label>
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
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label class="control-label text-left">
                            <dt>{{ __('Basic Link') }}</dt>
                        </label>
                        <input type="hidden" name="basic_link" value="0">
                        <div class="col-md-12">
                            <div class="switch switch-warning d-inline m-r-10">
                                <input type="checkbox" name="basic_link"
                                    id="{{ $sw = uniqid('sw_') }}" value="1"
                                    {{ $component && $component->basic_link == 1 ? 'checked' : '' }}>
                                <label for="{{ $sw }}" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Name') }}</label>
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
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Text Color (Light)') }}</label>
                                        <div class="col-sm-12">
                                            <div>
                                                <input type="text"
                                                    class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="btn_text_color_light2"
                                                    value="{{ $component ? $component->btn_text_color_light2 : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="col-sm-12 control-label">{{ __('Text Color (Dark)') }}</label>
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
                </div>
            </div>

            <hr>
            <div class="form-group row">
                <div class="col-md-3">
                    <label class="control-label text-left">
                        <dt>{{ __('Image') }}</dt>
                    </label>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group row">
                                <label class="col-md-12 control-label text-left">{{ __('Floating Image') }}</label>
                                <input type="hidden" name="float_image" value="0">
                                <div class="col-md-12">
                                    <div class="switch switch-warning d-inline m-r-10">
                                        <input type="checkbox" name="float_image"
                                            id="{{ $sw = uniqid('sw_') }}" value="1"
                                            {{ $component && $component->float_image == 1 ? 'checked' : '' }}>
                                        <label for="{{ $sw }}" class="cr"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
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
                                                            <input type="hidden"
                                                                name="image"
                                                                id="validatedCustomFile"
                                                                value="{{ $component->image }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-12 control-label">{{ __('Image (Web)') }}</label>
                
                                        @php $rand = uniqid(); @endphp
                                        <div class="col-md-12">
                                            <div class="custom-file media-manager" data-name="image"
                                                data-val="single" id="image-status">
                                                <input class="custom-file-input form-control d-none" id="validatedCustomFile{{ $rand }}"
                                                    maxlength="50" accept="image/*">
                                                <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                                    for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="preview-image">
                                                @if ($component && $component->mob_image)
                                                    <div class="d-flex flex-wrap mt-2">
                                                        <div
                                                            class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                            <div
                                                                class="position-absolute rounded-circle text-center img-remove-icon">
                                                                <i class="fa fa-times"></i>
                                                            </div>
                                                            <img class="upl-img" class="p-1"
                                                                src="{{ pathToUrl($component->mob_image) }}"
                                                                alt="{{ __('Image') }}">
                                                            <input type="hidden"
                                                                name="mob_image"
                                                                id="validatedCustomFile"
                                                                value="{{ $component->mob_image }}">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-sm-12 control-label">{{ __('Image (Mob)') }}</label>
                
                                        @php $rand = uniqid(); @endphp
                                        <div class="col-md-12">
                                            <div class="custom-file media-manager" data-name="mob_image"
                                                data-val="single" id="image-status">
                                                <input class="custom-file-input form-control d-none" id="validatedCustomFile{{ $rand }}"
                                                    maxlength="50" accept="image/*">
                                                <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                                    for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="form-group row">
                <div class="col-md-3">
                    <label class="control-label text-left">
                        <dt>{{ __('Icon') }}</dt>
                    </label>
                </div>
                <div class="col-md-8">
                    <div class="form-group row">
                        <label class="col-md-12 control-label text-left">{{ __('Display Icon') }}</label>
                        <input type="hidden" name="display_icon" value="0">
                        <div class="col-md-12">
                            <div class="switch switch-warning d-inline m-r-10">
                                <input type="checkbox" name="display_icon"
                                    id="{{ $sw = uniqid('sw_') }}" value="1"
                                    {{ $component && $component->display_icon == 1 ? 'checked' : '' }}>
                                <label for="{{ $sw }}" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('cms::pieces.submit-btn')
        </form>
    </div>
</div>

<!-- form-picker-custom Js -->
<script src="{{ asset('public/datta-able/js/pages/form-picker-custom.min.js') }}"></script>
<script src="{{ asset('public/datta-able/plugins/mini-color/js/jquery.minicolors.min.js') }}"></script>
