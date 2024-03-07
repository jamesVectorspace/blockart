<?php

namespace Modules\MenuBuilder\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\MenuBuilder\Database\Seeders\versions\v1_5_0\DatabaseSeeder as DatabaseSeederV15;
use Modules\MenuBuilder\Database\Seeders\versions\v1_8_0\DatabaseSeeder as DatabaseSeederV18;

class MenuBuilderDatabaseWithoutDummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableWithoutDummyDataSeeder::class);
        $this->call(AdminMenusTableSeeder::class);

        $this->call(DatabaseSeederV15::class);
        $this->call(DatabaseSeederV18::class);
    }
}
