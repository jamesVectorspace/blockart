<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReferralPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('referral_purchases', function (Blueprint $table) {
            $table->foreign(['affiliate_user_id'], 'referral_purchases_affiliate_user_id')->references(['id'])->on('affiliate_users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['package_subscription_id'])->references(['id'])->on('package_subscriptions')->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->foreign(['subscription_detail_id'])->references(['id'])->on('subscription_details')->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('referral_purchases', function (Blueprint $table) {
            $table->dropForeign('referral_purchases_affiliate_user_id');
            $table->dropForeign('referral_purchases_package_subscription_id_foreign');
            $table->dropForeign('referral_purchases_subscription_detail_id_foreign');
            $table->dropForeign('referral_purchases_user_id_foreign');
        });
    }
}
