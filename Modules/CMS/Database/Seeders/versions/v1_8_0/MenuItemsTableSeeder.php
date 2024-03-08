<?php

namespace Modules\CMS\Database\Seeders\versions\v1_8_0;

use Illuminate\Database\Seeder;
use Modules\MenuBuilder\Http\Models\MenuItems;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
         $resetDbMenu = MenuItems::where(['link' => NULL, 'label' => 'Website Setup', 'menu' => 1])->first();
        $resetDbMenu->update([
            'label' => 'Website Setup',
                'link' => NULL,
                'params' => NULL,
                'is_default' => 1,
                'icon' => 'fas fa-globe',
                'parent' => 0,
                'sort' => 39,
                'class' => NULL,
                'menu' => 1,
                'depth' => 1,
         ]);
    }
}
