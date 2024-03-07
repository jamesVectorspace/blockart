<?php
use Modules\Affiliate\Http\Controllers\AffiliateTagController;
use Modules\Affiliate\Http\Controllers\User\AffiliateRegistrationController;

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
// admin routes
Route::group(['prefix' => 'admin/affiliate', 'namespace' => 'Modules\Affiliate\Http\Controllers', 'middleware' => ['auth', 'locale', 'permission', 'affiliate', 'web']], function () {
    Route::get('/', 'AffiliateController@dashboard')->name('admin.affiliate.dashboard');
    Route::get('/users', 'AffiliateController@users')->name('affiliate.users');
    Route::get('/users', 'AffiliateController@users')->name('affiliate.users');
    Route::get('/users/profile/{id}', 'AffiliateController@profile')->name('affiliate.users.profile');
    Route::post('/users/update{id}', 'AffiliateController@userProfileUpdate')->name('affiliate.users.profileUpdate');
    Route::post('/users/delete/{id}', 'AffiliateController@userDestroy')->name('affiliate.users.destroy');

    Route::get('/users/referrals/{id}', 'AffiliateController@referrals')->name('affiliate.users.referrals');
    Route::get('/users/top-packages/{id}', 'AffiliateController@topPackages')->name('affiliate.users.topPackages');
    Route::get('/users/payouts/{id}', 'AffiliateController@payouts')->name('affiliate.users.payouts');
    Route::get('/users/multi-tier/{id}', 'AffiliateController@multiTier')->name('affiliate.users.multiTier');

    Route::match(['get','post'],'/settings', 'AffiliateController@settings')->name('affiliate.settings');

    // Affiliate Tag
    Route::get('/tags', 'AffiliateTagController@index')->name('tags.index');
    Route::post('/tags/store', 'AffiliateTagController@store')->name('tags.store');
    Route::get('/tags/edit/{id}', 'AffiliateTagController@edit')->name('tags.edit');
    Route::post('/tags/update', 'AffiliateTagController@update')->name('tags.update');
    Route::post('/tags/delete/{id}', 'AffiliateTagController@destroy')->name('tags.delete');

    // Campaign
    Route::get('/campaigns', 'CampaignController@index')->name('campaign.index');
    Route::post('/campaigns/store', 'CampaignController@store')->name('campaign.store');
    Route::get('/campaigns/edit/{id}', 'CampaignController@edit')->name('campaign.edit');
    Route::post('/campaigns/update', 'CampaignController@update')->name('campaign.update');
    Route::post('/campaigns/delete/{id}', 'CampaignController@destroy')->name('campaign.delete');

    // Commission plan
    Route::get('/commissions', 'CommissionPlanController@index')->name('commission.plan.index');
    Route::get('/commissions/create', 'CommissionPlanController@create')->name('commission.plan.create');
    Route::post('/commissions/store', 'CommissionPlanController@store')->name('commission.plan.store');
    Route::get('/commissions/edit/{id}', 'CommissionPlanController@edit')->name('commission.plan.edit');
    Route::post('/commissions/update/{id}', 'CommissionPlanController@update')->name('commission.plan.update');
    Route::post('/commissions/delete/{id}', 'CommissionPlanController@destroy')->name('commission.plan.delete');

    //Withdrawals
    Route::get('/withdrawals', 'WithdrawalsController@index')->name('affiliate.users.withdrawals');
    Route::match(['get', 'post'], '/withdrawals-view/{id}', 'WithdrawalsController@view')->name('affiliate.users.withdrawals_view');

    // find ajax
    Route::get('/find-affiliate-user-in-ajax', 'AffiliateController@findAffiliateUserAjaxQuery');
    Route::get('/find-affiliate-tag-in-ajax', 'AffiliateController@findAffiliateTagAjaxQuery');
    Route::get('/find-category-in-ajax', 'AffiliateController@findCategoryAjaxQuery');
    Route::get('/find-packages-in-ajax', 'AffiliateController@findPackageAjaxQuery');
    Route::get('/find-credits-in-ajax', 'AffiliateController@findCreditAjaxQuery');

    // form
    Route::get('/forms/edit/{id}', 'FormController@edit')->name('site.affiliate.form');
    Route::put('/forms/update/{id}', 'FormController@update')->name('site.affiliate.form_update');
});





// site route
Route::group(['middleware' => ['site.auth', 'locale', 'web']], function () {
    Route::match(['get', 'post'],'/affiliate', [AffiliateRegistrationController::class, 'registration'])->name('site.affiliate.registration');
});

// customer route
Route::group(['prefix' => 'user/affiliate', 'namespace' => 'Modules\Affiliate\Http\Controllers\User', 'middleware' => ['auth', 'locale', 'affiliate', 'web']], function () {
    Route::match(['get', 'post'],'/be-affiliate', 'AffiliateController@beAffiliate')->name('site.affiliate.be-affiliate');

    Route::get('/', 'AffiliateController@dashboard')->name('site.affiliate.dashboard');
    Route::get('/profile', 'AffiliateController@profile')->name('site.affiliate.profile');
    Route::post('/change-identifier', 'AffiliateController@identifierUpdate')->name('site.affiliate.changeIdentifier');

    //withdrawals
    Route::match(['get', 'post'], '/payments', 'WithdrawalsController@payments')->name('site.affiliate.payments');
    Route::match(['get', 'post'], '/requests', 'WithdrawalsController@requests')->name('site.affiliate.requests');
    Route::get('/withdrawals', 'WithdrawalsController@withdrawals')->name('site.affiliate.withdrawals');

    Route::get('/referrals', 'AffiliateController@referrals')->name('site.affiliate.referrals');
    Route::get('/top-packages', 'AffiliateController@topPackages')->name('site.affiliate.topPackages');

    Route::get('/networks', 'AffiliateController@networks')->name('site.affiliate.networks');
    Route::get('/campaign', 'AffiliateController@campaign')->name('site.affiliate.campaign');
    Route::get('/campaign/{slug}', 'AffiliateController@campaignView')->name('site.affiliate.campaign_view');
});

