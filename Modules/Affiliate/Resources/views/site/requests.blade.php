@extends('affiliate::layouts.app')
@section('page_title', __('Requests'))

@section('css')
@endsection

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="affiliate-withdraw-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-3 col-12 z-index-10 {{ languageDirection() == 'ltr' ? 'ps-md-3 pe-0 ps-0' : 'pe-md-3 ps-0 pe-0' }}">
                    @include('affiliate::layouts.includes.user_withdrawls_sub_menu')
                </div>
                <div class="col-lg-9 col-12 {{ languageDirection() == 'ltr' ? 'ps-0' : 'pe-0' }}">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-0 border-bottom">
                            <h5>{{ __('Requests') }}</h5>
                        </div>
                        <div class="card-block table-border-style">
                            @if(count($userMethod) > 0)
                            <form action="{{ route('site.affiliate.requests') }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="card-body p-0">

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left require" for="amount">{{ __('Payment Method') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <select class="form-control select2-hide-search sl_common_bx" id="payment_method" name="withdrawal_method_id" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')"> >
                                                <option value="">{{ __('Select One') }}</option>
                                                @foreach ($methods as $method)
                                                    @if(isset($method->withdrawalSetting))
                                                     <option {{ $method->withdrawalSetting?->is_default ? 'selected' : '' }} value="{{ $method->id }}">{{ $method->method_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left require" for="amount">{{ __('Withdraw Amount') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <div class="mt-2">
                                                <div><input type="number" class="form-control inputFieldDesign" name="amount" required oninvalid="this.setCustomValidity('{{ __('This field is required.') }}')" step="any"></div>
                                                <p>{{ __('You can withdraw your commission not more than :x', ['x' => formatCurrencyAmount($maxAmount)]) }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label text-left" for="note">{{ __('Note') }}</label>
                                        <div class="col-sm-6 form-group flex-wrap">
                                            <textarea class="form-control" rows="3" name="note"></textarea>
                                        </div>
                                    </div>

                                    <div class="card-footer p-0">
                                        <div class="form-group row">
                                            <label for="btn_save" class="col-sm-3 control-label"></label>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn form-submit custom-btn-submit {{ languageDirection() == 'ltr' ? 'float-right' : 'float-left' }}"
                                                        id="footer-btn">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                                <p>{{ __('Please Configure payout first') }}..</p>
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
@endsection
