<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'controller_name' => 'DashboardController',
                'controller_path' => 'App\\Http\\Controllers\\DashboardController',
                'id' => 5,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\DashboardController@index',
            ),
            1 => 
            array (
                'controller_name' => 'RoleController',
                'controller_path' => 'App\\Http\\Controllers\\RoleController',
                'id' => 6,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\RoleController@index',
            ),
            2 => 
            array (
                'controller_name' => 'RoleController',
                'controller_path' => 'App\\Http\\Controllers\\RoleController',
                'id' => 7,
                'method_name' => 'create',
                'name' => 'App\\Http\\Controllers\\RoleController@create',
            ),
            3 => 
            array (
                'controller_name' => 'RoleController',
                'controller_path' => 'App\\Http\\Controllers\\RoleController',
                'id' => 8,
                'method_name' => 'store',
                'name' => 'App\\Http\\Controllers\\RoleController@store',
            ),
            4 => 
            array (
                'controller_name' => 'RoleController',
                'controller_path' => 'App\\Http\\Controllers\\RoleController',
                'id' => 9,
                'method_name' => 'edit',
                'name' => 'App\\Http\\Controllers\\RoleController@edit',
            ),
            5 => 
            array (
                'controller_name' => 'RoleController',
                'controller_path' => 'App\\Http\\Controllers\\RoleController',
                'id' => 10,
                'method_name' => 'update',
                'name' => 'App\\Http\\Controllers\\RoleController@update',
            ),
            6 => 
            array (
                'controller_name' => 'RoleController',
                'controller_path' => 'App\\Http\\Controllers\\RoleController',
                'id' => 11,
                'method_name' => 'destroy',
                'name' => 'App\\Http\\Controllers\\RoleController@destroy',
            ),
            7 => 
            array (
                'controller_name' => 'PermissionRoleController',
                'controller_path' => 'App\\Http\\Controllers\\PermissionRoleController',
                'id' => 12,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\PermissionRoleController@index',
            ),
            8 => 
            array (
                'controller_name' => 'PermissionRoleController',
                'controller_path' => 'App\\Http\\Controllers\\PermissionRoleController',
                'id' => 13,
                'method_name' => 'generatePermission',
                'name' => 'App\\Http\\Controllers\\PermissionRoleController@generatePermission',
            ),
            9 => 
            array (
                'controller_name' => 'PermissionRoleController',
                'controller_path' => 'App\\Http\\Controllers\\PermissionRoleController',
                'id' => 14,
                'method_name' => 'assignPermission',
                'name' => 'App\\Http\\Controllers\\PermissionRoleController@assignPermission',
            ),
            10 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 15,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\UserController@index',
            ),
            11 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 16,
                'method_name' => 'create',
                'name' => 'App\\Http\\Controllers\\UserController@create',
            ),
            12 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 17,
                'method_name' => 'store',
                'name' => 'App\\Http\\Controllers\\UserController@store',
            ),
            13 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 18,
                'method_name' => 'edit',
                'name' => 'App\\Http\\Controllers\\UserController@edit',
            ),
            14 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 19,
                'method_name' => 'updatePassword',
                'name' => 'App\\Http\\Controllers\\UserController@updatePassword',
            ),
            15 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 20,
                'method_name' => 'update',
                'name' => 'App\\Http\\Controllers\\UserController@update',
            ),
            16 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 21,
                'method_name' => 'destroy',
                'name' => 'App\\Http\\Controllers\\UserController@destroy',
            ),
            17 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 22,
                'method_name' => 'pdf',
                'name' => 'App\\Http\\Controllers\\UserController@pdf',
            ),
            18 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 23,
                'method_name' => 'csv',
                'name' => 'App\\Http\\Controllers\\UserController@csv',
            ),
            19 => 
            array (
                'controller_name' => 'MailTemplateController',
                'controller_path' => 'App\\Http\\Controllers\\MailTemplateController',
                'id' => 24,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\MailTemplateController@index',
            ),
            20 => 
            array (
                'controller_name' => 'MailTemplateController',
                'controller_path' => 'App\\Http\\Controllers\\MailTemplateController',
                'id' => 25,
                'method_name' => 'create',
                'name' => 'App\\Http\\Controllers\\MailTemplateController@create',
            ),
            21 => 
            array (
                'controller_name' => 'MailTemplateController',
                'controller_path' => 'App\\Http\\Controllers\\MailTemplateController',
                'id' => 26,
                'method_name' => 'store',
                'name' => 'App\\Http\\Controllers\\MailTemplateController@store',
            ),
            22 => 
            array (
                'controller_name' => 'MailTemplateController',
                'controller_path' => 'App\\Http\\Controllers\\MailTemplateController',
                'id' => 27,
                'method_name' => 'edit',
                'name' => 'App\\Http\\Controllers\\MailTemplateController@edit',
            ),
            23 => 
            array (
                'controller_name' => 'MailTemplateController',
                'controller_path' => 'App\\Http\\Controllers\\MailTemplateController',
                'id' => 28,
                'method_name' => 'update',
                'name' => 'App\\Http\\Controllers\\MailTemplateController@update',
            ),
            24 => 
            array (
                'controller_name' => 'MailTemplateController',
                'controller_path' => 'App\\Http\\Controllers\\MailTemplateController',
                'id' => 29,
                'method_name' => 'destroy',
                'name' => 'App\\Http\\Controllers\\MailTemplateController@destroy',
            ),
            25 => 
            array (
                'controller_name' => 'PreferenceController',
                'controller_path' => 'App\\Http\\Controllers\\PreferenceController',
                'id' => 30,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\PreferenceController@index',
            ),
            26 => 
            array (
                'controller_name' => 'EmailConfigurationController',
                'controller_path' => 'App\\Http\\Controllers\\EmailConfigurationController',
                'id' => 31,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\EmailConfigurationController@index',
            ),
            27 => 
            array (
                'controller_name' => 'CompanySettingController',
                'controller_path' => 'App\\Http\\Controllers\\CompanySettingController',
                'id' => 32,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\CompanySettingController@index',
            ),
            28 => 
            array (
                'controller_name' => 'LanguageController',
                'controller_path' => 'App\\Http\\Controllers\\LanguageController',
                'id' => 33,
                'method_name' => 'translation',
                'name' => 'App\\Http\\Controllers\\LanguageController@translation',
            ),
            29 => 
            array (
                'controller_name' => 'LanguageController',
                'controller_path' => 'App\\Http\\Controllers\\LanguageController',
                'id' => 34,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\LanguageController@index',
            ),
            30 => 
            array (
                'controller_name' => 'LanguageController',
                'controller_path' => 'App\\Http\\Controllers\\LanguageController',
                'id' => 35,
                'method_name' => 'store',
                'name' => 'App\\Http\\Controllers\\LanguageController@store',
            ),
            31 => 
            array (
                'controller_name' => 'LanguageController',
                'controller_path' => 'App\\Http\\Controllers\\LanguageController',
                'id' => 36,
                'method_name' => 'edit',
                'name' => 'App\\Http\\Controllers\\LanguageController@edit',
            ),
            32 => 
            array (
                'controller_name' => 'LanguageController',
                'controller_path' => 'App\\Http\\Controllers\\LanguageController',
                'id' => 37,
                'method_name' => 'update',
                'name' => 'App\\Http\\Controllers\\LanguageController@update',
            ),
            33 => 
            array (
                'controller_name' => 'LanguageController',
                'controller_path' => 'App\\Http\\Controllers\\LanguageController',
                'id' => 38,
                'method_name' => 'translationStore',
                'name' => 'App\\Http\\Controllers\\LanguageController@translationStore',
            ),
            34 => 
            array (
                'controller_name' => 'DashboardController',
                'controller_path' => 'App\\Http\\Controllers\\DashboardController',
                'id' => 39,
                'method_name' => 'switchLanguage',
                'name' => 'App\\Http\\Controllers\\DashboardController@switchLanguage',
            ),
            35 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 45,
                'method_name' => 'verification',
                'name' => 'App\\Http\\Controllers\\UserController@verification',
            ),
            36 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 46,
                'method_name' => 'updateProfile',
                'name' => 'App\\Http\\Controllers\\UserController@updateProfile',
            ),
            37 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 47,
                'method_name' => 'profile',
                'name' => 'App\\Http\\Controllers\\UserController@profile',
            ),
            38 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 48,
                'method_name' => 'updateProfilePassword',
                'name' => 'App\\Http\\Controllers\\UserController@updateProfilePassword',
            ),
            39 => 
            array (
                'controller_name' => 'SsoController',
                'controller_path' => 'App\\Http\\Controllers\\SsoController',
                'id' => 49,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\SsoController@index',
            ),
            40 => 
            array (
                'controller_name' => 'MaintenanceModeController',
                'controller_path' => 'App\\Http\\Controllers\\MaintenanceModeController',
                'id' => 50,
                'method_name' => 'enable',
                'name' => 'App\\Http\\Controllers\\MaintenanceModeController@enable',
            ),
            41 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 52,
                'method_name' => 'authenticate',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@authenticate',
            ),
            42 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 55,
                'method_name' => 'logout',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@logout',
            ),
            43 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 56,
                'method_name' => 'redirectToGoogle',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@redirectToGoogle',
            ),
            44 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 57,
                'method_name' => 'handelGoogleCallback',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@handelGoogleCallback',
            ),
            45 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 58,
                'method_name' => 'redirectToFacebook',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@redirectToFacebook',
            ),
            46 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 59,
                'method_name' => 'handelFacebookCallback',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@handelFacebookCallback',
            ),
            47 => 
            array (
                'controller_name' => 'BlogCategoryController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\BlogCategoryController',
                'id' => 67,
                'method_name' => 'index',
                'name' => 'Modules\\Blog\\Http\\Controllers\\BlogCategoryController@index',
            ),
            48 => 
            array (
                'controller_name' => 'BlogCategoryController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\BlogCategoryController',
                'id' => 68,
                'method_name' => 'delete',
                'name' => 'Modules\\Blog\\Http\\Controllers\\BlogCategoryController@delete',
            ),
            49 => 
            array (
                'controller_name' => 'BlogController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\BlogController',
                'id' => 69,
                'method_name' => 'index',
                'name' => 'Modules\\Blog\\Http\\Controllers\\BlogController@index',
            ),
            50 => 
            array (
                'controller_name' => 'BlogController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\BlogController',
                'id' => 70,
                'method_name' => 'create',
                'name' => 'Modules\\Blog\\Http\\Controllers\\BlogController@create',
            ),
            51 => 
            array (
                'controller_name' => 'BlogController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\BlogController',
                'id' => 71,
                'method_name' => 'edit',
                'name' => 'Modules\\Blog\\Http\\Controllers\\BlogController@edit',
            ),
            52 => 
            array (
                'controller_name' => 'BlogController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\BlogController',
                'id' => 72,
                'method_name' => 'delete',
                'name' => 'Modules\\Blog\\Http\\Controllers\\BlogController@delete',
            ),
            53 => 
            array (
                'controller_name' => 'CMSController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\CMSController',
                'id' => 73,
                'method_name' => 'index',
                'name' => 'Modules\\CMS\\Http\\Controllers\\CMSController@index',
            ),
            54 => 
            array (
                'controller_name' => 'CMSController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\CMSController',
                'id' => 74,
                'method_name' => 'create',
                'name' => 'Modules\\CMS\\Http\\Controllers\\CMSController@create',
            ),
            55 => 
            array (
                'controller_name' => 'CMSController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\CMSController',
                'id' => 75,
                'method_name' => 'edit',
                'name' => 'Modules\\CMS\\Http\\Controllers\\CMSController@edit',
            ),
            56 => 
            array (
                'controller_name' => 'CMSController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\CMSController',
                'id' => 76,
                'method_name' => 'delete',
                'name' => 'Modules\\CMS\\Http\\Controllers\\CMSController@delete',
            ),
            57 => 
            array (
                'controller_name' => 'SiteController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\SiteController',
                'id' => 79,
                'method_name' => 'page',
                'name' => 'App\\Http\\Controllers\\Site\\SiteController@page',
            ),
            58 => 
            array (
                'controller_name' => 'BlogCategoryController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\BlogCategoryController',
                'id' => 80,
                'method_name' => 'store',
                'name' => 'Modules\\Blog\\Http\\Controllers\\BlogCategoryController@store',
            ),
            59 => 
            array (
                'controller_name' => 'BlogCategoryController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\BlogCategoryController',
                'id' => 81,
                'method_name' => 'update',
                'name' => 'Modules\\Blog\\Http\\Controllers\\BlogCategoryController@update',
            ),
            60 => 
            array (
                'controller_name' => 'BlogController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\BlogController',
                'id' => 82,
                'method_name' => 'store',
                'name' => 'Modules\\Blog\\Http\\Controllers\\BlogController@store',
            ),
            61 => 
            array (
                'controller_name' => 'BlogController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\BlogController',
                'id' => 83,
                'method_name' => 'update',
                'name' => 'Modules\\Blog\\Http\\Controllers\\BlogController@update',
            ),
            62 => 
            array (
                'controller_name' => 'CMSController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\CMSController',
                'id' => 84,
                'method_name' => 'store',
                'name' => 'Modules\\CMS\\Http\\Controllers\\CMSController@store',
            ),
            63 => 
            array (
                'controller_name' => 'CMSController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\CMSController',
                'id' => 85,
                'method_name' => 'update',
                'name' => 'Modules\\CMS\\Http\\Controllers\\CMSController@update',
            ),
            64 => 
            array (
                'controller_name' => 'MenuBuilderController',
                'controller_path' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuBuilderController',
                'id' => 86,
                'method_name' => 'index',
                'name' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuBuilderController@index',
            ),
            65 => 
            array (
                'controller_name' => 'MenuController',
                'controller_path' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuController',
                'id' => 87,
                'method_name' => 'createNewMenu',
                'name' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuController@createNewMenu',
            ),
            66 => 
            array (
                'controller_name' => 'MenuController',
                'controller_path' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuController',
                'id' => 88,
                'method_name' => 'delete',
                'name' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuController@delete',
            ),
            67 => 
            array (
                'controller_name' => 'MenuController',
                'controller_path' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuController',
                'id' => 89,
                'method_name' => 'addCustomMenu',
                'name' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuController@addCustomMenu',
            ),
            68 => 
            array (
                'controller_name' => 'MenuController',
                'controller_path' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuController',
                'id' => 90,
                'method_name' => 'update',
                'name' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuController@update',
            ),
            69 => 
            array (
                'controller_name' => 'MenuController',
                'controller_path' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuController',
                'id' => 91,
                'method_name' => 'generateMenuControl',
                'name' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuController@generateMenuControl',
            ),
            70 => 
            array (
                'controller_name' => 'MenuController',
                'controller_path' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuController',
                'id' => 92,
                'method_name' => 'deleteMenu',
                'name' => 'Modules\\MenuBuilder\\Http\\Controllers\\MenuController@deleteMenu',
            ),
            71 => 
            array (
                'controller_name' => 'AddonsMangerController',
                'controller_path' => 'App\\Http\\Controllers\\AddonsMangerController',
                'id' => 94,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\AddonsMangerController@index',
            ),
            72 => 
            array (
                'controller_name' => 'ThemeOptionController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\ThemeOptionController',
                'id' => 95,
                'method_name' => 'list',
                'name' => 'Modules\\CMS\\Http\\Controllers\\ThemeOptionController@list',
            ),
            73 => 
            array (
                'controller_name' => 'ThemeOptionController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\ThemeOptionController',
                'id' => 96,
                'method_name' => 'store',
                'name' => 'Modules\\CMS\\Http\\Controllers\\ThemeOptionController@store',
            ),
            74 => 
            array (
                'controller_name' => 'PreferenceController',
                'controller_path' => 'App\\Http\\Controllers\\PreferenceController',
                'id' => 97,
                'method_name' => 'password',
                'name' => 'App\\Http\\Controllers\\PreferenceController@password',
            ),
            75 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 98,
                'method_name' => 'showResetForm',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@showResetForm',
            ),
            76 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 99,
                'method_name' => 'setPassword',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@setPassword',
            ),
            77 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 100,
                'method_name' => 'sendResetLinkEmail',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@sendResetLinkEmail',
            ),
            78 => 
            array (
                'controller_name' => 'MediaManagerController',
                'controller_path' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController',
                'id' => 101,
                'method_name' => 'create',
                'name' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController@create',
            ),
            79 => 
            array (
                'controller_name' => 'MediaManagerController',
                'controller_path' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController',
                'id' => 102,
                'method_name' => 'store',
                'name' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController@store',
            ),
            80 => 
            array (
                'controller_name' => 'MediaManagerController',
                'controller_path' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController',
                'id' => 103,
                'method_name' => 'upload',
                'name' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController@upload',
            ),
            81 => 
            array (
                'controller_name' => 'MediaManagerController',
                'controller_path' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController',
                'id' => 104,
                'method_name' => 'uploadedFiles',
                'name' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController@uploadedFiles',
            ),
            82 => 
            array (
                'controller_name' => 'MediaManagerController',
                'controller_path' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController',
                'id' => 105,
                'method_name' => 'sortFiles',
                'name' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController@sortFiles',
            ),
            83 => 
            array (
                'controller_name' => 'MediaManagerController',
                'controller_path' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController',
                'id' => 106,
                'method_name' => 'paginateFiles',
                'name' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController@paginateFiles',
            ),
            84 => 
            array (
                'controller_name' => 'MediaManagerController',
                'controller_path' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController',
                'id' => 107,
                'method_name' => 'download',
                'name' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController@download',
            ),
            85 => 
            array (
                'controller_name' => 'MediaManagerController',
                'controller_path' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController',
                'id' => 108,
                'method_name' => 'paginateData',
                'name' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController@paginateData',
            ),
            86 => 
            array (
                'controller_name' => 'ReportController',
                'controller_path' => 'Modules\\Report\\Http\\Controllers\\ReportController',
                'id' => 109,
                'method_name' => 'index',
                'name' => 'Modules\\Report\\Http\\Controllers\\ReportController@index',
            ),
            87 => 
            array (
                'controller_name' => 'BuilderController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\BuilderController',
                'id' => 110,
                'method_name' => 'edit',
                'name' => 'Modules\\CMS\\Http\\Controllers\\BuilderController@edit',
            ),
            88 => 
            array (
                'controller_name' => 'BuilderController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\BuilderController',
                'id' => 111,
                'method_name' => 'editElement',
                'name' => 'Modules\\CMS\\Http\\Controllers\\BuilderController@editElement',
            ),
            89 => 
            array (
                'controller_name' => 'BuilderController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\BuilderController',
                'id' => 112,
                'method_name' => 'updateComponent',
                'name' => 'Modules\\CMS\\Http\\Controllers\\BuilderController@updateComponent',
            ),
            90 => 
            array (
                'controller_name' => 'BuilderController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\BuilderController',
                'id' => 113,
                'method_name' => 'deleteComponent',
                'name' => 'Modules\\CMS\\Http\\Controllers\\BuilderController@deleteComponent',
            ),
            91 => 
            array (
                'controller_name' => 'EmailController',
                'controller_path' => 'App\\Http\\Controllers\\EmailController',
                'id' => 117,
                'method_name' => 'emailVerifySetting',
                'name' => 'App\\Http\\Controllers\\EmailController@emailVerifySetting',
            ),
            92 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 119,
                'method_name' => 'resetOtp',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@resetOtp',
            ),
            93 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 135,
                'method_name' => 'emailSignup',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@emailSignup',
            ),
            94 => 
            array (
                'controller_name' => 'MediaManagerController',
                'controller_path' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController',
                'id' => 138,
                'method_name' => 'deleteImage',
                'name' => 'Modules\\MediaManager\\Http\\Controllers\\MediaManagerController@deleteImage',
            ),
            95 => 
            array (
                'controller_name' => 'GeoLocaleController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\GeoLocaleController',
                'id' => 139,
                'method_name' => 'index',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\GeoLocaleController@index',
            ),
            96 => 
            array (
                'controller_name' => 'CountryController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\CountryController',
                'id' => 140,
                'method_name' => 'index',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\CountryController@index',
            ),
            97 => 
            array (
                'controller_name' => 'CountryController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\CountryController',
                'id' => 141,
                'method_name' => 'show',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\CountryController@show',
            ),
            98 => 
            array (
                'controller_name' => 'CountryController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\CountryController',
                'id' => 142,
                'method_name' => 'store',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\CountryController@store',
            ),
            99 => 
            array (
                'controller_name' => 'CountryController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\CountryController',
                'id' => 143,
                'method_name' => 'update',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\CountryController@update',
            ),
            100 => 
            array (
                'controller_name' => 'CountryController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\CountryController',
                'id' => 144,
                'method_name' => 'destroy',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\CountryController@destroy',
            ),
            101 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController',
                'id' => 145,
                'method_name' => 'index',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController@index',
            ),
            102 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController',
                'id' => 146,
                'method_name' => 'show',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController@show',
            ),
            103 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController',
                'id' => 147,
                'method_name' => 'getCountryStates',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController@getCountryStates',
            ),
            104 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController',
                'id' => 148,
                'method_name' => 'store',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController@store',
            ),
            105 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController',
                'id' => 149,
                'method_name' => 'update',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController@update',
            ),
            106 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController',
                'id' => 150,
                'method_name' => 'destroy',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController@destroy',
            ),
            107 => 
            array (
                'controller_name' => 'CityController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\CityController',
                'id' => 151,
                'method_name' => 'getCountryCities',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\CityController@getCountryCities',
            ),
            108 => 
            array (
                'controller_name' => 'CityController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\CityController',
                'id' => 152,
                'method_name' => 'getStateCities',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\CityController@getStateCities',
            ),
            109 => 
            array (
                'controller_name' => 'CityController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\CityController',
                'id' => 153,
                'method_name' => 'store',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\CityController@store',
            ),
            110 => 
            array (
                'controller_name' => 'CityController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\CityController',
                'id' => 154,
                'method_name' => 'update',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\CityController@update',
            ),
            111 => 
            array (
                'controller_name' => 'CityController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\CityController',
                'id' => 155,
                'method_name' => 'destroy',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\CityController@destroy',
            ),
            112 => 
            array (
                'controller_name' => 'CountryController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CountryController',
                'id' => 159,
                'method_name' => 'index',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CountryController@index',
            ),
            113 => 
            array (
                'controller_name' => 'CountryController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CountryController',
                'id' => 160,
                'method_name' => 'show',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CountryController@show',
            ),
            114 => 
            array (
                'controller_name' => 'CountryController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CountryController',
                'id' => 161,
                'method_name' => 'store',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CountryController@store',
            ),
            115 => 
            array (
                'controller_name' => 'CountryController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CountryController',
                'id' => 162,
                'method_name' => 'update',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CountryController@update',
            ),
            116 => 
            array (
                'controller_name' => 'CountryController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CountryController',
                'id' => 163,
                'method_name' => 'destroy',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CountryController@destroy',
            ),
            117 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\StateController',
                'id' => 164,
                'method_name' => 'index',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\StateController@index',
            ),
            118 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\StateController',
                'id' => 165,
                'method_name' => 'show',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\StateController@show',
            ),
            119 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\StateController',
                'id' => 166,
                'method_name' => 'getCountryStates',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\StateController@getCountryStates',
            ),
            120 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\StateController',
                'id' => 167,
                'method_name' => 'store',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\StateController@store',
            ),
            121 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\StateController',
                'id' => 168,
                'method_name' => 'update',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\StateController@update',
            ),
            122 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\StateController',
                'id' => 169,
                'method_name' => 'destroy',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\StateController@destroy',
            ),
            123 => 
            array (
                'controller_name' => 'CityController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CityController',
                'id' => 170,
                'method_name' => 'getCountryCities',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CityController@getCountryCities',
            ),
            124 => 
            array (
                'controller_name' => 'CityController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CityController',
                'id' => 171,
                'method_name' => 'getStateCities',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CityController@getStateCities',
            ),
            125 => 
            array (
                'controller_name' => 'CityController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CityController',
                'id' => 172,
                'method_name' => 'store',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CityController@store',
            ),
            126 => 
            array (
                'controller_name' => 'CityController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CityController',
                'id' => 173,
                'method_name' => 'update',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CityController@update',
            ),
            127 => 
            array (
                'controller_name' => 'CityController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CityController',
                'id' => 174,
                'method_name' => 'destroy',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\Api\\User\\CityController@destroy',
            ),
            128 => 
            array (
                'controller_name' => 'BuilderController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\BuilderController',
                'id' => 175,
                'method_name' => 'updateAllComponents',
                'name' => 'Modules\\CMS\\Http\\Controllers\\BuilderController@updateAllComponents',
            ),
            129 => 
            array (
                'controller_name' => 'WelcomeController',
                'controller_path' => 'Infoamin\\Installer\\Http\\Controllers\\WelcomeController',
                'id' => 176,
                'method_name' => 'welcome',
                'name' => 'Infoamin\\Installer\\Http\\Controllers\\WelcomeController@welcome',
            ),
            130 => 
            array (
                'controller_name' => 'DatabaseController',
                'controller_path' => 'Infoamin\\Installer\\Http\\Controllers\\DatabaseController',
                'id' => 177,
                'method_name' => 'create',
                'name' => 'Infoamin\\Installer\\Http\\Controllers\\DatabaseController@create',
            ),
            131 => 
            array (
                'controller_name' => 'RequirementsController',
                'controller_path' => 'Infoamin\\Installer\\Http\\Controllers\\RequirementsController',
                'id' => 178,
                'method_name' => 'requirements',
                'name' => 'Infoamin\\Installer\\Http\\Controllers\\RequirementsController@requirements',
            ),
            132 => 
            array (
                'controller_name' => 'PermissionsController',
                'controller_path' => 'Infoamin\\Installer\\Http\\Controllers\\PermissionsController',
                'id' => 179,
                'method_name' => 'checkPermissions',
                'name' => 'Infoamin\\Installer\\Http\\Controllers\\PermissionsController@checkPermissions',
            ),
            133 => 
            array (
                'controller_name' => 'DatabaseController',
                'controller_path' => 'Infoamin\\Installer\\Http\\Controllers\\DatabaseController',
                'id' => 180,
                'method_name' => 'seedMigrate',
                'name' => 'Infoamin\\Installer\\Http\\Controllers\\DatabaseController@seedMigrate',
            ),
            134 => 
            array (
                'controller_name' => 'PermissionsController',
                'controller_path' => 'Infoamin\\Installer\\Http\\Controllers\\PermissionsController',
                'id' => 181,
                'method_name' => 'verifyPurchaseCode',
                'name' => 'Infoamin\\Installer\\Http\\Controllers\\PermissionsController@verifyPurchaseCode',
            ),
            135 => 
            array (
                'controller_name' => 'DatabaseController',
                'controller_path' => 'Infoamin\\Installer\\Http\\Controllers\\DatabaseController',
                'id' => 182,
                'method_name' => 'store',
                'name' => 'Infoamin\\Installer\\Http\\Controllers\\DatabaseController@store',
            ),
            136 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'Infoamin\\Installer\\Http\\Controllers\\UserController',
                'id' => 183,
                'method_name' => 'createUser',
                'name' => 'Infoamin\\Installer\\Http\\Controllers\\UserController@createUser',
            ),
            137 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'Infoamin\\Installer\\Http\\Controllers\\UserController',
                'id' => 184,
                'method_name' => 'storeUser',
                'name' => 'Infoamin\\Installer\\Http\\Controllers\\UserController@storeUser',
            ),
            138 => 
            array (
                'controller_name' => 'FinalController',
                'controller_path' => 'Infoamin\\Installer\\Http\\Controllers\\FinalController',
                'id' => 185,
                'method_name' => 'finish',
                'name' => 'Infoamin\\Installer\\Http\\Controllers\\FinalController@finish',
            ),
            139 => 
            array (
                'controller_name' => 'PermissionsController',
                'controller_path' => 'Infoamin\\Installer\\Http\\Controllers\\PermissionsController',
                'id' => 186,
                'method_name' => 'clearCache',
                'name' => 'Infoamin\\Installer\\Http\\Controllers\\PermissionsController@clearCache',
            ),
            140 => 
            array (
                'controller_name' => 'AddonsController',
                'controller_path' => 'Modules\\Addons\\Http\\Controllers\\AddonsController',
                'id' => 188,
                'method_name' => 'upload',
                'name' => 'Modules\\Addons\\Http\\Controllers\\AddonsController@upload',
            ),
            141 => 
            array (
                'controller_name' => 'AddonsController',
                'controller_path' => 'Modules\\Addons\\Http\\Controllers\\AddonsController',
                'id' => 189,
                'method_name' => 'switchStatus',
                'name' => 'Modules\\Addons\\Http\\Controllers\\AddonsController@switchStatus',
            ),
            142 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 190,
                'method_name' => 'findUser',
                'name' => 'App\\Http\\Controllers\\UserController@findUser',
            ),
            143 => 
            array (
                'controller_name' => 'PageBuilderController',
                'controller_path' => 'Modules\\PageBuilder\\Http\\Controllers\\PageBuilderController',
                'id' => 191,
                'method_name' => 'index',
                'name' => 'Modules\\PageBuilder\\Http\\Controllers\\PageBuilderController@index',
            ),
            144 => 
            array (
                'controller_name' => 'PageBuilderController',
                'controller_path' => 'Modules\\PageBuilder\\Http\\Controllers\\PageBuilderController',
                'id' => 192,
                'method_name' => 'store',
                'name' => 'Modules\\PageBuilder\\Http\\Controllers\\PageBuilderController@store',
            ),
            145 => 
            array (
                'controller_name' => 'PageBuilderController',
                'controller_path' => 'Modules\\PageBuilder\\Http\\Controllers\\PageBuilderController',
                'id' => 193,
                'method_name' => 'storeImage',
                'name' => 'Modules\\PageBuilder\\Http\\Controllers\\PageBuilderController@storeImage',
            ),
            146 => 
            array (
                'controller_name' => 'AccountSettingController',
                'controller_path' => 'App\\Http\\Controllers\\AccountSettingController',
                'id' => 194,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\AccountSettingController@index',
            ),
            147 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 195,
                'method_name' => 'allUserActivity',
                'name' => 'App\\Http\\Controllers\\UserController@allUserActivity',
            ),
            148 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 196,
                'method_name' => 'deleteUserActivity',
                'name' => 'App\\Http\\Controllers\\UserController@deleteUserActivity',
            ),
            149 => 
            array (
                'controller_name' => 'BuilderController',
                'controller_path' => 'Modules\\CMS\\Http\\Controllers\\BuilderController',
                'id' => 202,
                'method_name' => 'ajaxResourceFetch',
                'name' => 'Modules\\CMS\\Http\\Controllers\\BuilderController@ajaxResourceFetch',
            ),
            150 => 
            array (
                'controller_name' => 'CountryController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\CountryController',
                'id' => 203,
                'method_name' => 'search',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\CountryController@search',
            ),
            151 => 
            array (
                'controller_name' => 'StateController',
                'controller_path' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController',
                'id' => 204,
                'method_name' => 'search',
                'name' => 'Modules\\GeoLocale\\Http\\Controllers\\StateController@search',
            ),
            152 => 
            array (
                'controller_name' => 'BatchController',
                'controller_path' => 'App\\Http\\Controllers\\BatchController',
                'id' => 205,
                'method_name' => 'destroy',
                'name' => 'App\\Http\\Controllers\\BatchController@destroy',
            ),
            153 => 
            array (
                'controller_name' => 'SystemInfoController',
                'controller_path' => 'App\\Http\\Controllers\\SystemInfoController',
                'id' => 206,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\SystemInfoController@index',
            ),
            154 => 
            array (
                'controller_name' => 'PackageController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageController',
                'id' => 207,
                'method_name' => 'index',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageController@index',
            ),
            155 => 
            array (
                'controller_name' => 'PackageController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageController',
                'id' => 208,
                'method_name' => 'create',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageController@create',
            ),
            156 => 
            array (
                'controller_name' => 'PackageController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageController',
                'id' => 209,
                'method_name' => 'store',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageController@store',
            ),
            157 => 
            array (
                'controller_name' => 'PackageController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageController',
                'id' => 211,
                'method_name' => 'edit',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageController@edit',
            ),
            158 => 
            array (
                'controller_name' => 'PackageController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageController',
                'id' => 212,
                'method_name' => 'update',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageController@update',
            ),
            159 => 
            array (
                'controller_name' => 'PackageController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageController',
                'id' => 213,
                'method_name' => 'destroy',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageController@destroy',
            ),
            160 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController',
                'id' => 214,
                'method_name' => 'index',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController@index',
            ),
            161 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController',
                'id' => 215,
                'method_name' => 'create',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController@create',
            ),
            162 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController',
                'id' => 216,
                'method_name' => 'store',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController@store',
            ),
            163 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController',
                'id' => 217,
                'method_name' => 'show',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController@show',
            ),
            164 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController',
                'id' => 218,
                'method_name' => 'edit',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController@edit',
            ),
            165 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController',
                'id' => 219,
                'method_name' => 'update',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController@update',
            ),
            166 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController',
                'id' => 220,
                'method_name' => 'destroy',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController@destroy',
            ),
            167 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController',
                'id' => 221,
                'method_name' => 'setting',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController@setting',
            ),
            168 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController',
                'id' => 222,
                'method_name' => 'payment',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController@payment',
            ),
            169 => 
            array (
                'controller_name' => 'AccessTokenController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\AccessTokenController',
                'id' => 223,
                'method_name' => 'issueToken',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\AccessTokenController@issueToken',
            ),
            170 => 
            array (
                'controller_name' => 'AuthorizationController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizationController',
                'id' => 224,
                'method_name' => 'authorize',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizationController@authorize',
            ),
            171 => 
            array (
                'controller_name' => 'TransientTokenController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\TransientTokenController',
                'id' => 225,
                'method_name' => 'refresh',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\TransientTokenController@refresh',
            ),
            172 => 
            array (
                'controller_name' => 'ApproveAuthorizationController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController',
                'id' => 226,
                'method_name' => 'approve',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\ApproveAuthorizationController@approve',
            ),
            173 => 
            array (
                'controller_name' => 'DenyAuthorizationController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController',
                'id' => 227,
                'method_name' => 'deny',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\DenyAuthorizationController@deny',
            ),
            174 => 
            array (
                'controller_name' => 'AuthorizedAccessTokenController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController',
                'id' => 228,
                'method_name' => 'forUser',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@forUser',
            ),
            175 => 
            array (
                'controller_name' => 'AuthorizedAccessTokenController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController',
                'id' => 229,
                'method_name' => 'destroy',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\AuthorizedAccessTokenController@destroy',
            ),
            176 => 
            array (
                'controller_name' => 'ClientController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\ClientController',
                'id' => 230,
                'method_name' => 'forUser',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@forUser',
            ),
            177 => 
            array (
                'controller_name' => 'ClientController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\ClientController',
                'id' => 231,
                'method_name' => 'store',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@store',
            ),
            178 => 
            array (
                'controller_name' => 'ClientController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\ClientController',
                'id' => 232,
                'method_name' => 'update',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@update',
            ),
            179 => 
            array (
                'controller_name' => 'ClientController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\ClientController',
                'id' => 233,
                'method_name' => 'destroy',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\ClientController@destroy',
            ),
            180 => 
            array (
                'controller_name' => 'ScopeController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\ScopeController',
                'id' => 234,
                'method_name' => 'all',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\ScopeController@all',
            ),
            181 => 
            array (
                'controller_name' => 'PersonalAccessTokenController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController',
                'id' => 235,
                'method_name' => 'forUser',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@forUser',
            ),
            182 => 
            array (
                'controller_name' => 'PersonalAccessTokenController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController',
                'id' => 236,
                'method_name' => 'store',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@store',
            ),
            183 => 
            array (
                'controller_name' => 'PersonalAccessTokenController',
                'controller_path' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController',
                'id' => 237,
                'method_name' => 'destroy',
                'name' => 'Laravel\\Passport\\Http\\Controllers\\PersonalAccessTokenController@destroy',
            ),
            184 => 
            array (
                'controller_name' => 'FileUploadHandler',
                'controller_path' => 'Livewire\\Controllers\\FileUploadHandler',
                'id' => 238,
                'method_name' => 'handle',
                'name' => 'Livewire\\Controllers\\FileUploadHandler@handle',
            ),
            185 => 
            array (
                'controller_name' => 'FilePreviewHandler',
                'controller_path' => 'Livewire\\Controllers\\FilePreviewHandler',
                'id' => 239,
                'method_name' => 'handle',
                'name' => 'Livewire\\Controllers\\FilePreviewHandler@handle',
            ),
            186 => 
            array (
                'controller_name' => 'LivewireJavaScriptAssets',
                'controller_path' => 'Livewire\\Controllers\\LivewireJavaScriptAssets',
                'id' => 240,
                'method_name' => 'source',
                'name' => 'Livewire\\Controllers\\LivewireJavaScriptAssets@source',
            ),
            187 => 
            array (
                'controller_name' => 'LivewireJavaScriptAssets',
                'controller_path' => 'Livewire\\Controllers\\LivewireJavaScriptAssets',
                'id' => 241,
                'method_name' => 'maps',
                'name' => 'Livewire\\Controllers\\LivewireJavaScriptAssets@maps',
            ),
            188 => 
            array (
                'controller_name' => 'DashboardController',
                'controller_path' => 'App\\Http\\Controllers\\DashboardController',
                'id' => 251,
                'method_name' => 'salesOfTheMonth',
                'name' => 'App\\Http\\Controllers\\DashboardController@salesOfTheMonth',
            ),
            189 => 
            array (
                'controller_name' => 'DashboardController',
                'controller_path' => 'App\\Http\\Controllers\\DashboardController',
                'id' => 252,
                'method_name' => 'latestRegistration',
                'name' => 'App\\Http\\Controllers\\DashboardController@latestRegistration',
            ),
            190 => 
            array (
                'controller_name' => 'DashboardController',
                'controller_path' => 'App\\Http\\Controllers\\DashboardController',
                'id' => 253,
                'method_name' => 'latestTransaction',
                'name' => 'App\\Http\\Controllers\\DashboardController@latestTransaction',
            ),
            191 => 
            array (
                'controller_name' => 'LanguageController',
                'controller_path' => 'App\\Http\\Controllers\\LanguageController',
                'id' => 255,
                'method_name' => 'destroy',
                'name' => 'App\\Http\\Controllers\\LanguageController@destroy',
            ),
            192 => 
            array (
                'controller_name' => 'AuthorizeNetController',
                'controller_path' => 'Modules\\AuthorizeNet\\Http\\Controllers\\AuthorizeNetController',
                'id' => 256,
                'method_name' => 'store',
                'name' => 'Modules\\AuthorizeNet\\Http\\Controllers\\AuthorizeNetController@store',
            ),
            193 => 
            array (
                'controller_name' => 'AuthorizeNetController',
                'controller_path' => 'Modules\\AuthorizeNet\\Http\\Controllers\\AuthorizeNetController',
                'id' => 257,
                'method_name' => 'edit',
                'name' => 'Modules\\AuthorizeNet\\Http\\Controllers\\AuthorizeNetController@edit',
            ),
            194 => 
            array (
                'controller_name' => 'CheckPaymentsController',
                'controller_path' => 'Modules\\CheckPayments\\Http\\Controllers\\CheckPaymentsController',
                'id' => 260,
                'method_name' => 'store',
                'name' => 'Modules\\CheckPayments\\Http\\Controllers\\CheckPaymentsController@store',
            ),
            195 => 
            array (
                'controller_name' => 'CheckPaymentsController',
                'controller_path' => 'Modules\\CheckPayments\\Http\\Controllers\\CheckPaymentsController',
                'id' => 261,
                'method_name' => 'edit',
                'name' => 'Modules\\CheckPayments\\Http\\Controllers\\CheckPaymentsController@edit',
            ),
            196 => 
            array (
                'controller_name' => 'CoinbaseController',
                'controller_path' => 'Modules\\Coinbase\\Http\\Controllers\\CoinbaseController',
                'id' => 262,
                'method_name' => 'store',
                'name' => 'Modules\\Coinbase\\Http\\Controllers\\CoinbaseController@store',
            ),
            197 => 
            array (
                'controller_name' => 'CoinbaseController',
                'controller_path' => 'Modules\\Coinbase\\Http\\Controllers\\CoinbaseController',
                'id' => 263,
                'method_name' => 'edit',
                'name' => 'Modules\\Coinbase\\Http\\Controllers\\CoinbaseController@edit',
            ),
            198 => 
            array (
                'controller_name' => 'CoinpaymentController',
                'controller_path' => 'Modules\\Coinpayment\\Http\\Controllers\\CoinpaymentController',
                'id' => 264,
                'method_name' => 'store',
                'name' => 'Modules\\Coinpayment\\Http\\Controllers\\CoinpaymentController@store',
            ),
            199 => 
            array (
                'controller_name' => 'CoinpaymentController',
                'controller_path' => 'Modules\\Coinpayment\\Http\\Controllers\\CoinpaymentController',
                'id' => 265,
                'method_name' => 'edit',
                'name' => 'Modules\\Coinpayment\\Http\\Controllers\\CoinpaymentController@edit',
            ),
            200 => 
            array (
                'controller_name' => 'DirectBankTransferController',
                'controller_path' => 'Modules\\DirectBankTransfer\\Http\\Controllers\\DirectBankTransferController',
                'id' => 266,
                'method_name' => 'store',
                'name' => 'Modules\\DirectBankTransfer\\Http\\Controllers\\DirectBankTransferController@store',
            ),
            201 => 
            array (
                'controller_name' => 'DirectBankTransferController',
                'controller_path' => 'Modules\\DirectBankTransfer\\Http\\Controllers\\DirectBankTransferController',
                'id' => 267,
                'method_name' => 'edit',
                'name' => 'Modules\\DirectBankTransfer\\Http\\Controllers\\DirectBankTransferController@edit',
            ),
            202 => 
            array (
                'controller_name' => 'FlutterwaveController',
                'controller_path' => 'Modules\\Flutterwave\\Http\\Controllers\\FlutterwaveController',
                'id' => 268,
                'method_name' => 'store',
                'name' => 'Modules\\Flutterwave\\Http\\Controllers\\FlutterwaveController@store',
            ),
            203 => 
            array (
                'controller_name' => 'FlutterwaveController',
                'controller_path' => 'Modules\\Flutterwave\\Http\\Controllers\\FlutterwaveController',
                'id' => 269,
                'method_name' => 'edit',
                'name' => 'Modules\\Flutterwave\\Http\\Controllers\\FlutterwaveController@edit',
            ),
            204 => 
            array (
                'controller_name' => 'GatewayController',
                'controller_path' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController',
                'id' => 270,
                'method_name' => 'paymentConfirmation',
                'name' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentConfirmation',
            ),
            205 => 
            array (
                'controller_name' => 'GatewayController',
                'controller_path' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController',
                'id' => 271,
                'method_name' => 'paymentFailed',
                'name' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentFailed',
            ),
            206 => 
            array (
                'controller_name' => 'GatewayController',
                'controller_path' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController',
                'id' => 272,
                'method_name' => 'paymentGateways',
                'name' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentGateways',
            ),
            207 => 
            array (
                'controller_name' => 'GatewayController',
                'controller_path' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController',
                'id' => 273,
                'method_name' => 'pay',
                'name' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@pay',
            ),
            208 => 
            array (
                'controller_name' => 'GatewayController',
                'controller_path' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController',
                'id' => 274,
                'method_name' => 'makePayment',
                'name' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@makePayment',
            ),
            209 => 
            array (
                'controller_name' => 'GatewayController',
                'controller_path' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController',
                'id' => 275,
                'method_name' => 'paymentCallback',
                'name' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentCallback',
            ),
            210 => 
            array (
                'controller_name' => 'GatewayController',
                'controller_path' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController',
                'id' => 276,
                'method_name' => 'paymentCancelled',
                'name' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentCancelled',
            ),
            211 => 
            array (
                'controller_name' => 'GatewayController',
                'controller_path' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController',
                'id' => 277,
                'method_name' => 'paymentHook',
                'name' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@paymentHook',
            ),
            212 => 
            array (
                'controller_name' => 'GatewayController',
                'controller_path' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController',
                'id' => 278,
                'method_name' => 'enableModule',
                'name' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@enableModule',
            ),
            213 => 
            array (
                'controller_name' => 'GatewayController',
                'controller_path' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController',
                'id' => 279,
                'method_name' => 'disableModule',
                'name' => 'Modules\\Gateway\\Http\\Controllers\\GatewayController@disableModule',
            ),
            214 => 
            array (
                'controller_name' => 'InstamojoController',
                'controller_path' => 'Modules\\Instamojo\\Http\\Controllers\\InstamojoController',
                'id' => 280,
                'method_name' => 'store',
                'name' => 'Modules\\Instamojo\\Http\\Controllers\\InstamojoController@store',
            ),
            215 => 
            array (
                'controller_name' => 'InstamojoController',
                'controller_path' => 'Modules\\Instamojo\\Http\\Controllers\\InstamojoController',
                'id' => 281,
                'method_name' => 'edit',
                'name' => 'Modules\\Instamojo\\Http\\Controllers\\InstamojoController@edit',
            ),
            216 => 
            array (
                'controller_name' => 'MtnMomoController',
                'controller_path' => 'Modules\\MtnMomo\\Http\\Controllers\\MtnMomoController',
                'id' => 282,
                'method_name' => 'store',
                'name' => 'Modules\\MtnMomo\\Http\\Controllers\\MtnMomoController@store',
            ),
            217 => 
            array (
                'controller_name' => 'MtnMomoController',
                'controller_path' => 'Modules\\MtnMomo\\Http\\Controllers\\MtnMomoController',
                'id' => 283,
                'method_name' => 'edit',
                'name' => 'Modules\\MtnMomo\\Http\\Controllers\\MtnMomoController@edit',
            ),
            218 => 
            array (
                'controller_name' => 'NGeniusController',
                'controller_path' => 'Modules\\NGenius\\Http\\Controllers\\NGeniusController',
                'id' => 284,
                'method_name' => 'store',
                'name' => 'Modules\\NGenius\\Http\\Controllers\\NGeniusController@store',
            ),
            219 => 
            array (
                'controller_name' => 'NGeniusController',
                'controller_path' => 'Modules\\NGenius\\Http\\Controllers\\NGeniusController',
                'id' => 285,
                'method_name' => 'viewAddon',
                'name' => 'Modules\\NGenius\\Http\\Controllers\\NGeniusController@viewAddon',
            ),
            220 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController',
                'id' => 286,
                'method_name' => 'templates',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController@templates',
            ),
            221 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController',
                'id' => 287,
                'method_name' => 'getFormFiledByUsecase',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController@getFormFiledByUsecase',
            ),
            222 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController',
                'id' => 288,
                'method_name' => 'getContent',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController@getContent',
            ),
            223 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController',
                'id' => 289,
                'method_name' => 'deleteContent',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController@deleteContent',
            ),
            224 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController',
                'id' => 290,
                'method_name' => 'editContent',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController@editContent',
            ),
            225 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController',
                'id' => 291,
                'method_name' => 'updateContent',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController@updateContent',
            ),
            226 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController',
                'id' => 292,
                'method_name' => 'documents',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController@documents',
            ),
            227 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController',
                'id' => 293,
                'method_name' => 'template',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController@template',
            ),
            228 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController',
                'id' => 294,
                'method_name' => 'imageTemplate',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController@imageTemplate',
            ),
            229 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCasesController',
                'id' => 300,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCasesController@index',
            ),
            230 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCasesController',
                'id' => 302,
                'method_name' => 'edit',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCasesController@edit',
            ),
            231 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCasesController',
                'id' => 303,
                'method_name' => 'destroy',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCasesController@destroy',
            ),
            232 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCaseCategoriesController',
                'id' => 304,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCaseCategoriesController@index',
            ),
            233 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCaseCategoriesController',
                'id' => 305,
                'method_name' => 'create',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCaseCategoriesController@create',
            ),
            234 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCaseCategoriesController',
                'id' => 306,
                'method_name' => 'edit',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCaseCategoriesController@edit',
            ),
            235 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCaseCategoriesController',
                'id' => 307,
                'method_name' => 'destroy',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCaseCategoriesController@destroy',
            ),
            236 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCaseCategoriesController',
                'id' => 308,
                'method_name' => 'searchCategory',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCaseCategoriesController@searchCategory',
            ),
            237 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\OpenAIController',
                'id' => 309,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\OpenAIController@index',
            ),
            238 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\OpenAIController',
                'id' => 310,
                'method_name' => 'edit',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\OpenAIController@edit',
            ),
            239 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\OpenAIController',
                'id' => 311,
                'method_name' => 'update',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\OpenAIController@update',
            ),
            240 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\OpenAIController',
                'id' => 312,
                'method_name' => 'delete',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\OpenAIController@delete',
            ),
            241 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\UseCasesController',
                'id' => 314,
                'method_name' => 'searchTabData',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\UseCasesController@searchTabData',
            ),
            242 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\UseCasesController',
                'id' => 315,
                'method_name' => 'toggleFavorite',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\UseCasesController@toggleFavorite',
            ),
            243 => 
            array (
                'controller_name' => 'PaypalController',
                'controller_path' => 'Modules\\Paypal\\Http\\Controllers\\PaypalController',
                'id' => 333,
                'method_name' => 'store',
                'name' => 'Modules\\Paypal\\Http\\Controllers\\PaypalController@store',
            ),
            244 => 
            array (
                'controller_name' => 'PaypalController',
                'controller_path' => 'Modules\\Paypal\\Http\\Controllers\\PaypalController',
                'id' => 334,
                'method_name' => 'edit',
                'name' => 'Modules\\Paypal\\Http\\Controllers\\PaypalController@edit',
            ),
            245 => 
            array (
                'controller_name' => 'PaystackController',
                'controller_path' => 'Modules\\Paystack\\Http\\Controllers\\PaystackController',
                'id' => 335,
                'method_name' => 'store',
                'name' => 'Modules\\Paystack\\Http\\Controllers\\PaystackController@store',
            ),
            246 => 
            array (
                'controller_name' => 'PaystackController',
                'controller_path' => 'Modules\\Paystack\\Http\\Controllers\\PaystackController',
                'id' => 336,
                'method_name' => 'edit',
                'name' => 'Modules\\Paystack\\Http\\Controllers\\PaystackController@edit',
            ),
            247 => 
            array (
                'controller_name' => 'PaytmController',
                'controller_path' => 'Modules\\Paytm\\Http\\Controllers\\PaytmController',
                'id' => 337,
                'method_name' => 'store',
                'name' => 'Modules\\Paytm\\Http\\Controllers\\PaytmController@store',
            ),
            248 => 
            array (
                'controller_name' => 'PaytmController',
                'controller_path' => 'Modules\\Paytm\\Http\\Controllers\\PaytmController',
                'id' => 338,
                'method_name' => 'edit',
                'name' => 'Modules\\Paytm\\Http\\Controllers\\PaytmController@edit',
            ),
            249 => 
            array (
                'controller_name' => 'RazorpayController',
                'controller_path' => 'Modules\\Razorpay\\Http\\Controllers\\RazorpayController',
                'id' => 339,
                'method_name' => 'store',
                'name' => 'Modules\\Razorpay\\Http\\Controllers\\RazorpayController@store',
            ),
            250 => 
            array (
                'controller_name' => 'RazorpayController',
                'controller_path' => 'Modules\\Razorpay\\Http\\Controllers\\RazorpayController',
                'id' => 340,
                'method_name' => 'edit',
                'name' => 'Modules\\Razorpay\\Http\\Controllers\\RazorpayController@edit',
            ),
            251 => 
            array (
                'controller_name' => 'SslCommerzController',
                'controller_path' => 'Modules\\SslCommerz\\Http\\Controllers\\SslCommerzController',
                'id' => 341,
                'method_name' => 'store',
                'name' => 'Modules\\SslCommerz\\Http\\Controllers\\SslCommerzController@store',
            ),
            252 => 
            array (
                'controller_name' => 'SslCommerzController',
                'controller_path' => 'Modules\\SslCommerz\\Http\\Controllers\\SslCommerzController',
                'id' => 342,
                'method_name' => 'edit',
                'name' => 'Modules\\SslCommerz\\Http\\Controllers\\SslCommerzController@edit',
            ),
            253 => 
            array (
                'controller_name' => 'StripeController',
                'controller_path' => 'Modules\\Stripe\\Http\\Controllers\\StripeController',
                'id' => 343,
                'method_name' => 'store',
                'name' => 'Modules\\Stripe\\Http\\Controllers\\StripeController@store',
            ),
            254 => 
            array (
                'controller_name' => 'StripeController',
                'controller_path' => 'Modules\\Stripe\\Http\\Controllers\\StripeController',
                'id' => 344,
                'method_name' => 'edit',
                'name' => 'Modules\\Stripe\\Http\\Controllers\\StripeController@edit',
            ),
            255 => 
            array (
                'controller_name' => 'ReviewsController',
                'controller_path' => 'Modules\\Reviews\\Http\\Controllers\\ReviewsController',
                'id' => 345,
                'method_name' => 'index',
                'name' => 'Modules\\Reviews\\Http\\Controllers\\ReviewsController@index',
            ),
            256 => 
            array (
                'controller_name' => 'ReviewsController',
                'controller_path' => 'Modules\\Reviews\\Http\\Controllers\\ReviewsController',
                'id' => 346,
                'method_name' => 'create',
                'name' => 'Modules\\Reviews\\Http\\Controllers\\ReviewsController@create',
            ),
            257 => 
            array (
                'controller_name' => 'ReviewsController',
                'controller_path' => 'Modules\\Reviews\\Http\\Controllers\\ReviewsController',
                'id' => 347,
                'method_name' => 'store',
                'name' => 'Modules\\Reviews\\Http\\Controllers\\ReviewsController@store',
            ),
            258 => 
            array (
                'controller_name' => 'ReviewsController',
                'controller_path' => 'Modules\\Reviews\\Http\\Controllers\\ReviewsController',
                'id' => 348,
                'method_name' => 'edit',
                'name' => 'Modules\\Reviews\\Http\\Controllers\\ReviewsController@edit',
            ),
            259 => 
            array (
                'controller_name' => 'ReviewsController',
                'controller_path' => 'Modules\\Reviews\\Http\\Controllers\\ReviewsController',
                'id' => 349,
                'method_name' => 'update',
                'name' => 'Modules\\Reviews\\Http\\Controllers\\ReviewsController@update',
            ),
            260 => 
            array (
                'controller_name' => 'ReviewsController',
                'controller_path' => 'Modules\\Reviews\\Http\\Controllers\\ReviewsController',
                'id' => 350,
                'method_name' => 'destroy',
                'name' => 'Modules\\Reviews\\Http\\Controllers\\ReviewsController@destroy',
            ),
            261 => 
            array (
                'controller_name' => 'FAQController',
                'controller_path' => 'Modules\\FAQ\\Http\\Controllers\\FAQController',
                'id' => 351,
                'method_name' => 'index',
                'name' => 'Modules\\FAQ\\Http\\Controllers\\FAQController@index',
            ),
            262 => 
            array (
                'controller_name' => 'FAQController',
                'controller_path' => 'Modules\\FAQ\\Http\\Controllers\\FAQController',
                'id' => 352,
                'method_name' => 'create',
                'name' => 'Modules\\FAQ\\Http\\Controllers\\FAQController@create',
            ),
            263 => 
            array (
                'controller_name' => 'FAQController',
                'controller_path' => 'Modules\\FAQ\\Http\\Controllers\\FAQController',
                'id' => 353,
                'method_name' => 'store',
                'name' => 'Modules\\FAQ\\Http\\Controllers\\FAQController@store',
            ),
            264 => 
            array (
                'controller_name' => 'FAQController',
                'controller_path' => 'Modules\\FAQ\\Http\\Controllers\\FAQController',
                'id' => 354,
                'method_name' => 'edit',
                'name' => 'Modules\\FAQ\\Http\\Controllers\\FAQController@edit',
            ),
            265 => 
            array (
                'controller_name' => 'FAQController',
                'controller_path' => 'Modules\\FAQ\\Http\\Controllers\\FAQController',
                'id' => 355,
                'method_name' => 'update',
                'name' => 'Modules\\FAQ\\Http\\Controllers\\FAQController@update',
            ),
            266 => 
            array (
                'controller_name' => 'FAQController',
                'controller_path' => 'Modules\\FAQ\\Http\\Controllers\\FAQController',
                'id' => 356,
                'method_name' => 'destroy',
                'name' => 'Modules\\FAQ\\Http\\Controllers\\FAQController@destroy',
            ),
            267 => 
            array (
                'controller_name' => 'FrontendController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\FrontendController',
                'id' => 357,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\Site\\FrontendController@index',
            ),
            268 => 
            array (
                'controller_name' => 'FrontendController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\FrontendController',
                'id' => 358,
                'method_name' => 'useCases',
                'name' => 'App\\Http\\Controllers\\Site\\FrontendController@useCases',
            ),
            269 => 
            array (
                'controller_name' => 'FrontendController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\FrontendController',
                'id' => 359,
                'method_name' => 'privacyPolicy',
                'name' => 'App\\Http\\Controllers\\Site\\FrontendController@privacyPolicy',
            ),
            270 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 360,
                'method_name' => 'showLoginForm',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@showLoginForm',
            ),
            271 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 361,
                'method_name' => 'registration',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@registration',
            ),
            272 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 362,
                'method_name' => 'reset',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@reset',
            ),
            273 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 363,
                'method_name' => 'impersonate',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@impersonate',
            ),
            274 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 364,
                'method_name' => 'cancelImpersonate',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@cancelImpersonate',
            ),
            275 => 
            array (
                'controller_name' => 'SiteController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\SiteController',
                'id' => 365,
                'method_name' => 'switchLanguage',
                'name' => 'App\\Http\\Controllers\\Site\\SiteController@switchLanguage',
            ),
            276 => 
            array (
                'controller_name' => 'ThemeController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\ThemeController',
                'id' => 366,
                'method_name' => 'switch',
                'name' => 'App\\Http\\Controllers\\Site\\ThemeController@switch',
            ),
            277 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 367,
                'method_name' => 'paymentConfirm',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@paymentConfirm',
            ),
            278 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\User\\UserController',
                'id' => 369,
                'method_name' => 'update',
                'name' => 'App\\Http\\Controllers\\User\\UserController@update',
            ),
            279 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\User\\UserController',
                'id' => 371,
                'method_name' => 'updatePassword',
                'name' => 'App\\Http\\Controllers\\User\\UserController@updatePassword',
            ),
            280 => 
            array (
                'controller_name' => 'DashboardController',
                'controller_path' => 'App\\Http\\Controllers\\User\\DashboardController',
                'id' => 375,
                'method_name' => 'index',
                'name' => 'App\\Http\\Controllers\\User\\DashboardController@index',
            ),
            281 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\User\\UserController',
                'id' => 376,
                'method_name' => 'profile',
                'name' => 'App\\Http\\Controllers\\User\\UserController@profile',
            ),
            282 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\User\\UserController',
                'id' => 377,
                'method_name' => 'subscription',
                'name' => 'App\\Http\\Controllers\\User\\UserController@subscription',
            ),
            283 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\User\\UserController',
                'id' => 378,
                'method_name' => 'subscriptionHistory',
                'name' => 'App\\Http\\Controllers\\User\\UserController@subscriptionHistory',
            ),
            284 => 
            array (
                'controller_name' => 'AuthController',
                'controller_path' => 'App\\Http\\Controllers\\Api\\V1\\AuthController',
                'id' => 381,
                'method_name' => 'signUp',
                'name' => 'App\\Http\\Controllers\\Api\\V1\\AuthController@signUp',
            ),
            285 => 
            array (
                'controller_name' => 'AuthController',
                'controller_path' => 'App\\Http\\Controllers\\Api\\V1\\AuthController',
                'id' => 382,
                'method_name' => 'login',
                'name' => 'App\\Http\\Controllers\\Api\\V1\\AuthController@login',
            ),
            286 => 
            array (
                'controller_name' => 'AuthController',
                'controller_path' => 'App\\Http\\Controllers\\Api\\V1\\AuthController',
                'id' => 383,
                'method_name' => 'logout',
                'name' => 'App\\Http\\Controllers\\Api\\V1\\AuthController@logout',
            ),
            287 => 
            array (
                'controller_name' => 'PreferenceController',
                'controller_path' => 'App\\Http\\Controllers\\Api\\V1\\PreferenceController',
                'id' => 384,
                'method_name' => 'preference',
                'name' => 'App\\Http\\Controllers\\Api\\V1\\PreferenceController@preference',
            ),
            288 => 
            array (
                'controller_name' => 'AuthController',
                'controller_path' => 'App\\Http\\Controllers\\Api\\V1\\AuthController',
                'id' => 386,
                'method_name' => 'checkOtp',
                'name' => 'App\\Http\\Controllers\\Api\\V1\\AuthController@checkOtp',
            ),
            289 => 
            array (
                'controller_name' => 'AuthController',
                'controller_path' => 'App\\Http\\Controllers\\Api\\V1\\AuthController',
                'id' => 388,
                'method_name' => 'setPassword',
                'name' => 'App\\Http\\Controllers\\Api\\V1\\AuthController@setPassword',
            ),
            290 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController',
                'id' => 389,
                'method_name' => 'codeTemplate',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController@codeTemplate',
            ),
            291 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ImageController',
                'id' => 390,
                'method_name' => 'deleteImage',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ImageController@deleteImage',
            ),
            292 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ImageController',
                'id' => 391,
                'method_name' => 'saveImage',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ImageController@saveImage',
            ),
            293 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ImageController',
                'id' => 392,
                'method_name' => 'list',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ImageController@list',
            ),
            294 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ImageController',
                'id' => 393,
                'method_name' => 'view',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ImageController@view',
            ),
            295 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\ImageController',
                'id' => 395,
                'method_name' => 'saveImage',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\ImageController@saveImage',
            ),
            296 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\ImageController',
                'id' => 396,
                'method_name' => 'list',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\ImageController@list',
            ),
            297 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\ImageController',
                'id' => 397,
                'method_name' => 'view',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\ImageController@view',
            ),
            298 => 
            array (
                'controller_name' => 'DocumentsController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\DocumentsController',
                'id' => 398,
                'method_name' => 'fetchAndFilter',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\DocumentsController@fetchAndFilter',
            ),
            299 => 
            array (
                'controller_name' => 'DocumentsController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\DocumentsController',
                'id' => 399,
                'method_name' => 'toggleBookmark',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\DocumentsController@toggleBookmark',
            ),
            300 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController',
                'id' => 404,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController@index',
            ),
            301 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController',
                'id' => 405,
                'method_name' => 'view',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController@view',
            ),
            302 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController',
                'id' => 406,
                'method_name' => 'update',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController@update',
            ),
            303 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController',
                'id' => 407,
                'method_name' => 'delete',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController@delete',
            ),
            304 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\ImageController',
                'id' => 408,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\ImageController@index',
            ),
            305 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\ImageController',
                'id' => 409,
                'method_name' => 'delete',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\ImageController@delete',
            ),
            306 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\ImageController',
                'id' => 410,
                'method_name' => 'view',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\ImageController@view',
            ),
            307 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController',
                'id' => 411,
                'method_name' => 'ask',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController@ask',
            ),
            308 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController',
                'id' => 412,
                'method_name' => 'image',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController@image',
            ),
            309 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController',
                'id' => 413,
                'method_name' => 'code',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController@code',
            ),
            310 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCasesController',
                'id' => 414,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCasesController@index',
            ),
            311 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCasesController',
                'id' => 415,
                'method_name' => 'create',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCasesController@create',
            ),
            312 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCasesController',
                'id' => 416,
                'method_name' => 'show',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCasesController@show',
            ),
            313 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCasesController',
                'id' => 417,
                'method_name' => 'edit',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCasesController@edit',
            ),
            314 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCasesController',
                'id' => 418,
                'method_name' => 'destroy',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCasesController@destroy',
            ),
            315 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCaseCategoriesController',
                'id' => 419,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCaseCategoriesController@index',
            ),
            316 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCaseCategoriesController',
                'id' => 420,
                'method_name' => 'create',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCaseCategoriesController@create',
            ),
            317 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCaseCategoriesController',
                'id' => 421,
                'method_name' => 'show',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCaseCategoriesController@show',
            ),
            318 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCaseCategoriesController',
                'id' => 422,
                'method_name' => 'edit',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCaseCategoriesController@edit',
            ),
            319 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCaseCategoriesController',
                'id' => 423,
                'method_name' => 'destroy',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UseCaseCategoriesController@destroy',
            ),
            320 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController',
                'id' => 424,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController@index',
            ),
            321 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController',
                'id' => 425,
                'method_name' => 'view',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController@view',
            ),
            322 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController',
                'id' => 426,
                'method_name' => 'update',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController@update',
            ),
            323 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController',
                'id' => 427,
                'method_name' => 'delete',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController@delete',
            ),
            324 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\ImageController',
                'id' => 428,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\ImageController@index',
            ),
            325 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\ImageController',
                'id' => 429,
                'method_name' => 'delete',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\ImageController@delete',
            ),
            326 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\ImageController',
                'id' => 430,
                'method_name' => 'view',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\ImageController@view',
            ),
            327 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController',
                'id' => 431,
                'method_name' => 'ask',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController@ask',
            ),
            328 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController',
                'id' => 432,
                'method_name' => 'image',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController@image',
            ),
            329 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController',
                'id' => 433,
                'method_name' => 'code',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\OpenAIController@code',
            ),
            330 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCasesController',
                'id' => 434,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCasesController@index',
            ),
            331 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCasesController',
                'id' => 435,
                'method_name' => 'create',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCasesController@create',
            ),
            332 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCasesController',
                'id' => 436,
                'method_name' => 'show',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCasesController@show',
            ),
            333 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCasesController',
                'id' => 437,
                'method_name' => 'edit',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCasesController@edit',
            ),
            334 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCasesController',
                'id' => 438,
                'method_name' => 'destroy',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCasesController@destroy',
            ),
            335 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCaseCategoriesController',
                'id' => 439,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCaseCategoriesController@index',
            ),
            336 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCaseCategoriesController',
                'id' => 440,
                'method_name' => 'create',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCaseCategoriesController@create',
            ),
            337 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCaseCategoriesController',
                'id' => 441,
                'method_name' => 'show',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCaseCategoriesController@show',
            ),
            338 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCaseCategoriesController',
                'id' => 442,
                'method_name' => 'edit',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCaseCategoriesController@edit',
            ),
            339 => 
            array (
                'controller_name' => 'UseCaseCategoriesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCaseCategoriesController',
                'id' => 443,
                'method_name' => 'destroy',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\UseCaseCategoriesController@destroy',
            ),
            340 => 
            array (
                'controller_name' => 'PackageController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageController',
                'id' => 444,
                'method_name' => 'getTemplate',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageController@getTemplate',
            ),
            341 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\User\\UserController',
                'id' => 446,
                'method_name' => 'verifyEmailByAjax',
                'name' => 'App\\Http\\Controllers\\User\\UserController@verifyEmailByAjax',
            ),
            342 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\User\\UserController',
                'id' => 447,
                'method_name' => 'verifyOtpByAjax',
                'name' => 'App\\Http\\Controllers\\User\\UserController@verifyOtpByAjax',
            ),
            343 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\User\\UserController',
                'id' => 448,
                'method_name' => 'updateEmailByAjax',
                'name' => 'App\\Http\\Controllers\\User\\UserController@updateEmailByAjax',
            ),
            344 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\User\\UserController',
                'id' => 449,
                'method_name' => 'verification',
                'name' => 'App\\Http\\Controllers\\User\\UserController@verification',
            ),
            345 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\User\\UserController',
                'id' => 450,
                'method_name' => 'editEmail',
                'name' => 'App\\Http\\Controllers\\User\\UserController@editEmail',
            ),
            346 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\User\\UserController',
                'id' => 451,
                'method_name' => 'updateEmail',
                'name' => 'App\\Http\\Controllers\\User\\UserController@updateEmail',
            ),
            347 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController',
                'id' => 454,
                'method_name' => 'invoice',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController@invoice',
            ),
            348 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController',
                'id' => 455,
                'method_name' => 'invoicePdf',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController@invoicePdf',
            ),
            349 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController',
                'id' => 456,
                'method_name' => 'invoiceEmail',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageSubscriptionController@invoiceEmail',
            ),
            350 => 
            array (
                'controller_name' => 'SubscriberController',
                'controller_path' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController',
                'id' => 457,
                'method_name' => 'index',
                'name' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController@index',
            ),
            351 => 
            array (
                'controller_name' => 'SubscriberController',
                'controller_path' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController',
                'id' => 458,
                'method_name' => 'edit',
                'name' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController@edit',
            ),
            352 => 
            array (
                'controller_name' => 'SubscriberController',
                'controller_path' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController',
                'id' => 459,
                'method_name' => 'update',
                'name' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController@update',
            ),
            353 => 
            array (
                'controller_name' => 'SubscriberController',
                'controller_path' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController',
                'id' => 460,
                'method_name' => 'destroy',
                'name' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController@destroy',
            ),
            354 => 
            array (
                'controller_name' => 'SubscriberController',
                'controller_path' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController',
                'id' => 461,
                'method_name' => 'pdf',
                'name' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController@pdf',
            ),
            355 => 
            array (
                'controller_name' => 'SubscriberController',
                'controller_path' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController',
                'id' => 462,
                'method_name' => 'csv',
                'name' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController@csv',
            ),
            356 => 
            array (
                'controller_name' => 'SubscriberController',
                'controller_path' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController',
                'id' => 463,
                'method_name' => 'store',
                'name' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController@store',
            ),
            357 => 
            array (
                'controller_name' => 'OpenHandlerController',
                'controller_path' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController',
                'id' => 464,
                'method_name' => 'handle',
                'name' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
            ),
            358 => 
            array (
                'controller_name' => 'OpenHandlerController',
                'controller_path' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController',
                'id' => 465,
                'method_name' => 'clockwork',
                'name' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
            ),
            359 => 
            array (
                'controller_name' => 'AssetController',
                'controller_path' => 'Barryvdh\\Debugbar\\Controllers\\AssetController',
                'id' => 466,
                'method_name' => 'css',
                'name' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
            ),
            360 => 
            array (
                'controller_name' => 'AssetController',
                'controller_path' => 'Barryvdh\\Debugbar\\Controllers\\AssetController',
                'id' => 467,
                'method_name' => 'js',
                'name' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
            ),
            361 => 
            array (
                'controller_name' => 'CacheController',
                'controller_path' => 'Barryvdh\\Debugbar\\Controllers\\CacheController',
                'id' => 468,
                'method_name' => 'delete',
                'name' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
            ),
            362 => 
            array (
                'controller_name' => 'CurrencyController',
                'controller_path' => 'App\\Http\\Controllers\\CurrencyController',
                'id' => 469,
                'method_name' => 'findCurrencyAjaxQuery',
                'name' => 'App\\Http\\Controllers\\CurrencyController@findCurrencyAjaxQuery',
            ),
            363 => 
            array (
                'controller_name' => 'FrontendController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\FrontendController',
                'id' => 470,
                'method_name' => 'pricing',
                'name' => 'App\\Http\\Controllers\\Site\\FrontendController@pricing',
            ),
            364 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 471,
                'method_name' => 'resendUserVerificationCode',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@resendUserVerificationCode',
            ),
            365 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 472,
                'method_name' => 'verify',
                'name' => 'App\\Http\\Controllers\\UserController@verify',
            ),
            366 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'App\\Http\\Controllers\\UserController',
                'id' => 473,
                'method_name' => 'verifyByOtp',
                'name' => 'App\\Http\\Controllers\\UserController@verifyByOtp',
            ),
            367 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 474,
                'method_name' => 'resetPasswordSuccess',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@resetPasswordSuccess',
            ),
            368 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 475,
                'method_name' => 'passwordResetNotify',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@passwordResetNotify',
            ),
            369 => 
            array (
                'controller_name' => 'LoginController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\LoginController',
                'id' => 476,
                'method_name' => 'resendPasswordReset',
                'name' => 'App\\Http\\Controllers\\Site\\LoginController@resendPasswordReset',
            ),
            370 => 
            array (
                'controller_name' => 'ResetDataController',
                'controller_path' => 'App\\Http\\Controllers\\Site\\ResetDataController',
                'id' => 477,
                'method_name' => 'reset',
                'name' => 'App\\Http\\Controllers\\Site\\ResetDataController@reset',
            ),
            371 => 
            array (
                'controller_name' => 'SubscriptionController',
                'controller_path' => 'App\\Http\\Controllers\\User\\SubscriptionController',
                'id' => 478,
                'method_name' => 'package',
                'name' => 'App\\Http\\Controllers\\User\\SubscriptionController@package',
            ),
            372 => 
            array (
                'controller_name' => 'SubscriptionController',
                'controller_path' => 'App\\Http\\Controllers\\User\\SubscriptionController',
                'id' => 479,
                'method_name' => 'storeSubscription',
                'name' => 'App\\Http\\Controllers\\User\\SubscriptionController@storeSubscription',
            ),
            373 => 
            array (
                'controller_name' => 'SubscriptionController',
                'controller_path' => 'App\\Http\\Controllers\\User\\SubscriptionController',
                'id' => 480,
                'method_name' => 'updateSubscription',
                'name' => 'App\\Http\\Controllers\\User\\SubscriptionController@updateSubscription',
            ),
            374 => 
            array (
                'controller_name' => 'SubscriptionController',
                'controller_path' => 'App\\Http\\Controllers\\User\\SubscriptionController',
                'id' => 481,
                'method_name' => 'cancelSubscription',
                'name' => 'App\\Http\\Controllers\\User\\SubscriptionController@cancelSubscription',
            ),
            375 => 
            array (
                'controller_name' => 'SubscriptionController',
                'controller_path' => 'App\\Http\\Controllers\\User\\SubscriptionController',
                'id' => 482,
                'method_name' => 'billDetails',
                'name' => 'App\\Http\\Controllers\\User\\SubscriptionController@billDetails',
            ),
            376 => 
            array (
                'controller_name' => 'SubscriptionController',
                'controller_path' => 'App\\Http\\Controllers\\User\\SubscriptionController',
                'id' => 483,
                'method_name' => 'billPdf',
                'name' => 'App\\Http\\Controllers\\User\\SubscriptionController@billPdf',
            ),
            377 => 
            array (
                'controller_name' => 'SubscriptionController',
                'controller_path' => 'App\\Http\\Controllers\\User\\SubscriptionController',
                'id' => 484,
                'method_name' => 'payPendingSubscription',
                'name' => 'App\\Http\\Controllers\\User\\SubscriptionController@payPendingSubscription',
            ),
            378 => 
            array (
                'controller_name' => 'SubscriptionController',
                'controller_path' => 'App\\Http\\Controllers\\User\\SubscriptionController',
                'id' => 485,
                'method_name' => 'planDescription',
                'name' => 'App\\Http\\Controllers\\User\\SubscriptionController@planDescription',
            ),
            379 => 
            array (
                'controller_name' => 'SubscriptionController',
                'controller_path' => 'App\\Http\\Controllers\\User\\SubscriptionController',
                'id' => 486,
                'method_name' => 'subscriptionPaid',
                'name' => 'App\\Http\\Controllers\\User\\SubscriptionController@subscriptionPaid',
            ),
            380 => 
            array (
                'controller_name' => 'SubscriptionController',
                'controller_path' => 'App\\Http\\Controllers\\User\\SubscriptionController',
                'id' => 487,
                'method_name' => 'subscriptionUpdatePaid',
                'name' => 'App\\Http\\Controllers\\User\\SubscriptionController@subscriptionUpdatePaid',
            ),
            381 => 
            array (
                'controller_name' => 'SubscriptionController',
                'controller_path' => 'App\\Http\\Controllers\\User\\SubscriptionController',
                'id' => 488,
                'method_name' => 'subscriptionPendingPaymentResponse',
                'name' => 'App\\Http\\Controllers\\User\\SubscriptionController@subscriptionPendingPaymentResponse',
            ),
            382 => 
            array (
                'controller_name' => 'AuthController',
                'controller_path' => 'App\\Http\\Controllers\\Api\\V1\\AuthController',
                'id' => 489,
                'method_name' => 'resendUserVerificationCode',
                'name' => 'App\\Http\\Controllers\\Api\\V1\\AuthController@resendUserVerificationCode',
            ),
            383 => 
            array (
                'controller_name' => 'AuthController',
                'controller_path' => 'App\\Http\\Controllers\\Api\\V1\\AuthController',
                'id' => 490,
                'method_name' => 'verifyByOtp',
                'name' => 'App\\Http\\Controllers\\Api\\V1\\AuthController@verifyByOtp',
            ),
            384 => 
            array (
                'controller_name' => 'AuthController',
                'controller_path' => 'App\\Http\\Controllers\\Api\\V1\\AuthController',
                'id' => 491,
                'method_name' => 'sendPasswordResetLink',
                'name' => 'App\\Http\\Controllers\\Api\\V1\\AuthController@sendPasswordResetLink',
            ),
            385 => 
            array (
                'controller_name' => 'AuthController',
                'controller_path' => 'App\\Http\\Controllers\\Api\\V1\\AuthController',
                'id' => 492,
                'method_name' => 'resendPasswordReset',
                'name' => 'App\\Http\\Controllers\\Api\\V1\\AuthController@resendPasswordReset',
            ),
            386 => 
            array (
                'controller_name' => 'BlogController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\Frontend\\BlogController',
                'id' => 493,
                'method_name' => 'allBlogs',
                'name' => 'Modules\\Blog\\Http\\Controllers\\Frontend\\BlogController@allBlogs',
            ),
            387 => 
            array (
                'controller_name' => 'BlogController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\Frontend\\BlogController',
                'id' => 494,
                'method_name' => 'blogSearch',
                'name' => 'Modules\\Blog\\Http\\Controllers\\Frontend\\BlogController@blogSearch',
            ),
            388 => 
            array (
                'controller_name' => 'BlogController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\Frontend\\BlogController',
                'id' => 495,
                'method_name' => 'blogDetails',
                'name' => 'Modules\\Blog\\Http\\Controllers\\Frontend\\BlogController@blogDetails',
            ),
            389 => 
            array (
                'controller_name' => 'BlogController',
                'controller_path' => 'Modules\\Blog\\Http\\Controllers\\Frontend\\BlogController',
                'id' => 496,
                'method_name' => 'blogCategory',
                'name' => 'Modules\\Blog\\Http\\Controllers\\Frontend\\BlogController@blogCategory',
            ),
            390 => 
            array (
                'controller_name' => 'DatabaseBackupController',
                'controller_path' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController',
                'id' => 497,
                'method_name' => 'automatedDatabaseBackupForm',
                'name' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController@automatedDatabaseBackupForm',
            ),
            391 => 
            array (
                'controller_name' => 'DatabaseBackupController',
                'controller_path' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController',
                'id' => 498,
                'method_name' => 'store',
                'name' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController@store',
            ),
            392 => 
            array (
                'controller_name' => 'DatabaseBackupController',
                'controller_path' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController',
                'id' => 499,
                'method_name' => 'manualDatabaseBackupForm',
                'name' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController@manualDatabaseBackupForm',
            ),
            393 => 
            array (
                'controller_name' => 'DatabaseBackupController',
                'controller_path' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController',
                'id' => 500,
                'method_name' => 'manualDatabaseBackup',
                'name' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController@manualDatabaseBackup',
            ),
            394 => 
            array (
                'controller_name' => 'DatabaseBackupController',
                'controller_path' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController',
                'id' => 501,
                'method_name' => 'list',
                'name' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController@list',
            ),
            395 => 
            array (
                'controller_name' => 'DatabaseBackupController',
                'controller_path' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController',
                'id' => 502,
                'method_name' => 'download',
                'name' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController@download',
            ),
            396 => 
            array (
                'controller_name' => 'DatabaseBackupController',
                'controller_path' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController',
                'id' => 503,
                'method_name' => 'destroy',
                'name' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DatabaseBackupController@destroy',
            ),
            397 => 
            array (
                'controller_name' => 'DropboxSettingController',
                'controller_path' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DropboxSettingController',
                'id' => 504,
                'method_name' => 'create',
                'name' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DropboxSettingController@create',
            ),
            398 => 
            array (
                'controller_name' => 'DropboxSettingController',
                'controller_path' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DropboxSettingController',
                'id' => 505,
                'method_name' => 'store',
                'name' => 'Modules\\DatabaseBackup\\Http\\Controllers\\DropboxSettingController@store',
            ),
            399 => 
            array (
                'controller_name' => 'GoogleDriveSettingController',
                'controller_path' => 'Modules\\DatabaseBackup\\Http\\Controllers\\GoogleDriveSettingController',
                'id' => 506,
                'method_name' => 'create',
                'name' => 'Modules\\DatabaseBackup\\Http\\Controllers\\GoogleDriveSettingController@create',
            ),
            400 => 
            array (
                'controller_name' => 'GoogleDriveSettingController',
                'controller_path' => 'Modules\\DatabaseBackup\\Http\\Controllers\\GoogleDriveSettingController',
                'id' => 507,
                'method_name' => 'store',
                'name' => 'Modules\\DatabaseBackup\\Http\\Controllers\\GoogleDriveSettingController@store',
            ),
            401 => 
            array (
                'controller_name' => 'SubscriberController',
                'controller_path' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController',
                'id' => 508,
                'method_name' => 'unsubscribe',
                'name' => 'Modules\\Newsletter\\Http\\Controllers\\SubscriberController@unsubscribe',
            ),
            402 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController',
                'id' => 509,
                'method_name' => 'favouriteDocuments',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\OpenAIController@favouriteDocuments',
            ),
            403 => 
            array (
                'controller_name' => 'CodeController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\CodeController',
                'id' => 510,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\CodeController@index',
            ),
            404 => 
            array (
                'controller_name' => 'CodeController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\CodeController',
                'id' => 511,
                'method_name' => 'view',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\CodeController@view',
            ),
            405 => 
            array (
                'controller_name' => 'CodeController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\CodeController',
                'id' => 512,
                'method_name' => 'delete',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\CodeController@delete',
            ),
            406 => 
            array (
                'controller_name' => 'ChatController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\ChatController',
                'id' => 514,
                'method_name' => 'delete',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\ChatController@delete',
            ),
            407 => 
            array (
                'controller_name' => 'ChatController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\ChatController',
                'id' => 515,
                'method_name' => 'update',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\ChatController@update',
            ),
            408 => 
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCasesController',
                'id' => 516,
                'method_name' => 'create',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCasesController@create',
            ),
            409 => 
            array (
                'controller_name' => 'ImageController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\ImageController',
                'id' => 517,
                'method_name' => 'deleteImages',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\ImageController@deleteImages',
            ),
            410 => 
            array (
                'controller_name' => 'CodeController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\CodeController',
                'id' => 518,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\CodeController@index',
            ),
            411 => 
            array (
                'controller_name' => 'CodeController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\CodeController',
                'id' => 519,
                'method_name' => 'view',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\CodeController@view',
            ),
            412 => 
            array (
                'controller_name' => 'CodeController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\CodeController',
                'id' => 520,
                'method_name' => 'delete',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\CodeController@delete',
            ),
            413 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\OpenAIController',
                'id' => 521,
                'method_name' => 'contentPreferences',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\OpenAIController@contentPreferences',
            ),
            414 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\OpenAIController',
                'id' => 522,
                'method_name' => 'createContentPreferences',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\OpenAIController@createContentPreferences',
            ),
            415 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController',
                'id' => 523,
                'method_name' => 'chat',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController@chat',
            ),
            416 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController',
                'id' => 524,
                'method_name' => 'chatConversation',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController@chatConversation',
            ),
            417 => 
            array (
                'controller_name' => 'OpenAIController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController',
                'id' => 525,
                'method_name' => 'history',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIController@history',
            ),
            418 => 
            array (
                'controller_name' => 'CodeController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\CodeController',
                'id' => 526,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\CodeController@index',
            ),
            419 => 
            array (
                'controller_name' => 'CodeController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\CodeController',
                'id' => 527,
                'method_name' => 'view',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\CodeController@view',
            ),
            420 => 
            array (
                'controller_name' => 'CodeController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\CodeController',
                'id' => 528,
                'method_name' => 'delete',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\CodeController@delete',
            ),
            421 => 
            array (
                'controller_name' => 'OpenAIPreferenceController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIPreferenceController',
                'id' => 529,
                'method_name' => 'contentPreferences',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIPreferenceController@contentPreferences',
            ),
            422 => 
            array (
                'controller_name' => 'OpenAIPreferenceController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIPreferenceController',
                'id' => 530,
                'method_name' => 'imagePreferences',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIPreferenceController@imagePreferences',
            ),
            423 => 
            array (
                'controller_name' => 'OpenAIPreferenceController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIPreferenceController',
                'id' => 531,
                'method_name' => 'codePreferences',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\OpenAIPreferenceController@codePreferences',
            ),
            424 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UserController',
                'id' => 532,
                'method_name' => 'update',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UserController@update',
            ),
            425 => 
            array (
                'controller_name' => 'UserController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UserController',
                'id' => 533,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\User\\UserController@index',
            ),
            426 => 
            array (
                'controller_name' => 'CodeController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\CodeController',
                'id' => 534,
                'method_name' => 'index',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\CodeController@index',
            ),
            427 => 
            array (
                'controller_name' => 'CodeController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\CodeController',
                'id' => 535,
                'method_name' => 'view',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\CodeController@view',
            ),
            428 => 
            array (
                'controller_name' => 'CodeController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\CodeController',
                'id' => 536,
                'method_name' => 'delete',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Api\\V1\\Admin\\CodeController@delete',
            ),
            429 => 
            array (
                'controller_name' => 'PaypalRecurringController',
                'controller_path' => 'Modules\\PaypalRecurring\\Http\\Controllers\\PaypalRecurringController',
                'id' => 537,
                'method_name' => 'store',
                'name' => 'Modules\\PaypalRecurring\\Http\\Controllers\\PaypalRecurringController@store',
            ),
            430 => 
            array (
                'controller_name' => 'PaypalRecurringController',
                'controller_path' => 'Modules\\PaypalRecurring\\Http\\Controllers\\PaypalRecurringController',
                'id' => 538,
                'method_name' => 'edit',
                'name' => 'Modules\\PaypalRecurring\\Http\\Controllers\\PaypalRecurringController@edit',
            ),
            431 => 
            array (
                'controller_name' => 'StripeRecurringController',
                'controller_path' => 'Modules\\StripeRecurring\\Http\\Controllers\\StripeRecurringController',
                'id' => 539,
                'method_name' => 'store',
                'name' => 'Modules\\StripeRecurring\\Http\\Controllers\\StripeRecurringController@store',
            ),
            432 => 
            array (
                'controller_name' => 'StripeRecurringController',
                'controller_path' => 'Modules\\StripeRecurring\\Http\\Controllers\\StripeRecurringController',
                'id' => 540,
                'method_name' => 'edit',
                'name' => 'Modules\\StripeRecurring\\Http\\Controllers\\StripeRecurringController@edit',
            ),
            433 => 
            array (
                'controller_name' => 'PackageController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\PackageController',
                'id' => 541,
                'method_name' => 'getInfo',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\PackageController@getInfo',
            ),
            434 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController',
                'id' => 542,
                'method_name' => 'detail',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController@detail',
            ),
            435 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController',
                'id' => 543,
                'method_name' => 'history',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController@history',
            ),
            436 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController',
                'id' => 544,
                'method_name' => 'viewBill',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController@viewBill',
            ),
            437 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController',
                'id' => 545,
                'method_name' => 'payBill',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController@payBill',
            ),
            438 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController',
                'id' => 546,
                'method_name' => 'downloadBill',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController@downloadBill',
            ),
            439 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController',
                'id' => 547,
                'method_name' => 'cancel',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController@cancel',
            ),
            440 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController',
                'id' => 548,
                'method_name' => 'plan',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController@plan',
            ),
            441 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController',
                'id' => 549,
                'method_name' => 'store',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController@store',
            ),
            442 => 
            array (
                'controller_name' => 'PackageSubscriptionController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController',
                'id' => 550,
                'method_name' => 'setting',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\User\\PackageSubscriptionController@setting',
            ),
            443 => 
            array (
                'controller_name' => 'PackageController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\PackageController',
                'id' => 551,
                'method_name' => 'index',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\Api\\V1\\PackageController@index',
            ),
            444 => 
            array (
                'controller_name' => 'SystemUpdateController',
                'controller_path' => 'Modules\\Upgrader\\Http\\Controllers\\SystemUpdateController',
                'id' => 552,
                'method_name' => 'upgrade',
                'name' => 'Modules\\Upgrader\\Http\\Controllers\\SystemUpdateController@upgrade',
            ),
            445 => 
            array (
                'controller_name' => 'ChatController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ChatController',
                'id' => 553,
                'method_name' => 'history',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ChatController@history',
            ),
            446 => 
            array (
                'controller_name' => 'ChatController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ChatController',
                'id' => 554,
                'method_name' => 'delete',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ChatController@delete',
            ),
            447 => 
            array (
                'controller_name' => 'ChatController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ChatController',
                'id' => 555,
                'method_name' => 'update',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Customer\\ChatController@update',
            ),
            448 => 
            array (
                'controller_name' => 'CreditController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\CreditController',
                'id' => 556,
                'method_name' => 'index',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\CreditController@index',
            ),
            449 => 
            array (
                'controller_name' => 'CreditController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\CreditController',
                'id' => 557,
                'method_name' => 'create',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\CreditController@create',
            ),
            450 => 
            array (
                'controller_name' => 'CreditController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\CreditController',
                'id' => 558,
                'method_name' => 'store',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\CreditController@store',
            ),
            451 => 
            array (
                'controller_name' => 'CreditController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\CreditController',
                'id' => 559,
                'method_name' => 'edit',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\CreditController@edit',
            ),
            452 => 
            array (
                'controller_name' => 'CreditController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\CreditController',
                'id' => 560,
                'method_name' => 'update',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\CreditController@update',
            ),
            453 => 
            array (
                'controller_name' => 'CreditController',
                'controller_path' => 'Modules\\Subscription\\Http\\Controllers\\CreditController',
                'id' => 561,
                'method_name' => 'destroy',
                'name' => 'Modules\\Subscription\\Http\\Controllers\\CreditController@destroy',
            ),
            454 =>
            array (
                'controller_name' => 'UseCasesController',
                'controller_path' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCasesController',
                'id' => 301,
                'method_name' => 'create',
                'name' => 'Modules\\OpenAI\\Http\\Controllers\\Admin\\UseCasesController@create',
            ),
        ));
        
        
    }
}
