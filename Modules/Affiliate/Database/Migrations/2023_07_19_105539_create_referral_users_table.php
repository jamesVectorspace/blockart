<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_users', function (Blueprint $table) {
            $table->bigInteger('user_id')->unique('user_id_UNIQUE');
            $table->bigInteger('affiliate_user_id')->nullable()->index('referral_users_affiliate_user_id_foreign_idx');
            $table->bigInteger('reference_by')->nullable()->index('referral_users_reference_by_foreign_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral_users');
    }
}
