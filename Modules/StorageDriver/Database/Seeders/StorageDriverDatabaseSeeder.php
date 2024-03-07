<?php

namespace Modules\StorageDriver\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\StorageDriver\Database\Seeders\versions\v1_6_0\DatabaseSeeder;

class StorageDriverDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DatabaseSeeder::class);
    }
}
