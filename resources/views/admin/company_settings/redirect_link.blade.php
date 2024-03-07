@extends('admin.layouts.app')
@section('page_title', __('Account Settings'))
@section('css')

@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="account-settings-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-3 col-12 z-index-10 pe-0 ps-0 ps-md-3">
                @include('admin.layouts.includes.general_settings_menu')
                </div>
                <div class="col-lg-9 col-12 ps-0">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-20 border-bottom">
                            <h5>{{ __('Set redirect Link') }}</h5>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{ route('setting.setRedirectLink') }}" method="post" class="form-horizontal" id="preference_form">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-4 control-label" for="is_redirect_link">{{ __('Redirect Link') }}</label>
                                    <div class="col-6">
                                        <div class="switch switch-bg d-inline m-r-10">
                                            <input class="customer-signup" type="checkbox" value="{{ preference('is_redirect_link') ? preference('is_redirect_link') : 0 }}" name="is_redirect_link" id="is_redirect_link" {{ preference('is_redirect_link') == 1 ? 'checked' : '' }}>
                                            <label for="is_redirect_link" class="cr"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row redirect_link_div"{{ preference('is_redirect_link') == 1 ? '' : 'hidden'}}>
                                    <div class="row">
                                        <label for="redirect_link" class="col-4 control-label require">{{ __('Set Link') }}</label>
                                        <div class="col-sm-7 flex-wrap">
                                            <div>
                                                <input type="text"
                                                @if (preference('is_redirect_link') == 1) name="redirect_link" required @endif
                                                placeholder="{{ __('Set Link') }}" id="redirect_link" class="form-control" value="{{ preference('redirect_link') ? preference('redirect_link') : '' }}">
                                            </div>
                                            
                                            <div class="py-1" id="note_txt_1">
                                                <div class="d-flex mt-1 mb-3">
                                                    <span class="badge badge-danger h-100 mt-1">{{ __('Note') }}!</span>
                                                    <ul class="list-unstyled ml-3">
                                                        <li>{{ __('Set Redirect site like :x', ['x' => 'https://yourdomain.com']) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer p-0">
                                    <div class="form-group row">
                                        <label for="btn_save" class="col-sm-3 control-label"></label>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn form-submit custom-btn-submit float-right" id="footer-btn">
                                                {{ __('Save') }}
                                            </button>
                                        </div>
                                    </div>
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
    <script src="{{ asset('public/datta-able/plugins/sweetalert/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/settings.min.js') }}"></script>
@endsection
