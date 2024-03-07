<?php
namespace Modules\SslCommerz\Library\SslCommerz;

interface SslCommerzInterface
{
    /**
     * Make payment
     * @param array $requestData
     * @param string $type
     * @param string $pattern
     * @return false|mixed|string
     */
    public function makePayment(array $data);

    /**
     * Order validation
     *
     * @param string $post_data
     * @param string $trx_id
     * @param float $amount
     * @param string $currency
     * @return bool|string $this->error
     */
    public function orderValidate($requestData, $trxID, $amount, $currency);

    /**
     * Set parameter
     *
     * @param array $requestData
     * @return void
     */
    public function setParams($data);

    /**
     * Set Required Info
     *
     * @param array $info
     * @return array $this->data
     */
    public function setRequiredInfo(array $data);

    /**
     * Set Customer Info
     *
     * @param array $info
     * @return array $this->data
     */
    public function setCustomerInfo(array $data);

    /**
     * Set Shipment Info
     *
     * @param array $info
     * @return array $this->data
     */
    public function setShipmentInfo(array $data);

    /**
     * Set Product Info
     *
     * @param array $info
     * @return array $this->data
     */
    public function setProductInfo(array $data);

    /**
     * Set Additional Info
     *
     * @param array $info
     * @return array $this->data
     */
    public function setAdditionalInfo(array $data);

    /**
     * Call API
     * @param $data
     * @param array $header
     * @param bool $setLocalhost
     * @return bool|string
     */
    public function callToApi($data, $header = [], $setLocalhost = false);
}
