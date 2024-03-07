<?php

/**
 * @package PayPalCheckoutSdk/Core
 */

namespace Modules\Paypal\Services\Core;

use PayPalHttp\HttpClient;

class PayPalHttpClient extends HttpClient
{
    /**
     * Refresh Token
     *
     * @var string
     */
    private $refreshToken;

    /**
     * Auth Injector
     *
     * @var string
     */
    public $authInjector;

    /**
     * Initialization
     *
     * @return void
     */
    public function __construct(PayPalEnvironment $environment, $refreshToken = NULL)
    {
        parent::__construct($environment);
        $this->refreshToken = $refreshToken;
        $this->authInjector = new AuthorizationInjector($this, $environment, $refreshToken);
        $this->addInjector($this->authInjector);
        $this->addInjector(new GzipInjector());
        $this->addInjector(new FPTIInstrumentationInjector());
    }

    /**
     * User Agent
     *
     * @return string
     */
    public function userAgent()
    {
        return UserAgent::getValue();
    }
}
