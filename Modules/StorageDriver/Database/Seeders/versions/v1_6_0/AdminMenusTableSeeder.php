<?php

namespace Modules\StorageDriver\Database\Seeders\versions\v1_6_0;

use Illuminate\Database\Seeder;
use Modules\MenuBuilder\Http\Models\Menus;

class AdminMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $menu = Menus::where(['slug' => 'storage-drivers'])->first();
        
        if (!$menu) {
            Menus::insert([
                'name' => 'Storage Drivers',
                'slug' => 'storage-drivers',
                'url' => 'storagedriver',
                'permission' => '{"permission":"Modules\\\\StorageDriver\\\\Http\\\\Controllers\\\\StorageDriverController@index", "route_name":["storagedriver", "configstoragedriver"], "menu_level":"1"}',
                'is_default' => 1
            ]);
        }
    }
}
