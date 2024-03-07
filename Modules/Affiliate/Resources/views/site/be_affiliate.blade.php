@extends('affiliate::layouts.app')
@section('page_title', __('Be Affiliate User'))
@section('css')

@endsection
@section('content')
    <!-- Affiliate Registration Form -->


    <!-- Main content -->
    <div class="col-sm-12" id="be-affiliate-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-12 ps-0">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-20 border-bottom">
                            <h5>{{ __('Be Affiliate User') }}</h5>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="{{ route('site.affiliate.be-affiliate') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="card-body p-0">
                                    <div id="fb-render"></div>
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
    <script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/jquery-formbuilder/form-render.min.js') }}" defer></script>
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/render-form.min.js') }}" defer></script>
@endsection
