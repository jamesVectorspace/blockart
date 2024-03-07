<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_coupons', function (Blueprint $table) {
            $table->unsignedBigInteger('credit_id')->index('credit_coupons_credit_id_foreign_idx');
            $table->unsignedBigInteger('coupon_id')->index('credit_coupons_coupon_id_foreign_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credit_coupons');
    }
}
