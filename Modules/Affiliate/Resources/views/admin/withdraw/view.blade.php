@extends('affiliate::layouts.app')
@section('page_title', __('Withdraw'))

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
                            <form action="{{ route('affiliate.users.withdrawals_view', $withdrawInfo->id) }}" method="post" class="form-horizontal">
                                @csrf
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-md-7 border col-12 p-3">
                                            <div class="form-group row mt-25">
                                                <div class="col-sm-4 font-bold text-left">{{ __('Affiliate User') }} : </div>
                                                <div class="col-sm-8">
                                                    {{ $withdrawInfo->affiliateUser?->user?->name }}
                                                </div>
                                            </div>

                                            <div class="form-group row mt-25">
                                                <div class="col-sm-4 font-bold text-left">{{ __('Payment Method') }} : </div>
                                                <div class="col-sm-8">
                                                    {{ optional($withdrawInfo->withdrawalsMethod)->method_name }}
                                                </div>
                                            </div>

                                            @php
                                                $userId = $withdrawInfo->affiliateUser?->user_id;
                                                $params = (array) json_decode(\Modules\Affiliate\Entities\UserWithdrawalSetting::where('user_id', $userId)->where('withdrawal_method_id', $withdrawInfo->withdrawal_method_id)->first()->param);
                                            @endphp
                                            @foreach ($params as $key => $value)
                                                <div class="form-group row mt-25">
                                                    <div class="col-sm-4 font-bold text-left">{{ str_replace("_", " ", ucfirst($key)) }} : </div>
                                                    <div class="col-sm-8">
                                                        {{ $value }}
                                                    </div>
                                                </div>
                                            @endforeach

                                            @if(!empty($withdrawInfo->note))
                                            <div class="form-group row mt-25">
                                                <div class="col-sm-4 font-bold text-left">{{ __('Note') }} : </div>
                                                <div class="col-sm-8">
                                                    {{ $withdrawInfo->note }}
                                                </div>
                                            </div>
                                            @endif

                                            <div class="form-group row mt-25">
                                                <div class="col-sm-4 font-bold text-left">{{ __('Withdraw Amount') }} : </div>
                                                <div class="col-sm-8">
                                                    {{ formatNumber($withdrawInfo->amount) }}
                                                </div>
                                            </div>

                                            <div class="form-group row mt-25">
                                                <div class="col-sm-4 font-bold text-left">{{ __('Withdraw Amount') }} : </div>
                                                <div class="col-sm-8">
                                                    @if($withdrawInfo->status == 'pending')
                                                    <select class="form-control select2" name="status">
                                                        <option value="pending">{{ __('Pending') }}</option>
                                                        <option value="accepted">{{ __('Accepted') }}</option>
                                                        <option value="rejected">{{ __('Rejected') }}</option>
                                                    </select>
                                                    @else
                                                        {{ ucfirst($withdrawInfo->status) }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @if($withdrawInfo->status == 'pending')
                                        <div class="col-md-5 col-12">
                                            <div class="border p-2">
                                                <div class="row mt-2">
                                                    <div class="col-5 text-right font-bold">{{ __('Total Commission') }}</div>
                                                    <div class="col-7">{{ formatNumber($withdrawInfo->affiliateUser?->net_commission) }}</div>
                                                </div>
                                                <div class="row mt-2">
                                                    <div class="col-5 text-right font-bold">{{ __('Withdraw Amount') }}</div>
                                                    <div class="col-7">{{ formatNumber($withdrawInfo->amount) }}</div>
                                                </div>
                                                <hr>
                                                <div class="row mt-2">
                                                    <div class="col-5 text-right font-bold">{{ __('Total') }}</div>
                                                    <div class="col-7">{{ formatNumber($withdrawInfo->affiliateUser?->net_commission - $withdrawInfo->amount) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    @if($withdrawInfo->status == 'pending')
                                    <div class="card-footer p-0">
                                        <div class="form-group row">
                                            <label for="btn_save" class="col-sm-3 control-label"></label>
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn form-submit custom-btn-submit {{ languageDirection() == 'ltr' ? 'float-right' : 'float-left' }}"
                                                        id="footer-btn">
                                                    {{ __('Update') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

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
@endsection
