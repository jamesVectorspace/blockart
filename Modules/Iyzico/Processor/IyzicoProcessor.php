<?php

/**
 * @package Iyzico Martvill
 * @author Md. Mostafijur Rahman <mostafijur.techvill@gmail.ocm>
 * @created 05-09-2023
 */

namespace Modules\Iyzico\Processor;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Modules\Gateway\Services\GatewayHelper;
use Modules\Iyzico\Entities\Iyzico;
use Modules\Iyzico\Response\IyzicoResponse;
use Modules\Gateway\Contracts\{
    PaymentProcessorInterface,
    RequiresCallbackInterface
};


class IyzicoProcessor implements PaymentProcessorInterface, RequiresCallbackInterface
{

    private $helper;
    private $options;
    private $purchaseData;
    private $card_owner;
    private $card_number;
    private $expiration_month;
    private $expiration_year;
    private $cvv;
    private $iyzico;
    private $callbackUrl;
    private $user;



    public function __construct()
    {
        $this->helper = GatewayHelper::getInstance();
    }

    private function setupData()
    {

        $this->purchaseData = $this->helper->getPurchaseData($this->helper->getPaymentCode());
        $this->iyzico = Iyzico::firstWhere('alias', moduleConfig('iyzico.alias'))->data;
        $this->options = new \Iyzipay\Options();
        $this->options->setApiKey($this->iyzico->apiKey);
        $this->options->setSecretKey($this->iyzico->secretKey);
        $this->user = User::find($this->userId());

        if ($this->iyzico->sandbox) {
            $this->options->setBaseUrl('https://sandbox-api.iyzipay.com');
        } else {
            $this->options->setBaseUrl('https://api.iyzipay.com');
        }

        $this->callbackUrl = route('gateway.callback', withOldQueryIntegrity(['gateway' => 'iyzico']));
    }

    public function pay($request)
    {
        $this->setupData();
        $this->card_owner = $request->card_owner;
        $this->card_number = str_replace("-", "", $request->card_number);
        $this->expiration_month = $request->expiration_month;
        $this->expiration_year = $request->expiration_year;
        $this->cvv = $request->cvv;


        $customerName = $this->user->name;
        $customerLastname = $this->user->name;
        $customerPhone = $request->phone;
        $customerEmail = $this->user->email;
        $customerCity = $request->city;
        $customerState = $request->state;
        $customerCountry = $request->country;
        $customerAddress = "{$customerCity} {$customerState} {$customerCountry}";

        if (strtoupper($this->purchaseData->currency_code) != 'TRY') {
            throw new \Exception(__('Currency not supported by merchant'));
        }

        $iyzicoRequest = new \Iyzipay\Request\CreatePaymentRequest();
        $iyzicoRequest->setLocale(\Iyzipay\Model\Locale::TR);
        $iyzicoRequest->setConversationId($this->purchaseData->code);
        $iyzicoRequest->setPrice(number_format($this->purchaseData->total, 2));
        $iyzicoRequest->setPaidPrice(number_format($this->purchaseData->total, 2));
        $iyzicoRequest->setCurrency(\Iyzipay\Model\Currency::TL);
        $iyzicoRequest->setInstallment(1);
        $iyzicoRequest->setBasketId(rand(10000, 9999));
        $iyzicoRequest->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
        $iyzicoRequest->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $iyzicoRequest->setCallbackUrl($this->callbackUrl);

        $paymentCard = new \Iyzipay\Model\PaymentCard();
        $paymentCard->setCardHolderName($this->card_owner);
        $paymentCard->setCardNumber($this->card_number);
        $paymentCard->setExpireMonth($this->expiration_month);
        $paymentCard->setExpireYear($this->expiration_year);
        $paymentCard->setCvc($this->cvv);
        $paymentCard->setRegisterCard(0);
        $iyzicoRequest->setPaymentCard($paymentCard);


        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId($this->purchaseData->id);
        $buyer->setName($customerName);
        $buyer->setSurname($customerLastname);
        $buyer->setGsmNumber($customerPhone);
        $buyer->setEmail($customerEmail);
        $buyer->setIdentityNumber($this->helper->getPaymentCode());
        $buyer->setRegistrationAddress($customerAddress);
        $buyer->setIp(getIpAddress());
        $buyer->setCity($customerState);
        $buyer->setCountry($customerCountry);
        $buyer->setZipCode($request->zip_code);
        $iyzicoRequest->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName($customerName . " " . $customerLastname);
        $shippingAddress->setCity($customerState);
        $shippingAddress->setCountry($customerCountry);
        $shippingAddress->setAddress($customerAddress);

        $iyzicoRequest->setShippingAddress($shippingAddress);
        $iyzicoRequest->setBillingAddress($shippingAddress);


        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId(rand(1, 9999));
        $firstBasketItem->setName(config('app.name'));
        $firstBasketItem->setCategory1(config('app.name'));
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice(number_format($this->purchaseData->total, 2));
        $basketItems[0] = $firstBasketItem;

        $iyzicoRequest->setBasketItems($basketItems);

        $threedsInitialize = \Iyzipay\Model\ThreedsInitialize::create($iyzicoRequest, $this->options);


        if ($threedsInitialize->getStatus() == "failure") {
            throw new \Exception(__($threedsInitialize->getErrorMessage()));
        } else {
            echo $threedsInitialize->getHtmlContent();
        }
    }


    public function validateTransaction($request)
    {
        $this->setupData();
        return new IyzicoResponse($this->purchaseData, $request);
    }

    private function userId()
    {
        $id = $this->purchaseData?->sending_details?->user_id;

        if (empty($id)) {
            return Auth::user()->id;
        }

        return $id;
    }
}
