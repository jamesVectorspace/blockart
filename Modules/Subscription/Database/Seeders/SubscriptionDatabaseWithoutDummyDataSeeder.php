<?php

namespace Modules\Subscription\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Database\Seeders\AdminMenusTableSeeder;

use Modules\Subscription\Database\Seeders\versions\v1_2_0\{
    MenuItemsTableSeeder as MenuItemsTableV120Seeder
};

class SubscriptionDatabaseWithoutDummyDataSeeder extends Seeder
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
            MenuItemsTableV120Seeder::class
        ]);
    }
}
