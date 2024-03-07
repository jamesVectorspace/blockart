<?php

namespace Modules\Reviews\Database\Seeders;

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
                'id' => 161,
                'label' => 'Reviews',
                'link' => 'reviews',
                'params' => '{"permission":"Modules\\\\Reviews\\\\Http\\\\Controllers\\\\ReviewsController@index","route_name":["admin.review", "admin.review.create", "admin.review.edit"], "menu_level":"1"}',
                'is_default' => 1,
                'icon' => 'fas fa-comment',
                'parent' => 0,
                'sort' => 25,
                'class' => NULL,
                'menu' => 1,
                'depth' => 0,
                'is_custom_menu' => 0,
            ],
        ], 'id');
    }
}
