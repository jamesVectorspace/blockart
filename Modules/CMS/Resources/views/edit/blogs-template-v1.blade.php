@php
    $component = isset($component) ? $component : null;
    $allBlogs = \Modules\CMS\Service\Homepage::getBlogsList();
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
                <label class="col-sm-3 control-label ">
                    <dt>{{ __('Overline') }}</dt>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control section_name inputFieldDesign crequired" maxlength="70" name="overline"
                        value="{{ $component ? $component->overline : '' }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 control-label ">
                    <dt>{{ __('Heading') }}</dt>
                </label>
                <div class="col-sm-8">
                    <input type="text" class="form-control inputFieldDesign crequired" name="heading"
                        value="{{ $component ? $component->heading : '' }}">
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label class="control-label text-left ">
                            <dt>{{ __('Blog Button') }}</dt>
                        </label>
                        <input type="hidden" name="blog_button" value="0">
                        <div class="col-md-12">
                            <div class="switch switch-warning d-inline m-r-10">
                                <input type="checkbox" name="blog_button"
                                    id="{{ $sw = uniqid('sw_') }}" value="1"
                                    {{ $component && $component->blog_button == 1 ? 'checked' : '' }}>
                                <label for="{{ $sw }}" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Name') }}</label>
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
                        <div class="col-sm-6 col-md-6">
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
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 control-label ">
                    <dt>{{ __('Blog Type') }}</dt>
                </label>
                <div class="col-sm-8">
                    <select type="text" class="form-control crequired select3 blog_type" name="blog_type">
                        @foreach (\Modules\CMS\Service\Homepage::blogsOptions() as $key => $value)
                            <option {{ $component && $component->blog_type == $key ? 'selected' : '' }}
                                value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div
                class="form-group row cats selectedBlogs {{ $component && $component->blog_type == 'selectedBlogs' ? '' : 'd-none' }}">
                <label class="col-sm-3 control-label">
                    <dt>{{ __('Blogs') }}</dt>
                </label>
                <div class="col-sm-8">
                    <select type="text" class="form-control select2 sl_common_bx select_blog" {{ $component && $component->blog_type == 'selectedBlogs' ? 'required' : '' }} name="blogs[]" multiple>
                        @if ($component && is_array($component->blogs))
                            @foreach ($component->blogs as $selected)
                                @if (isset($allBlogs[$selected]))
                                    <Option selected value="{{ $selected }}">{{ $allBlogs[$selected] }}
                                    </Option>
                                    @php
                                        unset($allBlogs[$selected]);
                                    @endphp
                                @endif
                            @endforeach
                        @endif
                        @foreach ($allBlogs as $key => $value)
                            <Option value="{{ $key }}">{{ $value }}</Option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row cats latestBlogs {{ empty($component->blog_type) || $component->blog_type == 'latestBlogs' ? '' : 'd-none' }}">
                <label class="col-sm-3 control-label ">
                    <dt>{{ __('No. of blogs to show') }}</dt>
                </label>
                <div class="col-sm-8">
                    <div>
                        <input type="number" min="1" max="30" class="form-control crequired inputFieldDesign blog_limit" name="blog_limit"
                        {{ empty($component->blog_type) || $component->blog_type == 'latestBlogs' ? 'required' : '' }}
                            value="{{ $component ? $component->blog_limit : 10 }}" data-min="{{ __('The value must be :x than or equal to :y', ['x' => __('greater'), 'y' => 1]) }}" data-max="{{ __('The value must be :x than or equal to :y.', ['x' => __('less'), 'y' => 30]) }}">
                    </div>
                    <div class="d-flex mt-2">
                        <span class="badge badge-danger h-100 mt-1">{{ __('Note') }}!</span>
                        <small
                            class="mt-1 ltr:ms-2 rtl:me-2 px-2">{{ __('Total blogs to display should be between 1 to 30. Default is 10') }}</small>
                    </div>
                </div>
            </div>

            {{-- Newsletter --}}
            <hr>
            <div class="form-group row">
                <label class="col-sm-3 control-label ">
                    <dt>{{ __('Newseletter Body') }}</dt>
                </label>
                <div class="col-sm-8">
                    <textarea class="form-control crequired" name="newsletter_body">{{ $component ? $component->newsletter_body : '' }}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <div class="form-group row">
                        <label class="control-label text-left">
                            <dt>{{ __('Newsletter Button') }}</dt>
                        </label>
                        <input type="hidden" name="newsletter_button" value="0">
                        <div class="col-md-12">
                            <div class="switch switch-warning d-inline m-r-10">
                                <input type="checkbox" name="newsletter_button"
                                    id="{{ $sw = uniqid('sw_') }}" value="1"
                                    {{ $component && $component->newsletter_button == 1 ? 'checked' : '' }}>
                                <label for="{{ $sw }}" class="cr"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <label class="col-sm-12 control-label">{{ __('Button Name') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control inputFieldDesign" maxlength="25"
                                value="{{ $component ? $component->newsletter_btn_name : '' }}" name="newsletter_btn_name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 control-label">{{ __('Button Color (Light)') }}</label>
                                <div class="col-sm-12">
                                    <div>
                                        <input type="text"
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="newsletter_btn_color_light"
                                            value="{{ $component ? $component->newsletter_btn_color_light : '' }}">
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
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="newsletter_btn_color_dark"
                                            value="{{ $component ? $component->newsletter_btn_color_dark : '' }}">
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
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="newsletter_btn_text_color_light"
                                            value="{{ $component ? $component->newsletter_btn_text_color_light : '' }}">
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
                                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="newsletter_btn_text_color_dark"
                                            value="{{ $component ? $component->newsletter_btn_text_color_dark : '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
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