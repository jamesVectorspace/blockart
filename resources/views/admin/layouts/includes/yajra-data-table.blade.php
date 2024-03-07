
@push('styles')
<link rel="stylesheet" href="{{ asset('public/dist/plugins/Responsive-2.2.5/css/responsive.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/dist/plugins/bootstrap-daterangepicker/daterangepicker.min.css') }}">
@endpush

<div class="table-responsive yajra-data-table-main">
    {!! $dataTable->table([
        'class' => 'table table-bordered dt-responsive', 
        'width' => '100%', 
        'cellspacing' => '0'
        ]) !!}
</div>

@push('scripts')
<script src="{{ asset('public/dist/plugins/DataTables-1.10.21/js/jquery.dataTablesCus.min.js') }}"></script>
<script src="{{ asset('public/dist/plugins/Responsive-2.2.5/js/dataTables.responsive.min.js') }}"></script>

{!! $dataTable->scripts(attributes: ['type' => 'module']) !!}

<script src="{{ asset('public/dist/js/custom/yajra-custom.min.js') }}"></script>
@endpush
