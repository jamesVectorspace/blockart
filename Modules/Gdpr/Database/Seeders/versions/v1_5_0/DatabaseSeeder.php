<?php

namespace Modules\Gdpr\Database\Seeders\versions\v1_5_0;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(PermissionTableSeeder::class);
    }
}
