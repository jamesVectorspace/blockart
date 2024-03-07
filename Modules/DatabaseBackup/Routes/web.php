<?php

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

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\DatabaseBackup\Http\Controllers', 'middleware' => ['auth', 'locale', 'web']], function() {
    Route::get('/automated-backup', 'DatabaseBackupController@automatedDatabaseBackupForm')->name('database.automated.backup');
    Route::post('/auto-backup/set', 'DatabaseBackupController@store')->middleware(['checkForDemoMode'])->name('auto-backup.store');

    Route::get('/manual-backup', 'DatabaseBackupController@manualDatabaseBackupForm')->name('database.manual.backup');
    Route::get('/manual-backup-store', 'DatabaseBackupController@manualDatabaseBackup')->middleware(['checkForDemoMode'])->name('database.manual.backup.store');
    Route::get('/manual-backup-list', 'DatabaseBackupController@list')->name('database.manual.backup.list');
    Route::get('/manual-backup/download/{file}', 'DatabaseBackupController@download')->name('database.manual.backup.download');
    Route::post('/manual-backup/destroy/{file}', 'DatabaseBackupController@destroy')->middleware(['checkForDemoMode'])->name('database.manual.backup.destroy');

    Route::get('/dropbox-setting', 'DropboxSettingController@create')->name('dropbox_setting.create');
    Route::post('/dropbox-setting/store', 'DropboxSettingController@store')->middleware(['checkForDemoMode'])->name('dropbox_setting.store');

    Route::get('/google-drive-setting', 'GoogleDriveSettingController@create')->name('google_drive_setting.create');
    Route::post('/google-drive-setting/store', 'GoogleDriveSettingController@store')->middleware(['checkForDemoMode'])->name('google_drive_setting.store');
});



