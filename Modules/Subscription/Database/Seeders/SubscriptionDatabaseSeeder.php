<?php

namespace Modules\Subscription\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Subscription\Database\Seeders\versions\v1_2_0\{
    PackageSubscriptionsMetaTableSeeder as PackageSubscriptionsMetaV12TableSeeder,
    PackagesMetaTableSeeder as PackagesMetaV12TableSeeder,
    PackagesTableSeeder as PackageTableV120Seeder,
    CreditsTableSeeder as CreditsTableV120Seeder,
    MenuItemsTableSeeder as MenuItemsTableV120Seeder
};

use Modules\Subscription\Database\Seeders\versions\v1_4_0\DatabaseSeeder as DatabaseSeederV14;

class SubscriptionDatabaseSeeder extends Seeder
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
        $this->call(PackagesTableSeeder::class);
        $this->call(PackagesMetaTableSeeder::class);
        $this->call(PackageSubscriptionsTableSeeder::class);
        $this->call(PackageSubscriptionsMetaTableSeeder::class);
        $this->call(SubscriptionDetailsTableSeeder::class);
        $this->call(PackageTableV120Seeder::class);
        $this->call(CreditsTableV120Seeder::class);

        $this->call(PackageSubscriptionsMetaV12TableSeeder::class);
        $this->call(PackagesMetaV12TableSeeder::class);
        $this->call(MenuItemsTableV120Seeder::class);
        $this->call(DatabaseSeederV14::class);
    }
}
