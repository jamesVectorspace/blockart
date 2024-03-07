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

Route::group(['prefix' => 'gateway/paytm', 'namespace' => 'Modules\Paytm\Http\Controllers', 'as' => 'paytm.', 'middleware' => ['auth', 'permission', 'web']], function () {
    Route::post('/store', 'PaytmController@store')->name('store')->middleware('checkForDemoMode');
    Route::get('/edit', 'PaytmController@edit')->name('edit');
});
