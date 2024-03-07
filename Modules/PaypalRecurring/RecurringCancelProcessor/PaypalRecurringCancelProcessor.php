<?php

/**
 * @package Paypal Recurring Processor
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 11-06-23
 */

namespace Modules\PaypalRecurring\RecurringCancelProcessor;

use Modules\Gateway\Contracts\RecurringCancelInterface;
use Modules\PaypalRecurring\Entities\PaypalRecurring;

class PaypalRecurringCancelProcessor implements RecurringCancelInterface
{
  /**
   * @var array
   */
  protected $requestHeaders;

  /**
   * @var string
   */
  protected $baseUrl;

  /**
   * @var array|object
   */
  protected $paypalCredentials;

  /**
   * @var array|object
   */
  protected $accessToken;

  /**
   * Constructor for paypal.
   *
   * @return void
   */
  public function __construct()
  {
    $this->paypalCredentials = PaypalRecurring::firstWhere('alias', 'paypalrecurring')->data;
    $this->setEnvironment();
    $this->accessToken = $this->accessTokenRequest();
    $this->setHeader();
  }

  public function execute(string $subscriptionId, string $customerId = null)
  {
    $planPayload = $this->setPayload();
    $url = $this->baseUrl . 'billing/subscriptions/'. $subscriptionId .'/cancel';
    $response = $this->sendRequest($url, 'POST', $planPayload, $this->requestHeaders);
    return [
      'status' => $response['status_code'] == 204 ? 'success' : 'failed',
      'raw_response' => $response
    ];
  }


  /**
   * Set environment
   *
   * @return void
   */
  private function setEnvironment()
  {
    if (!$this->paypalCredentials->sandbox) {
      $this->baseUrl = 'https://api.paypal.com/v1/';
    }

    $this->baseUrl = 'https://api-m.sandbox.paypal.com/v1/';
  }


  /**
   * Create authorization string
   *
   * @return string
   */
  public function authorizationString()
  {
    return base64_encode($this->paypalCredentials->clientId . ":" . $this->paypalCredentials->secretKey);
  }

  /**
   * Request for access token
   *
   * @return array|object
   */
  public function accessTokenRequest()
  {
    $url = $this->baseUrl . 'oauth2/token';
    $headers['Content-Type'] = 'application/x-www-form-urlencoded';
    $body = [
      "grant_type" => "client_credentials"
    ];
    return $this->accessTokenCurl($url, $body, $headers);
  }

  /**
   * Set header 
   *
   * @return void
   */
  public function setHeader()
  {
    $this->requestHeaders[] = 'Authorization: Bearer ' . $this->accessToken->access_token;
    $this->requestHeaders[] = 'Content-Type: application/json';
  }

  /**
   * Send request by curl
   *
   * @param string $url
   * @param string $method
   * @param array $data
   * @param array $headers
   * @return $response
   */
  function sendRequest($url, $method, $data = [], $headers = [], $setLocalhost = true)
  {
    $ch = curl_init();

    // Set the URL
    curl_setopt($ch, CURLOPT_URL, $url);

    // Set the local or live mode
    if (!$setLocalhost) {
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
    } else {
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    }

    // Set the request method (GET or POST)
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));

    // Set the request data for POST requests
    if ($method === 'POST' || !empty($data)) {
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    }

    // Set additional headers
    if (!empty($headers)) {
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }

    // Return the response instead of outputting it directly
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);

    $err = curl_error($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // Close the cURL session
    curl_close($ch);

    return [
      'response' => json_decode($response),
      'status_code' => $code,
    ];
  }

  public function accessTokenCurl(string $url, array|object $data, array $headers)
  {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    curl_setopt($ch, CURLOPT_USERPWD, $this->paypalCredentials->clientId . ':' . $this->paypalCredentials->secretKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    $err = curl_error($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $err = curl_error($ch);

    if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    return json_decode($result);
  }

  /**
   *  Set recurring cancel payload
   *
   * @return array
   */
  public function setPayload(): array
  {
    return [
      "reason" => "Not satisfied"
    ];
  }
}
