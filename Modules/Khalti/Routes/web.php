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

Route::group(['prefix' => 'gateway/khalti', 'as' => 'khalti.', 'namespace' => 'Modules\Khalti\Http\Controllers', 'middleware' => ['auth', 'permission', 'locale', 'web']], function () { 
    Route::post('/store', 'KhaltiController@store')->name('store')->middleware('checkForDemoMode');
    Route::get('/edit', 'KhaltiController@edit')->name('edit');
});
