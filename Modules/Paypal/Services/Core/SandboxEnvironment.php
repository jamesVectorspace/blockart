<?php

/**
 * @package PayPalCheckoutSdk/Core
 */

namespace Modules\Paypal\Services\Core;

class SandboxEnvironment extends PayPalEnvironment
{
    /**
     * Initialization
     *
     * @return void
     */
    public function __construct($clientId, $clientSecret)
    {
        parent::__construct($clientId, $clientSecret);
    }

    /**
     * Base URL
     *
     * @return string
     */
    public function baseUrl()
    {
        return "https://api-m.sandbox.paypal.com";
    }
}
