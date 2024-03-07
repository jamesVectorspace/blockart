<?php

namespace Database\seeders\versions\v1_4_0;

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
            [
                'category' => 'openai',
                'field' => 'conversation_limit',
                'value' => '4'
            ],
            [
                'category' => 'openai',
                'field' => 'word_count_method',
                'value' => 'token'
            ],
            [
                'category' => 'openai',
                'field' => 'google_api',
                'value' => 'AIswdasdsdasdasdsadasdasEr87',
            ]
        ]);
    }
}
