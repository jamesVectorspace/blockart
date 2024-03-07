<?php

/**
 * @package PayPalCheckoutSdk/Core
 */

namespace Modules\Paypal\Services\Core;

use PayPalHttp\HttpRequest;
use PayPalHttp\Injector;
use PayPalHttp\HttpClient;

class AuthorizationInjector implements Injector
{
    /**
     * Client
     *
     * @var object
     */
    private $client;

    /**
     * Environment
     *
     * @var string
     */
    private $environment;

    /**
     * Refresh Token
     *
     * @var string
     */
    private $refreshToken;

    /**
     * Access Token
     *
     * @var string
     */
    public $accessToken;

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct(HttpClient $client, PayPalEnvironment $environment, $refreshToken)
    {
        $this->client = $client;
        $this->environment = $environment;
        $this->refreshToken = $refreshToken;
    }

    /**
     * Inject
     *
     * @param array $request
     * @return void
     */
    public function inject($request)
    {
        if (!$this->hasAuthHeader($request) && !$this->isAuthRequest($request)) {
            if (is_null($this->accessToken) || $this->accessToken->isExpired()) {
                $this->accessToken = $this->fetchAccessToken();
            }
            $request->headers['Authorization'] = 'Bearer ' . $this->accessToken->token;
        }
    }

    /**
     * Fetch Access Token
     *
     * @return string
     */
    private function fetchAccessToken()
    {
        $accessTokenResponse = $this->client->execute(new AccessTokenRequest($this->environment, $this->refreshToken));
        $accessToken = $accessTokenResponse->result;
        return new AccessToken($accessToken->access_token, $accessToken->token_type, $accessToken->expires_in);
    }

    /**
     * Is Auth Request
     *
     * @param array $request
     * @return bool
     */
    private function isAuthRequest($request)
    {
        return $request instanceof AccessTokenRequest || $request instanceof RefreshTokenRequest;
    }

    /**
     * Has Auth Header
     *
     * @param HttpRequest $request
     * @return bool
     */
    private function hasAuthHeader(HttpRequest $request)
    {
        return array_key_exists("Authorization", $request->headers);
    }
}
