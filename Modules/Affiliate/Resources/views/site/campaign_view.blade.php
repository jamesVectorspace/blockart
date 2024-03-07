@extends('affiliate::layouts.app')
@section('page_title', __('Campaign'))

@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="affiliate-user-campaign-container">

        <div class="card">
            <div class="card-body row">
                <div class="col-lg-12 col-12 {{ languageDirection() == 'ltr' ? 'ps-0' : 'pe-0' }}">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-0 border-bottom">
                            <h5>{{ __('Campaign') }}</h5>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="card-body p-0">
                                <div class="col-sm-12 p-0">
                                    <p>{{ $campaign->summary }}</p>

                                    <p>{{ __('Link') }}: <span class="bg-gray padding_3">{{ $campaign->link }}</span></p>

                                    <div>
                                        {!! $campaign->description !!}
                                    </div>
                                </div>
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
