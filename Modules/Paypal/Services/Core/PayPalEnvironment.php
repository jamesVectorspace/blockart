<?php

/**
 * @package PayPalCheckoutSdk/Core
 */

namespace Modules\Paypal\Services\Core;

use PayPalHttp\Environment;

abstract class PayPalEnvironment implements Environment
{
    /**
     * Client Id
     *
     * @var string
     */
    private $clientId;

    /**
     * Client Secret
     *
     * @var string
     */
    private $clientSecret;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct($clientId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * Authorization String
     *
     * @return string
     */
    public function authorizationString()
    {
        return base64_encode($this->clientId . ":" . $this->clientSecret);
    }
}
