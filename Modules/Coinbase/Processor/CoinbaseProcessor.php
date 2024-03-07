<?php


namespace Modules\Coinbase\Processor;

use Modules\Gateway\Contracts\RequiresWebHookValidationInterface;
use Illuminate\Http\Request;
use Modules\Coinbase\Entities\Coinbase;
use Modules\Coinbase\Response\CoinbaseResponse;
use Modules\Gateway\Contracts\PaymentProcessorInterface;
use Modules\Gateway\Contracts\RequiresCallbackInterface;
use Modules\Gateway\Contracts\RequiresCancelInterface;
use Modules\Gateway\Facades\GatewayHelper;

class CoinbaseProcessor implements PaymentProcessorInterface, RequiresCallbackInterface, RequiresCancelInterface
{
    /**
     * Pay
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector
     */
    public function pay($request)
    {
        $coinbase = Coinbase::first()->data;
        $purchaseData = GatewayHelper::getPurchaseData(GatewayHelper::getPaymentCode());
        $data = [
            "local_price" => [
                "amount" => $purchaseData->total,
                "currency" => $purchaseData->currency_code
            ],
            "pricing_type" => "fixed_price",
            "name" => moduleConfig('gateway.app_name'),
            "redirect_url" => route(moduleConfig('gateway.payment_callback'), withOldQueryIntegrity(['gateway' => 'coinbase'])),
            "cancel_url" => route(moduleConfig('gateway.payment_cancel'), withOldQueryIntegrity(['gateway' => 'coinbase']))
        ];
        $helper = new CoinbaseHelper($coinbase->apiKey);
        $coinResponse = $helper->setRequestData($data)->charge();

        if (!isset($coinResponse->hosted_url)) {
            throw new \Exception(__('Please try again, Coinbase payment connection fail.'));
        }

        return redirect($coinResponse->hosted_url);
    }

    /**
     * Validate Transaction
     *
     * @param Request $request
     * @return response
     */
    public function validateTransaction(Request $request)
    {
        $response = new CoinbaseResponse([], []);
        $response->setPaymentStatus('Pending');
        $response->setUniqueCode(techDecrypt(request()->code));
        return $response;
    }

    /**
     * Cancel
     *
     * @param Request $request
     * @return void
     */
    public function cancel($request)
    {
        throw new \Exception(__('Payment got cancelled.'));
    }

    /**
     * Validate payment
     *
     * @param Request $request
     * @return bool
     */
    public function validatePayment($request)
    {
        $response  = $request->getContent();
        $response = json_decode($response, true);
        info('webhook:'[$response]);
        paymentLog($request);
        paymentLog($response);

        try {
            $response  = $request->getContent();
            $response = json_decode($response, true);
            \Log::info("coinbase Commerce Webhook");
            \Log::info($response);
            if (isset($response['event']['type']) && isset($response['event']['data']['id']) && $response['event']['type'] == "charge:confirmed") {
                $payment = PaymentLog::uniqueCode($request->custom)->first();
                if (!$payment) {
                    paymentLog($request);
                    paymentLog('------ Payment data with the requested coinbase unique code ("field: custom") -------');
                    return false;
                }
                $payment->response_raw = json_encode($request->getContent());
                $payment->status = 'completed';
                $payment->store();
                return true;
            }
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }
        return false;
    }
}
