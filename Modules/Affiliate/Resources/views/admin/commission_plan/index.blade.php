@extends('affiliate::layouts.app')
@section('page_title', __('Commission Plan'))

@section('css')
    {{-- Select2  --}}
    <link rel="stylesheet" href="{{ asset('public/datta-able/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/plugins/Responsive-2.2.5/css/responsive.dataTables.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="commission-plan-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-12 col-12 {{ languageDirection() == 'ltr' ? 'ps-0' : 'pe-0' }}">
                    <div class="card card-info shadow-none mb-0">
                        @if (session('errorMgs'))
                            <div class="alert alert-warning fade in alert-dismissable">
                                <strong>{{ __('Warning') }}!</strong> {{ session('errorMgs') }}. <a class="close"
                                                                                                    href="#" data-bs-dismiss="alert" aria-label="close" title="close">×</a>
                            </div>
                        @endif
                        <div class="card-header p-t-0 border-bottom">
                            <h5>{{ __('Commission Plans') }}</h5>
                            @if(hasPermission('Modules\Affiliate\Http\Controllers\CommissionPlanController@create'))
                            <div class="card-header-right">
                                <a href="{{ route('commission.plan.create') }}" class="btn btn-outline-primary custom-btn-small">
                                    <span class="fa fa-plus">
                                        &nbsp</span>{{ __('Add :x', ['x' => __('Plan')]) }}</a>
                            </div>
                            @endif
                        </div>
                        <div class="card-body p-2 p-md-4 product-table">
                            <div class="row">
                                <div class="table-responsive">
                                    <table id="dataTableBuilder" class="table table-hover table-striped dt-responsive">
                                        <thead>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Commission') }}</th>
                                            <th>{{ __('Commission Type') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            @if(hasPermission('Modules\Affiliate\Http\Controllers\CommissionPlanController@edit') && hasPermission('Modules\Affiliate\Http\Controllers\CommissionPlanController@update') ||
                                             hasPermission('Modules\Affiliate\Http\Controllers\CommissionPlanController@destroy')
                                             )
                                            <th>{{ __('Action') }}</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($commissionPlans as $commissionPlan)
                                            <tr>
                                                <td>{{ $commissionPlan->name }}</td>
                                                <td>{{ $commissionPlan->commission }}</td>
                                                <td>{{ $commissionPlan->commission_type }}</td>
                                                <td>{!! statusBadges(lcfirst($commissionPlan->status)) !!} </td>
                                                <td>
                                                    @if(hasPermission('Modules\Affiliate\Http\Controllers\CommissionPlanController@edit') && hasPermission('Modules\Affiliate\Http\Controllers\CommissionPlanController@update'))
                                                    <a title="{{ __('Edit') }}" href="{{ route('commission.plan.edit', $commissionPlan->id) }}" class="btn btn-xs btn-primary edit_tag"><span class="feather icon-eye neg-transition-scale-svg "></span></a>
                                                    @endif
                                                  @if(!$commissionPlan->isDefault() && hasPermission('Modules\Affiliate\Http\Controllers\CommissionPlanController@destroy'))
                                                    <form method="POST" action="{{ route('commission.plan.delete', $commissionPlan->id) }}" accept-charset="UTF-8" id="delete-language-{{ $commissionPlan->id }}" class="display_inline">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $commissionPlan->id }}">
                                                        <button title="{{ __('Delete') }}" class="btn btn-xs btn-danger" data-id="{{ $commissionPlan->id }}" type="button" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-label="Delete" data-title="{{ __('Delete :x', ['x' => __('Status')]) }}" data-message="{{ __('Are you sure to delete this?') }}">
                                                            <i class="feather icon-trash-2"></i>
                                                        </button>
                                                    </form>
                                                  @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('affiliate::admin.layouts.delete_modal')

    </div>
@endsection

@section('js')
    <script src="{{ asset('public/datta-able/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('public/dist/plugins/DataTables-1.10.21/js/jquery.dataTablesCus.min.js') }}"></script>
    <script src="{{ asset('public/dist/plugins/Responsive-2.2.5/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/js/commission_plan.min.js') }}"></script>
@endsection
