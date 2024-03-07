<?php
/**
 * @package CheckPaymentsResponse
 * @author tehcvillage <support@techvill.org>
 * @contributor Sakawat Hossain Rony <[sakawat.techvill@gmail.com]>
 * @created 09-01-2023
 */
namespace Modules\CheckPayments\Response;

use Modules\Gateway\Contracts\HasDataResponseInterface;
use Modules\Gateway\Response\Response;

class CheckPaymentsResponse extends Response implements HasDataResponseInterface
{
    protected $response;
    private $data;

    /**
     * Constructor for check payment response.
     *
     * @param Array|Object $data
     * @param Array|Object $codResponse
     * @return void
     */
    public function __construct($data, $codResponse)
    {
        $this->data = $data;
        $this->response = $codResponse;
        $this->updateStatus();
        return $this;
    }

    /**
     * Get raw response
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
     * @return void
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
        return 'CheckPayments';
    }

    /**
     * Set payment status
     *
     * @param String $status
     * @return void
     */
    protected function setPaymentStatus($status)
    {
        $this->status = $status;
    }
}
