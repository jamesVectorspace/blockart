<?php

namespace Modules\CMS\Database\Seeders\versions\v1_6_0;

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
        DB::table('menu_items')->insert([
            [ 
                'label' => 'Home Pages', 
                'link' => 'page/home/list', 
                'params' => '{"permission":"Modules\\\\CMS\\\\Http\\\\Controllers\\\\CMSController@index", "route_name":["page.home", "builder.edit", "page.home.create", "page.home.edit"], "menu_level":"1"}', 
                'is_default' => 1, 'icon' => NULL, 
                'parent' => 57, 
                'sort' => 40, 
                'class' => NULL, 
                'menu' => 1, 
                'depth' => 1,
            ]
        ]);
    }
}
