<?php

namespace Modules\MenuBuilder\Database\Seeders;

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('menus')->delete();

        \DB::table('menus')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2021-12-13 10:08:14',
                'updated_at' => NULL,
            ),
            1 =>
            array (
                'id' => 4,
                'name' => 'public header',
                'created_at' => '2021-12-20 09:43:48',
                'updated_at' => NULL,
            ),
        ));

    }
}
