<?php

namespace Modules\Report\Reports;

use Modules\Report\Http\Models\Report;

class SubscriptionReport
{
    /**
     * Coupon Report
     * @param object $request
     * @return array $response
     */
    public static function getReports()
    {
        $res = (new Report)->getSubscriptionReport(request()->from, request()->to, request()->subscriptionCode);
        $report = [];
        if ($res) {
            foreach ($res as $value) {
                $report[] = [
                    'name' => $value->name,
                    'code' => $value->code,
                    'order' => formatCurrencyAmount($value->package_count),
                    'total' => formatNumber($value->package_bill)
                ];
            }

            return $report;
        }
    }
}
