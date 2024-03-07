<?php

namespace Modules\Gateway\Database\Seeders;

use Illuminate\Database\Seeder;

class GatewaysTableWithoutDummyDataSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('gateways')->delete();
    }
}
