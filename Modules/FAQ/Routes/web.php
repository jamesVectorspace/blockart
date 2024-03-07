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

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\FAQ\Http\Controllers', 'middleware' => ['auth', 'locale', 'permission', 'web']], function() {
    Route::get('faq', 'FAQController@index')->name('admin.faq');
    Route::get('faq/create', 'FAQController@create')->name('admin.faq.create');
    Route::post('faq', 'FAQController@store')->middleware(['checkForDemoMode'])->name('admin.faq.store');
    Route::get('faq/{id}/edit', 'FAQController@edit')->name('admin.faq.edit');
    Route::put('faq/{id}', 'FAQController@update')->middleware(['checkForDemoMode'])->name('admin.faq.update');
    Route::delete('faq/{id}', 'FAQController@destroy')->middleware(['checkForDemoMode'])->name('admin.faq.destroy');
});
