<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReferralUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('referral_users', function (Blueprint $table) {
            $table->foreign(['reference_by'])->references(['id'])->on('affiliate_users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['affiliate_user_id'])->references(['id'])->on('affiliate_users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('referral_users', function (Blueprint $table) {
            $table->dropForeign('referral_users_affiliate_users_id_foreign');
            $table->dropForeign('referral_users_reference_by_foreign');
            $table->dropForeign('referral_users_user_id_foreign');
        });
    }
}
