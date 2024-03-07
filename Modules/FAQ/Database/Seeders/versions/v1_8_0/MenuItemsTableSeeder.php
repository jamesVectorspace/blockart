<?php

namespace Modules\FAQ\Database\Seeders\versions\v1_8_0;

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

        $resetDbMenu = MenuItems::where(['link' => 'faq', 'menu' => 1])->first();
        if ($resetDbMenu) {
            $resetDbMenu->delete();
        }

        addMenuItem('admin', 'FAQ', [
            'label' => 'FAQ',
            'link' => 'faq',
            'params' => '{"permission":"Modules\\\\FAQ\\\\Http\\\\Controllers\\\\FAQController@index", "route_name":["admin.faq", "admin.faq.create", "admin.faq.edit"], "menu_level":"1"}',
            'is_default' => 1,
            'parent' => 57,
            'sort' => 90,
            'class' => NULL,
            'menu' => 1,
            'depth' => 1,
            'is_custom_menu' => 0,
        ]);

    }
}
