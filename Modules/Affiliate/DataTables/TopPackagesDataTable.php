<?php
/**
 * @package TopProductsDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 23-08-2023
 */
namespace Modules\Affiliate\DataTables;

use App\DataTables\DataTable;
use Illuminate\Http\JsonResponse;
use Modules\Affiliate\Entities\Referral;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class TopPackagesDataTable extends DataTable
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

            ->editColumn('package', function ($referrals) {
                if (isset($referrals->package)) {
                    return $referrals->package->name;
                } elseif (isset($referrals->credit)) {
                    return $referrals->credit->name;
                }

                return null;
            })
            ->editColumn('type', function ($referrals) {
                if (isset($referrals->package)) {
                    return __('Billing cycle');
                } elseif (isset($referrals->credit)) {
                    return __('One Time');
                }
                
                return null;
            })
            ->editColumn('total_purchase', function ($referrals) {
                return formatCurrencyAmount($referrals->total_purchase);
            })
            ->editColumn('sales', function ($referrals) {
                return formatNumber($referrals->sales_amount);
            })
            ->rawColumns(['package', 'total_purchase', 'sales'])
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
        $referrals = Referral::where('affiliate_user_id', $userId)->whereNotNull('package_id')->where('sales_amount', '>', '0')->orwhereNotNull('credit_id')->where('affiliate_user_id', $userId)->where('sales_amount', '>', '0')->orderBy('sales_amount', 'DESC')->with('package', 'credit')->get();

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
            ->addColumn(['data' => 'package', 'name' => 'package', 'title' => __('Package')])
            ->addColumn(['data' => 'type', 'name' => 'type', 'title' => __('Type'), 'searchable' => false])
            ->addColumn(['data' => 'total_purchase', 'name' => 'total_purchase', 'title' => __('Total Purchase')])
            ->addColumn(['data' => 'sales', 'name' => 'sales', 'title' => __('Sales')])
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
