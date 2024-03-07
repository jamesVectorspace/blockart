<?php

namespace Modules\Esewa\Processor;

use Modules\Esewa\Entities\Esewa;

class EsewaHelper
{
    private $payload;
    private $esewa;
    private $url = 'https://uat.esewa.com.np/epay/';

    public function __construct()
    {
        $this->esewa = Esewa::firstWhere('alias', moduleConfig('esewa.alias'))->data;
        $this->setEnvironment();
    }

    /**
    * Create charge for payment
    */
    public function charge()
    {
        $chargeUrl = $this->url . 'main';
        return $this->curl($chargeUrl, $this->payload);
    }

    /**
    * Make Payment CURL settings from Esewa Documentation
    */
    public function curl($url, $data)
    {
        $info = [
            'amt'=> $data['amount'],
            'pdc'=> 0,
            'psc'=> 0,
            'txAmt'=> 0,
            'tAmt'=> $data['amount'],
            'pid'=> $data['details'],
            'scd'=> $data['merchantKey'],
            'su'=> $data['success_url'],
            'fu'=> $data['cancel_url']
        ];

        // generate form from attributes
        $htmlForm = '<form method="POST" action="'.$url.'" id="esewa-form">';

        foreach ($info as $name => $value):
            $htmlForm .= sprintf('<input name="%s" type="hidden" value="%s">', $name, $value);
        endforeach;

        $htmlForm .= '</form><script type="text/javascript">document.getElementById("esewa-form").submit();</script>';

        // output the form
        echo $htmlForm;

    }

    /**
    * set and return all data for payment response
    */
    public function setRequestData($data)
    {
        $this->payload = $data;
        return $this;
    }

    /**
    * set and return all data for transaction response
    */
    public function setTransactionData($data)
    {
        $this->payload = $data;
        return $this;
    }

    /**
    * Create charge for transaction check
    */
    public function transactionCharge()
    {
        $chargeUrl = $this->url . 'transrec';
        return $this->transactionCurl($chargeUrl, $this->payload);
    }

    /**
     * Transaction CURL settings from Esewa Documentation
     */
    public function transactionCurl($url, $data)
    {
        $info = [
            'amt'=> $data['amt'],
            'rid'=> $data['refId'],
            'pid'=> $data['oid'],
            'scd'=> $data['merchantKey']
        ];

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $info);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode(json_encode(simplexml_load_string($response)), TRUE);
        $response_code = trim(strtolower($response['response_code']));
        return $response_code;
    }


    /**
     * Set environment
     */
    private function setEnvironment(): void
    {
        if (!$this->esewa->sandbox) {
            $this->setProduction();
        }
    }

    /**
     * Set production environment
     */
    private function setProduction(): void
    {
        $this->setUrl('https://esewa.com.np/epay/');
    }


    /**
     * Set url
     */
    private function setUrl($url): void
    {
        $this->url = $url;
    }
}
