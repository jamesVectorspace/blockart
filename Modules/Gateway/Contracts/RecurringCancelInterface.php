<?php

namespace Modules\Gateway\Contracts;

interface RecurringCancelInterface
{
    /**
     * Recurring cancel method
     *
     * @param string $subscriptionId
     * @param string|null $customerId
     * @return response
     */
    public function execute(string $subscriptionId, string $customerId = null);
}
