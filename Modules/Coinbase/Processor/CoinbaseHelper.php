<?php

namespace Modules\Coinbase\Processor;


class CoinbaseHelper
{
    /**
     * Api Key
     *
     * @var string
     */
    private $apiKey;

    /**
     * Change URL
     *
     * @var string
     */
    private $chargeUrl = 'https://api.commerce.coinbase.com/charges';

    /**
     * Coinbase Helper Constructor
     *
     * @param string $key
     * @return void
     */
    public function __construct($key)
    {
        $this->apiKey = $key;
    }

    /**
     * Charge
     *
     * @return mixed
     */
    public function charge()
    {
        return $this->curl($this->chargeUrl, 'POST');
    }

    /**
     * Curl Request
     *
     * @param string $url
     * @param string|null $method
     * @return mixed
     */
    public function curl($url, $method = null)
    {
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $this->data,
            CURLOPT_HTTPHEADER => $this->getCurlHeader(),
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        if ($err) {
            throw new \Exception($err);
        }

        return json_decode($response)->data;
    }

    /**
     * Get Curl Header
     *
     * @return array
     */
    public function getCurlHeader()
    {
        return [
            "Accept: application/json",
            "Content-Type: application/json",
            "X-CC-Version: 2018-03-22",
            'X-CC-Api-Key: ' . $this->apiKey,
        ];
    }

    /**
     * Set Request data
     *
     * @param array|string $data
     * @return $this
     */
    public function setRequestData($data)
    {
        $this->data = json_encode($data);
        return $this;
    }
}
