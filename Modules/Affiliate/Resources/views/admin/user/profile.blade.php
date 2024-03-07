@extends('affiliate::layouts.app')

@section('page_title', __('Profile'))

@section('content')
    <div class="col-sm-12" id="affiliate-profile-container">
        <div class="card">

            @include('affiliate::layouts.includes.affiliate_user_header')

            <div class="card-body row">
                <div class="col-lg-3 col-12 z-index-10 {{ languageDirection() == 'ltr' ? 'ps-md-3 pe-0 ps-0' : 'pe-md-3 ps-0 pe-0' }}">
                    @include('affiliate::layouts.includes.affiliate_user_menu')
                </div>
                <div class="col-lg-9 col-12 {{ languageDirection() == 'ltr' ? 'ps-0' : 'pe-0' }}">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-block table-border-style">
                            <form action="{{ route('affiliate.users.profileUpdate', $user->id) }}" method="POST" id="submitForm" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div id="fb-render"></div>
                                    <label class="fb-textarea-label">{{ __('Tag') }}</label>
                                    <select name="tags[]" multiple class="form-control select2">
                                        @foreach($affiliateTags as $tags)
                                            <option value="{{ $tags->id }}" @selected(in_array($tags->id, $user->affiliateTags->pluck('affiliate_tag_id')->toArray()))>{{ $tags->name }}</option>
                                        @endforeach
                                    </select>
                                    <br><br>

                                    @if($user->isAllowLifeTimeCustomer())

                                        <label class="fb-textarea-label">{{ __('Lifetime Customers') }}</label>
                                        <select name="life_time_customers[]" class="form-control" multiple id="life_time_customers">
                                            @foreach($lifeTimeCustomers as $customer)
                                                <option value="{{ $customer->user_id }}" selected>{{ $customer->user?->name }}</option>
                                            @endforeach
                                        </select>
                                        <br><br>

                                    @endif


                                    <label class="fb-textarea-label">{{ __('Status') }}</label>
                                    <select name="status" class="form-control">
                                        <option value="Active" @selected($user->status == 'Active')>{{ __('Active') }}</option>
                                        <option value="Inactive" @selected($user->status == 'Inactive')>{{ __('Inactive') }}</option>
                                        <option value="Pending" @selected($user->status == 'Pending')>{{ __('Pending') }}</option>
                                    </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn py-2 custom-btn-submit">{{ __('Update') }}</button>
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
        window._form_builder_content = {!! json_encode($user?->form?->form_builder_json) !!}
    </script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/form/js/render-form.min.js') }}" defer></script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/js/user_profile.min.js') }}"></script>
@endsection
