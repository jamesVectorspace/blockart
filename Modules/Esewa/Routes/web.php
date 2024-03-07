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

Route::group(['prefix' => 'esewa', 'as' => 'esewa.', 'namespace' => 'Modules\Esewa\Http\Controllers', 'middleware' => ['auth', 'permission', 'locale', 'web']], function () {
    Route::post('/store', 'EsewaController@store')->name('store')->middleware('checkForDemoMode');
    Route::get('/edit', 'EsewaController@edit')->name('edit');
});
