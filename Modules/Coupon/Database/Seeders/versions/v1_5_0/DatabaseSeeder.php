<?php

namespace Modules\Coupon\Database\Seeders\versions\v1_5_0;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(AdminMenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(CouponsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
    }
}
