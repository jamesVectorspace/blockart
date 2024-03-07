<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_purchases', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('affiliate_user_id')->index('referral_purchases_affiliate_user_id_foreign_idx');
            $table->integer('package_subscription_id')->nullable()->index('referral_purchases_package_subscription_id_idx');
            $table->unsignedBigInteger('subscription_detail_id')->nullable()->index('referral_purchases_subscription_detail_id_idx');
            $table->decimal('commission', 16, 8)->index();
            $table->bigInteger('user_id')->nullable()->index('referral_purchases_user_id_foreign_idx');
            $table->string('medium', 45)->index();
            $table->string('status', 10)->index();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral_purchases');
    }
}
