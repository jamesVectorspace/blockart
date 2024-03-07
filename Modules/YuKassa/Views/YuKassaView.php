<?php

/**
 * @package YuKassaView
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 21-11-2023
 */

namespace Modules\YuKassa\Views;

use Modules\Gateway\Contracts\PaymentViewInterface;
use Modules\Gateway\Services\GatewayHelper;
use Modules\Gateway\Traits\ApiResponse;
use Modules\YuKassa\Entities\YuKassa;

class YuKassaView implements PaymentViewInterface
{
    use ApiResponse;

    /**
     * Payment View
     *
     * @param string $key
     * @return \Illuminate\Contracts\View\View
     */
    public static function paymentView($key)
    {
        $helper = GatewayHelper::getInstance();
        try {
            $yukassa = YuKassa::firstWhere('alias', moduleConfig('yukassa.alias'))->data;

            return view('yukassa::pay', [
                'secretKey' => $yukassa->secretKey,
                'instruction' => $yukassa->instruction,
                'purchaseData' => $helper->getPurchaseData($key)
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => __('Purchase data not found.')]);
        }
    }

    /**
     * Payment Response
     *
     * @param string $key
     * @return array
     */
    public static function paymentResponse($key)
    {
        $helper = GatewayHelper::getInstance();

        $yukassa = YuKassa::firstWhere('alias', moduleConfig('yukassa.alias'))->data;
        return [
            'secretKey' => $yukassa->secretKey,
            'instruction' => $yukassa->instruction,
            'purchaseData' => $helper->getPurchaseData($key)
        ];
    }
}
