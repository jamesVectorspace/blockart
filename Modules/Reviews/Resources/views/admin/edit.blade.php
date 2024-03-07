@extends('admin.layouts.app')
@section('page_title', __('Edit :x', ['x' => __('Review')]))
@section('css')
    <link rel="stylesheet" href="{{ asset('Modules/Reviews/Resources/assets/css/review.min.css') }}">
@endsection
@section('content')
    <div class="col-sm-12" id="page-container" data-val="edit">
        <div class="card">
            <div class="card-header">
                <h5><a href="{{ route('admin.review') }}">{{ __('Review') }}</a> >> {{ __('Edit') }}</h5>
            </div>
            <div class="card-body px-3" id="no_shadow_on_card">
                <div class="col-sm-12 m-t-20 form-tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link font-bold active text-uppercase" id="home-tab" data-bs-toggle="tab" href="#home"
                                role="tab" aria-controls="home"
                                aria-selected="true">{{ __(':x Information', ['x' => __('Review')]) }}</a>
                        </li>
                    </ul>
                    <form action='{{ route('admin.review.update', ['id' => $review->id]) }}' method="post" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="col-sm-12 tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <input type="hidden" value="{{ $review->id }}" name="id" id="token">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="form-group row">
                                            <label for="title"
                                                class="col-sm-2 col-form-label require pe-0">{{ __('Title') }}
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="text" placeholder="{{ __('Title') }}"
                                                    class="form-control inputFieldDesign" id="title" name="title"
                                                    required maxlength="191"
                                                    value="{{ !empty(old('title')) ? old('title') : $review->title }}"
                                                    oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="comments"
                                                class="col-sm-2 col-form-label require pe-0">{{ __('Comments') }}
                                            </label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="5" maxlength="1000" name="comments" id="comments" required>{{ $review->comments }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="layout"
                                                class="col-sm-2 col-form-label require pr-0">{{ __('User') }}
                                            </label>
                                            <div class="col-sm-10">
                                                <select class="form-control sl_common_bx select2" id="user_id" name="user_id" required>
                                                    <option value="">{{ __('Select One') }}</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}" {{ $user->id == $review->user_id ? 'selected' : '' }}>
                                                            {{ $user->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="rating"
                                                class="col-sm-2 col-form-label require pr-0">{{ __('Rating') }}
                                            </label>
                                            
                                            <div class="col-sm-10 stars mt-md-2">
                                                <div> 
                                                    @for ($i=1; $i<=5; $i++)
                                                        <i id="rating-{{$i}}" class="fa fa-star {{ $i <= $review->rating  ? 'fa-star-beach' : 'icon-light-gray' }} icon-click"></i>
                                                    @endfor
                                                </div>
                                                <input type="hidden" name="rating" id="rating" value="{{ $review->rating }}">
                                            </div>
                                        </div>
                                        <div class="form-group row mt-1 mb-1">
                                            <label for="Status"
                                                class="col-sm-2 col-form-label require">{{ __('Status') }}</label>
                                            <div class="col-sm-10 s margin-top-6">
                                                <input type="hidden" name="status" value="Inactive">
                                                <div class="switch switch-bg d-inline m-r-10">
                                                    <input class="status" type="checkbox" value="Active" name="status"
                                                        id="is_private" {{ $review->status == 'Active' ? 'checked' : '' }}>
                                                    <label for="is_private" class="cr"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-4 pb-2">
                                <a href="{{ route('admin.review') }}"
                                    class="btn all-cancel-btn custom-btn-cancel">{{ __('Cancel') }}</a>
                                <button class="btn custom-btn-submit" type="submit"
                                    id="btnSubmit">{{ __('Update') }}</button>
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
    <script src="{{ asset('public/dist/js/custom/validation.min.js') }}"></script>
    <script src="{{ asset('Modules/Reviews/Resources/assets/js/review.min.js') }}"></script>
    <script src="{{ asset('Modules/Reviews/Resources/assets/js/rating.min.js') }}"></script>
@endsection
