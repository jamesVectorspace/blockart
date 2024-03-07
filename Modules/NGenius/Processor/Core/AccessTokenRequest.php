<?php

namespace Modules\NGenius\Processor\Core;


class AccessTokenRequest
{
    /**
     * API Key
     *
     * @var string
     */
    private $apiKey;

    /**
     * Base URL
     *
     * @var string
     */
    private $baseUrl;

    /**
     * Environment Type
     *
     * @var string
     */
    private $envType;

    /**
     * Constructor
     *
     * @param string $api_key
     * @param string $base_url
     * @param string $env_type
     * @return void
     */
    public function __construct(string $api_key, string $base_url, string $env_type)
    {
        $this->apiKey = $api_key;
        $this->baseUrl = $base_url;
        $this->envType = $env_type;
    }

    /**
     * Get API Response
     *
     * @return mixed
     */
    public function getApiResponse()
    {
        $url = $this->baseUrl . '/identity/auth/access-token';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        # It is important to keep no spaces here in header when concatenating
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "accept: application/vnd.ni-identity.v1+json",
            "authorization: Basic ".$this->apiKey,
            "content-type: application/vnd.ni-identity.v1+json"
        ));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"realmName\": \"ni\"}");

        # Disabling SSL verification in sandbox mode
        if ($this->envType === 'sandbox') {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }

        $response = json_decode(curl_exec($ch), true);
        return $response;
    }
}
