<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Site\ThemeController;

/*
|--------------------------------------------------------------------------
| Site Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => ['locale']], function () {
    Route::get('/', function(){
        if (preference('is_redirect_link') == 1) {
            return redirect()->away(preference('redirect_link'));
        } else {
            return app('App\Http\Controllers\Site\FrontendController')->index();
        }
    })->name('frontend.index');
    Route::get('/use-cases', 'FrontendController@useCases')->name('frontend.use-cases');
    Route::get('/privacy-policy', 'FrontendController@privacyPolicy')->name('frontend.privacy-policy');
    Route::get('/pricing', 'FrontendController@pricing')->name('frontend.pricing');


    // login register
    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/authenticate', 'LoginController@authenticate')->name('login.post');
    Route::get('/logout', 'LoginController@logout')->name('users.logout');

    Route::match(['get', 'post'], '/registration/{reg?}', 'LoginController@registration')->name('users.registration');
    Route::get('email-sign-up', 'LoginController@emailSignup')->name('user.emailSignup');

    // Resend Verification code
    Route::get('resend-verification-code/{email}', 'LoginController@resendUserVerificationCode')->name('users.resend.code');

    // User Verification
    Route::get('user/verification', [UserController::class, 'verify'])->name('users.verify');
    Route::get('user/verify/{token}', [UserController::class, 'verification'])->name('users.verify.token');
    Route::get('user/verify-otp/{otp}', [UserController::class, 'verifyByOtp'])->name('users.verify.otp');

    // Password reset
    Route::get('password/reset', 'LoginController@reset')->name('login.reset');
    Route::post('password/email', 'LoginController@sendResetLinkEmail')->name('login.sendResetLink');
    Route::get('password/reset-otp', 'LoginController@resetOtp')->name('reset.otp');
    Route::get('password/resets/{token}', 'LoginController@showResetForm')->name('password.reset');
    Route::post('password/resets', 'LoginController@setPassword')->name('password.resets');
    Route::get('password/reset/success', 'LoginController@resetPasswordSuccess')->name('password.reset.success');
    Route::get('password/reset/notify/{email}', 'LoginController@passwordResetNotify')->name('password.reset.notify');
    Route::get('password/resend/{email}', 'LoginController@resendPasswordReset')->name('password.reset.resend');

    // Impersonate
    Route::get('/impersonate/{impersonate}', 'LoginController@impersonate')->name('impersonator');
    Route::get('/cancel-impersonate', 'LoginController@cancelImpersonate')->name('impersonator-cancel');

    // Pages
    Route::get('page/{slug}', 'SiteController@page')->name('site.page');
    Route::get('/get-component-product', 'SiteController@getComponentProduct')->name('ajax-product');

    // Language
    Route::post('change-language', 'SiteController@switchLanguage')->middleware(['checkForDemoMode']);
});


// Login or register by google
Route::get('login/google', 'LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'LoginController@handelGoogleCallback')->name('google');

// Login or register by facebook
Route::get('login/facebook', 'LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'LoginController@handelFacebookCallback')->name('facebook');

// Theme preference
Route::post('/theme/switch', [ThemeController::class, 'switch'])->name('theme.switch');

Route::get('payment-confirm', 'LoginController@paymentConfirm')->name('site.payment-confirm');

Route::get('/reset-data', 'ResetDataController@reset');

