<?php

namespace Modules\Subscription\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\Subscription\Entities\PackageSubscription;
use Modules\Subscription\Services\Mail\SubscriptionExpireMailService;
use Modules\Subscription\Services\Mail\SubscriptionRemainingMailService;

class SubscriptionEmailNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $subscribers = PackageSubscription::select('id', 'user_id')->get();

        foreach ($subscribers as $subscriber) {
            if (subscription('isExpired', $subscriber->user_id)) {
                (new SubscriptionExpireMailService)->send($subscriber->user_id);
            } else {
                (new SubscriptionRemainingMailService)->send($subscriber->user_id);
            }
        }
    }
}
