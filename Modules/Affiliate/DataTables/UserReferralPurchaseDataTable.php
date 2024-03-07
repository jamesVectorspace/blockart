<?php

namespace Modules\Affiliate\DataTables;

use App\DataTables\DataTable;
use Illuminate\Http\JsonResponse;
use Modules\Affiliate\Entities\ReferralPurchase;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class UserReferralPurchaseDataTable extends DataTable
{
    protected $userId;
    /*
    * DataTable Ajax
    *
    * @return \Yajra\DataTables\DataTableAbstract|\Yajra\DataTables\DataTables
    */
    public function ajax() : JsonResponse
    {
        $referrals = $this->query();
        return datatables()
            ->of($referrals)

            ->editColumn('date', function ($referrals) {
                return $referrals->format_created_at;
            })
            ->editColumn('subscriptionDetail', function ($referrals) {
                return "#".$referrals->subscriptDetail?->code;
            })
            ->editColumn('commission', function ($referrals) {
                return formatNumber($referrals->commission);
            })
            ->editColumn('customer', function ($referrals) {
                return $referrals->subscriptDetail?->user?->name;
            })
            ->editColumn('status', function ($referrals) {
                if ($referrals->status == 'Approve') {
                    return '<span class="badge theme-bg-active text-white f-12">' . $referrals->status .  '</span>';
                }

                return '<span class="badge theme-bg-pending text-white f-12">' . $referrals->status .  '</span>';
            })
            ->rawColumns(['date', 'subscriptionDetail', 'commission', 'customer', 'status'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query()
    {
        $userId = $this->getUserId();
        $referrals = ReferralPurchase::where('affiliate_user_id', $userId)->with(['subscriptDetail', 'subscriptDetail.user', 'subscriptDetail.user.metas'])->orderBy('id', 'DESC')->get();

        return $this->applyScopes($referrals);
    }

    /*
    * DataTable HTML
    *
    * @return \Yajra\DataTables\Html\Builder
    */
    public function html() : HtmlBuilder
    {
        return $this->builder()
            ->addColumn(['data' => 'date', 'name' => 'date', 'title' => __('Date')])
            ->addColumn(['data' => 'subscriptionDetail', 'name' => 'subscriptionDetail', 'title' => __('Subscription')])
            ->addColumn(['data' => 'commission', 'name' => 'commission', 'title' => __('Commission')])
            ->addColumn(['data' => 'customer', 'name' => 'customer', 'title' => __('Customer')])
            ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status'), 'orderable' => false])
            ->parameters(dataTableOptions());
    }

    public function setUserId($id)
    {
        $this->userId = $id;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
