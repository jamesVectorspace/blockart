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

Route::group(['prefix' => 'gateway/stripe-recurring', 'as' => 'striperecurring.', 'namespace' => 'Modules\StripeRecurring\Http\Controllers', 'middleware' => ['auth', 'permission', 'locale', 'web']], function () {
    Route::post('/store', 'StripeRecurringController@store')->name('store')->middleware('checkForDemoMode');
    Route::get('/edit', 'StripeRecurringController@edit')->name('edit');
});
