<hr>
<div class="form-group row">
    <div class="col-sm-3">
        <div class="form-group row">
            <label class="control-label text-left">
                <dt>{{ __('Text Color') }}</dt>
            </label>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="col-sm-12 control-label">{{ __('Light Mode') }}</label>
                    <div class="col-sm-12">
                        <input type="text"
                                class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="text_color_light"
                                value="{{ $component ? $component->text_color_light : '' }}">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label class="col-sm-12 control-label">{{ __('Dark Mode') }}</label>
                    <div class="col-sm-12">
                        <input type="text"
                                class="form-control demo layout-primary-color inputFieldDesign" data-control="hue" name="text_color_dark"
                                value="{{ $component ? $component->text_color_dark : '' }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>