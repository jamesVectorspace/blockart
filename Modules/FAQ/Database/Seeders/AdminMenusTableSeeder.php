<?php

namespace Modules\FAQ\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_menus')->upsert([
            [
            'name' => 'Faq', 
            'slug' => 'faq', 
            'url' => 'faq', 
            'permission' => '{"permission":"Modules\\\\FAQ\\\\Http\\\\Controllers\\\\FAQController@index", "route_name":route_name":["admin.faq", "admin.faq.create", "admin.faq.edit"], "menu_level":"1"}', 
            'is_default' => 1
            ]
        ], 'slug');
    }
}
