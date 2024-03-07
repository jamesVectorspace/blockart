@php
    $component = isset($component) ? $component : null;
@endphp

<link rel="stylesheet" href="{{ asset('public/datta-able/plugins/mini-color/css/jquery.minicolors.min.css') }}">

<div class="card dd-content {{ $editorClosed ?? 'card-hide' }}">
    <div class="card-body">
        <form action="{{ route('builder.update', ['id' => '__id']) }}" data-type="component" method="post"
            class="component_form form-parent silent-form" novalidate>
            @csrf
            @include('cms::hidden_fields')

            @include('cms::edit.sub.background')

            <div class="form-group row">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('Heading') }}</dt>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control section_name inputFieldDesign" name="heading" value="{{ $component ? $component->heading : '' }}">
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

            <div class="form-group row">
                <label class="col-md-3 control-label">{{ __('Brands') }}</label>
                <div class="col-md-8">
                    <div class="accordion brand-accordion {{ $accordId = uniqid('accord_') }}" id="accordionExample">
                        @php
                            $brands = $component && is_array($component->brand) ? $component->brand : [];
                            $totalBrands = count($brands);
                        @endphp
                        @forelse ($brands as $brand)

                            @php $brand = miniCollection($brand); @endphp

                            <div class="card cta-card mb-3">
                                <div class="card-header p-2" id="headingOne">
                                    <div class="mb-0 ac-switch collapsed d-flex closed justify-content-between align-items-center w-full curson-pointer"
                                        data-bs-toggle="collapse" data-bs-target="#{{ $ac = 'ac' . randomString() }}"
                                        aria-expanded="true" aria-controls="{{ $ac }}">
                                        <div>{{ __('Brand\'s Logo') }}</div>
                                        <span class="b-icon">
                                            <i class="feather icon-chevron-down collapse-status"></i>
                                            <span class="accordion-action-group">
                                                @if ($loop->last)
                                                    @if ($totalBrands > 1)
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
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12 control-label">{{ __('Light Mode') }}</label>
                                                @php $rand = uniqid(); @endphp
                                                <div class="col-md-12">
                                                    <div class="custom-file media-manager"
                                                        data-name="brand[{{ $loop->index }}][light_logo]"
                                                        data-val="single" id="image-status">
                                                        <input class="custom-file-input form-control d-none"
                                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                                    </div>
                                                    <div class="preview-image">
                                                        @if ($brand['light_logo'])
                                                            <div class="d-flex flex-wrap mt-2">
                                                                <div
                                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                                    <div
                                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                                        <i class="fa fa-times"></i>
                                                                    </div>
                                                                    <img class="upl-img" class="p-1"
                                                                        src="{{ pathToUrl($brand['light_logo']) }}"
                                                                        alt="{{ __('Image') }}">
                                                                    <input type="hidden"
                                                                        name="brand[{{ $loop->index }}][light_logo]"
                                                                        id="validatedCustomFile"
                                                                        value="{{ $brand['light_logo'] }}">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-12 control-label">{{ __('Dark Mode') }}</label>

                                                @php $rand = uniqid(); @endphp
                                                <div class="col-md-12">
                                                    <div class="custom-file media-manager"
                                                        data-name="brand[{{ $loop->index }}][dark_logo]"
                                                        data-val="single" id="image-status">
                                                        <input class="custom-file-input form-control d-none"
                                                            id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                                                        <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                                            for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                                                    </div>
                                                    <div class="preview-image">
                                                        @if ($brand['dark_logo'])
                                                            <div class="d-flex flex-wrap mt-2">
                                                                <div
                                                                    class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                                                    <div
                                                                        class="position-absolute rounded-circle text-center img-remove-icon">
                                                                        <i class="fa fa-times"></i>
                                                                    </div>
                                                                    <img class="upl-img" class="p-1"
                                                                        src="{{ pathToUrl($brand['dark_logo']) }}"
                                                                        alt="{{ __('Image') }}">
                                                                    <input type="hidden"
                                                                        name="brand[{{ $loop->index }}][dark_logo]"
                                                                        id="validatedCustomFile"
                                                                        value="{{ $brand['dark_logo'] }}">
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
                        @empty
                            <div class="card cta-card mb-3">
                                <div class="card-header p-2" id="headingOne">
                                    <div class="mb-0 ac-switch collapsed d-flex closed justify-content-between align-items-center w-full curson-pointer"
                                        data-bs-toggle="collapse" data-bs-target="#{{ $ac = 'ac' . randomString() }}"
                                        aria-expanded="true" aria-controls="{{ $ac }}">
                                        <div>{{ __('Brand\'s Logo') }}</div>
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
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 control-label">{{ __('Light Logo') }}</label>
        
                                                        @php $rand = uniqid(); @endphp
                                                        <div class="col-md-12">
                                                            <div class="custom-file media-manager"
                                                                data-name="brand[0][light_logo]" data-val="single"
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
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 control-label">{{ __('Dark Logo') }}</label>
                                                        @php $rand = uniqid(); @endphp

                                                        <div class="col-md-12">
                                                            <div class="custom-file media-manager"
                                                                data-name="brand[0][dark_logo]" data-val="single"
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
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            @include('cms::edit.sub.text-color')
            @include('cms::edit.sub.appearance', ['fields' => ['padding-vertical']])
            @include('cms::pieces.submit-btn')
        </form>
    </div>
</div>

<!-- form-picker-custom Js -->
<script src="{{ asset('public/datta-able/js/pages/form-picker-custom.min.js') }}"></script>
<script src="{{ asset('public/datta-able/plugins/mini-color/js/jquery.minicolors.min.js') }}"></script>