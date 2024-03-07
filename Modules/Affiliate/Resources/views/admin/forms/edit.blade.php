@extends('affiliate::layouts.app')

@section('page_title', __('Edit Form'))

@section('content')
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-md-flex justify-content-between align-items-center">
                <h5 class="card-title">
                    {{ __('Edit Form') }}</h5>
                <div class="d-md-flex mt-2 mt-md-0">
                    <div class="btn-toolbar" role="toolbar">
                        <div class="btn-group d-block" role="group">
                            <a href="{{ route('affiliate.settings') }}"
                               class="btn btn-sm custom-btn-cancel all-cancel-btn">
                                <i class="fa fa-arrow-left neg-transition-scale"></i> {{ __('Back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <form class="kycFormAdmin" action="{{ route('site.affiliate.form_update', $form) }}" method="POST" id="createFormForm"
                  data-form-method="PUT">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name" class="col-form-label require">{{ __('Form Name') }}</label>
                                <input id="name" type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} form-height" name="name"
                                       value="{{ old('name') ?? $form->name }}" required autofocus
                                       placeholder="{{ __('Enter Form Name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group relative form-parnent">
                                <label for="visibility" class="col-form-label require">{{ __('Form Visibility') }}</label>
                                <select name="visibility" id="visibility" class="form-control select2-hide-search form-height" required="required">
                                    <option value="">{{ __('Select Form Visibility') }}</option>
                                    @foreach (Modules\Affiliate\Entities\Form::$visibility_options as $option)
                                        @if($form->type == 'affiliate' && $option['id'] == 'PUBLIC')
                                            <option value="{{ $option['id'] }}"
                                                    @if ($form->visibility == $option['id']) selected @endif>
                                                {{ $option['name'] }}
                                            </option>
                                        @elseif($form->type != 'affiliate')
                                            <option value="{{ $option['id'] }}"
                                                    @if ($form->visibility == $option['id']) selected @endif>
                                                {{ $option['name'] }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('visibility'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('visibility') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4 {{ $form->isPublic() ? 'd-none' : '' }}"
                             @if ($form->isPublic()) id="allows_edit_DIV" @endif>
                            <div class="form-group">
                                <label for="allows_edit" class="col-form-label require">
                                    {{ __('Allow Submission Edit') }}
                                </label>
                                <select name="allows_edit" id="allows_edit" class="form-control select2-hide-search" required="required">
                                    <option value="0" @if ($form->allows_edit == 0) selected @endif>
                                        {{ __('NO (submissions are final)') }}
                                    </option>
                                    <option value="1" @if ($form->allows_edit == 1) selected @endif>
                                        {{ __('YES (allow users to edit their submissions)') }}
                                    </option>
                                </select>
                                @if ($errors->has('allows_edit'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('allows_edit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="alert alert-info" role="alert">
                                <i class="fa fa-info-circle"></i>
                                {{ __('Click on or Drag and drop components onto the main panel to build your form content.') }}
                            </div>
                            <div id="fb-editor" class="fb-editor"></div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="card-footer" id="fb-editor-footer d-none">
                <button type="button" class="btn fb-clear-btn custom-btn-cancel">
                    {{ __('Clear') }}
                </button>
                <button type="button" class="btn fb-save-btn custom-btn-submit">
                    {{ __('Save') }}
                </button>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script type="text/javascript">
        window.FormBuilder = {
            csrfToken: '{{ csrf_token() }}',
        }
    </script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/jquery-ui.min.js') }}" defer></script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/sweetalert.min.js') }}" defer></script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/jquery-formbuilder/form-builder.min.js') }}" defer>
    </script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/jquery-formbuilder/form-render.min.js') }}" defer>
    </script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/parsleyjs/parsley.min.js') }}" defer></script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/clipboard/clipboard.min.js') }}?b=ck24" defer></script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/moment.min.js') }}"></script>
    <script
        src="{{ asset('Modules/Affiliate/Resources/assets/form/js/script.min.js') }}"
        defer></script>



    <link rel="stylesheet" type="text/css" href="{{ asset('Modules/Affiliate/Resources/assets/form/js/footable/css/footable.standalone.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Modules/Affiliate/Resources/assets/form/css/styles.min.css') }}">
    
<script type="text/javascript">
    window.FormBuilder = window.FormBuilder || {}
    window.FormBuilder.form_roles = @json($form_roles);

    window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
</script>
<script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/create-form.min.js') }}" defer></script>
@endsection

