@extends('admin.layouts.app')
@section('page_title', __('Storage Drivers'))

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
                        @switch($list_menu)
                            @case('amazon-s3')
                                <h5>{{ __('Amazon S3') }}</h5>
                                @break
                            @case('digital-ocean')
                                <h5>{{ __('Digital Ocean') }}</h5>
                                @break
                            @case('wasabi')
                                <h5>{{ __('Wasabi') }}</h5>
                                @break
                                
                        @endswitch
                        
                    </div>
                    <div class="card-block table-border-style">
                        @if($list_menu == "amazon-s3")
                            <form action="{{ route('configstoragedriver', ['driver' => $list_menu]) }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="card-body p-0">
                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('AWS Access Key ID') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="aws_access_key_id" required
                                                value="{{ old('aws_access_key_id', config('filesystems.disks.amazon-s3.key')) }}"
                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('AWS Secret Key') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="aws_secret_key" required
                                                value="{{ old('aws_secret_key', config('filesystems.disks.amazon-s3.secret')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('AWS Region Name') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="aws_default_region" required
                                                value="{{ old('aws_default_region', config('filesystems.disks.amazon-s3.region')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('AWS Bucket Name') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="aws_bucket" required
                                                value="{{ old('aws_bucket', config('filesystems.disks.amazon-s3.bucket')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('AWS URL') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="aws_url" required
                                                value="{{ old('aws_url', config('filesystems.disks.amazon-s3.url')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('AWS Endpoint') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="aws_endpoint" required
                                                value="{{ old('aws_endpoint', config('filesystems.disks.amazon-s3.endpoint')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
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
                        @endif

                        @if($list_menu == "digital-ocean")
                            <form action="{{ route('configstoragedriver', ['driver' => $list_menu]) }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="card-body p-0">
                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('DO Access Key ID') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="do_access_key_id" required
                                                value="{{ old('do_access_key_id', config('filesystems.disks.digital-ocean.key')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('DO Secret Key') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="do_secret_key" required
                                                value="{{ old('do_secret_key', config('filesystems.disks.digital-ocean.secret')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('DO Region Name') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="do_default_region" required
                                                value="{{ old('do_default_region', config('filesystems.disks.digital-ocean.region')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('DO Bucket Name') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="do_bucket" required
                                                value="{{ old('do_bucket', config('filesystems.disks.digital-ocean.bucket')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('DO Endpoint') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="do_endpoint" required
                                                value="{{ old('do_endpoint', config('filesystems.disks.digital-ocean.endpoint')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('DO URL') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="do_url" required
                                                value="{{ old('do_url', config('filesystems.disks.digital-ocean.url')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
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
                        @endif

                        @if($list_menu == "wasabi")
                            <form action="{{ route('configstoragedriver', ['driver' => $list_menu]) }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="card-body p-0">
                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('Wasabi Access Key ID') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="was_access_key_id" required
                                                value="{{ old('was_access_key_id', config('filesystems.disks.wasabi.key')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('Wasabi Secret Key') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="was_secret_key" required
                                                value="{{ old('was_secret_key', config('filesystems.disks.wasabi.secret')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('Wasabi Region Name') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="was_default_region" required
                                                value="{{ old('was_default_region', config('filesystems.disks.wasabi.region')) }}"
                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('Wasabi Bucket Name') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="was_bucket" required
                                                value="{{ old('was_bucket', config('filesystems.disks.wasabi.bucket')) }}"

                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                        </div>
                                    </div>

                                    <div class="form-group row storage-hide">
                                        <label class="col-sm-3 control-label text-left require" for="inputEmail3">{{ __('Wasabi Endpoint') }}</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control form-height" name="was_url" required
                                                placeholder="https://s3.ap-northeast-1.wasabisys.com"
                                                value="{{ old('was_url', config('filesystems.disks.wasabi.endpoint')) }}"
                                                oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
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
                        @endif
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
