<?php

/**
 * @package Paypal recurring
 * @author techvillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 25-05-23
 */

namespace Modules\PaypalRecurring\Services;

use App\Models\User;
use Modules\Subscription\Entities\{
    PackageMeta,
    PackageSubscription,
    PackageSubscriptionMeta,
    SubscriptionDetails
};

class Paypal
{
    /**
     * @var array
     */
    protected $requestHeaders;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var array|object
     */
    protected $paypalCredentials;

    /**
     * @var array|object
     */
    protected $purchaseData;

    /**
     * @var array|object
     */
    protected $accessToken;

    /**
     * @var string
     */
    protected $cancelUrl;

    /**
     * @var string
     */
    protected $redirectUrl;

    /**
     * @var array
     */
    private $planInterval = ['days' => 'DAY', 'weekly' => 'WEEK', 'monthly' => 'MONTH', 'yearly' => 'YEAR'];

    /**
     * Constructor for paypal.
     *
     * @param [type] $paypalCredentials
     */
    public function __construct(array|object $paypalCredentials, array|object $purchaseData)
    {
        $this->paypalCredentials = $paypalCredentials;
        $this->purchaseData = $purchaseData;
        $this->setEnvironment();
        $this->accessToken = $this->accessTokenRequest();
        $this->redirectUrl = route('gateway.callback', ['gateway' => 'paypalrecurring']);
        $this->cancelUrl = route('gateway.cancel', withOldQueryIntegrity(['gateway' => 'paypalrecurring']));
    }


    /**
     * Set environment
     *
     * @return void
     */
    private function setEnvironment()
    {
        if (!$this->paypalCredentials->sandbox) {
            $this->baseUrl = 'https://api.paypal.com/v1/';
        }

        $this->baseUrl = 'https://api-m.sandbox.paypal.com/v1/';
    }


    /**
     * Set Urls
     *
     * @return void
     */
    private function setUrl(string $url = '')
    {
        $this->baseUrl = $url;
    }

    /**
     * Request for access token
     *
     * @return array|object
     */
    public function accessTokenRequest()
    {
        $url = $this->baseUrl . 'oauth2/token';
        $headers['Content-Type'] = 'application/x-www-form-urlencoded';
        $body = [
            "grant_type" => "client_credentials"
        ];
        return $this->accessTokenCurl($url, $body, $headers);
    }

    /**
     * Product create for paypal
     *
     * @return array|object
     */
    public function productCreate(array|object $package): mixed
    {
        $this->setHeader();
        $url = $this->baseUrl . 'catalogs/products';
        $payload = $this->setProductPayload($package);
        $response = $this->sendRequest($url, 'POST', $payload, $this->requestHeaders);

        if (!$response?->id) {
            throw new \Exception(__('Something is wrong with Paypal. Please try again.'));
        }

        $meta[] = [
            'package_id' => $package->id,
            'feature' =>  '',
            'key' => 'paypal_product_id',
            'value' => $response->id
        ];
        PackageMeta::upsert($meta, ['package_id', 'key']);
        return $response;
    }

    /**
     * Request for plan create
     *
     * @return void
     */
    public function createPlan(array|object $package, string $productId):mixed
    {
        $planPayload = $this->setPlanPayload($package, $package->duration, $productId);
        $url = $this->baseUrl . 'billing/plans';
        $plan = $this->sendRequest($url, 'POST', $planPayload, $this->requestHeaders);

         $meta[] = [
            'package_id' => $package->id,
            'feature' =>  '',
            'key' => 'paypal_plan_id',
            'value' => $plan->id
        ];
        PackageMeta::upsert($meta, ['package_id', 'key']);

        return $plan;
    }

    /**
     * Request for create subscription url
     *
     * @param string|integer $planId
     * @return mixed
     */
    public function createSubscriptionUrl(string|int $planId):mixed
    {
        if (!$this->purchaseData?->sending_details?->user_id) {
            throw new \Exception(__('Something is wrong with Paypal Recurring. Please try again.'));
        }

        $user = $this->getUser($this->purchaseData?->sending_details?->user_id);

        $planPayload = $this->setSubscriptionPayload($planId, $user);
        $url = $this->baseUrl . 'billing/subscriptions';
        $response = $this->sendRequest($url, 'POST', $planPayload, $this->requestHeaders);

        if (!$response?->id) {
            throw new \Exception(__('Something is wrong with Paypal. Please try again.'));
        }

        $subscription = PackageSubscription::where('code', $this->purchaseData?->sending_details?->code)->first();
        $meta[] = [
             'package_subscription_id' => $subscription->id,
             'key' => 'paypal_subscription_id',
             'value' => $response->id
        ];
        PackageSubscriptionMeta::upsert($meta, ['package_subscription_id', 'key']);

        return $response;
    }

