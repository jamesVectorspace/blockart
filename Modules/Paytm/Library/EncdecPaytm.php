<?php

namespace Modules\Paytm\Library;

use Illuminate\Support\Str;

class EncdecPaytm
{
    /**
     * Encrypt a string
     *
     * @param String $input
     * @param String $ky
     * @return string data
     */
    public static function encrypt_e($input, $ky)
    {
        $key   = html_entity_decode($ky);
        $iv = "@@@@&&&&####$$$$";
        return openssl_encrypt($input, "AES-128-CBC", $key, 0, $iv);
    }

    /**
     * Decrypt a String
     *
     * @param [type] $crypt
     * @param [type] $ky
     * @return String 
     */
    public static function decrypt_e($crypt, $ky)
    {
        $key   = html_entity_decode($ky);
        $iv = "@@@@&&&&####$$$$";
        return openssl_decrypt($crypt, "AES-128-CBC", $key, 0, $iv);
    }

    /**
     * Generate a random string
     *
     * @param Int $length
     * @return String
     */
    public static function generateSalt_e($length)
    {
        return Str::random($length);
    }

    /**
     * Get check sum from array
     *
     * @param array $arrayList
     * @param string $key
     * @param integer $sort
     * @return response
     */
    public static function getChecksumFromArray($arrayList, $key, $sort = 1)
    {
        if ($sort != 0) {
            ksort($arrayList);
        }
        $str = self::getArray2Str($arrayList);
        $salt = self::generateSalt_e(4);
        $finalString = implode('|', [$str, $salt]);
        $hash = hash("sha256", $finalString);
        $hashString = $hash . $salt;
        return self::encrypt_e($hashString, $key);
    }

    /**
     * Get check sum from string
     *
     * @param string $str
     * @param string $key
     * @return response
     */
    public static function getChecksumFromString($str, $key)
    {
        $salt = self::generateSalt_e(4);
        $finalString = implode('|', [$str, $salt]);
        $hash = hash("sha256", $finalString);
        $hashString = $hash . $salt;
        return self::encrypt_e($hashString, $key);
    }

    /**
     * Verify check sum
     *
     * @param array $arrayList
     * @param string $key
     * @param string $checksum_value
     * @return boolean true|false
     */
    public static function verifychecksum_e($arrayList, $key, $checksum_value)
    {
        $arrayList = self::removeCheckSumParam($arrayList);
        ksort($arrayList);
        $str = self::getArray2Str($arrayList);
        $paytm_hash = self::decrypt_e($checksum_value, $key);
        $salt = substr($paytm_hash, -4);

        $finalString = implode('|', [$str, $salt]);

        $website_hash = hash("sha256", $finalString);
        $website_hash .= $salt;

        return ($website_hash == $paytm_hash) ? true : false;
    }

    /**
     * Create array to string.
     *
     * @param array $array_list
     * @return string
     */
    public static function getArray2Str($array_list)
    {
        return implode('|', $array_list);
    }


    /**
     * Remove array CHECKSUMHASH key value
     *
     * @param Array $array_list
     * @return Array
     */
    public static function removeCheckSumParam($array_list)
    {
        if (isset($array_list["CHECKSUMHASH"])) {
            unset($array_list["CHECKSUMHASH"]);
        }
        return $array_list;
    }

    /**
     * Check transaction status 
     * 
     * @param mix $request_paramList
     * @param url $paytm_status_query_new_url
     * @return response
     */
    public static function getTxnStatusNew($request_paramList, $paytm_status_query_new_url)
    {
        return self::callNewAPI($paytm_status_query_new_url, $request_paramList);
    }

    /**
     * Initial request for refund
     *
     * @param mix|array $request_paramList
     * @param url $paytm_refund_url
     * @return response
     */
    public static function initiateTxnRefund($request_paramList, $paytm_merchant_key, $paytm_refund_url)
    {
        $CHECKSUM = self::getChecksumFromArray($request_paramList, $paytm_merchant_key, 0);
        $request_paramList["CHECKSUM"] = $CHECKSUM;
        return self::callNewAPI($paytm_refund_url, $request_paramList);
    }

    /**
     * Call a api
     *
     * @param url $apiURL
     * @param mix|array $requestParamList
     * @return response
     */
    public static function callNewAPI($apiURL, $requestParamList)
    {
        $jsonResponse = "";
        $JsonData = json_encode($requestParamList);
        $postData = 'JsonData=' . urlencode($JsonData);
        $ch = curl_init($apiURL);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($postData)
            )
        );
        $jsonResponse = curl_exec($ch);
        return json_decode($jsonResponse, true);
    }
}
