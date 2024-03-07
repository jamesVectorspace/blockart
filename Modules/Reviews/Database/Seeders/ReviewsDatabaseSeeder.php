<?php

namespace Modules\Reviews\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Reviews\Database\Seeders\versions\v1_8_0\DatabaseSeeder;

class ReviewsDatabaseSeeder extends Seeder
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
            AdminMenusTableSeeder::class,
            MenuItemsTableSeeder::class,
            ReviewTableSeeder::class,
            DatabaseSeeder::class

        ]);
    }
}
