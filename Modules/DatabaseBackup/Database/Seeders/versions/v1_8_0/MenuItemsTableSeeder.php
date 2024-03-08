<?php

namespace Modules\DatabaseBackup\Database\Seeders\versions\v1_8_0;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Modules\MenuBuilder\Http\Models\MenuItems;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {

        $resetDbMenu = MenuItems::where(['link' => NULL, 'label' => 'Tools', 'menu' => 1])->first();
        $resetDbMenu->update([
                'label' => 'Tools',
                'link' => NULL,
                'params' => NULL,
                'is_default' => 1,
                'icon' => 'fas fa-cogs',
                'parent' => 0,
                'sort' => 47,
                'class' => NULL,
                'menu' => 1,
                'depth' => 0,
                'is_custom_menu' => 0
         ]);
    }
}
