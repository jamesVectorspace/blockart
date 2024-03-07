<?php

use Illuminate\Support\Facades\Route;
use Modules\MediaManager\Http\Controllers\MediaManagerController;

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

Route::middleware(['auth', 'locale', 'permission', 'web'])->group(function () {
    Route::post('media-manager/file/store', [MediaManagerController::class, 'store'])->name('mediaManager.store');

    Route::prefix('admin')->group(function () {
        Route::get('uploaded-files/create', [MediaManagerController::class, 'create'])->name('mediaManager.create');
        Route::post('media-manager/files/upload', [MediaManagerController::class, 'upload'])->name('mediaManager.upload');
        Route::get('uploaded-files', [MediaManagerController::class, 'uploadedFiles'])->name('mediaManager.uploadedFiles');
        Route::get('sort-files', [MediaManagerController::class, 'sortFiles'])->name('mediaManager.sortFiles');
        Route::get('paginate-files', [MediaManagerController::class, 'paginateFiles'])->name('mediaManager.paginateFiles');
        Route::get('uploaded-files/download/{id}', [MediaManagerController::class, 'download'])->name('mediaManager.download');
        Route::post('paginate-data', [MediaManagerController::class, 'paginateData'])->name('mediaManager.paginateData');
        Route::post('delete-image', [MediaManagerController::class, 'deleteImage'])->middleware(['checkForDemoMode'])->name('mediaManager.delete');
    });
});
