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
                                    <div class="custom-file media-manager" data-name="mob_bg_image_light" data-val="single"
                                        id="image-status">
                                        <input class="custom-file-input form-control d-none inputFieldDesign" name="mob_bg_image_light"
                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                    </div>
                                    <div class="preview-image">
                                        @if ($component && $component->mob_bg_image_light)
                                            <div class="d-flex flex-wrap mt-2">
                                                <div
                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                    <div
                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <img class="upl-img" class="p-1"
                                                        src="{{ pathToUrl($component->mob_bg_image_light) }}"
                                                        alt="{{ __('Image') }}">
                                                    <input type="hidden" name="mob_bg_image_light"
                                                        value="{{ $component->mob_bg_image_light }}">
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
                                    <div class="custom-file media-manager" data-name="mob_bg_image_dark" data-val="single"
                                        id="image-status">
                                        <input class="custom-file-input form-control d-none inputFieldDesign" name="mob_bg_image_dark"
                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                    </div>
                                    <div class="preview-image">
                                        @if ($component && $component->mob_bg_image_dark)
                                            <div class="d-flex flex-wrap mt-2">
                                                <div
                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                    <div
                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                        <i class="fa fa-times"></i>
                                                    </div>
                                                    <img class="upl-img" class="p-1"
                                                        src="{{ pathToUrl($component->mob_bg_image_dark) }}"
                                                        alt="{{ __('Image') }}">
                                                    <input type="hidden" name="mob_bg_image_dark"
                                                        value="{{ $component->mob_bg_image_dark }}">
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
            <div class="form-group row">
                <div class="col-sm-3">
                    <label class="control-label text-left">
                        <dt>{{ __('Feature Highlights') }}</dt>
                    </label>
                </div>
                <div class="col-md-8">
                    <div class="accordion outline-accordion {{ $accordId = uniqid('accord_') }}" id="accordionExample">
                        @php
                            $outlines = $component && is_array($component->outline) ? $component->outline : [];
                            $totalOutlines = count($outlines);
                        @endphp
                        @forelse ($outlines as $outline)

                            @php $outline = miniCollection($outline); @endphp

                            <div class="card cta-card mb-3">
                                <div class="card-header p-2" id="headingOne">
                                    <div class="mb-0 ac-switch collapsed d-flex closed justify-content-between align-items-center w-full curson-pointer"
                                        data-bs-toggle="collapse" data-bs-target="#{{ $ac = 'ac' . randomString() }}"
                                        aria-expanded="true" aria-controls="{{ $ac }}">
                                        <div>{{ __('Hightlight') }}</div>
                                        <span class="b-icon">
                                            <i class="feather icon-chevron-down collapse-status"></i>
                                            <span class="accordion-action-group">
                                                @if ($loop->last)
                                                    @if ($totalOutlines > 1)
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
                                        <label class="col-sm-12 control-label">{{ __('Title') }}</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control inputFieldDesign"
                                                value="{!! $outline['title'] !!}" name="outline[{{ $loop->index }}][title]">

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
                                        <div>{{ __('Hightlight') }}</div>
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
                                                <label class="col-sm-12 control-label">{{ __('Title') }}</label>
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control inputFieldDesign"
                                                        name="outline[0][title]">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <hr>
            {{-- Feature Sliders --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label class="control-label text-left">
                            <dt>{{ __('Feature Sliders') }}</dt>
                        </label>
                        <input type="hidden" name="feature_slider_block" value="0">
                        <div class="col-md-12">
                            <div class="switch switch-warning d-inline m-r-10">
                                <input type="checkbox" name="feature_slider_block"
                                    id="{{ $sw = uniqid('sw_') }}" value="1"
                                    {{ $component && $component->feature_slider_block == 1 ? 'checked' : '' }}>
                                <label for="{{ $sw }}" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="accordion feature-slider-accordion {{ $accordId = uniqid('accord_') }}" id="accordionExample">
                        @php
                            $feature_sliders = $component && is_array($component->feature_slider) ? $component->feature_slider : [];
                            $totalFeatureSliders = count($feature_sliders);
                        @endphp
                        @forelse ($feature_sliders as $slider)

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
                                                    @if ($totalFeatureSliders > 1)
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
                                        <label class="col-sm-12 control-label">{{ __('Image') }}</label>
                                        @php $rand = uniqid(); @endphp
                                        <div class="col-md-12">
                                            <div class="custom-file media-manager"
                                                data-name="feature_slider[{{ $loop->index }}][image]"
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
                                                @if ($slider['image'])
                                                    <div class="d-flex flex-wrap mt-2">
                                                        <div
                                                            class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                            <div
                                                                class="position-absolute rounded-circle text-center img-remove-icon">
                                                                <i class="fa fa-times"></i>
                                                            </div>
                                                            <img class="upl-img" class="p-1"
                                                                src="{{ pathToUrl($slider['image']) }}"
                                                                alt="{{ __('Image') }}">
                                                            <input type="hidden"
                                                                name="feature_slider[{{ $loop->index }}][image]"
                                                                id="validatedCustomFile"
                                                                value="{{ $slider['image'] }}">
                                                        </div>
                                                    </div>
                                                @endif
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
                                        <label class="col-sm-12 control-label">{{ __('Image') }}</label>
                                        @php $rand = uniqid(); @endphp
                                        <div class="col-md-12">
                                            <div class="custom-file media-manager"
                                                data-name="feature_slider[0][image]" data-val="single"
                                                id="image-status">
                                                <input class="custom-file-input form-control d-none"
                                                    id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                                <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                                    for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                            </div>
                                            <div class="preview-image"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <hr>
            {{-- Default Sliders --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label class="control-label text-left">
                            <dt>{{ __('Default Sliders') }}</dt>
                        </label>
                        <input type="hidden" name="default_slider_block" value="0">
                        <div class="col-md-12">
                            <div class="switch switch-warning d-inline m-r-10">
                                <input type="checkbox" name="default_slider_block"
                                    id="{{ $sw = uniqid('sw_') }}" value="1"
                                    {{ $component && $component->default_slider_block == 1 ? 'checked' : '' }}>
                                <label for="{{ $sw }}" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="accordion feature-default-accordion {{ $accordId = uniqid('accord_') }}" id="accordionExample">
                        @php
                            $default_sliders = $component && is_array($component->default_slider) ? $component->default_slider : [];
                            $totalDefaultSliders = count($default_sliders);
                        @endphp
                        @forelse ($default_sliders as $defaultSlider)

                            @php $defaultSlider = miniCollection($defaultSlider); @endphp

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
                                                    @if ($totalFeatureSliders > 1)
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
                                        <label class="col-sm-12 control-label">{{ __('Image') }}</label>
                                        @php $rand = uniqid(); @endphp
                                        <div class="col-md-12">
                                            <div class="custom-file media-manager"
                                                data-name="default_slider[{{ $loop->index }}][image]"
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
                                                @if ($defaultSlider['image'])
                                                    <div class="d-flex flex-wrap mt-2">
                                                        <div
                                                            class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                            <div
                                                                class="position-absolute rounded-circle text-center img-remove-icon">
                                                                <i class="fa fa-times"></i>
                                                            </div>
                                                            <img class="upl-img" class="p-1"
                                                                src="{{ pathToUrl($defaultSlider['image']) }}"
                                                                alt="{{ __('Image') }}">
                                                            <input type="hidden"
                                                                name="default_slider[{{ $loop->index }}][image]"
                                                                id="validatedCustomFile"
                                                                value="{{ $defaultSlider['image'] }}">
                                                        </div>
                                                    </div>
                                                @endif
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
                                        <label class="col-sm-12 control-label">{{ __('Image') }}</label>
                                        @php $rand = uniqid(); @endphp
                                        <div class="col-md-12">
                                            <div class="custom-file media-manager"
                                                data-name="default_slider[0][image]" data-val="single"
                                                id="image-status">
                                                <input class="custom-file-input form-control d-none"
                                                    id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                                <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                                    for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                            </div>
                                            <div class="preview-image"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
           
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
                                    <input type="text" class="form-control inputFieldDesign" maxlength="40"
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
                                    <input type="text" class="form-control inputFieldDesign" maxlength="40"
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
                                            value="{{ $component && $component->border_width2 ? $component->border_width2 : '' }}"
                                            placeholder="1" class="form-control inputFieldDesign">
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