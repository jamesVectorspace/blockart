<?php

namespace Modules\Affiliate\Database\Seeders\versions\v1_5_0;

use Illuminate\Database\Seeder;
use Modules\Affiliate\Entities\CommissionPlan;

class CommissionPlanSeeder extends Seeder
{
    public function run()
    {
        CommissionPlan::insert([
            ['id' => 1, 'name' => 'Storewide Default Commission', 'commission' => 20, 'level' => 1, 'commission_type' => 'percentage', 'status' => 'Active', 'is_default' => 1],
        ]);

    }
}
