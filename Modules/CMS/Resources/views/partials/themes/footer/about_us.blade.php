<div class="card dd-content card-hide">
    <div class="card-body px-0 px-md-4">
        <div class="form-group row my-0">
            <label class="col-sm-3 control-label">{{ __('Title') }}</label>
            <div class="col-sm-9 input-group bg-transparent">
                <input type="text" class="form-control widget-title inputFieldDesign" name="{{ $layout }}_template_footer[main][about_us][title]" value="{{ $footer['main']['about_us']['title'] }}" maxlength="40">
            </div>
        </div>
        <hr>

        <div class="form-group row preview-parent" id="iconTop">
            <label class="col-sm-3 control-label text-left">{{ __('Footer Logo (Light Mode)') }}</label>
            <div class="col-sm-7">
                <div class="custom-file media-manager-img" data-val="single" data-returntype="ids" id="image-status">
                    <input class="custom-file-input is-image form-control d-none" name="{{ $layout }}_template_footer_logo_light">
                    <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                        for="validatedCustomFile">{{ __('Upload image') }}</label>
                </div>
                <div class="preview-image" id="company_favicon">
                    <!-- img will be shown here -->
                    <div class="d-flex flex-wrap mt-2">
                        @if($image['id']['footer_logo_light'])
                            <div class="position-relative border boder-1 p-1 mr-2 rounded mt-2 old-image">
                                <div
                                    class="position-absolute rounded-circle text-center img-delete-icon"
                                    data-objectId="{{ $image['id']['footer_logo_light'] }}">
                                    <i class="fa fa-times"></i>
                                </div>

                                <img class="upl-img object-contain" class="p-1"
                                    src="{{ $image['footer_logo_light'] }}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row preview-parent" id="iconTop">
            <label class="col-sm-3 control-label text-left">{{ __('Footer Logo (Dark Mode)') }}</label>
            <div class="col-sm-7">
                <div class="custom-file media-manager-img" data-val="single" data-returntype="ids" id="image-status">
                    <input class="custom-file-input is-image form-control d-none" name="{{ $layout }}_template_footer_logo_dark">
                    <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                        for="validatedCustomFile">{{ __('Upload image') }}</label>
                </div>
                <div class="preview-image" id="company_favicon">
                    <!-- img will be shown here -->
                    <div class="d-flex flex-wrap mt-2">
                        @if($image['id']['footer_logo_dark'])
                            <div class="position-relative border boder-1 p-1 mr-2 rounded mt-2 old-image">
                                <div
                                    class="position-absolute rounded-circle text-center img-delete-icon"
                                    data-objectId="{{ $image['id']['footer_logo_dark'] }}">
                                    <i class="fa fa-times"></i>
                                </div>

                                <img class="upl-img object-contain" class="p-1"
                                    src="{{ $image['footer_logo_dark'] }}">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @foreach ($footer['main']['about_us']['data']['social_data'] as $social)
            <div class="form-group row">
                <label class="col-sm-3 control-label text-start">{{ ucfirst(str_replace('_', ' ', $social['label'])) }}</label>
                <div class="col-sm-7">
                    <input type="hidden" name="{{ $layout }}_template_footer[main][about_us][data][social_data][{{ $loop->iteration }}][label]" value="{{ $social['label'] }}">
                    <input type="text" class="form-control inputFieldDesign" name="{{ $layout }}_template_footer[main][about_us][data][social_data][{{ $loop->iteration }}][link]" value="{{ $social['link'] }}">
                </div>
            </div>
        @endforeach


    </div>
</div>

