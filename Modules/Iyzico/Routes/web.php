<?php

/**
 * @package Iyzico Martvill
 * @author Md. Mostafijur Rahman <mostafijur.techvill@gmail.ocm>
 * @created 05-09-2023
 */

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'gateway/iyzico', 'namespace' => 'Modules\Iyzico\Http\Controllers', 'as' => 'iyzico.', 'middleware' => ['auth', 'permission', 'web']], function () {
    Route::post('store', 'IyzicoController@store')->name('store')->middleware('checkForDemoMode');
    Route::get('edit', 'IyzicoController@edit')->name('edit');
});
