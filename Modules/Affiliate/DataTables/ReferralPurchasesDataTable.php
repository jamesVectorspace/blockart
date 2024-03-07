<?php
/**
 * @package ReferralPurchasesDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 23-08-2023
 */
namespace Modules\Affiliate\DataTables;

use App\DataTables\DataTable;
use Illuminate\Http\JsonResponse;
use Modules\Affiliate\Entities\ReferralPurchase;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class ReferralPurchasesDataTable extends DataTable
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
                if (!empty($referrals->subscription_detail_id)) {
                    return '<a href="' . route('package.subscription.invoice', ['id' => $referrals->subscription_detail_id]) . '">' . "#".$referrals->subscriptDetail?->code . '</a>' . "&nbsp;&nbsp;" . statusBadges($referrals->subscriptDetail?->payment_status) . "&nbsp;&nbsp;" . formatNumber($referrals->subscriptDetail?->amount_billed);
                }
                return '<a href="javascript:void(0)">' . "#".$referrals->subscriptDetail?->code . '</a>' . "&nbsp;&nbsp;" . statusBadges($referrals->subscriptDetail?->payment_status) . "&nbsp;&nbsp;" . formatNumber($referrals->subscriptDetail?->amount_billed);
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
        $referrals = ReferralPurchase::where('affiliate_user_id', $userId)->with(['subscriptDetail', 'subscriptDetail.user', 'subscriptDetail.user.metas'])->get();

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
