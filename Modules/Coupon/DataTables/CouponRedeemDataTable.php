<?php
/**
 * @package CouponRedeemDataTable
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 28-11-2021
 */

namespace Modules\Coupon\DataTables;

use App\DataTables\DataTable;
use Modules\Coupon\Http\Models\CouponRedeem;
use Illuminate\Http\JsonResponse;

class CouponRedeemDataTable extends DataTable
{
    /*
    * DataTable HTML
    *
    * @return \Yajra\DataTables\Html\Builder
    */
    public function ajax(): JsonResponse
    {
        $redeem = $this->query();
        return datatables()
            ->of($redeem)

            ->editColumn('coupon', function ($redeem) {
                if (is_null($redeem->coupon)) {
                    return wrapIt($redeem->coupon_code, 10, ['columns' => 3]);
                }
                return '<a target="_blank" href="' . route('coupon.edit', ['id' => $redeem->coupon_id]) . '">' . wrapIt($redeem->coupon_code, 10, ['columns' => 3]) . '</a>';
            })->editColumn('user', function ($redeem) {
                if (is_null($redeem->user)) {
                    return wrapIt(__('Guest'), 10, ['columns' => 3]);
                }
                return '<a target="_blank" href="' . route('users.edit', ['id' => $redeem->user_id]) . '">' . wrapIt($redeem->user_name, 10, ['columns' => 3]) . '</a>';
            })->editColumn('package', function ($redeem) {
                return wrapIt($redeem->plan?->name ?? __('Onetime'), 10, ['columns' => 3]);
            })->editColumn('discount_amount', function ($redeem) {
                return formatNumber($redeem->discount_amount);
            })->addColumn('created_at', function ($redeem) {
                return $redeem->format_created_at;
            })->addColumn('status', function ($redeem) {
                return statusBadges(lcfirst($redeem->status));
            })

            ->rawColumns(['coupon', 'user', 'package', 'discount_amount', 'status'])
            ->make(true);
    }

    /*
    * DataTable Query
    *
    * @return mixed
    */
    public function query()
    {
        $couponRedeems = CouponRedeem::select('*')->with(['user:id,name', 'coupon:id,name', 'plan:id,name'])->filter();
        
        return $this->applyScopes($couponRedeems);
    }

    /*
    * DataTable HTML
    *
    * @return \Yajra\DataTables\Html\Builder
    */
    public function html()
    {
        return $this->builder()

        ->addColumn(['data' => 'id', 'name' => 'id', 'title' => __('Id'), 'visible' => false])
        ->addColumn(['data' => 'coupon', 'name' => 'coupon_code', 'title' => __('Coupon')])
        ->addColumn(['data' => 'user', 'name' => 'user_name', 'title' => __('Customer')])
        ->addColumn(['data' => 'package', 'name' => 'plan.name', 'title' => __('Package')])
        ->addColumn(['data' => 'discount_amount', 'name' => 'discount_amount', 'title' => __('Discount Amount')])
        ->addColumn(['data' => 'status', 'name' => 'status', 'title' => __('Status')])
        ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => __('Created at')])

        ->parameters(dataTableOptions());
    }
}
