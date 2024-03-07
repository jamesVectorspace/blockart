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
use Modules\PaypalRecurring\Http\Controllers\PaypalRecurringController;

Route::group(['prefix' => 'gateway/paypal-recurring', 'as' => 'paypalrecurring.', 'namespace' => 'Modules\PaypalRecurring\Http\Controllers', 'middleware' => ['auth', 'permission', 'locale', 'web']], function () {
    Route::post('/store', [PaypalRecurringController::class, 'store'])->name('store')->middleware('checkForDemoMode');
    Route::get('/edit', [PaypalRecurringController::class, 'edit'])->name('edit');
});
