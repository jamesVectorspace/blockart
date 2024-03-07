@extends('affiliate::layouts.app')
@section('page_title', __('Campaigns'))
@section('css')
    <link rel="stylesheet" href="{{ asset('public/dist/plugins/Responsive-2.2.5/css/responsive.dataTables.min.css') }}">
@endsection
@section('content')
    <!-- Main content -->
    <div class="col-sm-12" id="affiliate-user-campaign-container">

        <div class="card">
            <div class="card-body row">
                <div class="col-lg-12 col-12 {{ languageDirection() == 'ltr' ? 'ps-0' : 'pe-0' }}">
                    <div class="card card-info shadow-none mb-0">
                        <div class="card-header p-t-0 border-bottom">
                            <h5>{{ __('Campaigns') }}</h5>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="card-body p-0">
                                <div class="col-sm-12 p-0">
                                     <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-main" id="dataTableBuilder">
                                            <thead>
                                            <tr>
                                                <th scope="col">{{ __('Name') }}</th>
                                                <th scope="col">{{ __('Summary') }}</th>
                                                <th scope="col">{{ __('Link') }}</th>
                                                <th scope="col">{{ __('View') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($campaigns as $key => $campaign)
                                                <tr>
                                                    <td>
                                                        <label class="control-label">{{ $campaign->name }}</label>
                                                    </td>
                                                    <td>
                                                        <label class="control-label" title="{{ $campaign->summary }}">{{ wrapIt($campaign->summary, 10, ['trim' => true, 'trimLength' => 35]) }}</label>
                                                    </td>
                                                    <td>
                                                        <label class="control-label">{{ $campaign->link }}</label>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('site.affiliate.campaign_view', $campaign->slug) }}" class="text-dark cursor_pointer action-btn justify-content-center">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td class="text-center" colspan="4">{{ __('No Campaign found.') }}</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
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
    <script src="{{ asset('public/dist/plugins/DataTables-1.10.21/js/jquery.dataTablesCus.min.js') }}"></script>
    <script src="{{ asset('public/dist/plugins/Responsive-2.2.5/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('Modules/Affiliate/Resources/assets/js/campaign.min.js') }}"></script>
@endsection
