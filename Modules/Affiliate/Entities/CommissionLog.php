<?php

namespace Modules\Affiliate\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Refund\Entities\Refund;

class CommissionLog extends Model
{
    protected $fillable = ['package_id', 'package_subscription_id', 'data'];

    /**
     * tag store
     *
     * @param $request
     * @return bool
     */
    public static function store($logs = [], $subscriptionDetails)
    {
        $formattedData = [];
        if (is_array($logs) && count($logs) > 0) {
            foreach ($logs as $packageId => $data) {

                $formattedData[] = [
                   'package_id' => $packageId,
                   'package_subscription_id' =>  $subscriptionDetails->package_subscription_id, 
                   'subscription_detail_id' =>  $subscriptionDetails->id,
                   'data' => json_encode($data),
                ];
            }

            if (parent::insert($formattedData)) {
                return true;
            }
        }

        return false;
    }
}
