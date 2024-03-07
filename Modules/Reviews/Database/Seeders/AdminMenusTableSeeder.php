<?php

namespace Modules\Reviews\Database\Seeders;

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
                'name' => 'Reviews',
                'slug' => 'reviews',
                'url' => 'reviews',
                'permission' => '{"permission":"Modules\\\\Reviews\\\\Http\\\\Controllers\\\\ReviewsController@index", "route_name":["admin.review", "admin.review.create", "admin.review.edit"], "menu_level":"1"}',
                'is_default' => 1
            ]
        ], 'slug');
    }
}
