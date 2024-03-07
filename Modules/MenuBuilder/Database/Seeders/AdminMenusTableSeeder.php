<?php

namespace Modules\MenuBuilder\Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     */
    public function run(): void
    {

        DB::table('admin_menus')->delete();

        DB::table('admin_menus')->insert(array (
            0 =>
            array (
                'id' => 7,
                'name' => 'All Users',
                'slug' => 'user-list',
                'url' => 'user/list',
                'permission' => '{"permission":"App\\\\Http\\\\Controllers\\\\UserController@index", "route_name":["users.index", "users.create", "users.edit", "users.pdf", "users.csv", "users.verify", "users.profile"], "menu_level":"1"}',
                'is_default' => 0,
            ),
            8 =>
            array (
                'id' => 19,
                'name' => 'Addons',
                'slug' => 'addons',
                'url' => 'addons',
                'permission' => '{"permission":"Modules\\\\Addons\\\\Http\\\\Controllers\\\\AddonsController@index", "route_name":["addon.index", "addon.switch-status", "addon.remove", "addon.upload"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            9 =>
            array (
                'id' => 20,
                'name' => 'Menu Builder',
                'slug' => 'menu-builder',
                'url' => 'menu-builder',
                'permission' => '{"permission":"Modules\\\\MenuBuilder\\\\Http\\\\Controllers\\\\MenuBuilderController@index","route_name":["menu.index"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            10 =>
            array (
                'id' => 22,
                'name' => 'General Settings',
                'slug' => 'general-settings',
                'url' => 'emailConfiguration',
                'permission' => '{"permission":"App\\\\Http\\\\Controllers\\\\EmailConfigurationController@index","route_name":["emailConfigurations.index", "maintenance.enable", "language.translation", "language.index", "currency.convert", "sso.index", "orderStatues.index"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            12 =>
            array (
                'id' => 29,
                'name' => 'Cache Clear',
                'slug' => 'cache-clear',
                'url' => 'clear-cache',
                'permission' => '{"permission":"App\\\\Http\\\\Controllers\\\\DashboardController@index", "route_name":["dashboard"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            13 =>
            array (
                'id' => 30,
                'name' => 'Dashboard',
                'slug' => 'user-dashboard',
                'url' => 'dashboard',
                'permission' => '{"permission":"App\\\\Http\\\\Controllers\\\\Site\\\\DashboardController@index", "route_name":["site.dashboard"], "menu_level":"2"}',
                'is_default' => 1,
            ),
            17 =>
            array (
                'id' => 34,
                'name' => 'My Profile',
                'slug' => 'user-profile',
                'url' => 'profile',
                'permission' => '{"permission":"App\\\\Http\\\\Controllers\\\\UserController@index", "route_name":["site.userProfile", "site.userProfileEditPassword"], "menu_level":"2"}',
                'is_default' => 1,
            ),
            19 =>
            array (
                'id' => 36,
                'name' => 'Settings',
                'slug' => 'settings',
                'url' => 'setting',
                'permission' => '{"permission":"App\\\\Http\\\\Controllers\\\\Site\\\\AddressController@index", "route_name":["site.userSetting"], "menu_level":"2"}',
                'is_default' => 1,
            ),
            20 =>
            array (
                'id' => 37,
                'name' => 'Logout',
                'slug' => 'logout',
                'url' => 'logout',
                'permission' => '{"permission":"App\\\\Http\\\\Controllers\\\\Site\\\\LoginController@logout", "route_name":["site.logout"], "menu_level":"2"}',
                'is_default' => 1,
            ),
            33 =>
            array (
                'id' => 69,
                'name' => 'Blog Category',
                'slug' => 'blog-category',
                'url' => 'blog/category/list',
                'permission' => '{"permission":"Modules\\\\Blog\\\\Http\\\\Controllers\\\\BlogCategoryController@index", "route_name":["blog.category.index"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            34 =>
            array (
                'id' => 70,
                'name' => 'Blog',
                'slug' => 'blog',
                'url' => 'blogs',
                'permission' => '{"permission":"Modules\\\\Blog\\\\Http\\\\Controllers\\\\BlogController@index", "route_name":["blog.index", "blog.create", "blog.edit"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            35 =>
            array (
                'id' => 71,
                'name' => 'Pages',
                'slug' => 'page',
                'url' => 'page/list',
                'permission' => '{"permission":"Modules\\\\CMS\\\\Http\\\\Controllers\\\\CMSController@index", "route_name":["page.index", "page.create", "page.edit"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            36 =>
            array (
                'id' => 72,
                'name' => 'Appearance',
                'slug' => 'appearance',
                'url' => 'theme/list',
                'permission' => '{"permission":"Module\\\\CMS\\\\Http\\\\Controllers\\\\ThemeOptionController@list", "route_name":["theme.index", "theme.store"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            42 =>
            array (
                'id' => 80,
                'name' => 'Media Manager',
                'slug' => 'media-manager',
                'url' => 'uploaded-files',
                'permission' => '{"permission":"Modules\\\\MediaManager\\\\Http\\\\Controllers\\\\MediaManagerController@uploadedFiles", "route_name":["mediaManager.create", "mediaManager.upload", "mediaManager.uploadedFiles", "mediaManager.sortFiles", "mediaManager.paginateFiles", "mediaManager.download", "mediaManager.maxId"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            43 =>
            array (
                'id' => 81,
                'name' => 'Geo Locale',
                'slug' => 'geo-locale',
                'url' => 'geolocale',
                'permission' => '{"permission":"Modules\\\\GeoLocale\\\\Http\\\\Controllers\\\\GeoLocaleController@index", "route_name":["geolocale.index"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            46 =>
            array (
                'id' => 87,
                'name' => 'Reports',
                'slug' => 'reports',
                'url' => 'reports',
                'permission' => '{"permission":"Modules\\\\Report\\\\Http\\\\Controllers\\\\ReportController@index", "route_name":["reports"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            48 =>
            array (
                'id' => 92,
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'url' => 'dashboard',
                'permission' => '{"permission":"App\\\\Http\\\\Controllers\\\\DashboardController@index", "route_name":["dashboard"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            49 =>
            array (
                'id' => 93,
                'name' => 'Add User',
                'slug' => 'add-user',
                'url' => 'user/create',
                'permission' => '{"permission":"App\\\\Http\\\\Controllers\\\\UserController@index", "route_name":["users.index", "users.create", "users.edit", "users.pdf", "users.csv", "users.verify", "users.profile"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            51 =>
            array (
                'id' => 95,
                'name' => 'Login Activities',
                'slug' => 'user-activity',
                'url' => 'user/activity',
                'permission' => '{"permission":"App\\\\Http\\\\Controllers\\\\UserController@index","route_name":["users.activity"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            56 =>
            array (
                'id' => 100,
                'name' => 'Add Post',
                'slug' => 'blog-create',
                'url' => 'blog/create',
                'permission' => '{"permission":"Modules\\\\Blog\\\\Http\\\\Controllers\\\\BlogController@create", "route_name":["blog.create"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            57 =>
            array (
                'id' => 101,
                'name' => 'All Posts',
                'slug' => 'blogs',
                'url' => 'blogs',
                'permission' => '{"permission":"Modules\\\\Blog\\\\Http\\\\Controllers\\\\BlogController@index", "route_name":["blog.index", "blog.edit"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            66 =>
            array (
                'id' => 110,
                'name' => 'Accounts',
                'slug' => 'account-setting',
                'url' => 'account-setting',
                'permission' => '{"permission":"App\\\\Http\\\\Controllers\\\\AccountSettingController@index","route_name":["account.setting.option", "sso.index", "emailVerifySetting", "preferences.password", "permissionRoles.index", "roles.index", "roles.create", "roles.edit"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            67 =>
            array (
                'id' => 111,
                'name' => 'Emails',
                'slug' => 'email-setting',
                'url' => 'email-setting',
                'permission' => '{"permission":"App\\\\Http\\\\Controllers\\\\EmailConfigurationController@index","route_name":["emailConfigurations.index", "emailTemplates.index", "emailTemplates.create", "emailTemplates.edit"], "menu_level":"1"}',
                'is_default' => 1,
            ),
            76 =>
            array (
                'id' => 120,
                'name' => 'Faq',
                'slug' => 'faq',
                'url' => 'faq',
                'permission' => '{"permission":"Modules\\\\FAQ\\\\Http\\\\Controllers\\\\FAQController@index", "route_name":["admin.faq", "admin.faq.create", "admin.faq.edit"], "menu_level":"1"}',
                'is_default' => 1
            ),
        ));

    }
}
