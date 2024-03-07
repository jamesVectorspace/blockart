<?php

namespace Modules\StorageDriver\Database\Seeders\versions\v1_6_0;

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

        $configuration = MenuItems::where(['label' => 'Configurations', 'parent' => 0])->first();
        
        $menu = MenuItems::where('label', 'Storage Drivers')->first();
        
        if (!$menu) {
            MenuItems::insert([
                'label' => 'Storage Drivers',
                'link' => 'storagedriver',
                'params' => '{"permission":"Modules\\\\StorageDriver\\\\Http\\\\Controllers\\\\StorageDriverController@index", "route_name":["storagedriver", "configstoragedriver"]}',
                'is_default' => 1,
                'icon' => NULL,
                'parent' => $configuration?->id ?? 0,
                'sort' => 56,
                'class' => NULL,
                'menu' => 1,
                'depth' => 1,
                'is_custom_menu' => 0,
            ]);
        }
    }
}
