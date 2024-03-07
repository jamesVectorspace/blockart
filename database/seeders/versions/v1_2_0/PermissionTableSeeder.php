<?php

namespace Database\seeders\versions\v1_2_0;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {

        \DB::table('permission_roles')->insert([
            'permission_id' => 529,
            'role_id' => 2,
        ]);
        \DB::table('permission_roles')->insert([
            'permission_id' => 530,
            'role_id' => 2,
        ]);
        \DB::table('permission_roles')->insert([
            'permission_id' => 531,
            'role_id' => 2,
        ]);
        \DB::table('permission_roles')->insert([
            'permission_id' => 533,
            'role_id' => 2,
        ]);

        $parentId = Permission::insertGetId([
            'controller_name' => 'OpenAIController',
            'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController',
            'method_name' => 'contentTogglebookmark',
            'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController@contentTogglebookmark',
        ]);

        \DB::table('permission_roles')->insert([
            'permission_id' => $parentId,
            'role_id' => 2,
        ]);

        $parentId = Permission::insertGetId([
            'controller_name' => 'UseCasesController',
            'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCasesController',
            'method_name' => 'useCaseToggleFavorite',
            'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCasesController@useCaseToggleFavorite',
        ]);

        \DB::table('permission_roles')->insert([
            'permission_id' => $parentId,
            'role_id' => 2,
        ]);

        $parentId = Permission::insertGetId([
            'controller_name' => 'OpenAIPreferenceController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIPreferenceController',
                'method_name' => 'chatPreferences',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIPreferenceController@chatPreferences',
        ]);

        \DB::table('permission_roles')->insert([
            'permission_id' => $parentId,
            'role_id' => 2,
        ]);
        
        $permissions = Permission::select('id')->where(['controller_name' => 'PackageSubscriptionController'])->whereIn('method_name', ['cancel', 'store', 'setting'])->pluck('id')->toArray();
        $permissionRoles = [];
        
        foreach ($permissions as $id) {
            $permissionRoles[] = [
                'permission_id' => $id,
                'role_id' => 2,
            ];
        }
        
        \DB::table('permission_roles')->insert($permissionRoles);
    }
}
