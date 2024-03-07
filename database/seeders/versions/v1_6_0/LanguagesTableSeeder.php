<?php

namespace Database\Seeders\versions\v1_6_0;

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
                'name' => 'Sweden',
                'short_name' => 'sv',
                'flag' => NULL,
                'status' => 'Active',
                'is_default' => 0,
                'direction' => 'ltr',
            ],
        ]);


    }
}
