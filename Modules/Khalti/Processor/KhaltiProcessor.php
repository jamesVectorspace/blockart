<?php

/**
 * @package KhaltiProcessor
 * @author TechVillage <support@techvill.org>
 * @contributor Md Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @contributor Ahammed Imtiaze <[imtiaze.techvill@gmail.com]>
 * @created 14-2-22
 * @updated 04-09-23
 */

namespace Modules\Khalti\Processor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\Gateway\Contracts\{
    PaymentProcessorInterface,
    RequiresCallbackInterface
};
use Modules\Gateway\Services\GatewayHelper;
use Modules\Khalti\Entities\Khalti;
use Modules\Khalti\Response\KhaltiResponse;

class KhaltiProcessor implements PaymentProcessorInterface, RequiresCallbackInterface
{
    /**
     * Khalti credentials
     */
    private $khalti;

    /**
     * Gateway helper
     */
    private $helper;

    /**
     * Customer name
     */
    private $name;

    /**
     * Customer email
     */
    private $email;

    /**
     * Customer phone number
     */
    private $phone;

    /**
     * Purchase data
     */
    private $purchaseData;

    /**
     * Redirect url
     */
    private $returnUrl;

    /**
     * Payload data
     */
    private $payload;

    /**
     * payment gateway url
     */
    private $url = 'https://a.khalti.com/api/v2/';

    /**
     * Constructor for khalti processor
     * 
     * @return void
     */
    public function __construct()
    {
        $this->helper = GatewayHelper::getInstance();
    }

    /**
     * Setup initials data
     *
     * @return void
     */
    private function setupData()
    {
        $this->purchaseData = $this->helper->getPurchaseData($this->helper->getPaymentCode());
        $this->khalti = Khalti::firstWhere('alias', moduleConfig('khalti.alias'))->data;
        $this->returnUrl  = route('gateway.callback', ['gateway' => moduleConfig('khalti.alias')]);

        $this->setEnvironment();
    }

    public function pay($request)
    {
        $this->validateRequest($request);

        $this->name = $request->name;
        $this->email = $request->email;
        $this->phone = $request->phone;

        $this->setupData();

        if (strtoupper($this->purchaseData->currency_code) != 'NPR') {
            throw new \Exception(__('Currency not supported by merchant'));
        }

        $this->setPayload();

        $initialPayUrl = $this->url . 'epayment/initiate/';
        $header = $this->getHeader();

        $response = $this->callToApi($this->payload, $initialPayUrl, $header);

        $transaction = json_decode($response, true);

        if (isset($transaction["customer_info"])) {
            $errorMessage = is_array($transaction['customer_info'])
                ? reset($transaction['customer_info'])[0]
                : reset($transaction['customer_info']);
            throw new \Exception(__("Customer Info Error: :x", ['x' => $errorMessage]));
        } elseif (isset($transaction["error_key"])) {
            $errorMessage = is_array($transaction)
            ? reset($transaction)[0]
            : reset($transaction);
            throw new \Exception(__("Payment Error: :x", ['x' => $errorMessage]));
        }

        $this->setTransactionSession($transaction);

        Cache::put($this->purchaseData->code, request()->only(['to', 'payer', 'code', 'integrity']), 3600);

        return redirect($transaction['payment_url']);
    }


    /**
     * Validate request data.
     */
    private function validateRequest($request)
    {
        $requiredFields = ['email', 'name', 'phone'];

        foreach ($requiredFields as $field) {
            if (empty($request->$field)) {
                throw new \Exception(__(':x is required.', ['x' => ucfirst($field)]));
            }
        }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception(__('Invalid email address'));
        }
    }


    /**
     * Set transaction session for reference
     *
     * @param Array|mixed $transaction
     * @return void
     */
    private function setTransactionSession($transaction)
    {
        session([
            $this->helper->getPaymentCode() . '-khalti-pidx' => $transaction['pidx']
        ]);
    }


    /**
     * Validate Transaction
     *
     * @param Request $request
     * @return KhaltiResponse
     */
    public function validateTransaction(Request $request)
    {
        
        if ($request->pidx <> session($this->helper->getPaymentCode() . '-khalti-pidx')) {
            throw new \Exception(__('Validation Failed.'));
        }

        $queryData = $request->only('status', 'idx', 'token', 'bank_reference', 'amount', 'mobile', 'transaction_id', 'tidx', 'total_amount', 'purchase_order_id', 'purchase_order_name', 'pidx');

        if (!Cache::has($request->purchase_order_name)) {
            throw new \Exception('Purchase data not found.');
        }

        request()->query->add(Cache::get($request->purchase_order_name));
        Cache::forget($queryData['purchase_order_name']);
        $this->setupData();

        return new KhaltiResponse($this->purchaseData, $queryData);
    }

    /**
     * Cancel Payment
     *
     * @param object $request
     * @return void
     */
    public function cancel($request)
    {
        throw new \Exception(__('Payment cancelled from khalti payment gateway.'));
    }

    /**
     * Setup the payload values
     */
    private function setPayload(): void
    {
        $this->payload = [
            "return_url" => $this->returnUrl,
            "website_url" => config('app.url'),
            "amount" => round($this->purchaseData->total * 100, 0),
            "purchase_order_id" => $this->purchaseData->code,
            "purchase_order_name" => $this->purchaseData->code,

            "customer_info" => [
                "name" => $this->name,
                "email" => $this->email,
                "phone" => $this->phone,
            ]
        ];
    }


    /**
     * Set environment
     */
    private function setEnvironment(): void
    {
        if (!$this->khalti->sandbox) {
            $this->setProduction();
        }
    }

    /**
     * Set production environment
     */
    private function setProduction(): void
    {
        $this->setUrl('https://khalti.com/api/v2/');
    }


    /**
     * Set url
     */
    private function setUrl($url): void
    {
        $this->url = $url;
    }


    /**
     * Set curl authorization header
     */
    private function getHeader(): array
    {
        return [
            'Authorization: key ' . $this->khalti->secretKey,
            'Content-Type: application/json',
        ];
    }

    /**
     * Call API
     * @param $payload
     * @param bool $setLocalhost
     * @param array $header
     * @return bool|string
     */
    public function callToApi($payload, $url, $header)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => $header,
        ));

        $response = curl_exec($curl);

        $err = curl_error($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $curlErrorNo = curl_errno($curl);

        curl_close($curl);

        if ($code == 200) {
            return $response;
        }

        throw new \Exception(__('Failed to connect with khalti pay.'));
    }
}
