@extends('affiliate::layouts.app')
@section('page_title', __('Profile'))

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="affiliate-user-profile-container">

        <div class="col-md-12 no-print notification-msg-bar smoothly-hide">
            <div class="noti-alert pad">
                <div class="alert bg-dark text-light m-0 text-center">
                    <span class="notification-msg"></span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body row">
                <div class="col-lg-12 col-12 {{ languageDirection() == 'ltr' ? 'ps-0' : 'pe-0' }}">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-0 border-bottom">
                            <h5>{{ __('Profile') }}</h5>
                        </div>
                        <div class="card-block table-border-style">
                            <form action="#" method="post" class="form-horizontal" id="affiliate_setting_form">
                                @csrf
                                <div class="card-body p-0">
                                    @foreach ($formHeaders as $header)
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{!! ucwords($header['label']) !!}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <span>{{ $affiliateUser->renderEntryContent($header['name'], $header['type']) }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                    @if(preference('affiliate_identifier') == 1)
                                        <div class="form-group row">
                                            <div class="align-items-center mt-12p permalink-section close-parent d-md-flex flex-wrap">
                                                <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Your affiliate identifier is') }}  </label> &nbsp;
                                                <input class="border-0 edit-input bg-white edit-permalink customs-permalink" type="text" id="identifier" disabled value="{{ $affiliateUser->getIdentifier() }}" />
                                                <a class="options-add px-2 t-10-res {{ languageDirection() == 'ltr' ? 'ms-1' : 'me-1' }} f-12 edit-button bg-white">
                                                    {{ __('Edit') }}
                                                </a>
                                                <a class="btn-add save-button save-permalink">{{ __('Ok') }}</a>
                                                <a class="cancel-button {{ languageDirection() == 'ltr' ? 'ms-2' : 'me-2' }} cursor-pointer border-b-2c">{{ __('Cancel') }}</a>
                                                &nbsp;&nbsp;<span>{{ __('You can change above identifier to anything like your name, brand name.') }}</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group row">
                                            <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Your affiliate identifier is') }}  </label>
                                            <div class="col-sm-6 form-group flex-wrap">
                                                {{ $affiliateUser->getIdentifier() }}

                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Your referral URL is') }}  </label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <a href="javascript:void(0)" class="referralURL"> {{ route('frontend.index') }}/?{{ \Modules\Affiliate\Entities\Referral::getReferenceKey() }}=<span class="updateIdentifier">{{ $affiliateUser->getIdentifier() }}</span> </a>

                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="file_size">{{ __('Referral URL generator') }}  </label>
                                        <div class="col-sm-9 form-group flex-wrap">
                                            {{ __('Page URL') }} :  {{ route('frontend.index') }}/<input type="text" class="bg-white pathType">?{{ \Modules\Affiliate\Entities\Referral::getReferenceKey() }}=<span class="updateIdentifier">{{ $affiliateUser->getIdentifier() }}</span>
                                            <br><br>
                                            <div class="mt-2">
                                                {{ __('Referral URL') }} :  <a href="javascript:void(0)" class="referralURL">{{ route('frontend.index') }}<span class="pathPaste"></span>?{{ \Modules\Affiliate\Entities\Referral::getReferenceKey() }}=<span class="updateIdentifier">{{ $affiliateUser->getIdentifier() }}</span></a>
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
    <script>
        var identifierUrl = '{{ route('site.affiliate.changeIdentifier') }}';
    </script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/js/user_profile.min.js') }}"></script>
@endsection
