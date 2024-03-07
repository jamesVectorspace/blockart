<?php

namespace Modules\Subscription\Database\Seeders;

use Illuminate\Database\Seeder;

class PackageSubscriptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('package_subscriptions')->delete();

        \DB::table('package_subscriptions')->insert(array (
            0 =>
            array (
                'id' => 1,
                'code' => 'AVSBMF535T',
                'user_id' => 2,
                'package_id' => 10,
                'activation_date' => offsetDate(-3),
                'billing_date' => offsetDate(-3),
                'next_billing_date' => offsetDate(27),
                'billing_price' => '129.00000000',
                'billing_cycle' => 'monthly',
                'amount_billed' => '129.00000000',
                'amount_received' => '129.00000000',
                'amount_due' => '0.00000000',
                'is_customized' => 0,
                'renewable' => 1,
                'payment_status' => 'Paid',
                'status' => 'Active',
            ),
        ));


    }
}
