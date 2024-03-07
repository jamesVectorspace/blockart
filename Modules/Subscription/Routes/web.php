<?php

use Modules\Subscription\Http\Controllers\Api\V1\PackageController as PackageControllerAPI;
use Modules\Subscription\Http\Controllers\Api\V1\User\PackageSubscriptionController as PackageSubscriptionControllerAPI;

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

Route::group(['prefix' => 'admin', 'namespace' => 'Modules\Subscription\Http\Controllers', 'middleware' => ['auth', 'locale', 'permission', 'web']], function () {
    // Package
    Route::get('packages', 'PackageController@index')->name('package.index');
    Route::get('packages/create', 'PackageController@create')->name('package.create');
    Route::post('packages', 'PackageController@store')->middleware(['checkForDemoMode'])->name('package.store');
    Route::get('packages/{id}/edit', 'PackageController@edit')->name('package.edit');
    Route::put('packages/{id}', 'PackageController@update')->middleware(['checkForDemoMode'])->name('package.update');
    Route::delete('packages/{id}', 'PackageController@destroy')->middleware(['checkForDemoMode'])->name('package.destroy');

    Route::get('package/get-templates/{categoryId}', 'PackageController@getTemplate');
    Route::get('package/get-info/{id}', 'PackageController@getInfo');
    Route::get('package/get-chats/{categoryId}', 'PackageController@getChat');

    // Credit
    Route::get('credits', 'CreditController@index')->name('credit.index');
    Route::get('credits/create', 'CreditController@create')->name('credit.create');
    Route::post('credits', 'CreditController@store')->middleware(['checkForDemoMode'])->name('credit.store');
    Route::get('credits/{id}/edit', 'CreditController@edit')->name('credit.edit');
    Route::put('credits/{id}', 'CreditController@update')->middleware(['checkForDemoMode'])->name('credit.update');
    Route::delete('credits/{id}', 'CreditController@destroy')->middleware(['checkForDemoMode'])->name('credit.destroy');

    // Package Subscription
    Route::get('package-subscriptions', 'PackageSubscriptionController@index')->name('package.subscription.index');
    Route::get('package-subscriptions/create', 'PackageSubscriptionController@create')->name('package.subscription.create');
    Route::post('package-subscriptions', 'PackageSubscriptionController@store')->middleware(['checkForDemoMode'])->name('package.subscription.store');
    Route::get('package-subscriptions/{id}', 'PackageSubscriptionController@show')->name('package.subscription.show');
    Route::get('package-subscriptions/{id}/edit', 'PackageSubscriptionController@edit')->name('package.subscription.edit');
    Route::put('package-subscriptions/{id}', 'PackageSubscriptionController@update')->middleware(['checkForDemoMode'])->name('package.subscription.update');
    Route::delete('package-subscriptions/{id}', 'PackageSubscriptionController@destroy')->middleware(['checkForDemoMode'])->name('package.subscription.destroy');
    Route::match(['get', 'post'], 'subscriptions/settings', 'PackageSubscriptionController@setting')->name('package.subscription.setting');

    Route::get('payments', 'PackageSubscriptionController@payment')->name('package.subscription.payment');
    Route::put('payments/{id}/paid', 'CreditController@paid')->name('payment.paid');

    Route::get('package-subscription/{id}/invoice', 'PackageSubscriptionController@invoice')->name('package.subscription.invoice');
    Route::get('package-subscription/{id}/invoice/pdf', 'PackageSubscriptionController@invoicePdf')->name('package.subscription.invoice.pdf');
    Route::get('package-subscription/{id}/invoice/email', 'PackageSubscriptionController@invoiceEmail')->name('package.subscription.invoice.email');
});

Route::group(['prefix' => 'api', 'middleware' => 'api'], function() {
    Route::group(['prefix' => '/V1/user/subscriptions', 'middleware' => ['auth:api', 'locale', 'permission-api', 'permission']], function() {
        // Subscription
        Route::get('/', [PackageSubscriptionControllerAPI::class, 'detail']);
        Route::get('/history', [PackageSubscriptionControllerAPI::class, 'history']);
        Route::get('/history/{id}/bill/view', [PackageSubscriptionControllerAPI::class, 'viewBill']);
        Route::post('/history/{id}/bill/pay', [PackageSubscriptionControllerAPI::class, 'payBill']);
        Route::get('/history/{id}/bill/download', [PackageSubscriptionControllerAPI::class, 'downloadBill']);
        Route::post('/cancel', [PackageSubscriptionControllerAPI::class, 'cancel']);
        Route::get('/plan', [PackageSubscriptionControllerAPI::class, 'plan']);
        Route::post('/store', [PackageSubscriptionControllerAPI::class, 'store']);
        Route::get('/setting', [PackageSubscriptionControllerAPI::class, 'setting']);
    });
    
    Route::group(['prefix' => 'api/V1/plans', 'middleware' => ['locale']], function() {
        // Plan
        Route::get('/', [PackageControllerAPI::class, 'index']);
    });
});
