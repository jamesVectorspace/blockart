<?php

namespace Modules\Report\Reports;

use Modules\Report\Http\Models\Report;

class WordGenerateReport
{
    /**
     * Word generate report
     *
     * @return array $report
     */
    public static function getReports()
    {
        $res = (new Report)->getWordGenerateReport(request()->customerName, request()->customerEmail);
        $report = [];
        if ($res) {
            foreach ($res as $value) {
                $total = $value->metadata->where('key', 'value')->first()->value;
                $usage = $value->metadata->where('key', 'usage')->first()->value;
                $remaining = $total - $usage;

                if ($total == -1) {
                    $total = __('Unlimited');
                    $remaining = __('Unlimited');
                }

                $report[] = [
                    'name' => $value->user?->name,
                    'email' => $value->user?->email,
                    'total' => $total,
                    'usage' => $usage,
                    'remaining' => $remaining,
                ];
            }

        }

        return $report;
    }

}
