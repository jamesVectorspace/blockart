<?php

namespace Modules\Gdpr\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Gdpr\Database\Seeders\versions\v1_7_0\DatabaseSeeder as V17DatabaseSeeder;
use Modules\Gdpr\Database\Seeders\versions\v1_5_0\DatabaseSeeder;

class GdprDatabaseSeeder extends Seeder
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
            DatabaseSeeder::class,
            V17DatabaseSeeder::class
        ]);
    }
}
