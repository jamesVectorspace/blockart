@extends('affiliate::layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('Modules/Affiliate/Resources/assets/css/multi_tier.min.css') }}">
@endsection

@section('page_title', __('Networks'))

@section('content')
    <div class="col-sm-12" id="affiliate-profile-container">
        <div class="card">
            <div class="card-body row">
                <div class="col-lg-12 col-12 {{ languageDirection() == 'ltr' ? 'ps-0' : 'pe-0' }}">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-0 border-bottom">
                            <h5>{{ __('Networks') }}</h5>
                        </div>
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
                                                        @if(isset($child->affiliateUser?->user))
                                                        <li>
                                                            <a href="javascript:void(0)">{{ $child->affiliateUser?->user?->name }}</a>
                                                            @php $grandChilds = $child->affiliateUser?->referralAffiliateUsers->whereNotNull('affiliate_user_id') @endphp
                                                            @if(!empty($grandChilds) && count($grandChilds) > 0)
                                                                @include('affiliate::layouts.includes.multi_tier_child', ['grandChilds' => $grandChilds])
                                                            @endif

                                                        </li>
                                                        @endif
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
