<?php

namespace Modules\Reviews\Database\Seeders\versions\v1_8_0;

use Illuminate\Database\Seeder;
use Modules\MenuBuilder\Http\Models\MenuItems;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {

        $resetDbMenu = MenuItems::where(['link' => 'reviews', 'menu' => 1])->first();
        if ($resetDbMenu) {
            $resetDbMenu->delete();
        }

        addMenuItem('admin', 'Reviews', [
            'label' => 'Reviews',
            'link' => 'reviews',
            'params' => '{"permission":"Modules\\\\Reviews\\\\Http\\\\Controllers\\\\ReviewsController@index","route_name":["admin.review", "admin.review.create", "admin.review.edit"], "menu_level":"1"}',
            'is_default' => 1,
            'parent' => 57,
            'sort' => 100,
            'class' => NULL,
            'menu' => 1,
            'depth' => 0,
            'is_custom_menu' => 0,
        ]);

    }
}
