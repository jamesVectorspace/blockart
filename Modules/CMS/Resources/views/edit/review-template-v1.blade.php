@php
    $component = isset($component) ? $component : null;
    $allReviews = \Modules\CMS\Service\Homepage::getReviewList();

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
                    <dt>{{ __(':x Type', ['x' => 'Review']) }}</dt>
                </label>
                <div class="col-sm-8">
                    <select type="text" class="form-control crequired select3 review_type" name="review_type">
                        @foreach (\Modules\CMS\Service\Homepage::reviewsOptions() as $key => $value)
                            <option {{ $component && $component->review_type == $key ? 'selected' : '' }}
                                value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div
                class="form-group row cats selectedReviews {{ $component && $component->review_type == 'selectedReviews' ? '' : 'd-none' }}">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('Reviews') }}</dt>
                </label>
                <div class="col-sm-8">
                    <select type="text" class="form-control sl_common_bx select_review" {{ $component && $component->review_type == 'selectedReviews' ? 'required' : '' }} name="reviews[]" multiple>
                        @if ($component && is_array($component->reviews))
                            @foreach ($component->reviews as $selected)
                                @if (isset($allReviews[$selected]))
                                    <Option selected value="{{ $selected }}">{{ $allReviews[$selected] }}
                                    </Option>
                                    @php
                                        unset($allReviews[$selected]);
                                    @endphp
                                @endif
                            @endforeach
                        @endif
                        @foreach ($allReviews as $key => $value)
                            <Option value="{{ $key }}">{{ $value }}</Option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row cats latestReviews {{ empty($component->review_type) || $component->review_type == 'latestReviews' ? '' : 'd-none' }}">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('No. of :x to show', ['x' => 'Review']) }}</dt>
                </label>
                <div class="col-sm-8">
                    <div>
                        <input type="number" min="1" max="8" class="form-control crequired inputFieldDesign review_limit" name="review_limit"
                        {{ empty($component->review_type) || $component->review_type == 'latestReviews' ? 'required' : '' }}
                        value="{{ $component ? $component->review_limit : 8 }}" data-min="{{ __('The value must be :x than or equal to :y', ['x' => __('greater'), 'y' => 1]) }}" data-max="{{ __('The value must be :x than or equal to :y.', ['x' => __('less'), 'y' => 8]) }}">
                    </div>
                    <div class="d-flex mt-2">
                        <span class="badge badge-danger h-100 mt-1">{{ __('Note') }}!</span>
                        <small
                            class="mt-1 ltr:ms-2 rtl:me-2 px-2">{{ __('Total :x to display should be between 1 to 8. Default is 8', ['x' => 'reviews']) }}</small>
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
<script src="{{ asset('Modules/CMS/Resources/assets/js/review.min.js') }}"></script>