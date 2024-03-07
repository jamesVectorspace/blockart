<?php
namespace Infoamin\Installer\Helpers;

use Infoamin\Installer\Interfaces\PurchaseInterface;
use Infoamin\Installer\Interfaces\CurlRequestInterface;
class PurchaseChecker implements PurchaseInterface {

    /**
     * Curl Request
     *
     * @var object
     */
	protected $curlRequest;

    /**
     * Initialization
     *
     * @return void
     */
    public function __construct(CurlRequestInterface $curlRequest) {
        $this->curlRequest = $curlRequest;
    }

    /**
     * Get Purchase Data
     *
     * @param $domainName
     * @param $domainIp
     * @param $envatopurchasecode
     * @param $envatoUsername
     */
	public function getPurchaseStatus($domainName, $domainIp, $envatopurchasecode, $envatoUsername)
    {
    	$data = array(
            'domain_name'        => $domainName,
            'domain_ip'          => $domainIp,
            'envatopurchasecode' => $envatopurchasecode,
            'envatoUsername' => $envatoUsername,
            'item_id' => config('installer.item_id') ?? ''
        );

        return $this->curlRequest->send($data);

    }
}
