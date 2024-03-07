<?php

/**
 * @package StripeRecurringView
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 02-04-2023
 */

namespace Modules\StripeRecurring\Views;

use Modules\Gateway\Contracts\PaymentViewInterface;
use Modules\Gateway\Services\GatewayHelper;
use Modules\Gateway\Traits\ApiResponse;
use Modules\StripeRecurring\Entities\StripeRecurring;

class StripeRecurringView implements PaymentViewInterface
{
    use ApiResponse;

    /**
     * Stripe recurring payment view
     *
     * @param string $key
     * @return view|redirectResponse
     */
    public static function paymentView($key)
    {
        $helper = GatewayHelper::getInstance();
        try {
            $stripeRecurring = StripeRecurring::firstWhere('alias', 'striperecurring')->data;

            return view('striperecurring::pay', [
                'publishableKey' => $stripeRecurring->publishableKey,
                'instruction' => $stripeRecurring->instruction,
                'purchaseData' => $helper->getPurchaseData($key)
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => __('Purchase data not found.')]);
        }
    }

    /**
     * Stripe recurring payment response
     *
     * @param string $key
     * @return array
     */
    public static function paymentResponse($key)
    {
        $helper = GatewayHelper::getInstance();

        $stripeRecurring = StripeRecurring::firstWhere('alias', 'striperecurring')->data;
        return [
            'publishableKey' => $stripeRecurring->publishableKey,
            'instruction' => $stripeRecurring->instruction,
            'purchaseData' => $helper->getPurchaseData($key)
        ];
    }
}
