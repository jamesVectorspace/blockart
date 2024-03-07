<?php

namespace Modules\DatabaseBackup\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_menus')->upsert([
            [
                'name' => 'Manual Backup',
                'slug' => 'manual-backup',
                'url' => 'manual-backup',
                'permission' => '{"permission":"Modules\\\\DatabaseBackup\\\\Http\\\\Controllers\\\\DatabaseBackupController@manualDatabaseBackupForm", "route_name":["database.manual.backup"]}',
                'is_default' => 1,
            ],
            [
                'name' => 'Automated Backup',
                'slug' => 'automated-backup',
                'url' => 'automated-backup',
                'permission' => '{"permission":"Modules\\\\DatabaseBackup\\\\Http\\\\Controllers\\\\DatabaseBackupController@automatedDatabaseBackupForm", "route_name":["database.automated.backup"]}',
                'is_default' => 0,
            ],
            [
                'name' => 'Archive',
                'slug' => 'archive',
                'url' => 'manual-backup-list',
                'permission' => '{"permission":"Modules\\\\DatabaseBackup\\\\Http\\\\Controllers\\\\DatabaseBackupController@list", "route_name":["database.manual.backup.list"]}',
                'is_default' => 0,
            ]
            
        ], 'slug');
    }
}
