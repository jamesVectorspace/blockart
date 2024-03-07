<?php

use Modules\Subscription\Services\PackageSubscriptionService;

if (!function_exists('subscription')) {
    /**
     * Subscription
     *
     * @param string $methodName
     * @param array $args
     * @return mixed
     */
    function subscription($methodName, ...$args)
    {
        $subscription = new PackageSubscriptionService();

        return $subscription->$methodName(...$args);
    }
}
