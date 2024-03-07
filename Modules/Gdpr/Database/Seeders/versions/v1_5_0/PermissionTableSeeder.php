<?php

namespace Modules\Gdpr\Database\Seeders\versions\v1_5_0;

use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {
        if (!Permission::where('name', 'Modules\\Gdpr\\Http\\Controllers\\GdprController@create')->first()) {

            $permissionId = Permission::insertGetId([
                'name' => 'Modules\\Gdpr\\Http\\Controllers\\GdprController@create',
                'controller_path' => 'Modules\\Gdpr\\Http\\Controllers\\GdprController',
                'controller_name' => 'GdprController',
                'method_name' => 'create',
            ]);

            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 1,
            ]);
        }

        if (!Permission::where('name', 'Modules\\Gdpr\\Http\\Controllers\\GdprController@store')->first()) {

            $permissionId = Permission::insertGetId([
                'name' => 'Modules\\Gdpr\\Http\\Controllers\\GdprController@store',
                'controller_path' => 'Modules\\Gdpr\\Http\\Controllers\\GdprController',
                'controller_name' => 'GdprController',
                'method_name' => 'store',
            ]);

            PermissionRole::insert([
                'permission_id' => $permissionId,
                'role_id' => 1,
            ]);
        }
          

    }
}
