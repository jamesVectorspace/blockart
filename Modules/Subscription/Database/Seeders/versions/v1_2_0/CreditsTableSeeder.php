<?php

namespace Modules\Subscription\Database\Seeders\versions\v1_2_0;

use Illuminate\Database\Seeder;

class CreditsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('credits')->delete();
        
        \DB::table('credits')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => NULL,
                'name' => 'Bronze',
                'code' => 'bronze',
                'price' => '9.99000000',
                'sort_order' => 1,
                'plans' => NULL,
                'features' => '{"word":"10000","image":"100","minute":"100"}',
                'status' => 'Active',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => NULL,
                'name' => 'Silver',
                'code' => 'silver',
                'price' => '19.99000000',
                'sort_order' => 2,
                'plans' => NULL,
                'features' => '{"word":"20000","image":"200","minute":"200"}',
                'status' => 'Active',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => NULL,
                'name' => 'Gold',
                'code' => 'gold',
                'price' => '24.99000000',
                'sort_order' => 3,
                'plans' => NULL,
                'features' => '{"word":"30000","image":"300","minute":"300"}',
                'status' => 'Active',
            ),
        ));
        
        
    }
}
