<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('role_users')->delete();

        \DB::table('role_users')->insert(array (
            0 =>
            array (
                'role_id' => 1,
                'user_id' => 1,
            ),
            1 =>
            array (
                'role_id' => 2,
                'user_id' => 3,
            ),
            2 =>
            array (
                'role_id' => 2,
                'user_id' => 2,
            ),
            9 =>
            array (
                'role_id' => 1,
                'user_id' => 4,
            ),
        ));


    }
}
