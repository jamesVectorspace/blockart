<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPlanCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_coupons', function (Blueprint $table) {
            $table->foreign(['package_id'])->references(['id'])->on('packages')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['coupon_id'])->references(['id'])->on('coupons')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_coupons', function (Blueprint $table) {
            $table->dropForeign('plan_coupons_package_id_foreign');
            $table->dropForeign('plan_coupons_coupon_id_foreign');
        });
    }
}
