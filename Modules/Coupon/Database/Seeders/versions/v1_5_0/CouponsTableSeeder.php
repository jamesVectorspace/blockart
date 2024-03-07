<?php

namespace Modules\Coupon\Database\Seeders\versions\v1_5_0;

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('coupons')->delete();

        \DB::table('coupons')->insert(array(
            0 =>
            array(
                'id' => 1,
                'name' => 'Eid Special',
                'creator_id' => 1,
                'usage_limit_per_coupon' => 5,
                'usage_limit_per_user' => 1,
                'minimum_spend' => NULL,
                'usage_count' => NULL,
                'individual_use' => 0,
                'code' => 'EID012',
                'discount_type' => 'Flat',
                'discount_amount' => '10',
                'maximum_discount_amount' => NULL,
                'start_date' => randomDateBefore(30),
                'end_date' => randomDateAfter(30),
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'id' => 2,
                'name' => 'Eid coupon',
                'creator_id' => 1,
                'usage_limit_per_coupon' => 7,
                'usage_limit_per_user' => 2,
                'minimum_spend' => '10',
                'usage_count' => NULL,
                'individual_use' => 0,
                'code' => 'ramadan55',
                'discount_type' => 'Percentage',
                'discount_amount' => '30.00000000',
                'maximum_discount_amount' => '7',
                'start_date' => randomDateBefore(30),
                'end_date' => randomDateAfter(30),
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => NULL,
            ),
            2 =>
            array(
                'id' => 3,
                'name' => 'Clark Dominguez',
                'creator_id' => 1,
                'usage_limit_per_coupon' => 3,
                'usage_limit_per_user' => NULL,
                'minimum_spend' => '15',
                'usage_count' => NULL,
                'individual_use' => 1,
                'code' => 'clark-12',
                'discount_type' => 'Flat',
                'discount_amount' => '12.00000000',
                'maximum_discount_amount' => NULL,
                'start_date' => randomDateBefore(30),
                'end_date' => randomDateAfter(30),
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => NULL,
            ),
            3 =>
            array(
                'id' => 4,
                'name' => 'Picked Up',
                'creator_id' => 1,
                'usage_limit_per_coupon' => 5,
                'usage_limit_per_user' => 2,
                'minimum_spend' => '30',
                'usage_count' => NULL,
                'individual_use' => 0,
                'code' => 'picked-up',
                'discount_type' => 'Percentage',
                'discount_amount' => '10.00000000',
                'maximum_discount_amount' => NULL,
                'start_date' => randomDateBefore(30),
                'end_date' => randomDateAfter(30),
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => NULL,
            ),
        ));
    }
}
