<?php

/**
 * @package Iyzico Martvill
 * @author Md. Mostafijur Rahman <mostafijur.techvill@gmail.ocm>
 * @created 05-09-2023
 */

namespace Modules\Iyzico\Views;

use Modules\Iyzico\Entities\Iyzico;
use Modules\Gateway\Contracts\PaymentViewInterface;
use Modules\Gateway\Services\GatewayHelper;
use Modules\Gateway\Traits\ApiResponse;

class IyzicoView implements PaymentViewInterface
{
    use ApiResponse;

    /**
     * Iyzico payment view
     *
     * @param String $key
     * @return view|redirectResponse
     */
    public static function paymentView($key)
    {
        $helper = GatewayHelper::getInstance();

        try {
            $iyzico = Iyzico::firstWhere('alias', 'iyzico')->data;

            return view('iyzico::pay', [
                'apiKey' => $iyzico->apiKey, 
                'secretKey' => $iyzico->secretKey, 
                'sandbox' => $iyzico->sandbox, 
                'instruction' => $iyzico->instruction, 
                'purchaseData' => $helper->getPurchaseData($key)
            ]);

        } catch (\Exception $e) {
            return back()->withErrors(['error' => __('Purchase data not found.')]);
        }
    }

    /**
     * Iyzico payment response
     *
     * @param String $key
     * @return Array
     */
    public static function paymentResponse($key)
    {
        $helper = GatewayHelper::getInstance();
        $iyzico = Iyzico::firstWhere('alias', 'iyzico')->data;
        
        return [
            'apiKey' => $iyzico->apiKey, 
            'secretKey' => $iyzico->secretKey, 
            'instruction' => $iyzico->instruction, 
            'sandbox' => $iyzico->sandbox, 
            'purchaseData' => $helper->getPurchaseData($key)
        ];
    }
}
