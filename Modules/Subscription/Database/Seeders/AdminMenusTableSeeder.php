<?php

namespace Modules\Subscription\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_menus')->upsert([
            ['name' => 'Plans', 'slug' => 'plans', 'url' => 'packages', 'permission' => '{"permission":"Modules\\\\Subscription\\\\Http\\\\Controllers\\\\PackageController@index", "route_name":["package.index", "package.create", "package.show", "package.edit"], "menu_level":"1"}', 'is_default' => 1],
            ['name' => 'Credits', 'slug' => 'credits', 'url' => 'credits', 'permission' => '{"permission":"Modules\\\\Subscription\\\\Http\\\\Controllers\\\\CreditController@index", "route_name":["credit.index", "credit.create", "credit.show", "credit.edit"], "menu_level":"1"}', 'is_default' => 1],
            ['name' => 'Members', 'slug' => 'members', 'url' => 'package-subscriptions', 'permission' => '{"permission":"Modules\\\\Subscription\\\\Http\\\\Controllers\\\\SubscriptionController@index", "route_name":["package.subscription.index", "package.subscription.create", "package.subscription.show", "package.subscription.edit"], "menu_level":"1"}', 'is_default' => 1],
            ['name' => 'Payments', 'slug' => 'payments', 'url' => 'payments', 'permission' => '{"permission":"Modules\\\\Subscription\\\\Http\\\\Controllers\\\\BlogController@index", "route_name":["package.subscription.payment", "package.subscription.invoice"], "menu_level":"1"}', 'is_default' => 1],
            ['name' => 'Settings', 'slug' => 'subscription-setting', 'url' => 'subscriptions/settings', 'permission' => '{"permission":"Modules\\\\Subscription\\\\Http\\\\Controllers\\\\SubscriptionController@setting", "route_name":["package.subscription.setting"], "menu_level":"1"}', 'is_default' => 1],
        ], 'slug');
    }
}
