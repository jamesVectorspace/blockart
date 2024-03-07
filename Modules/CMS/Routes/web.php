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


Route::group(['middleware' => ['auth', 'locale', 'permission', 'web']], function () {
    Route::prefix('admin')->namespace('Modules\CMS\Http\Controllers')->group(function () {
        Route::get('page/list', 'CMSController@index')->name('page.index');
        Route::get('page/create', 'CMSController@create')->name('page.create');
        Route::post('page/store', 'CMSController@store')->middleware(['checkForDemoMode'])->name('page.store');
        Route::get('page/edit/{slug}', 'CMSController@edit')->name('page.edit');
        Route::post('page/update/{id}', 'CMSController@update')->middleware(['checkForDemoMode'])->name('page.update');
        Route::post('page/delete/{id}', 'CMSController@delete')->middleware(['checkForDemoMode'])->name('page.delete');

        Route::get('/page/home/list', 'CMSController@home')->name('page.home');
        Route::get('page/home/create', 'CMSController@createHomepage')->name('page.home.create');
        Route::get('page/home/edit/{slug}', 'CMSController@editHome')->name('page.home.edit');
        Route::get('page/home/export/{slug}', 'CMSController@exportHome')->name('page.home.export');
        Route::post('page/home/import/', 'CMSController@importHome')->middleware(['checkForDemoMode'])->name('page.home.import');
        Route::post('page/home/update/{id}', 'CMSController@quickUpdate')->middleware(['checkForDemoMode'])->name('page.home.quick-update');

        // Theme Option
        Route::get('theme/list', 'ThemeOptionController@list')->name('theme.index');
        Route::post('theme/store', 'ThemeOptionController@store')->name('theme.store')->middleware(['checkForDemoMode']);

    });

    Route::prefix('admin')->namespace('Modules\CMS\Http\Controllers')->group(function () {
        // Page builder
        Route::get('page/builder/{slug}', 'BuilderController@edit')->name('builder.edit');
        Route::match(['get', 'post'], 'page/builder/edit/{file}', 'BuilderController@editElement')->name('builder.form');
        Route::post('page/builder/edit/{id}/component', 'BuilderController@updateComponent')->name('builder.update');
        Route::post('page/builder/remove/{id}/component', 'BuilderController@deleteComponent')->middleware(['checkForDemoMode'])->name('builder.delete');
        Route::post('page/builder/update/{id}/all-component', 'BuilderController@updateAllComponents')->middleware(['checkForDemoMode'])->name('builder.updateAll');
        Route::get('ajax-search-resource/json', 'BuilderController@ajaxResourceFetch')->name('ajaxResourceSelect');
    });
});
