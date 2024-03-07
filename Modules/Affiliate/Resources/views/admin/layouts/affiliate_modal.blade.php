<div id="affiliate-user" class="modal fade display_none" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Add New') }} &nbsp; </h4>
                <a type="button" class="close h5" data-bs-dismiss="modal">×</a>
            </div>
            <div class="modal-body">
                <form action="#" method="post" class="form-horizontal">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-3 control-label require" for="inputEmail3">{{ __('Name') }}</label>

                        <div class="col-sm-6">
                            <input type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" class="form-control name inputFieldDesign" name="name" id="name" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label require" for="inputEmail3">{{ __('Slug') }}</label>

                        <div class="col-sm-6">
                            <input type="text" id="slug" placeholder="{{ __('Slug') }}" value="{{ old('slug') }}" class="form-control name inputFieldDesign" name="slug" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label pr-0 " for="inputEmail3">{{ __('Parent Tag') }}</label>
                        <div class="col-sm-6">
                            <select class="form-control select2-hide-search sl_common_bx" name="parent_id">
                                <option value="">{{ __('Select One') }}</option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label" for="inputEmail3">{{ __('Summary') }}</label>

                        <div class="col-sm-6">
                            <textarea rows="3" class="form-control" name="summary"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="btn_save" class="col-sm-3 control-label"></label>
                        <div class="col-sm-12">
                            <button type="submit" class="btn py-2 custom-btn-submit {{ languageDirection() == 'ltr' ? 'float-right' : 'float-left' }}">{{ __('Create') }}</button>
                            <button type="button" class="py-2 custom-btn-cancel {{ languageDirection() == 'ltr' ? 'float-right me-2' : 'float-left ms-2' }}" data-bs-dismiss="modal">{{ __('Close') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
