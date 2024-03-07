<?php

namespace Modules\CMS\Database\Seeders\versions\v1_7_0;

use Illuminate\Database\Seeder;

class ComponentPropertiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('component_properties')
            ->where('component_id', 4)
            ->where('name', 'btn_link1')
            ->where('value', 'https:/www.youtube.com/watch?v=qTgPSKKjfVg')
            ->update(['value' => 'https://www.youtube.com/watch?v=qTgPSKKjfVg']);
    }
}