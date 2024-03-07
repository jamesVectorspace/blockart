<?php

namespace Modules\Subscription\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        DB::table('packages')->delete();

        DB::table('packages')->insert(array(
            0 =>
            array (
                'id' => 8,
                'user_id' => 1,
                'name' => 'Starter Plan',
                'code' => 'p-starter',
                'short_description' => NULL,
                'sale_price' => '19.99000000',
                'discount_price' => NULL,
                'billing_cycle' => 'monthly',
                'sort_order' => 1,
                'trial_day' => NULL,
                'usage_limit' => NULL,
                'renewable' => 1,
                'status' => 'Active',
            ),
            1 =>
            array (
                'id' => 9,
                'user_id' => 1,
                'name' => 'Premium Plan',
                'code' => 'p-premium',
                'short_description' => NULL,
                'sale_price' => '49.99000000',
                'discount_price' => NULL,
                'billing_cycle' => 'monthly',
                'sort_order' => 2,
                'trial_day' => NULL,
                'usage_limit' => NULL,
                'renewable' => 1,
                'status' => 'Active',
            ),
            2 =>
            array (
                'id' => 10,
                'user_id' => 1,
                'name' => 'Platinum Plan',
                'code' => 'p-platinum',
                'short_description' => NULL,
                'sale_price' => '129.00000000',
                'discount_price' => NULL,
                'billing_cycle' => 'monthly',
                'sort_order' => 3,
                'trial_day' => NULL,
                'usage_limit' => NULL,
                'renewable' => 1,
                'status' => 'Active',
            ),
        ));
    }
}
