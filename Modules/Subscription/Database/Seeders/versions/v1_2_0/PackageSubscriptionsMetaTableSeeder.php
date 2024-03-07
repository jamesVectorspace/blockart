<?php

namespace Modules\Subscription\Database\Seeders\versions\v1_2_0;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
use Modules\Subscription\Entities\PackageSubscription;

use Modules\Subscription\Entities\PackageMeta;
use Modules\Subscription\Entities\PackageSubscriptionMeta;

class PackageSubscriptionsMetaTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $subscription = PackageSubscription::where('code', 'AVSBMF535T')->first();
        
        if ($subscription) {
            DB::table('package_subscriptions_meta')->insert([
                [
                    'package_subscription_id' => $subscription->id,
                    'type' => 'feature_minute',
                    'key' => 'type',
                    'value' => 'number',
                ],
                [
                    'package_subscription_id' => $subscription->id,
                    'type' => 'feature_minute',
                    'key' => 'is_value_fixed',
                    'value' => '0',
                ],
                [
                    'package_subscription_id' => $subscription->id,
                    'type' => 'feature_minute',
                    'key' => 'title',
                    'value' => 'Minute Limit',
                ],
                [
                    'package_subscription_id' => $subscription->id,
                    'type' => 'feature_minute',
                    'key' => 'title_position',
                    'value' => 'before',
                ],
                [
                    'package_subscription_id' => $subscription->id,
                    'type' => 'feature_minute',
                    'key' => 'value',
                    'value' => '0',
                ],
                [
                    'package_subscription_id' => $subscription->id,
                    'type' => 'feature_minute',
                    'key' => 'description',
                    'value' => 'Audio description will be here',
                ],
                [
                    'package_subscription_id' => $subscription->id,
                    'type' => 'feature_minute',
                    'key' => 'is_visible',
                    'value' => '0',
                ],
                [
                    'package_subscription_id' => $subscription->id,
                    'type' => 'feature_minute',
                    'key' => 'status',
                    'value' => 'Active',
                ],
                [
                    'package_subscription_id' => $subscription->id,
                    'type' => 'feature_minute',
                    'key' => 'usage',
                    'value' => '0',
                ]
            ]);
        }
        
        
        $packageResolutions = PackageMeta::where(['feature' => 'image-resolution', 'key' => 'value'])->get();
        
        foreach ($packageResolutions as $package) {
            $resolution = $package->value;
            if (count(explode('x', $resolution)) == 1) {
                PackageMeta::where(['id' => $package->id])->update(['value' => $resolution . 'x' . $resolution]);
            }
        }
        
        $subscriptionResolutions = PackageSubscriptionMeta::where(['type' => 'feature_image-resolution', 'key' => 'value'])->get();
        
        foreach ($subscriptionResolutions as $subscription) {
            $resolution = $subscription->value;
            if (count(explode('x', $resolution)) == 1) {
                PackageSubscriptionMeta::where(['id' => $subscription->id])->update(['value' => $resolution . 'x' . $resolution]);
            }
        } 

    }
}
