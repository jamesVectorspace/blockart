@if(auth()->user()->roles()->first()->slug == 'admin' || hasPermission('Modules\Affiliate\Http\Controllers\AffiliateController@dashboard'))
<div class="card-header p-t-0 border-bottom">
    <div class="row align-items-center justify-content-center ml-16p">
        <div class="col-auto">
            <img class="img-fluid rounded-circle" style="width:40px;" src="{{ $user->user?->fileUrl() }}" alt="dashboard-user">
        </div>
        <div class="col">
            <h4>{{ $user->user?->name }}</h4>
            <span><i class="fas fa-link f-18 m-r-5"></i> {{ __('Referral link') }} : <a href="javascript:void(0)" class="font-bold bg-gray padding_3 referral_link">{{ route('frontend.index') }}/?{{ \Modules\Affiliate\Entities\Referral::getReferenceKey() }}=<span class="updateIdentifier">{{ $user->getIdentifier() }}</span></a></span>
        </div>
    </div>
    <br>
    <div class="row ml-16p">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-donate f-30 text-c-yellow rides-icon neg-transition-scale-svg "></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ formatNumber($dashboard['TotalSalesAmount']) }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">
                                                  {{ __('Total Sales') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-donate f-30 text-c-yellow rides-icon neg-transition-scale-svg "></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ formatNumber($dashboard['netCommission']) }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">
                                                  {{ __('Net Commission') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-donate f-30 text-c-yellow rides-icon neg-transition-scale-svg "></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ formatNumber($dashboard['grossCommission']) }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">
                                                  {{ __('Gross Commission') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <i class="fas fa-donate f-30 text-c-yellow rides-icon neg-transition-scale-svg "></i>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ formatNumber($dashboard['totalPaid']) }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">
                                               {{ __('Total Paid') }} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <span class="f-30 text-c-yellow neg-transition-scale-svg "><i class="fas fa-users"></i></span>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ $dashboard['totalVisitor'] }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">
                                                {{ __('Total Visitor') }}
                                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card">
                <div class="card-block">
                    <div class="row d-flex align-items-center">
                        <div class="col-auto">
                            <span class="wallet-symbol f-30 text-c-yellow neg-transition-scale-svg "><i class="fas fa-user-circle"></i></span>
                        </div>
                        <div class="col">
                            <h3 class="font-weight-500">
                                {{ $dashboard['totalCustomer'] }}
                                <small class="ml-2 f-20 text-success">&#8734;</small>
                            </h3>
                            <span class="d-block text-uppercase font-weight-600 c-gray-5">
                                                 {{ __('Total Customer') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
