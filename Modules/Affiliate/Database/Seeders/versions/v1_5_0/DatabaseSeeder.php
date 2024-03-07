<?php

namespace Modules\Affiliate\Database\Seeders\versions\v1_5_0;

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

        $this->call([
            FormTableSeeder::class,
            CommissionPlanSeeder::class,
            PreferencesTableSeeder::class,
            CampaignsTableSeeder::class,
            EmailTemplatesTableSeeder::class,
            PermissionTableSeeder::class,
            WithdrawalMethodsTableSeeder::class
        ]);
    }
}
