<div id="add-feature-nav" class="d-none">
    <li class="ms-3 custom-feature-nav">
        <a class="nav-link text-left tab-name" data-bs-toggle="pill"
            href="" role="tab" aria-controls="" aria-selected="true"
            data-id=""></a>
        <span class="close">X</span>
    </li>
</div>
<div id="add-feature-data" class="d-none">
    <div class="tab-pane fade" role="tabpanel"
        aria-labelledby="">
        <input class="type" type="hidden" value="string">
        <div class="form-group row">
            <div class="col-md-6">
                <label for="title" class="control-label">{{ __('Title') }}</label>
                <input type="text" placeholder="{{ __('Title') }}"
                    class="form-control form-width inputFieldDesign title">
            </div>
            <div class="col-sm-6">
                <label for="is_visible" class="control-label">{{ __('Is Visible?') }}</label>
                <select class="form-control inputFieldDesign is_visible">
                    <option value="1" selected>{{ __('Yes') }}</option>
                    <option value="0">{{ __('No') }}</option>
                </select>
                <label class="mt-1"><span class="badge badge-warning me-2">{{ __('Note') }}</span>{{ __('This option is applicable only for the plan details section') }}</label>
            </div>
        </div>

        <input type="hidden" class="description" value="">
        <div class="form-group row d-none">
            <div class="col-sm-6">
                <label for="status" class="control-label">{{ __('Status') }}</label>
                <select class="form-control inputFieldDesign status">
                    <option value="Active" selected>{{ __('Active') }}</option>
                    <option value="Inactive" >{{ __('Inactive') }}</option>
                </select>
            </div>
        </div>
    </div>
</div>
