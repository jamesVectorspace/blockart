<?php

use Illuminate\Support\Facades\{Artisan, Route, Session};
use Modules\Ticket\Http\Controllers\User\FilesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth', 'locale', 'permission']], function () {
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('dashboard/sales-monthly', 'DashboardController@salesOfTheMonth')->name('dashboard.sale-of-the-month');
    Route::get('dashboard/new-users', 'DashboardController@latestRegistration')->name('dashboard.latest-registration');
    Route::get('dashboard/new-transactions', 'DashboardController@latestTransaction')->name('dashboard.latest-transaction');
    Route::post('change-lang', 'DashboardController@switchLanguage')->middleware(['checkForDemoMode']);

    // Role
    Route::controller(RoleController::class)->prefix('roles')->as('roles.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->middleware(['checkForDemoMode'])->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}', 'update')->middleware(['checkForDemoMode'])->name('update');
        Route::delete('/{id}', 'destroy')->middleware(['checkForDemoMode'])->name('destroy');
    });


    // Role
    Route::get('permission-role', 'PermissionRoleController@index')->name('permissionRoles.index');
    Route::get('generate-permission', 'PermissionRoleController@generatePermission')->middleware(['checkForDemoMode'])->name('generatePermission.index');
    Route::post('assign-permission', 'PermissionRoleController@assignPermission')->name('permissionRoles.assignPermission');

    // User
    Route::get('user/list', 'UserController@index')->name('users.index');
    Route::get('user/create', 'UserController@create')->name('users.create');
    Route::post('user/store', 'UserController@store')->middleware(['checkForDemoMode'])->name('users.store');
    Route::get('user/edit/{id}', 'UserController@edit')->name('users.edit');
    Route::post('user/updatePassword/{id}', 'UserController@updatePassword')->middleware(['checkForDemoMode'])->name('users.password');
    Route::post('user/update/{id}', 'UserController@update')->middleware(['checkForDemoMode'])->name('users.update');
    Route::post('user/delete/{id}', 'UserController@destroy')->name('users.destroy')->middleware(['checkForDemoMode']);
    Route::get('user/pdf', 'UserController@pdf')->middleware(['checkForDemoMode'])->name('users.pdf');
    Route::get('user/csv', 'UserController@csv')->middleware(['checkForDemoMode'])->name('users.csv');
    Route::get('user/activity/', 'UserController@allUserActivity')->name('users.activity');
    Route::post('user/activity/delete/{id}', 'UserController@deleteUserActivity')->name('users.activity.delete');
    Route::post('user/update-profile/{id}', 'UserController@updateProfile')->middleware(['checkForDemoMode'])->name('users.updateProfile');
    Route::get('profile', 'UserController@profile')->name('users.profile');
    Route::post('user/update-profile-password/{id}', 'UserController@updateProfilePassword')->middleware(['checkForDemoMode'])->name('users.profilePassword');

    // Email Template
    Route::get('emailTemplate/list', 'MailTemplateController@index')->name('emailTemplates.index');
    Route::get('emailTemplate/create', 'MailTemplateController@create')->name('emailTemplates.create');
    Route::post('emailTemplate/store', 'MailTemplateController@store')->middleware(['checkForDemoMode'])->name('emailTemplates.store');
    Route::get('emailTemplate/edit/{id}', 'MailTemplateController@edit')->name('emailTemplates.edit');
    Route::post('emailTemplate/update/{id}', 'MailTemplateController@update')->middleware(['checkForDemoMode'])->name('emailTemplates.update');
    Route::post('emailTemplate/delete/{id}', 'MailTemplateController@destroy')->middleware(['checkForDemoMode'])->name('emailTemplates.destroy');

    // Configurations
    Route::match(['GET', 'POST'], 'preference', 'PreferenceController@index')->name('preferences.index');
    Route::match(['GET', 'POST'], 'preference/password', 'PreferenceController@password')->name('preferences.password');
    Route::match(['GET', 'POST'], 'account-setting', 'AccountSettingController@index')->name('account.setting.option');
    Route::match(['GET', 'POST'], 'email-setting', 'EmailConfigurationController@index')->name('emailConfigurations.index');
    Route::match(['GET', 'POST'], 'general-setting', 'CompanySettingController@index')->name('companyDetails.setting');
    Route::match(['GET', 'POST'], 'sso-service', 'SsoController@index')->name('sso.index');
    Route::match(['GET', 'POST'], 'maintenance-mode', 'MaintenanceModeController@enable')->name('maintenance.enable');
    Route::get('system-info', 'SystemInfoController@index')->name('systemInfo.index');
    Route::get('verify-email-setting', 'EmailController@emailVerifySetting')->name('emailVerifySetting');
    Route::post('verify-email-setting', 'EmailController@emailVerifySetting')->middleware(['checkForDemoMode'])->name('emailVerifySetting');

    //Rredirect Link
    Route::match(['GET', 'POST'], 'redirect-link', 'CompanySettingController@setRedirectLink')->name('setting.setRedirectLink');

    // Default Package
    Route::get('default-package', 'AccountSettingController@defaultPackage')->name('account.setting.defaultPackage');
    Route::post('default-package-store', 'AccountSettingController@defaultPackageStore')->name('account.setting.defaultPackageStore');

    // Language
    Route::controller(LanguageController::class)->prefix('languages')->as('language.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->middleware(['checkForDemoMode'])->name('store');
        Route::get('/{id}/edit', 'edit');
        Route::put('update', 'update')->middleware(['checkForDemoMode'])->name('update');
        Route::delete('/{id}', 'destroy')->middleware(['checkForDemoMode'])->name('destroy');

        Route::get('translation/{id}', 'translation')->name('translation');
        Route::post('translation/store', 'translationStore')->middleware(['checkForDemoMode'])->name('translation.store');
    });

    // Addons Manager
    Route::get('addons', 'AddonsMangerController@index')->name('addon.index');

    // AJAX
    Route::get('find-users-with-ajax', 'UserController@findUser')->name('find.users.ajax');
    Route::post('/batch/delete', 'BatchController@destroy')->name('admin.batch_delete');

    Route::get('/find-currency-in-ajax', 'CurrencyController@findCurrencyAjaxQuery')->name('findCurrencyAjax');

    // Clear Cache
    Route::get('/clear-cache', function () {
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');

        Session::flash('success', __('Cache successfully cleared.'));
        return back();
    })->name('clear-cache');

});

Route::group(['middleware' => ['isLoggedIn']], function () {
    Route::get('files/download/{id}', [FilesController::class, 'downloadAttachment']);
});