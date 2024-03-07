<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_coupons', function (Blueprint $table) {
            $table->integer('package_id')->index('plan_coupons_package_id_foreign_idx');
            $table->unsignedBigInteger('coupon_id')->index('plan_coupons_coupon_id_foreign_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_coupons');
    }
}
