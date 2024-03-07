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

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\StorageDriver\Http\Controllers', 'middleware' => ['auth', 'locale', 'permission', 'web']], function() {
    // Storage Driver
    Route::match(['GET', 'POST'], 'storagedriver', 'StorageDriverController@index')->name('storagedriver');
    // Amazon S3
    Route::match(['GET', 'POST'], 'configstoragedriver/{driver}', 'StorageDriverController@driverConfig')->name('configstoragedriver');
});
