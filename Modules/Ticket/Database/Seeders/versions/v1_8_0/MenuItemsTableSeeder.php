<?php

namespace Modules\Ticket\Database\Seeders\versions\v1_8_0;

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

        $resetDbMenu = MenuItems::where(['link' => NULL, 'label' => 'Tickets', 'menu' => 1])->first();
       $resetDbMenu->update([
            'label' => 'Support Tickets',
            'link' => NULL,
            'params' => NULL,
            'is_default' => 1,
            'icon' => 'fas fa-ticket-alt',
            'parent' => 0,
            'sort' => 44,
            'class' => NULL,
            'menu' => 1,
            'depth' => 0,
            'is_custom_menu' => 0,
        ]);

    }
}
