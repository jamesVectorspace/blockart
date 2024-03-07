<?php

/**
 * @package PayPalCheckoutSdk/Core
 */

namespace Modules\Paypal\Services\Core;


class AccessToken
{
    /**
     * Token
     *
     * @var string
     */
    public $token;

    /**
     * Token Type
     *
     * @var string
     */
    public $tokenType;

    /**
     * Expires in
     *
     * @var string
     */
    public $expiresIn;

    /**
     * Create Date
     *
     * @var string
     */
    private $createDate;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct($token, $tokenType, $expiresIn)
    {
        $this->token = $token;
        $this->tokenType = $tokenType;
        $this->expiresIn = $expiresIn;
        $this->createDate = time();
    }

    /**
     * Is Expired
     *
     * @return void
     */
    public function isExpired()
    {
        return time() >= $this->createDate + $this->expiresIn;
    }
}