    /**
     * Set header
     *
     * @return void
     */
    public function setHeader()
    {
        if (!$this->accessToken?->access_token) {
           throw new \Exception(__("Something is wrong with Paypal. Please try again."));
        }

        $this->requestHeaders[] = 'Authorization: Bearer ' . $this->accessToken->access_token;
        $this->requestHeaders[] = 'Content-Type: application/json';
        $this->requestHeaders[] = 'Prefer: return=representation';
    }

    /**
     * Send request by curl
     *
     * @param string $url
     * @param string $method
     * @param array $data
     * @param array $headers
     * @return $response
     */
    function sendRequest($url, $method, $data = [], $headers = [], $setLocalhost = true)
    {
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $url);

        // Set the local or live mode
        if (!$setLocalhost) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        } else {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        }

        // Set the request method (GET or POST)
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));

        // Set the request data for POST requests
        if ($method === 'POST') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        // Set additional headers
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        // Return the response instead of outputting it directly
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the request
        $response = curl_exec($ch);

        $err = curl_error($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err = curl_error($ch);


        // Check for errors
        if (curl_errno($ch)) {
            $error = curl_error($ch);
            // Handle the error
        }

        // Close the cURL session
        curl_close($ch);

        return json_decode($response);
    }

    /**
     * Access Token CURL
     *
     * @return mixed
     */
    public function accessTokenCurl(string $url, array|object $data, array $headers)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        curl_setopt($ch, CURLOPT_USERPWD, $this->paypalCredentials->clientId . ':' . $this->paypalCredentials->secretKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        $err = curl_error($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $err = curl_error($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return json_decode($result);
    }

    /**
     * Set plan payload
     *
     * @param array|object $package
     * @param string $productId
     * @return array
     */
    public function setPlanPayload(array|object $package, $packageIntervalCount = 1, string $productId):array
    {
        $payload = [
            "product_id" => $productId,
            "name" => $package->name,
            "status" => "ACTIVE",
            "billing_cycles" => [
                [
                    "frequency" => [
                        "interval_unit" => $this->planInterval[$this->purchaseData?->sending_details?->billing_cycle],
                        "interval_count" => $packageIntervalCount ?? 1
                    ],
                    "tenure_type" => "REGULAR",
                    "sequence" => $package->trial_day ? 2 : 1,
                    "total_cycles" => 0,
                    "pricing_scheme" => [
                        "fixed_price" => [
                            "value" => strval(round($this->calculatePrice($package), 2)),
                            "currency_code" => $this->purchaseData->currency_code
                        ]
                    ]
                ]
            ],
            "payment_preferences" => [
                "auto_bill_outstanding" => true,
            ]
        ];

        if ($package->trial_day) {
            $this->addTrialDay($payload, $package);
        }

        return $payload;
    }

    /**
     *  Set product payload
     *
     * @param array|object $package
     * @return array
     */
    public function setProductPayload(array|object $package):array
    {
        return [
            "name" => $package->name,
            "type" => "SERVICE"
        ];
    }

    /**
     * Set subscription payload
     *
     * @param string|integer $planId
     * @param array|object $subscriptionData
     * @param array|object $user
     * @return array
     */
    public function setSubscriptionPayload(string|int $planId, array|object $user):array
    {
        return [
            "plan_id" => $planId,
            "subscriber" => [
                "name" => [
                    "given_name" => $user->name,
                ],
                "email_address" => $user->email,
            ],
            "application_context" => [
                "brand_name" => moduleConfig('gateway.app_name'),
                "shipping_preference" => "NO_SHIPPING",
                "user_action" => "SUBSCRIBE_NOW",
                "return_url" => $this->redirectUrl,
                "cancel_url" => $this->cancelUrl
            ]
        ];
    }

    /**
     * Get user
     *
     * @param string|integer $userId
     * @return mixed
     */
    public function getUser(string|int $userId):mixed
    {
        return User::find($userId);
    }

    /**
     * Add trial day.
     *
     * @param array $payload
     * @param object $package
     * @return void
     */
    private function addTrialDay(&$payload, $package): void
    {
        array_unshift($payload['billing_cycles'], [
            "frequency" => [
                "interval_unit" => 'DAY',
                "interval_count" => $package->trial_day
            ],
            "tenure_type" => "TRIAL",
            "sequence" => 1,
            "total_cycles" => 1,
        ]);
    }

    private function calculatePrice($package)
    {
        $price = $package->sale_price[$this->purchaseData?->sending_details?->billing_cycle];

        if (!is_null($package->discount_price[$this->purchaseData?->sending_details?->billing_cycle]) || $package->discount_price[$this->purchaseData?->sending_details?->billing_cycle] != 0) {
            $price = $package->discount_price[$this->purchaseData?->sending_details?->billing_cycle];
        }


        $couponAmount = SubscriptionDetails::where('code', $this->purchaseData?->sending_details?->code)
        ->latest('created_at')
        ->withSum('couponRedeem', 'discount_amount')
        ->first();

        if ($couponAmount) {
            return $price - $couponAmount->coupon_redeem_sum_discount_amount;
        }

        return $price;
    }
}
