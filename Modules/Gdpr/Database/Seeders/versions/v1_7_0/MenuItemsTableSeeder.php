<?php

namespace Modules\Gdpr\Database\Seeders\versions\v1_7_0;

use Illuminate\Database\Seeder;
use Modules\MenuBuilder\Http\Models\MenuItems;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run() {

        $menuItemsData = [
            'label' => 'General Settings',
            'link' => 'general-setting',
            'params' => '{"permission":"App\\\\Http\\\\Controllers\\\\CompanySettingController@index","route_name":["preferences.index", "companyDetails.setting", "maintenance.enable", "language.translation", "language.index", "currency.convert", "withdrawalSetting.index", "setting.setRedirectLink", "gdpr.create"]}',
            'is_default' => 1,
            'icon' => NULL,
            'parent' => 31,
            'sort' => 49,
            'class' => NULL,
            'menu' => 1,
            'depth' => 1,
            'is_custom_menu' => 0,
        ];

        MenuItems::updateOrInsert(['link' => 'general-setting'], $menuItemsData);

    }
}
