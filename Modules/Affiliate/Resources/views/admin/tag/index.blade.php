@extends('affiliate::layouts.app')
@section('page_title', __('Affiliate Tags'))

@section('css')
    {{-- Select2  --}}
    <link rel="stylesheet" href="{{ asset('public/datta-able/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/dist/plugins/Responsive-2.2.5/css/responsive.dataTables.min.css') }}">
@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="affiliate-tag-container">
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
                            <h5>{{ __('Affiliate Tags') }}</h5>
                            @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateTagController@store'))
                            <div class="card-header-right">
                                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#add-tag" class="btn btn-outline-primary custom-btn-small">
                                    <span class="fa fa-plus">
                                        &nbsp</span>{{ __('Add :x', ['x' => __('Tag')]) }}</a>
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
                                                    <th>{{ __('Summary') }}</th>
                                                    @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateTagController@edit') && hasPermission('Modules\Affiliate\Http\Controllers\AffiliateTagController@update') ||
                                                        hasPermission('Modules\Affiliate\Http\Controllers\AffiliateTagController@destroy')
                                                     )
                                                    <th>{{ __('Action') }}</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($tags as $tag)
                                              <tr>
                                                  <td>{{ $tag->name }}</td>
                                                  <td>{{ wrapIt($tag->summary, 10, ['trim' => true, 'trimLength' => 35]) }}</td>
                                                  <td>
                                                         @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateTagController@edit') && hasPermission('Modules\Affiliate\Http\Controllers\AffiliateTagController@update'))
                                                          <a title="{{ __('Edit') }}" href="javascript:void(0)" class="btn btn-xs btn-primary edit_tag" data-bs-toggle="modal" data-bs-target="#edit-tag" data-url="{{ route('tags.edit', $tag->id) }}"><span class="feather icon-edit neg-transition-scale-svg "></span></a>
                                                          &nbsp;
                                                          @endif
                                                      @if(hasPermission('Modules\Affiliate\Http\Controllers\AffiliateTagController@destroy'))
                                                          <form method="POST" action="{{ route('tags.delete', $tag->id) }}" accept-charset="UTF-8" id="delete-language-{{ $tag->id }}" class="display_inline">
                                                              @csrf
                                                              <input type="hidden" name="id" value="{{ $tag->id }}">
                                                              <button title="{{ __('Delete') }}" class="btn btn-xs btn-danger" data-id="{{ $tag->id }}" type="button" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-label="Delete" data-title="{{ __('Delete :x', ['x' => __('Status')]) }}" data-message="{{ __('Are you sure to delete this?') }}">
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

            <div id="add-tag" class="modal fade display_none" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{ __('Add New') }} &nbsp; </h4>
                            <a type="button" class="close h5" data-bs-dismiss="modal">×</a>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('tags.store') }}" method="post" class="form-horizontal">
                                @csrf

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label require" for="inputEmail3">{{ __('Name') }}</label>

                                    <div class="col-sm-6">
                                        <input type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" class="form-control name inputFieldDesign" name="name" id="name" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label require" for="inputEmail3">{{ __('Slug') }}</label>

                                    <div class="col-sm-6">
                                        <input type="text" id="slug" placeholder="{{ __('Slug') }}" value="{{ old('slug') }}" class="form-control name inputFieldDesign" name="slug" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label" for="inputEmail3">{{ __('Summary') }}</label>

                                    <div class="col-sm-6">
                                        <textarea rows="3" class="form-control" name="summary"></textarea>
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

            <div id="edit-tag" class="modal fade display_none" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{ __('Edit :x', ['x' => __('Tag')]) }} &nbsp;</h4>
                            <a type="button" class="close h5" data-bs-dismiss="modal">×</a>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('tags.update') }}" method="post" id="editTax"
                                  class="form-horizontal">
                                @csrf
                                <input type="hidden" name="tag_id" id="tag_id">
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label require" for="inputEmail3">{{ __('Name') }}</label>

                                    <div class="col-sm-6">
                                        <input type="text" placeholder="{{ __('Name') }}" value="{{ old('name') }}" class="form-control name inputFieldDesign" name="name" id="edit_name" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label require" for="inputEmail3">{{ __('Slug') }}</label>

                                    <div class="col-sm-6">
                                        <input type="text" id="edit_slug" placeholder="{{ __('Slug') }}" value="{{ old('slug') }}" class="form-control name inputFieldDesign" name="slug" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label" for="inputEmail3">{{ __('Summary') }}</label>

                                    <div class="col-sm-6">
                                        <textarea rows="3" class="form-control" name="summary" id="summary"></textarea>
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
        </div>
    @endsection

    @section('js')
        <script src="{{ asset('public/datta-able/plugins/select2/js/select2.full.min.js') }}"></script>
        <script src="{{ asset('public/dist/plugins/DataTables-1.10.21/js/jquery.dataTablesCus.min.js') }}"></script>
        <script src="{{ asset('public/dist/plugins/Responsive-2.2.5/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('Modules/Affiliate/Resources/assets/js/affiliate_tag.min.js') }}"></script>
        <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    @endsection
