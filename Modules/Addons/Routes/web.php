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

use Modules\Addons\Http\Controllers\AddonsController;

Route::group(moduleConfig('addons.route_group'), function () {
    Route::post('addon/upload', [AddonsController::class, 'upload'])->middleware(['checkForDemoMode'])->name('addon.upload');
    Route::get('addon/switch-status/{alias}', [AddonsController::class, 'switchStatus'])->middleware(['checkForDemoMode'])->name('addon.switch-status');
});
