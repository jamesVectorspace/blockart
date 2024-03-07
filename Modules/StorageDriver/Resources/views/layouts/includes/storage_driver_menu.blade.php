<div class="card card-info shadow-none" id="nav">
    <div class="card-header p-t-20 border-bottom mb-2">
        <h5>{{ __('Storage Driver') }}</h5>
    </div>
    <ul class="card-body nav nav-pills nav-stacked" id="mcap-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link h-lightblue text-left {{ isset($list_menu) && $list_menu == 'storage_driver' ? 'active' : ''}}" href="{{ route('storagedriver') }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Storage Driver') }}</a>
        </li>

        <li class="nav-item">
            <a class="nav-link h-lightblue text-left {{ isset($list_menu) && $list_menu == 'amazon-s3' ? 'active' : ''}}" href="{{ route('configstoragedriver', ['driver' => 'amazon-s3']) }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Amazon S3') }}</a>
        </li>

        <li class="nav-item">
            <a class="nav-link h-lightblue text-left {{ isset($list_menu) && $list_menu == 'digital-ocean' ? 'active' : ''}}" href="{{ route('configstoragedriver', ['driver' => 'digital-ocean']) }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Digital Ocean') }}</a>
        </li>

        <li class="nav-item">
            <a class="nav-link h-lightblue text-left {{ isset($list_menu) && $list_menu == 'wasabi' ? 'active' : ''}}" href="{{ route('configstoragedriver', ['driver' => 'wasabi']) }}" id="s" role="tab" aria-controls="mcap-default" aria-selected="true">{{ __('Wasabi') }}</a>
        </li>

    </ul>
</div>
