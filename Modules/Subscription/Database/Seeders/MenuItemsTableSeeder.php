<?php

namespace Modules\Subscription\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MenuItemsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
       DB::table('menu_items')->upsert([
        ['id' => 134, 'label' => 'Subscriptions', 'link' => NULL, 'params' => NULL, 'is_default' => 1, 'icon' => 'fas fa-money-bill-alt', 'parent' => 0, 'sort' => 24, 'class' => NULL, 'menu' => 1, 'depth' => 0,],
        ['id' => 135, 'label' => 'Plans', 'link' => 'packages', 'params' => '{"permission":"Modules\\\\Subscription\\\\Http\\\\Controllers\\\\PackageController@index", "route_name":["package.index", "package.create", "package.show", "package.edit"], "menu_level":"1"}', 'is_default' => 1, 'icon' => NULL, 'parent' => 134, 'sort' => 10, 'class' => NULL, 'menu' => 1, 'depth' => 1,],
        ['id' => 136, 'label' => 'Members', 'link' => 'package-subscriptions', 'params' => '{"permission":"Modules\\\\Subscription\\\\Http\\\\Controllers\\\\SubscriptionController@index", "route_name":["package.subscription.index", "package.subscription.create", "package.subscription.show", "package.subscription.edit"], "menu_level":"1"}', 'is_default' => 1, 'icon' => NULL, 'parent' => 134, 'sort' => 11, 'class' => NULL, 'menu' => 1, 'depth' => 1,],
        ['id' => 137, 'label' => 'Payments', 'link' => 'payments', 'params' => '{"permission":"Modules\\\\Subscription\\\\Http\\\\Controllers\\\\SubscriptionController@payment", "route_name":["package.subscription.payment", "package.subscription.invoice"], "menu_level":"1"}', 'is_default' => 1, 'icon' => NULL, 'parent' => 134, 'sort' => 12, 'class' => NULL, 'menu' => 1, 'depth' => 1,],
        ['id' => 138, 'label' => 'Settings', 'link' => 'subscriptions/settings', 'params' => '{"permission":"Modules\\\\Subscription\\\\Http\\\\Controllers\\\\SubscriptionController@setting", "route_name":["package.subscription.setting"], "menu_level":"1"}', 'is_default' => 1, 'icon' => NULL, 'parent' => 134, 'sort' => 13, 'class' => NULL, 'menu' => 1, 'depth' => 1,]
    ], 'id');

    }
}
