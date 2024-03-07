<?php

namespace Modules\CMS\Database\Seeders\versions\v1_6_0;

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
        ['name' => 'Home pages', 'slug' => 'home-pages', 'url' => 'page/home/list', 'permission' => '{"permission":"Modules\\\\CMS\\\\Http\\\\Controllers\\\\CMSController@index", "route_name":["page.home", "builder.edit"], "menu_level":"1"}', 'is_default' => 1]
        ], 'slug');

    }
}
