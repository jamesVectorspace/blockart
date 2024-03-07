@php
    $component = isset($component) ? $component : null;
    $allFaqs = \Modules\CMS\Service\Homepage::getFaqList();
    $rand = uniqid();
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
                    <textarea class="form-control crequired" name="body"> {{ $component ? $component->body : '' }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 control-label">
                    <dt>{{ __(':x Type', ['x' => 'FAQ']) }}</dt>
                </label>
                <div class="col-sm-8">
                    <select type="text" class="form-control crequired select3 faq_type" name="faq_type">
                        @foreach (\Modules\CMS\Service\Homepage::faqsOptions() as $key => $value)
                            <option {{ $component && $component->faq_type == $key ? 'selected' : '' }}
                                value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div
                class="form-group row cats selectedFaqs {{ $component && $component->faq_type == 'selectedFaqs' ? '' : 'd-none' }}">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('Faqs') }}</dt>
                </label>
                <div class="col-sm-8">
                    <select type="text" class="form-control select2 sl_common_bx select_faq" {{ $component && $component->faq_type == 'selectedFaqs' ? 'required' : '' }} name="faqs[]" multiple>
                        @if ($component && is_array($component->faqs))
                            @foreach ($component->faqs as $selected)
                                @if (isset($allFaqs[$selected]))
                                    <Option selected value="{{ $selected }}">{{ $allFaqs[$selected] }}
                                    </Option>
                                    @php
                                        unset($allFaqs[$selected]);
                                    @endphp
                                @endif
                            @endforeach
                        @endif
                        @foreach ($allFaqs as $key => $value)
                            <Option value="{{ $key }}">{{ $value }}</Option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row cats latestFaqs {{ empty($component->faq_type) || $component->faq_type == 'latestFaqs' ? '' : 'd-none' }}">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('No. of :x to show', ['x' => 'FAQ']) }}</dt>
                </label>
                <div class="col-sm-8">
                    <div>
                        <input type="number" min="1" class="form-control crequired inputFieldDesign faq_limit" name="faq_limit"
                        {{ empty($component->faq_type) || $component->faq_type == 'latestFaqs' ? 'required' : '' }}
                        value="{{ $component ? $component->faq_limit : 8 }}" data-min="{{ __('The value must be :x than or equal to :y', ['x' => __('greater'), 'y' => 1]) }}">
                    </div>
                    
                    <div class="d-flex mt-2">
                        <span class="badge badge-danger h-100 mt-1">{{ __('Note') }}!</span>
                        <small
                            class="mt-1 ltr:ms-2 rtl:me-2 px-2">{{ __('Total :x to display should range from 1 to as per your preference, with the default set at 8.', ['x' => 'faqs']) }}</small>
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
<script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
