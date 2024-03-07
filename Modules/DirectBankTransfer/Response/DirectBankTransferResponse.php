<?php
/**
 * @package DirectBankTransferResponse
 * @author tehcvillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 09-01-2023
 */
namespace Modules\DirectBankTransfer\Response;

use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;

class DirectBankTransferResponse extends Response implements HasDataResponseInterface
{
    protected $response;
    private $data;

    /**
     * Constructor for direct bank transfer response.
     *
     * @param Array|Object $data
     * @param Array|Object $codResponse
     * @return Instance
     */
    public function __construct($data, $codResponse)
    {
        $this->data = $data;
        $this->response = $codResponse;
        $this->updateStatus();
        return $this;
    }

    /**
     * Get raw response.
     *
     * @return string
     */
    public function getRawResponse(): string
    {
        return json_encode($this->response);
    }

    /**
     * Update payment status.
     *
     * @return void
     */
    protected function updateStatus()
    {
        if ($this->response['status'] == 'succeeded') {
            $this->setPaymentStatus('pending');
        } else {
            $this->setPaymentStatus('failed');
        }
    }

    /**
     * Get response.
     *
     * @return string
     */
    public function getResponse(): string
    {
        return json_encode($this->getSimpleResponse());
    }

    /**
     * Get simple response.
     *
     * @return Array
     */
    private function getSimpleResponse()
    {
        return [
            'amount' => $this->response['amount'] / 100,
            'amount_captured' => 0,
            'currency' => $this->response['currency'],
            'code' => $this->data->code
        ];
    }

    /**
     * Get gateway name.
     *
     * @return string
     */
    public function getGateway(): string
    {
        return 'DirectBankTransfer';
    }

    /**
     * Set payment status.
     *
     * @param String $status
     * @return void
     */
    protected function setPaymentStatus($status)
    {
        $this->status = $status;
    }
}
