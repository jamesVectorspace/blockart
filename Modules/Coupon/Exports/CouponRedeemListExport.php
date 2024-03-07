<?php
/**
 * @package Coupon Redeem Export
 * @author TechVillage <support@techvill.org>
 * @contributor Al Mamun <[almamun.techvill@gmail.com]>
 * @created 28-11-2021
 */

namespace Modules\Coupon\Exports;

use Modules\Coupon\Http\Models\CouponRedeem;
use Maatwebsite\Excel\Concerns\{
    FromCollection,
    WithHeadings,
    WithMapping
};

class CouponRedeemListExport implements FromCollection,WithHeadings, WithMapping
{
    /**
     * [Here we need to fetch data from data source]
     * @return [Database Object] [Here we are fetching data from Coupon Redeem table]
     */
    public function collection()
    {
        return CouponRedeem::with('plan:id,name', 'user:id,name')->orderByDesc('id')->get();
    }

    /**
     * [Here we are putting Headings of The CSV]
     * @return [array] [Excel Headings]
     */
    public function headings(): array
    {
        return[
            'Coupon',
            'User',
            'Plan',
            'Discount Amount',
            'Status',
            'Created'
        ];
    }
    /**
     * [By adding WithMapping you map the data that needs to be added as row. This way you have control over the actual source for each column. In case of using the Eloquent query builder]
     * @param [object] $couponRedeemList [It has coupon_redeems table info]
     * @return [array]            [comma separated value will be produced]
     */
    public function map($couponRedeemList): array
    {
        return[
            $couponRedeemList->coupon_code,
            $couponRedeemList->user?->name,
            $couponRedeemList->plan?->name,
            $couponRedeemList->discount_amount,
            $couponRedeemList->status,
            $couponRedeemList->created_at,
        ];
    }
}
