<div class="form-group row">
    <label class="col-sm-3 control-label">
        <dt>{{ __('Background') }}</dt>
    </label>
    <div class="col-sm-8">
        <div class="row form-group">
            <label class="col-md-12 control-label">{{ __('Type') }}</label>
            <div class="col-sm-12">
                <select type="text" required class="form-control crequired select3 background_type" name="background_type">
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
                        <div class="custom-file media-manager" data-name="main_bg_image_light" data-val="single"
                            id="image-status">
                            <input class="custom-file-input form-control d-none inputFieldDesign" name="main_bg_image_light"
                                id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                            <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                        </div>
                        <div class="preview-image">
                            @if ($component && $component->main_bg_image_light)
                                <div class="d-flex flex-wrap mt-2">
                                    <div
                                        class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                        <div
                                            class="position-absolute rounded-circle text-center img-remove-icon">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <img class="upl-img" class="p-1"
                                            src="{{ pathToUrl($component->main_bg_image_light) }}"
                                            alt="{{ __('Image') }}">
                                        <input type="hidden" name="main_bg_image_light"
                                            value="{{ $component->main_bg_image_light }}">
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
                        <div class="custom-file media-manager" data-name="main_bg_image_dark" data-val="single"
                            id="image-status">
                            <input class="custom-file-input form-control d-none inputFieldDesign" name="main_bg_image_dark"
                                id="validatedCustomFile{{ $rand }}" maxlength="50" accept="image/*">
                            <label class="custom-file-label overflow_hidden position-relative d-flex align-items-center"
                                for="validatedCustomFile{{ $rand }}">{{ __('Upload image') }}</label>
                        </div>
                        <div class="preview-image">
                            @if ($component && $component->main_bg_image_dark)
                                <div class="d-flex flex-wrap mt-2">
                                    <div
                                        class="position-relative border boder-1 media-box p-1 mr-2 rounded mt-2">
                                        <div
                                            class="position-absolute rounded-circle text-center img-remove-icon">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <img class="upl-img" class="p-1"
                                            src="{{ pathToUrl($component->main_bg_image_dark) }}"
                                            alt="{{ __('Image') }}">
                                        <input type="hidden" name="main_bg_image_dark"
                                            value="{{ $component->main_bg_image_dark }}">
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
                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="main_bg_color_light"
                            value="{{ $component ? $component->main_bg_color_light : '' }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-sm-12 control-label">{{ __('Background Color (Dark Mode)') }}</label>
                    <div class="col-sm-12">
                        <input type="text"
                            class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="main_bg_color_dark"
                            value="{{ $component ? $component->main_bg_color_dark : '' }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
