<?php

namespace Modules\Coupon\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Coupon\Database\Seeders\versions\v1_5_0\DatabaseSeeder as V15DatabaseSeeder;

class CouponDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(V15DatabaseSeeder::class);
    }
}
