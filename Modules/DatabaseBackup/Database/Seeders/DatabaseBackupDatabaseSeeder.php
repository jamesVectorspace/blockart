<?php

namespace Modules\DatabaseBackup\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\DatabaseBackup\Database\Seeders\versions\v1_8_0\DatabaseSeeder;

class DatabaseBackupDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call([
            MenuItemsTableSeeder::class,
            AdminMenusTableSeeder::class,
            DatabaseSeeder::class
        ]);
        
    }
}
