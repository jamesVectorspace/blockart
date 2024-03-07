<?php

namespace Modules\Subscription\Database\Seeders\versions\v1_4_0;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;
use Modules\Subscription\Entities\{
    PackageSubscription,
    PackageSubscriptionMeta
};

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

        $subscriptions = PackageSubscription::pluck('id');
        
        foreach ($subscriptions as $subscriptionId) {
            $meta = PackageSubscriptionMeta::where(['package_subscription_id' => $subscriptionId, 'key' => 'chatCategory'])->first();
            if (!$meta) {
                DB::table('package_subscriptions_meta')->insert([
                    [
                        'package_subscription_id' => $subscriptionId,
                        'type' => '',
                        'key' => 'chatCategory',
                        'value' => '["1","5","4","3","2"]'
                    ],
                    [
                        'package_subscription_id' => $subscriptionId,
                        'type' => '',
                        'key' => 'chatAssistants',
                        'value' => '["HJREY","HJREY-2","HJREY-3","ZXCVB-7","MNBVC-6","QWERT-2","QWERT-3","LKJHG-9","MNOPQ-2","ZXCVB-5","ASDFG-1","ZXCVB-4","HJREY-4","PLKDS-2","RTYUI-6","ZXCVB-7","MNBVC-2","LKJHG-2","ZXCVB-8","PLKJH-4","MNBVC-8","HJREW-7","ZXCVB-9","LKJHG-3","QWERT-6"]'
                    ],
                ]);
            }
        }

        $subscription = PackageSubscription::where('code', 'AVSBMF535T')->first();
        
        if ($subscription) {
            DB::table('package_subscriptions_meta')->insert([
                [
                        'package_subscription_id' => $subscription->id,
                        'type' => 'feature_character',
                        'key' => 'type',
                        'value' => 'number',
                    ],
                    [
                        'package_subscription_id' => $subscription->id,
                        'type' => 'feature_character',
                        'key' => 'is_value_fixed',
                        'value' => '0',
                    ],
                    [
                        'package_subscription_id' => $subscription->id,
                        'type' => 'feature_character',
                        'key' => 'title',
                        'value' => 'Character Limit',
                    ],
                    [
                        'package_subscription_id' => $subscription->id,
                        'type' => 'feature_character',
                        'key' => 'title_position',
                        'value' => 'before',
                    ],
                    [
                        'package_subscription_id' => $subscription->id,
                        'type' => 'feature_character',
                        'key' => 'value',
                        'value' => '500000',
                    ],
                    [
                        'package_subscription_id' => $subscription->id,
                        'type' => 'feature_character',
                        'key' => 'description',
                        'value' => 'Character description will be here',
                    ],
                    [
                        'package_subscription_id' => $subscription->id,
                        'type' => 'feature_character',
                        'key' => 'is_visible',
                        'value' => '0',
                    ],
                    [
                        'package_subscription_id' => $subscription->id,
                        'type' => 'feature_character',
                        'key' => 'status',
                        'value' => 'Active',
                    ],
                    [
                        'package_subscription_id' => $subscription->id,
                        'type' => 'feature_character',
                        'key' => 'usage',
                        'value' => '0',
                    ]
            ]);
        }

        $subscriptions = PackageSubscription::where('code', '!=', 'AVSBMF535T')->get();
        
        foreach ($subscriptions as $subscription) {
            $meta = PackageSubscriptionMeta::where(['package_subscription_id' => $subscription->id, 'type' => 'feature_character'])->first();
            if (!$meta) {
                DB::table('package_subscriptions_meta')->insert([
                    [
                            'package_subscription_id' => $subscription->id,
                            'type' => 'feature_character',
                            'key' => 'type',
                            'value' => 'number',
                        ],
                        [
                            'package_subscription_id' => $subscription->id,
                            'type' => 'feature_character',
                            'key' => 'is_value_fixed',
                            'value' => '0',
                        ],
                        [
                            'package_subscription_id' => $subscription->id,
                            'type' => 'feature_character',
                            'key' => 'title',
                            'value' => 'Character Limit',
                        ],
                        [
                            'package_subscription_id' => $subscription->id,
                            'type' => 'feature_character',
                            'key' => 'title_position',
                            'value' => 'before',
                        ],
                        [
                            'package_subscription_id' => $subscription->id,
                            'type' => 'feature_character',
                            'key' => 'value',
                            'value' => '0',
                        ],
                        [
                            'package_subscription_id' => $subscription->id,
                            'type' => 'feature_character',
                            'key' => 'description',
                            'value' => 'Character description will be here',
                        ],
                        [
                            'package_subscription_id' => $subscription->id,
                            'type' => 'feature_character',
                            'key' => 'is_visible',
                            'value' => '0',
                        ],
                        [
                            'package_subscription_id' => $subscription->id,
                            'type' => 'feature_character',
                            'key' => 'status',
                            'value' => 'Active',
                        ],
                        [
                            'package_subscription_id' => $subscription->id,
                            'type' => 'feature_character',
                            'key' => 'usage',
                            'value' => '0',
                        ]
                ]);
            }
        }

    }
}
