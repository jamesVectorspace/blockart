<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLifeTimeCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('life_time_commissions', function (Blueprint $table) {
            $table->bigInteger('user_id')->unique('user_id_UNIQUE');
            $table->bigInteger('referral_id')->index('life_time_commissions_referral_id_foreign_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('life_time_commissions');
    }
}
