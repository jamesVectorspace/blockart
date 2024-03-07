<?php

namespace Modules\Subscription\Database\Seeders\versions\v1_2_0;

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder 
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('menu_items')->insert([
            ['label' => 'Credits', 'link' => 'credits', 'params' => '{"permission":"Modules\\\\Subscription\\\\Http\\\\Controllers\\\\CreditController@index", "route_name":["credit.index", "credit.create", "credit.show", "credit.edit"], "menu_level":"1"}', 'is_default' => 1, 'icon' => NULL, 'parent' => 134, 'sort' => 10, 'class' => NULL, 'menu' => 1, 'depth' => 1,]
        ]);
    }
}
