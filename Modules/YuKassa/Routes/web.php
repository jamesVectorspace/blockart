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
use Modules\YuKassa\Http\Controllers\YuKassaController;

Route::group(['prefix' => 'gateway/yukassa', 'as' => 'yukassa.', 'middleware' => ['auth', 'permission', 'locale', 'web']], function () {
    Route::get('edit', [YuKassaController::class, 'edit'])->name('edit');
    Route::post('store', [YuKassaController::class, 'store'])->name('store')->middleware('checkForDemoMode');
});
