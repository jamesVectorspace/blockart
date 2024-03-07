@extends('affiliate::layouts.app')
@section('page_title', __('Campaign'))

@section('css')
    {{-- Select2  --}}
    <link rel="stylesheet" href="{{ asset('public/datta-able/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/plugins/Responsive-2.2.5/css/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/datta-able/plugins/summer-note/summernote-lite.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Modules/MediaManager/Resources/assets/css/media-manager.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="affiliate-campaign-container">
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
                            <h5>{{ __('Campaigns') }}</h5>
                            @if(hasPermission('Modules\Affiliate\Http\Controllers\CampaignController@store'))
                            <div class="card-header-right">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#add-campaign" class="btn btn-outline-primary custom-btn-small">
                                    <span class="fa fa-plus">
                                        &nbsp</span>{{ __('Add :x', ['x' => __('Campaign')]) }}</a>
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
                                            <th>{{ __('link') }}</th>
                                            <th>{{ __('Summary') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            @if(hasPermission('Modules\Affiliate\Http\Controllers\CampaignController@edit') && hasPermission('Modules\Affiliate\Http\Controllers\CampaignController@update') ||
                                                hasPermission('Modules\Affiliate\Http\Controllers\CampaignController@destroy')
                                             )
                                            <th>{{ __('Action') }}</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($campaigns as $campaign)
                                            <tr>
                                                <td>{{ $campaign->name }}</td>
                                                <td>{{ $campaign->link }}</td>
                                                <td>{{ wrapIt($campaign->summary, 10, ['trim' => true, 'trimLength' => 35]) }}</td>
                                                <td>{{ wrapIt(strip_tags($campaign->description), 10, ['trim' => true, 'trimLength' => 35]) }}</td>
                                                <td>
                                                    @if(hasPermission('Modules\Affiliate\Http\Controllers\CampaignController@edit') && hasPermission('Modules\Affiliate\Http\Controllers\CampaignController@update'))
                                                    <a title="{{ __('Edit') }}" href="javascript:void(0)" class="btn btn-xs btn-primary edit_tag" data-bs-toggle="modal" data-bs-target="#edit-campaign" data-url="{{ route('campaign.edit', $campaign->id) }}"><span class="feather icon-edit neg-transition-scale-svg "></span></a>
                                                    &nbsp;@endif
                                                    @if(hasPermission('Modules\Affiliate\Http\Controllers\CampaignController@destroy'))
                                                    <form method="POST" action="{{ route('campaign.delete', $campaign->id) }}" accept-charset="UTF-8" id="delete-language-{{ $campaign->id }}" class="display_inline">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $campaign->id }}">
                                                        <button title="{{ __('Delete') }}" class="btn btn-xs btn-danger" data-id="{{ $campaign->id }}" type="button" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-label="Delete" data-title="{{ __('Delete :x', ['x' => __('Status')]) }}" data-message="{{ __('Are you sure to delete this?') }}">
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

        <div id="add-campaign" class="modal fade display_none bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Add New') }} &nbsp; </h4>
                        <a type="button" class="close h5" data-bs-dismiss="modal">×</a>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('campaign.store') }}" method="post" class="form-horizontal">
                            @csrf

                            <div class="form-group row">
                                <label class="col-sm-3 control-label require" for="inputEmail3">{{ __('Name') }}</label>

                                <div class="col-sm-9">
                                    <input type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" class="form-control name inputFieldDesign" name="name" id="name" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label require" for="inputEmail3">{{ __('Slug') }}</label>

                                <div class="col-sm-9">
                                    <input type="text" id="slug" placeholder="{{ __('Slug') }}" value="{{ old('slug') }}" class="form-control name inputFieldDesign" name="slug" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="inputEmail3">{{ __('Link') }}</label>

                                <div class="col-sm-9">
                                    <input type="text" placeholder="{{ __('Link') }}" value="{{ old('link') }}" class="form-control name inputFieldDesign" name="link">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="inputEmail3">{{ __('Visibility') }}</label>

                                <div class="col-sm-9">
                                    <select class="form-control js-example-basic-single form-height sl_common_bx affiliate_tag" name="visibility[]" multiple>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="inputEmail3">{{ __('Summary') }}</label>

                                <div class="col-sm-9">
                                    <textarea rows="3" class="form-control" name="summary"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="inputEmail3">{{ __('Description') }}</label>

                                <div class="col-sm-9">
                                    <textarea rows="3" class="form-control inputFieldDesign summernote" id="summernote" name="description"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="btn_save" class="col-sm-3 control-label"></label>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn py-2 custom-btn-submit {{ languageDirection() == 'ltr' ? 'float-right' : 'float-left' }}">{{ __('Create') }}</button>
                                    <button type="button" class="py-2 custom-btn-cancel {{ languageDirection() == 'ltr' ? 'float-right me-2' : 'float-left ms-2' }}" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="edit-campaign" class="modal fade display_none bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Edit :x', ['x' => __('Tag')]) }} &nbsp;</h4>
                        <a type="button" class="close h5" data-bs-dismiss="modal">×</a>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('campaign.update') }}" method="post" class="form-horizontal">
                            @csrf
                            <input type="hidden" name="campaign_id" id="campaign_id">
                            <div class="form-group row">
                                <label class="col-sm-3 control-label require" for="inputEmail3">{{ __('Name') }}</label>

                                <div class="col-sm-9">
                                    <input type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" class="form-control name inputFieldDesign" name="name" id="edit_name" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="inputEmail3">{{ __('Link') }}</label>

                                <div class="col-sm-9">
                                    <input type="text" placeholder="{{ __('Link') }}" value="{{ old('link') }}" class="form-control name inputFieldDesign" name="link" id="link">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="inputEmail3">{{ __('Visibility') }}</label>

                                <div class="col-sm-9">
                                    <input type="hidden" value="" name="visibility">
                                    <select class="form-control js-example-basic-single form-height sl_common_bx affiliate_tag" name="visibility[]" id="visibility" multiple>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="inputEmail3">{{ __('Summary') }}</label>

                                <div class="col-sm-9">
                                    <textarea rows="3" class="form-control" name="summary" id="summary"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label" for="inputEmail3">{{ __('Description') }}</label>

                                <div class="col-sm-9">
                                    <textarea rows="3" class="form-control inputFieldDesign summernote" id="edit_summernote" name="description"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="btn_save" class="col-sm-3 control-label"></label>
                                <div class="col-sm-12">
                                    <button type="submit"
                                            class="btn py-2 custom-btn-submit {{ languageDirection() == 'ltr' ? 'float-right' : 'float-left' }}">{{ __('Update') }}</button>
                                    <button type="button"
                                            class="py-2 custom-btn-cancel {{ languageDirection() == 'ltr' ? 'float-right me-2' : 'float-left ms-2' }}"
                                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('mediamanager::image.modal_image')
    </div>
@endsection

@section('js')
    <script src="{{ asset('public/datta-able/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('public/dist/plugins/DataTables-1.10.21/js/jquery.dataTablesCus.min.js') }}"></script>
    <script src="{{ asset('public/dist/plugins/Responsive-2.2.5/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('public/datta-able/plugins/summer-note/summernote-lite.min.js') }}"></script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/js/campaign.min.js') }}"></script>
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
@endsection
