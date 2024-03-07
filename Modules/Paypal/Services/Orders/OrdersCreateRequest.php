<?php

/**
 * @package PayPalCheckoutSdk/Orders
 */

namespace Modules\Paypal\Services\Orders;

use PayPalHttp\HttpRequest;

class OrdersCreateRequest extends HttpRequest
{
    /**
     * Initialization
     *
     * @return void
     */
    function __construct()
    {
        parent::__construct("/v2/checkout/orders?", "POST");
        $this->headers["Content-Type"] = "application/json";
    }

    /**
     * Paypal Partner Attribute Id
     *
     * @param string $payPalPartnerAttributeId
     * @return void
     */
    public function payPalPartnerAttributionId($payPalPartnerAttributionId)
    {
        $this->headers["PayPal-Partner-Attribution-Id"] = $payPalPartnerAttributionId;
    }

    /**
     * Prefer
     *
     * @param string $prefer
     * @return void
     */
    public function prefer($prefer)
    {
        $this->headers["Prefer"] = $prefer;
    }
}
