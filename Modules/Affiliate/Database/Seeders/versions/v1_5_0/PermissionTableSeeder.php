<?php

namespace Modules\Affiliate\Database\Seeders\versions\v1_5_0;

use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@dashboard',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'dashboard',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@users',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'users',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@profile',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'profile',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@userProfileUpdate',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'userProfileUpdate',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@referrals',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'referrals',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@topPackages',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'topPackages',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@payouts',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'payouts',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@userDestroy',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'userDestroy',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@multiTier',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'multiTier',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@findProductAjaxQuery',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'findProductAjaxQuery',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@findCategoryAjaxQuery',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'findCategoryAjaxQuery',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@findAffiliateTagAjaxQuery',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'findAffiliateTagAjaxQuery',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@findAffiliateUserAjaxQuery',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'findAffiliateUserAjaxQuery',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController@settings',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateController',
            'controller_name' => 'AffiliateController',
            'method_name' => 'settings',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateTagController@index',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateTagController',
            'controller_name' => 'AffiliateTagController',
            'method_name' => 'index',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateTagController@store',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateTagController',
            'controller_name' => 'AffiliateTagController',
            'method_name' => 'store',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateTagController@edit',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateTagController',
            'controller_name' => 'AffiliateTagController',
            'method_name' => 'edit',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateTagController@update',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateTagController',
            'controller_name' => 'AffiliateTagController',
            'method_name' => 'update',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateTagController@destroy',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\AffiliateTagController',
            'controller_name' => 'AffiliateTagController',
            'method_name' => 'destroy',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\CampaignController@index',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\CampaignController',
            'controller_name' => 'CampaignController',
            'method_name' => 'index',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\CampaignController@store',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\CampaignController',
            'controller_name' => 'CampaignController',
            'method_name' => 'store',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\CampaignController@edit',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\CampaignController',
            'controller_name' => 'CampaignController',
            'method_name' => 'edit',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\CampaignController@update',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\CampaignController',
            'controller_name' => 'CampaignController',
            'method_name' => 'update',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\CampaignController@destroy',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\CampaignController',
            'controller_name' => 'CampaignController',
            'method_name' => 'destroy',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\CommissionPlanController@index',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\CommissionPlanController',
            'controller_name' => 'CommissionPlanController',
            'method_name' => 'index',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\CommissionPlanController@create',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\CommissionPlanController',
            'controller_name' => 'CommissionPlanController',
            'method_name' => 'create',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\CommissionPlanController@store',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\CommissionPlanController',
            'controller_name' => 'CommissionPlanController',
            'method_name' => 'store',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\CommissionPlanController@edit',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\CommissionPlanController',
            'controller_name' => 'CommissionPlanController',
            'method_name' => 'edit',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\CommissionPlanController@update',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\CommissionPlanController',
            'controller_name' => 'CommissionPlanController',
            'method_name' => 'update',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\CommissionPlanController@destroy',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\CommissionPlanController',
            'controller_name' => 'CommissionPlanController',
            'method_name' => 'destroy',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\WithdrawalsController@index',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\WithdrawalsController',
            'controller_name' => 'WithdrawalsController',
            'method_name' => 'index',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);

        $permissionId = Permission::insertGetId([
            'name' => 'Modules\\Affiliate\\Http\\Controllers\\WithdrawalsController@view',
            'controller_path' => 'Modules\\Affiliate\\Http\\Controllers\\WithdrawalsController',
            'controller_name' => 'WithdrawalsController',
            'method_name' => 'view',
        ]);

        PermissionRole::insert([
            'permission_id' => $permissionId,
            'role_id' => 1,
        ]);
    }
}
