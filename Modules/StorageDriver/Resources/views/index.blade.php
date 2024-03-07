@extends('admin.layouts.app')
@section('page_title', __('Storage Driver'))

@section('css')
    <link rel="stylesheet" href="{{ asset('Modules/CMS/Resources/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/css/product.min.css') }}">
@endsection

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Main content -->
<div class="col-sm-12">
    <div class="card">
        <div class="card-body row">
            <div class="col-lg-3 col-12 z-index-10 pe-0 ps-0 ps-md-3">
                @include('storagedriver::layouts.includes.storage_driver_menu')
            </div>
            <div class="col-lg-9 col-12 ps-0">
                <div class="card card-info shadow-none mb-0">
                    <div class="card-header p-t-20 border-bottom">
                        <h5>{{ __('Storage Driver') }}</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <form action="{{ route('storagedriver') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="card-body p-0">
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label text-left" for="inputEmail3">
                                        {{ __('Storage Driver') }}
                                        <span data-toggle="tooltip"
                                            title="{{ __('Changing the storage driver will result in the images from the current driver not being displayed.') }}"
                                            class="add-note-icon neg-transition-scale">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                height="12" viewBox="0 0 12 12" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 6C12 9.31371 9.31371 12 6 12C2.68629 12 0 9.31371 0 6C0 2.68629 2.68629 0 6 0C9.31371 0 12 2.68629 12 6ZM6.66667 10C6.66667 10.3682 6.36819 10.6667 6 10.6667C5.63181 10.6667 5.33333 10.3682 5.33333 10C5.33333 9.63181 5.63181 9.33333 6 9.33333C6.36819 9.33333 6.66667 9.63181 6.66667 10ZM6 1.33333C4.52724 1.33333 3.33333 2.52724 3.33333 4H4.66667C4.66667 3.26362 5.26362 2.66667 6 2.66667H6.06287C6.76453 2.66667 7.33333 3.23547 7.33333 3.93713V4.27924C7.33333 4.62178 7.11414 4.92589 6.78918 5.03421C5.91976 5.32402 5.33333 6.13765 5.33333 7.05409V8.66667H6.66667V7.05409C6.66667 6.71155 6.88586 6.40744 7.21082 6.29912C8.08024 6.00932 8.66667 5.19569 8.66667 4.27924V3.93713C8.66667 2.49909 7.50091 1.33333 6.06287 1.33333H6Z"
                                                    fill="#898989" />
                                            </svg>
                                        </span>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="name" class="form-control select2-hide-search">
                                            @foreach (['local' => __('Local'), 'amazon-s3' => __('Amazon s3'), 'digital-ocean' => __('Digital Ocean'), 'wasabi' => __('Wasabi')] as $key => $value)
                                                <option @disabled(!isDriverActive($key)) @selected($storageDriver_name == $key) value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
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
    <script src="{{ asset('public/dist/js/custom/settings.min.js') }}"></script>
@endsection
