<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToLifeTimeCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('life_time_commissions', function (Blueprint $table) {
            $table->foreign(['referral_id'])->references(['id'])->on('affiliate_users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['user_id'])->references(['id'])->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('life_time_commissions', function (Blueprint $table) {
            $table->dropForeign('life_time_commissions_referral_id_foreign');
            $table->dropForeign('life_time_commissions_user_id_foreign');
        });
    }
}
