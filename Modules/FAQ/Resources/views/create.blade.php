@extends('admin.layouts.app')
@section('page_title', __('FAQ'))
@section('css')
    <link rel="stylesheet" href="{{ asset('Modules/FAQ/Resources/assets/css/faq.min.css') }}">
@endsection
@section('content')
    <div class="col-sm-12" id="page-container">
        <div class="card">
            <div class="card-header">
                <h5><a href="{{ route('admin.faq') }}">{{ __('FAQ') }}</a> >> {{ __('Create') }}</h5>
            </div>
            <div class="card-body px-3" id="no_shadow_on_card">
                <div class="col-sm-12 m-t-20 form-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link font-bold active text-uppercase" id="home-tab" data-bs-toggle="tab" href="#home"
                                role="tab" aria-controls="home"
                                aria-selected="true">{{ __(':x Information', ['x' => __('FAQ')]) }}</a>
                        </li>
                    </ul>
                    <div class="col-sm-12 tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <form action="{{ route('admin.faq.store') }}" method="post" class="form-horizontal"
                                 onsubmit="return formValidation()" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-group row">
                                            <label for="title"
                                                class="col-sm-2 col-form-label require pr-0">{{ __('Title') }}
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" placeholder="{{ __('Title') }}"
                                                    class="form-control inputFieldDesign" id="title" name="title" maxlength="191"
                                                    value="{{ !empty(old('title')) ? old('title') : '' }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="layout"
                                                class="col-sm-2 col-form-label require pr-0">{{ __('Layout') }}
                                            </label>
                                            <div class="col-sm-10">
                                                <select class="form-control select2-hide-search" name="layout_id">
                                                    @foreach ($layouts as $key => $layout)
                                                        <option value="{{ $key }}"> {{ ucFirst($layout) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="description"
                                                class="col-sm-2 col-form-label require pr-0">{{ __('Description') }}
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="5" placeholder="{{ __('Description') }}" maxlength="1000" name="description" id="description">{{ old('description') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-1 mb-1">
                                            <label for="Status"
                                                class="col-md-2 col-form-label require">{{ __('Status') }}</label>
                                            <div class="col-md-10 margin-top-6">
                                                <input type="hidden" name="status" value="Inactive">
                                                <div class="switch switch-bg d-inline m-r-10">
                                                    <input class="status" type="checkbox" value="Active" name="status"
                                                        id="is_private" checked>
                                                    <label for="is_private" class="cr"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-0 pt-4 pb-2">
                                    <a href="{{ route('admin.faq') }}"
                                        class="btn all-cancel-btn custom-btn-cancel">{{ __('Cancel') }}</a>
                                    <button class="btn custom-btn-submit" id="btnSubmit">{{ __('Create') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('Modules/FAQ/Resources/assets/js/faq.min.js') }}"></script>

@endsection
