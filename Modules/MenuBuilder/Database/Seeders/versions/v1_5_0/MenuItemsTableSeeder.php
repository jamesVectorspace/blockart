<?php

namespace Modules\MenuBuilder\Database\Seeders\versions\v1_5_0;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {
        DB::table('menu_items')->upsert([
            [
                'id' => 19,
                'label' => 'General Settings',
                'link' => 'general-setting',
                'params' => '{"permission":"App\\\\Http\\\\Controllers\\\\CompanySettingController@index","route_name":["preferences.index", "companyDetails.setting", "maintenance.enable", "language.translation", "language.index", "currency.convert", "withdrawalSetting.index", "setting.setRedirectLink"]}',
                'is_default' => 1,
                'icon' => NULL,
                'parent' => 31,
                'sort' => 49,
                'class' => NULL,
                'menu' => 1,
                'depth' => 1,
                'is_custom_menu' => 0,
            ],
            [
                'id' => 100,
                'label' => 'Accounts',
                'link' => 'account-setting',
                'params' => '{"permission":"App\\\\Http\\\\Controllers\\\\AccountSettingController@index","route_name":["account.setting.option", "sso.index", "emailVerifySetting", "preferences.password", "permissionRoles.index", "roles.index", "roles.create", "roles.edit", "account.setting.defaultPackage"]}',
                'is_default' => 1,
                'icon' => NULL,
                'parent' => 31,
                'sort' => 54,
                'class' => NULL,
                'menu' => 1,
                'depth' => 1,
                'is_custom_menu' => 0,
            ],
        ], 'id');
    }
}
