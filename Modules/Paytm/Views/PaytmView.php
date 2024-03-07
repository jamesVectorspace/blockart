<?php

/**
 * @package PaytmView
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 30-01-2023
 */

namespace Modules\Paytm\Views;

use Modules\Paytm\Entities\Paytm;
use Modules\Gateway\Contracts\PaymentViewInterface;
use Modules\Gateway\Services\GatewayHelper;
use Modules\Gateway\Traits\ApiResponse;

class PaytmView implements PaymentViewInterface
{
    use ApiResponse;

    /**
     * Paytm payment view
     *
     * @param String $key
     * @return view|redirectResponse
     */
    public static function paymentView($key)
    {
        $helper = GatewayHelper::getInstance();
        try {
            $paytm = Paytm::firstWhere('alias', 'paytm')->data;

            return view('paytm::pay', [
                'merchantId' => $paytm->merchantId,
                'merchantKey' => $paytm->merchantKey,
                'merchantWebsite' => $paytm->merchantWebsite,
                'instruction' => $paytm->instruction,
                'purchaseData' => $helper->getPurchaseData($key)
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => __('Purchase data not found.')]);
        }
    }

    /**
     * Paytm payment response
     *
     * @param String $key
     * @return Array
     */
    public static function paymentResponse($key)
    {
        $helper = GatewayHelper::getInstance();

        $paytm = Paytm::firstWhere('alias', 'paytm')->data;
        return [
            'merchantId' => $paytm->merchantId,
            'merchantKey' => $paytm->merchantKey,
            'merchantWebsite' => $paytm->merchantWebsite,
            'instruction' => $paytm->instruction,
            'purchaseData' => $helper->getPurchaseData($key)
        ];
    }
}
