<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('addresses')->delete();

        \DB::table('addresses')->insert(array (
            0 =>
            array (
                'id' => 1,
                'user_id' => 1,
                'first_name' => 'Agatha',
                'last_name' => 'Williams',
                'phone' => '01738896835',
                'email' => 'agathawilliams@techvill.net',
                'company_name' => NULL,
                'type_of_place' => 'home',
                'address_1' => 'Nikunja-2, Khilkhet',
                'address_2' => NULL,
                'city' => 'dhaka',
                'state' => '81',
                'zip' => '2233',
                'country' => 'bd',
                'is_default' => 1,
            ),
            1 =>
            array (
                'id' => 7,
                'user_id' => 2,
                'first_name' => 'Blaine',
                'last_name' => 'Keller',
                'phone' => '0135467989',
                'email' => 'blainekeller@techvill.net',
                'company_name' => NULL,
                'type_of_place' => 'home',
                'address_1' => 'Road no 1, House no 129',
                'address_2' => NULL,
                'city' => 'dhaka',
                'state' => '81',
                'zip' => '1229',
                'country' => 'bd',
                'is_default' => 1,
            ),
            2 =>
            array (
                'id' => 8,
                'user_id' => 3,
                'first_name' => 'Jamal',
                'last_name' => NULL,
                'phone' => '0135467989',
                'email' => 'jamal@techvill.net',
                'company_name' => NULL,
                'type_of_place' => 'home',
                'address_1' => 'House no 19',
                'address_2' => NULL,
                'city' => 'barishal',
                'state' => '85',
                'zip' => '1229',
                'country' => 'bd',
                'is_default' => 1,
            ),
            9 =>
            array (
                'id' => 15,
                'user_id' => 4,
                'first_name' => 'Henry',
                'last_name' => 'William',
                'phone' => '01782325656',
                'email' => 'henrywilliam@techvill.net',
                'company_name' => NULL,
                'type_of_place' => 'office',
                'address_1' => 'House no 19, Road no 2',
                'address_2' => NULL,
                'city' => 'Tungi',
                'state' => '81',
                'zip' => '1207',
                'country' => 'bd',
                'is_default' => 1,
            ),
        ));


    }
}
