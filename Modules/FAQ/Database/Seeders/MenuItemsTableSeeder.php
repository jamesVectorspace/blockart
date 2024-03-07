<?php

namespace Modules\FAQ\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu_items')->upsert([
            [
            'id' => 160,
            'label' => 'FAQ',
            'link' => 'faq',
            'params' => '{"permission":"Modules\\\\FAQ\\\\Http\\\\Controllers\\\\FAQController@index", "route_name":["admin.faq", "admin.faq.create", "admin.faq.edit"], "menu_level":"1"}',
            'is_default' => 1,
            'icon' => 'fas fa fa-comments',
            'parent' => 0,
            'sort' => 23,
            'class' => NULL,
            'menu' => 1,
            'depth' => 0,
            'is_custom_menu' => 0,],
        ], 'id');
    }
}
