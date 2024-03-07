<?php

/**
 * @package Khalti view
 * @author TechVillage <support@techvill.org>
 * @contributor Ahammed Imtiaze <[imtiaze.techvill@gmail.com]>
 * @created 05-11-2022
 */

namespace Modules\Khalti\Views;

use Modules\Gateway\Contracts\PaymentViewInterface;
use Modules\Gateway\Services\GatewayHelper;
use Modules\Gateway\Traits\ApiResponse;
use Modules\Khalti\Entities\Khalti;

class KhaltiView implements PaymentViewInterface
{
    use ApiResponse;
    public static function paymentView($key)
    {
        $helper = GatewayHelper::getInstance();
        try {
            $khalti = Khalti::firstWhere('alias', 'khalti')->data;

            return view('khalti::pay', [
                'publicKey' => $khalti->publicKey,
                'instruction' => $khalti->instruction,
                'purchaseData' => $helper->getPurchaseData($key)
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => __('Purchase data not found.')]);
        }
    }

    public static function paymentResponse($key)
    {
        $helper = GatewayHelper::getInstance();

        $khalti = Khalti::firstWhere('alias', 'khalti')->data;
        return [
            'publicKey' => $khalti->publicKey,
            'instruction' => $khalti->instruction,
            'purchaseData' => $helper->getPurchaseData($key)
        ];
    }
}
