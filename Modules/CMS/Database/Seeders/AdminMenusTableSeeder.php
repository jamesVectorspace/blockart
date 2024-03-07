<?php

namespace Modules\CMS\Database\Seeders;

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
        ['name' => 'Pages', 'slug' => 'page', 'url' => 'page/list', 'permission' => '{"permission":"Modules\\\\CMS\\\\Http\\\\Controllers\\\\CMSController@index", "route_name":["page.index", "page.create", "page.edit"], "menu_level":"1"}', 'is_default' => 1],
        ['name' => 'Appearance', 'slug' => 'appearance', 'url' => 'theme/list', 'permission' => '{"permission":"Module\\\\CMS\\\\Http\\\\Controllers\\\\ThemeOptionController@list", "route_name":["theme.index", "theme.store"], "menu_level":"1"}', 'is_default' => 1],
    ], 'slug');

    }
}
