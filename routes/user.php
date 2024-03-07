<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\{
    UserController,
    DashboardController,
    SubscriptionController
};

/*
|--------------------------------------------------------------------------
| User Panel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('user')->name('user.')->middleware(['auth', 'locale'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile/update', [UserController::class, 'update'])->middleware(['checkForDemoMode'])->name('userProfileUpdate');
    Route::post('/profile/update-password', [UserController::class, 'updatePassword'])->middleware(['checkForDemoMode'])->name('userProfileUpdatePassword');
    
    Route::post('/profile/verify-email', [UserController::class, 'verifyEmailByAjax'])->middleware(['checkForDemoMode'])->name('userProfileEmailVerifyByAjax');
    Route::post('/profile/verification-otp', [UserController::class, 'verifyOtpByAjax'])->middleware(['checkForDemoMode'])->name('userProfileOtpVerifyByAjax');
    Route::post('/profile/update-email', [UserController::class, 'updateEmailByAjax'])->middleware(['checkForDemoMode'])->name('userProfileUpdateEmailByAjax');
    
    Route::get('/profile/verification/{token}', [UserController::class, 'verification'])->name('userProfileVerification');

    
    Route::get('/subscription', [UserController::class, 'subscription'])->name('subscription');
    Route::get('/subscription/history', [UserController::class, 'subscriptionHistory'])->name('subscription.history');
    
    Route::get('/team-list', [UserController::class, 'userTeamList'])->name('subscription.teamList');
    Route::get('/team-member-delete/{id}', [UserController::class, 'destroyMember'])->name('subscription.teamMemberDelete');
    Route::get('/team-member-edit/{id}', [UserController::class, 'memberEdit'])->name('subscription.teamMemberEdit');
    Route::post('/team-member-update', [UserController::class, 'updateMember'])->name('subscription.teamMemberUpdate');
    Route::post('/member-meta-update', [UserController::class, 'updateMemberMeta'])->name('subscription.memberMetaUpdate');
    Route::post('/subscription/member-session-update', [UserController::class, 'updateMemberSession'])->name('subscription.memberSessionUpdate');

    Route::post('/member-invitation-email', [UserController::class, 'memberInvitationEmail'])->middleware(['checkForDemoMode'])->name('memberEmailInvitation');
    Route::get('/member-generate-link', [UserController::class, 'memberGenerateLink'])->name('memberGenerateLink');
    Route::get('/subscription/team-create', [UserController::class, 'userTeamCreate'])->name('subscription.teamCreate');
    Route::get('/subscription/small-package', [UserController::class, 'smallPlan'])->name('subscription.smallPlan');

    Route::get('subscription/checkout', [SubscriptionController::class, 'checkout'])->name('subscription.checkout');
    Route::post('subscription/check-discount', [SubscriptionController::class, 'checkCouponDiscount'])->name('subscription.checkDiscount');
    Route::post('subscription/reset-discount', [SubscriptionController::class, 'resetDiscount'])->name('subscription.resetDiscount');
    
    Route::get('subscription/package', [SubscriptionController::class, 'package'])->name('package');
    Route::post('subscription/store', [SubscriptionController::class, 'storeSubscription'])->name('subscription.store');
    Route::post('subscription/update', [SubscriptionController::class, 'updateSubscription'])->name('subscription.update');
    Route::get('subscription/cancel/{user_id}', [SubscriptionController::class, 'cancelSubscription'])->name('subscription.cancel');
    Route::get('bill-history/show/{id}', [SubscriptionController::class, 'billDetails'])->name('bill-details');
    Route::get('bill-history/pdf/{id}', [SubscriptionController::class, 'billPdf'])->name('bill-pdf');

    Route::post('subscription/pending-payment', [SubscriptionController::class, 'payPendingSubscription'])->name('pay.pending_subscription');

    Route::post('credit/store', [SubscriptionController::class, 'storeCredit'])->name('credit.store');

    Route::get('/custom-ticket', [UserController::class, 'customTicket'])->name('custom-ticket');
    Route::get('support-list', [UserController::class, 'supportTicket'])->name('support-ticket');
    Route::get('/new-ticket', [UserController::class, 'newTicket'])->name('new-ticket');
});

Route::get('/profile/edit-email/{id}', [UserController::class, 'editEmail'])->name('userEditEmail');
Route::post('/profile/update-new-email', [UserController::class, 'updateEmail'])->name('userUpdateEmail');
Route::get('plan-description/{id}', [SubscriptionController::class, 'planDescription'])->name('plan.description');
Route::get('subscription-paid', [SubscriptionController::class, 'subscriptionPaid'])->name('subscription-paid');
Route::get('subscription-update-paid', [SubscriptionController::class, 'subscriptionUpdatePaid'])->name('subscription-update-paid');

Route::get('credit-paid', [SubscriptionController::class, 'creditPaid'])->name('credit.paid');

Route::get('subscription-pending-payment-response', [SubscriptionController::class, 'subscriptionPendingPaymentResponse'])->name('subscription-pending-payment-response');











