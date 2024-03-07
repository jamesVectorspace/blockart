<?php

namespace Modules\Coupon\Database\Seeders\versions\v1_5_0;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\MenuBuilder\Http\Models\MenuItems;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
         
        $marketing = MenuItems::where('label', 'Marketing')->first();
        
        if (!$marketing) {
            $marketing = MenuItems::create([
                'label' => 'Marketing',
                'link' => NULL,
                'params' => NULL,
                'is_default' => 0,
                'icon' => 'fas fa-bullhorn',
                'parent' => 0,
                'sort' => 26,
                'class' => NULL,
                'menu' => 1,
                'depth' => 0,
                'is_custom_menu' => 0,
            ]);
        }
        
        DB::table('menu_items')->insert([
            ['label' => 'Add coupon', 'link' => 'coupon/create', 'params' => '{"permission":"Modules\\\\Coupon\\\\Http\\\\Controllers\\\\CouponController@create","route_name":["coupon.create"]}', 'is_default' => 1, 'icon' => NULL, 'parent' =>  $marketing->id, 'sort' => 27, 'class' => NULL, 'menu' => 1, 'depth' => 1,],

            ['label' => 'All Coupons', 'link' => 'coupons', 'params' => '{"permission":"Modules\\\\Coupon\\\\Http\\\\Controllers\\\\CouponController@index","route_name":["coupon.index","coupon.edit","coupon.pdf","coupon.csv","coupon.shop","coupon.item"]}', 'is_default' => 1, 'icon' => NULL, 'parent' =>  $marketing->id, 'sort' => 28, 'class' => NULL, 'menu' => 1, 'depth' => 1,],

            ['label' => 'Coupon Redeems', 'link' => 'coupon-redeems', 'params' => '{"permission":"Modules\\\\Coupon\\\\Http\\\\Controllers\\\\CouponRedeemController@index","route_name":["couponRedeem.index"]}', 'is_default' => 1, 'icon' => NULL, 'parent' =>  $marketing->id, 'sort' => 29, 'class' => NULL, 'menu' => 1, 'depth' => 1,],
            
            ['label' => 'Coupon Setting', 'link' => 'coupon/setting', 'params' => '{"permission":"Modules\\\\Coupon\\\\Http\\\\Controllers\\\\CouponController@setting","route_name":["coupon.setting"]}', 'is_default' => 1, 'icon' => NULL, 'parent' =>  $marketing->id, 'sort' => 30, 'class' => NULL, 'menu' => 1, 'depth' => 1,],
        ]);
    }
}
