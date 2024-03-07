@extends('affiliate::layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('Modules/Affiliate/Resources/assets/css/multi_tier.min.css') }}">
@endsection

@section('page_title', __('Multi Tier'))

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

                            <div class="card-body">

                                {{--Multi tier div--}}
                                @if(isset($user->referralAffiliateUsers) && count($user->referralAffiliateUsers) > 0)
                                    <div class="tree">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)">{{ $user->user?->name }}</a>
                                                @php $childs = $user->referralAffiliateUsers @endphp
                                                <ul>
                                                    @foreach($childs as $child)
                                                    <li>
                                                        <a href="javascript:void(0)">{{ $child->affiliateUser?->user?->name }}</a>
                                                      @php $grandChilds = $child->affiliateUser?->referralAffiliateUsers->whereNotNull('affiliate_user_id') @endphp
                                                        @if(!empty($grandChilds) && count($grandChilds) > 0)
                                                            @include('affiliate::layouts.includes.multi_tier_child', ['grandChilds' => $grandChilds])
                                                        @endif

                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <span>{{ __('There is no child!') }}</span>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
