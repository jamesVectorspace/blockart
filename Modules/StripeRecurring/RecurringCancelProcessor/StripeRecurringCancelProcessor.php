<?php

/**
 * @package Stripe Recurring Cancel Processor
 * @author TechVillage <support@techvill.org>
 * @contributor Md. Mostafijur Rahman <[mostafijur.techvill@gmail.com]>
 * @created 12-06-23
 */

namespace Modules\StripeRecurring\RecurringCancelProcessor;

use Modules\Gateway\Contracts\RecurringCancelInterface;
use Modules\StripeRecurring\Entities\StripeRecurring;
use Modules\StripeRecurring\Response\StripeRecurringCancelResponse;
use Stripe\Stripe;

class StripeRecurringCancelProcessor implements RecurringCancelInterface
{
    /**
     * @var array|object
     */
    protected $stripeRecurringCredentials;

    /**
     * Constructor for paypal.
     *
     * @return void
     */
    public function __construct()
    {
        $this->stripeRecurringCredentials = StripeRecurring::firstWhere('alias', 'striperecurring')->data;
    }

    /**
     * Execute
     *
     * @return \Stripe\Subscription
     */
    public function execute(string $subscriptionId, string $customerId = null)
    {
        $stripe = new \Stripe\StripeClient($this->stripeRecurringCredentials?->clientSecret);
        $response = $stripe->subscriptions->cancel(
            $subscriptionId,
            []
        );
        return [
            'status' => $response['status'] == 'canceled' ? 'success' : 'failed',
            'raw_response' => $response
        ];
    }
}
