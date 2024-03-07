<?php

namespace Database\seeders\versions\v1_5_0;

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {

        \DB::table('permissions')->insert([
            [
                'controller_name' => 'CompanySettingController',
                'controller_path' => 'App\\Http\\Controllers\\CompanySettingController',
                'method_name' => 'setRedirectLink',
                'name' => 'App\\Http\\Controllers\\CompanySettingController@setRedirectLink',
            ],
            [
                'controller_name' => 'AccountSettingController',
                'controller_path' => 'App\\Http\\Controllers\\AccountSettingController',
                'method_name' => 'defaultPackage',
                'name' => 'App\\Http\\Controllers\\AccountSettingController@defaultPackage',
            ]
        ]);
          

    }
}
