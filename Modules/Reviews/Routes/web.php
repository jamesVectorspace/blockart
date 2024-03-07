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

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Reviews\Http\Controllers', 'middleware' => ['auth', 'locale', 'permission', 'web']], function() {
    Route::get('reviews', 'ReviewsController@index')->name('admin.review');
    Route::get('reviews/create', 'ReviewsController@create')->name('admin.review.create');
    Route::post('reviews', 'ReviewsController@store')->middleware(['checkForDemoMode'])->name('admin.review.store');
    Route::get('reviews/{id}/edit', 'ReviewsController@edit')->name('admin.review.edit');
    Route::put('reviews/{id}', 'ReviewsController@update')->middleware(['checkForDemoMode'])->name('admin.review.update');
    Route::delete('reviews/{id}', 'ReviewsController@destroy')->middleware(['checkForDemoMode'])->name('admin.review.destroy');
});
