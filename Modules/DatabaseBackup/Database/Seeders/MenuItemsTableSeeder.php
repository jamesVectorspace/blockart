<?php

namespace Modules\DatabaseBackup\Database\Seeders;

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
        MenuItems::insert([
            [
                    'id' => 182,
                    'label' => 'Tools',
                    'link' => NULL,
                    'params' => NULL,
                    'is_default' => 1,
                    'icon' => 'fas fa-download',
                    'parent' => 0,
                    'sort' => 47,
                    'class' => NULL,
                    'menu' => 1,
                    'depth' => 0,
                    'is_custom_menu' => 0,
            ],
            [
                'id' => 183,
                'label' => 'Database Backup',
                'link' => 'manual-backup-list',
                'params' => '{"permission":"Modules\\\\DatabaseBackup\\\\Http\\\\Controllers\\\\DatabaseBackupController@list", "route_name":["database.manual.backup.list","dropbox_setting.create","google_drive_setting.create","database.automated.backup"]}',
                'is_default' => 1,
                'icon' => NULL,
                'parent' => 182,
                'sort' => 63,
                'class' => NULL,
                'menu' => 1,
                'depth' => 1,
                'is_custom_menu' => 0,
            ]
        ]);
    }
}
