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
use Modules\Gdpr\Http\Controllers\GdprController;

Route::prefix('admin/gdpr')->middleware(['auth', 'locale', 'permission', 'web'])->name('gdpr.')->group(function () {
    Route::get('create', [GdprController::class, 'create'])->name('create');
    Route::post('store', [GdprController::class, 'store'])->name('store')->middleware(['checkForDemoMode']);
});
