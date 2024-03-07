<?php

namespace Database\seeders\versions\v1_2_0;

use Illuminate\Database\Seeder;

class PreferencesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {

        \DB::table('preferences')->insert([
            'category' => 'preference',
            'field' => 'welcome_email',
            'value' => '1',
        ]);
    }
}
