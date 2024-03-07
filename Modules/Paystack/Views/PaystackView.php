<?php

/**
 * @package PaystackView
 * @author TechVillage <support@techvill.org>
 * @contributor Muhammad AR Zihad <[zihad.techvill@gmail.com]>
 * @created 14-2-22
 */

namespace Modules\Paystack\Views;

use Modules\Gateway\Contracts\PaymentViewInterface;
use Modules\Gateway\Services\GatewayHelper;
use Modules\Paystack\Entities\Paystack;

class PaystackView implements PaymentViewInterface
{
    /**
     * Payment view for pay stack
     *
     * @param String $key
     * @return void
     */
    public static function paymentView($key)
    {
        $helper = GatewayHelper::getInstance();
        try {
            $paystack = Paystack::first()->data;
            return view('paystack::pay', [
                'instruction' => $paystack->instruction,
                'purchaseData' => $helper->getPurchaseData($key)
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => __('Purchase data not found.')]);
        }
    }
}
