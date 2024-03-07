<?php

namespace Modules\Subscription\Database\Seeders;

use Illuminate\Database\Seeder;

class SubscriptionDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('subscription_details')->delete();

        \DB::table('subscription_details')->insert(array (
            0 =>
            array (
                'id' => 1,
                'code' => 'AVSBMF535T',
                'unique_code' => '116660010364bcda7ef0f4f4.40410543',
                'user_id' => 2,
                'package_id' => 10,
                'package_subscription_id' => 1,
                'activation_date' => offsetDate(-3),
                'billing_date' => offsetDate(-3),
                'next_billing_date' => offsetDate(27),
                'billing_price' => '129.00000000',
                'billing_cycle' => 'monthly',
                'amount_billed' => '129.00000000',
                'amount_received' => '129.00000000',
                'payment_method' => 'Stripe',
                'features' => '["word","image","image-resolution"]',
                'duration' => NULL,
                'currency' => 'USD',
                'is_trial' => 0,
                'renewable' => 1,
                'payment_status' => 'Paid',
                'status' => 'Active',
                'created_at' => offsetDate(-3),
            ),
        ));


    }
}
