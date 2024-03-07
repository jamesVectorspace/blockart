<?php

namespace Database\Seeders\versions\v1_2_0;

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('languages')->insert([
            [
                'name' => 'Polish',
                'short_name' => 'pl',
                'flag' => NULL,
                'status' => 'Active',
                'is_default' => 0,
                'direction' => 'ltr',
            ],
            [
                'name' => 'German',
                'short_name' => 'de',
                'flag' => NULL,
                'status' => 'Active',
                'is_default' => 0,
                'direction' => 'ltr',
            ], 
        ]);


    }
}
