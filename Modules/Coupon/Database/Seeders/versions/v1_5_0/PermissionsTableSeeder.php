<?php

namespace Modules\Coupon\Database\Seeders\versions\v1_5_0;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            [
                'controller_name' => 'CouponController',
                'controller_path' => 'Modules\\Coupon\\Http\\Controllers\\CouponController',
                'method_name' => 'index',
                'name' => 'Modules\\Coupon\\Http\\Controllers\\CouponController@index',
            ], [
                'controller_name' => 'CouponController',
                'controller_path' => 'Modules\\Coupon\\Http\\Controllers\\CouponController',
                'method_name' => 'create',
                'name' => 'Modules\\Coupon\\Http\\Controllers\\CouponController@create',
            ], [
                'controller_name' => 'CouponController',
                'controller_path' => 'Modules\\Coupon\\Http\\Controllers\\CouponController',
                'method_name' => 'store',
                'name' => 'Modules\\Coupon\\Http\\Controllers\\CouponController@store',
            ], [
                'controller_name' => 'CouponController',
                'controller_path' => 'Modules\\Coupon\\Http\\Controllers\\CouponController',
                'method_name' => 'edit',
                'name' => 'Modules\\Coupon\\Http\\Controllers\\CouponController@edit',
            ], [
                'controller_name' => 'CouponController',
                'controller_path' => 'Modules\\Coupon\\Http\\Controllers\\CouponController',
                'method_name' => 'update',
                'name' => 'Modules\\Coupon\\Http\\Controllers\\CouponController@update',
            ], [
                'controller_name' => 'CouponController',
                'controller_path' => 'Modules\\Coupon\\Http\\Controllers\\CouponController',
                'method_name' => 'destroy',
                'name' => 'Modules\\Coupon\\Http\\Controllers\\CouponController@destroy',
            ], [
                'controller_name' => 'CouponController',
                'controller_path' => 'Modules\\Coupon\\Http\\Controllers\\CouponController',
                'method_name' => 'downloadPdf',
                'name' => 'Modules\\Coupon\\Http\\Controllers\\CouponController@downloadPdf',
            ], [
                'controller_name' => 'CouponController',
                'controller_path' => 'Modules\\Coupon\\Http\\Controllers\\CouponController',
                'method_name' => 'downloadCsv',
                'name' => 'Modules\\Coupon\\Http\\Controllers\\CouponController@downloadCsv',
            ], [
                'controller_name' => 'CouponRedeemController',
                'controller_path' => 'Modules\\Coupon\\Http\\Controllers\\CouponRedeemController',
                'method_name' => 'index',
                'name' => 'Modules\\Coupon\\Http\\Controllers\\CouponRedeemController@index',
            ], [
                'controller_name' => 'CouponRedeemController',
                'controller_path' => 'Modules\\Coupon\\Http\\Controllers\\CouponRedeemController',
                'method_name' => 'pdf',
                'name' => 'Modules\\Coupon\\Http\\Controllers\\CouponRedeemController@pdf',
            ], [
                'controller_name' => 'CouponRedeemController',
                'controller_path' => 'Modules\\Coupon\\Http\\Controllers\\CouponRedeemController',
                'method_name' => 'csv',
                'name' => 'Modules\\Coupon\\Http\\Controllers\\CouponRedeemController@csv',
            ],
        ]);
    }
}


