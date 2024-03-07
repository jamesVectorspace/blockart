<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\{
    AuthController,
    PreferenceController

};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::prefix('/V1')->middleware(['locale'])->group(function() {
    Route::post('/registration', [AuthController::class, 'signUp']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);

    // Preference for App
    Route::get('/preferences', [PreferenceController::class, 'preference']);

    // Resend Verification code
    Route::get('/resend-verification-code/{email}', [AuthController::class, 'resendUserVerificationCode']);
    Route::get('/verify-otp/{otp}', [AuthController::class, 'verifyByOtp']);

    // Reset Password
    Route::post('/password/reset-link', [AuthController::class, 'sendPasswordResetLink']);
    Route::post('/password/reset', [AuthController::class, 'setPassword']);
    Route::get('/password/resend/{email}', [AuthController::class, 'resendPasswordReset']);
    Route::get('/password/otp-verify/{otp}', [AuthController::class, 'checkOtp']);
});



