<?php

namespace Modules\Coupon\Database\Seeders\versions\v1_5_0;

use Illuminate\Database\Seeder;

class AdminMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('admin_menus')->upsert([
            array (
                'name' => 'Coupons',
                'slug' => 'coupons',
                'url' => 'coupons',
                'permission' => '{"permission":"Modules\\\\Coupon\\\\Http\\\\Controllers\\\\CouponController@index", "route_name":["coupon.index"], "menu_level":"1"}',
                'is_default' => 1,
            ),
        ], 'slug');
    }
}
