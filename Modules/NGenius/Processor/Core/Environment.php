<?php

namespace Modules\NGenius\Processor\Core;

use Modules\NGenius\Processor\Core\AccessTokenRequest;
use Modules\NGenius\Processor\Core\EnvironmentInterface;


abstract class Environment implements EnvironmentInterface
{
    /**
     * API Key
     *
     * @var string
     */
    protected $api_key;

    /**
     * Base URL
     *
     * @var string
     */
    public $base_url;

    /**
     * Environment Type
     *
     * @var string
     */
    public $env_type;

    /**
     * Access Token
     *
     * @var string
     */
    protected $access_token;

    /**
     * Expire In
     *
     * @var string
     */
    protected $expires_in;

    /**
     * Refresh Expire In
     *
     * @var string
     */
    protected $refresh_expires_in;

    /**
     * Token Type
     *
     * @var string
     */
    protected $token_type;

    /**
     * Constructor
     *
     * @param string $apiKey
     * @param string $baseUrl
     * @param string $type
     * @return void
     */
    public function __construct(string $apiKey, string $baseUrl, string $type)
    {
        $this->api_key = $apiKey;
        $this->base_url = $baseUrl;
        $this->env_type = $type;
        $this->fetchResponse();
    }

    /**
     * Fetch Response
     *
     * @return void
     */
    protected function fetchResponse()
    {
        $response = (new AccessTokenRequest($this->api_key, $this->base_url, $this->env_type))->getApiResponse();

        $this->access_token = $response['access_token'];
        $this->expires_in = $response['expires_in'];
        $this->refresh_expires_in = $response['refresh_expires_in'];
        $this->token_type = $response['token_type'];
    }

    /**
     * Get Access Token
     *
     * @return string
     */
    public function getAccessToken()
    {
         return $this->access_token;
    }
}
