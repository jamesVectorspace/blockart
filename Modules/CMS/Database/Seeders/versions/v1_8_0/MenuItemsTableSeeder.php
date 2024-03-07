<?php

namespace Modules\CMS\Database\Seeders\versions\v1_8_0;

use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        addMenuItem('admin', 'Website Setup', [
            'label' => 'Website Setup', 
            'link' => NULL, 
            'params' => NULL, 
            'is_default' => 1, 
            'icon' => 'fas fa-globe', 
            'parent' => 0, 
            'sort' => 39, 
            'class' => NULL, 
            'menu' => 1, 
            'depth' => 0,
        ]);
    }
}
