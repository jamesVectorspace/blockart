<?php

/**
 * @package MtnMomoView
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 13-02-2023
 */

namespace Modules\MtnMomo\Views;

use Modules\MtnMomo\Entities\MtnMomo;
use Modules\Gateway\Contracts\PaymentViewInterface;
use Modules\Gateway\Services\GatewayHelper;
use Modules\Gateway\Traits\ApiResponse;

class MtnMomoView implements PaymentViewInterface
{
    use ApiResponse;
    public static function paymentView($key)
    {
        $helper = GatewayHelper::getInstance();
        try {
            $mtnmomo = Mtnmomo::firstWhere('alias', 'mtnmomo')->data;

            return view('mtnmomo::pay', [
                'userApiKey' => $mtnmomo->userApiKey,
                'ocpApimSubscriptionKey' => $mtnmomo->ocpApimSubscriptionKey,
                'instruction' => $mtnmomo->instruction,
                'purchaseData' => $helper->getPurchaseData($key)
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => __('This payment method is not available at this moment.')]);
        }
    }
}
