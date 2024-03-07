<?php

/**
 * @package PayPalCheckoutSdk/Orders
 */

namespace Modules\Paypal\Services\Orders;

use PayPalHttp\HttpRequest;

class OrdersCaptureRequest extends HttpRequest
{
    /**
     * Initialization
     *
     * @return void
     */
    function __construct($orderId)
    {
        parent::__construct("/v2/checkout/orders/{order_id}/capture?", "POST");

        $this->path = str_replace("{order_id}", urlencode($orderId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }

    /**
     * PayPal Client Meta Data Id
     *
     * @param string $payPalClientMEtadataId
     * @return void
     */
    public function payPalClientMetadataId($payPalClientMetadataId)
    {
        $this->headers["PayPal-Client-Metadata-Id"] = $payPalClientMetadataId;
    }

    /**
     * PayPal Request Id
     *
     * @param string $payPalRequestId
     * @return void
     */
    public function payPalRequestId($payPalRequestId)
    {
        $this->headers["PayPal-Request-Id"] = $payPalRequestId;
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
