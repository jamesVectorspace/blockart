<?php

namespace Modules\MenuBuilder\Database\Seeders\versions\v1_8_0;

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

        $addonMenu = MenuItems::where(['link' => 'addons', 'label' => 'addons', 'menu' => 1])->first();
        $addonMenu->update([
                'label' => 'Addon Manager',
                'link' => 'addons',
                'params' => '{"permission":"App\\\\Http\\\\Controllers\\\\AddonsMangerController@index","route_name":["addon.index","addon.switch-status","addon.remove","addon.upload"]}',
                'is_default' => 1,
                'icon' => 'fas fa-plug',
                'parent' => 0,
                'sort' => 58,
                'class' => NULL,
                'menu' => 1,
                'depth' => 0,
                'is_custom_menu' => 0,
            ]);

        $cleanMenu = MenuItems::where(['link' => 'clear-cache', 'menu' => 1])->first();
        if ($cleanMenu) {
            $cleanMenu->delete();
        }

    }
}
