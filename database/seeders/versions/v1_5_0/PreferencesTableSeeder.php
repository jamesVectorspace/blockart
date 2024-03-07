<?php

namespace Database\seeders\versions\v1_5_0;

use Illuminate\Database\Seeder;

class PreferencesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {

        \DB::table('preferences')->where(['category' => 'preference', 'field' => 'welcome_email'])->update(['value' => '0']);
    }
}
