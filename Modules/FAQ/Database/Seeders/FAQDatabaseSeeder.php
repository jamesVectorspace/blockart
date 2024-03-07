<?php

namespace Modules\FAQ\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\FAQ\Database\Seeders\versions\v1_8_0\MenuItemsTableSeeder;

class FAQDatabaseSeeder extends Seeder
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
            FaqTableSeeder::class,
            MenuItemsTableSeeder::class
        ]);
    }
}
