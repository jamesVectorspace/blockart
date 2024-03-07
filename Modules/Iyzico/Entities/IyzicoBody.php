<?php

/**
 * @package Iyzico Martvill
 * @author Md. Mostafijur Rahman <mostafijur.techvill@gmail.ocm>
 * @created 05-09-2023
 */
namespace Modules\Iyzico\Entities;

use Modules\Gateway\Entities\GatewayBody;

class IyzicoBody extends GatewayBody

{

    /**
     * Iyzico api key
     *
     * @var string
     */
    public $apiKey;

    /**
     * Iyzico secret key
     *
     * @var string
     */
    public $secretKey;

    /**
     * Iyzico payment instruction 
     *
     * @var String
     */
    public $instruction;

    /**
     * Iyzico payment active status
     *
     * @var bool
     */
    public $status;

    /**
     * Iyzico payment mode status
     *
     * @var bool
     */
    public $sandbox;


    /**
     * Constructor for Iyzico body 
     */
    public function __construct($request)
    {
        $this->apiKey = $request->apiKey;
        $this->secretKey = $request->secretKey;
        $this->instruction = $request->instruction;
        $this->sandbox = $request->sandbox;
        $this->status = $request->status;
    }
}

