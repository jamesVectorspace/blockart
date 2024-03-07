<?php

namespace Modules\Esewa\Views;

use Modules\Gateway\Contracts\PaymentViewInterface;
use Modules\Gateway\Facades\GatewayHelper;
use Modules\Esewa\Entities\Esewa;
use Modules\Gateway\Traits\ApiResponse;

class EsewaView implements PaymentViewInterface
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
        try {
            $esewa = Esewa::firstWhere('alias', 'esewa')->data;

            return view('esewa::pay', [
                'esewa' => $esewa,
                'instruction' => $esewa->instruction,
                'purchaseData' => GatewayHelper::getPurchaseData($key)
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => __('Purchase data not found.')]);
        }
    }

    /**
     * Payment Response
     *
     * @param string $key
     * @return \Illuminate\Http\RedirectResponse
     */
    public static function paymentResponse($key)
    {
        $esewa = Esewa::firstWhere('alias', 'esewa')->data;
        return [
            'esewa' => $esewa,
            'instruction' => $esewa->instruction,
            'purchaseData' => GatewayHelper::getPurchaseData($key)
        ];
    }
}
