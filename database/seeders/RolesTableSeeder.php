<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Admin',
                'slug' => 'admin',
                'type' => 'admin',
                'description' => 'Admin description',

            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'User',
                'slug' => 'user',
                'type' => 'user',
                'description' => 'Customer description',
            )
        ));


    }
}
