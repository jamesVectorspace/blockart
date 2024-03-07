<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('referrals', function (Blueprint $table) {
            $table->foreign(['affiliate_user_id'])->references(['id'])->on('affiliate_users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['package_id'])->references(['id'])->on('packages')->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->foreign(['credit_id'])->references(['id'])->on('credits')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('referrals', function (Blueprint $table) {
            $table->dropForeign('referrals_affiliate_user_id_foreign');
            $table->dropForeign('referrals_package_id_foreign');
            $table->dropForeign('referrals_credit_id_foreign');
        });
    }
}
