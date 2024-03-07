<?php

namespace Modules\Coinpayment\Entities;


class CoinpaymentBody
{
    /**
     * Merchant Id
     *
     * @var string
     */
    public $merchantId;

    /**
     * Private Key
     *
     * @var string
     */
    public $privateKey;

    /**
     * Public Key
     *
     * @var string
     */
    public $publicKey;

    /**
     * Currencies
     *
     * @var array
     */
    public $currencies = [];

    /**
     * Instruction
     *
     * @var string
     */
    public $instruction;

    /**
     * Status
     *
     * @var string
     */
    public $status;

    /**
     * Sandbox
     *
     * @var int|string
     */
    public $sandbox;

    /**
     * Coin Payment Body Constructor
     *
     * @param Request $request
     * @return void
     */
    public function __construct($request)
    {
        $this->merchantId = $request->merchantId;
        $this->privateKey = $request->privateKey;
        $this->publicKey = $request->publicKey;
        $this->currencies = $request->currencies;
        $this->instruction = $request->instruction;
        $this->sandbox = $request->sandbox;
        $this->status = $request->status;
    }
}
