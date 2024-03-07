<?php

namespace Modules\Affiliate\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Affiliate\Database\Seeders\versions\v1_5_0\{
    FormTableSeeder,
    CommissionPlanSeeder,
    PreferencesTableSeeder,
    EmailTemplatesTableSeeder,
    PermissionTableSeeder,
    WithdrawalMethodsTableSeeder
};

class AffiliateDatabaseWithoutDummyDataSeeder extends Seeder
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
            EmailTemplatesTableSeeder::class,
            PermissionTableSeeder::class,
            WithdrawalMethodsTableSeeder::class
        ]);
    }
}
