<?php

namespace Modules\NGenius\Processor\Core;

use Modules\NGenius\Processor\Core\Environment;


class SandboxEnvironment extends Environment
{
    /**
     * Type
     *
     * @var string
     */
    public $type = 'sandbox';

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey, $this->baseUrl(), $this->type);
    }

    /**
     * Base URL
     *
     * @return string
     */
    public function baseUrl()
    {
        return "https://api-gateway.sandbox.ngenius-payments.com";
    }
}
