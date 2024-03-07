<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Agatha Williams',
                'email' => 'admin@techvill.net',
                'email_verified_at' => NULL,
                'password' => '$2y$10$zXgnp.9rIXbNYr3ZUo7xVOWUhKKHXJZ63nBgT1zLFgi0CG6RUgfxG',
                'phone' => NULL,
                'birthday' => NULL,
                'gender' => 'Male',
                'address' => NULL,
                'sso_account_id' => NULL,
                'sso_service' => NULL,
                'remember_token' => NULL,
                'status' => 'Active',
                'activation_code' => NULL,
                'activation_otp' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Blaine Keller',
                'email' => 'user@techvill.net',
                'email_verified_at' => NULL,
                'password' => '$2y$10$d0TN5l6NAx/zrqfYbW4eY.3qNwtLIeHhLOqoMgiuqLsDg6GXmcqeu',
                'phone' => NULL,
                'birthday' => NULL,
                'gender' => NULL,
                'address' => NULL,
                'sso_account_id' => NULL,
                'sso_service' => NULL,
                'remember_token' => NULL,
                'status' => 'Active',
                'activation_code' => NULL,
                'activation_otp' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Jamal',
                'email' => 'jamal@techvill.net',
                'email_verified_at' => NULL,
                'password' => '$2y$10$AbEg.NFMGHv9kmwNmK6EZuzJcRR1oEADEVaYOkxS/ZCbSrmJDQq5S',
                'phone' => NULL,
                'birthday' => NULL,
                'gender' => NULL,
                'address' => NULL,
                'sso_account_id' => NULL,
                'sso_service' => NULL,
                'remember_token' => NULL,
                'status' => 'Active',
                'activation_code' => NULL,
                'activation_otp' => NULL,
            ),
            
            9 => 
            array (
                'id' => 4,
                'name' => 'Henry William',
                'email' => 'henrywilliam@techvill.net',
                'email_verified_at' => NULL,
                'password' => '$2y$10$rpVsJdeDQy8acG8uRYYJXOxM2YvBCq1VkrZ4OUc0v4ukBdGwYX44e',
                'phone' => NULL,
                'birthday' => NULL,
                'gender' => NULL,
                'address' => NULL,
                'sso_account_id' => NULL,
                'sso_service' => NULL,
                'remember_token' => NULL,
                'status' => 'Active',
                'activation_code' => NULL,
                'activation_otp' => NULL,
            ),
        ));
        
        
    }
}
