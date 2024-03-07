<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCreditCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('credit_coupons', function (Blueprint $table) {
            $table->foreign(['credit_id'])->references(['id'])->on('credits')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::table('credit_coupons', function (Blueprint $table) {
            $table->dropForeign('credit_coupons_credit_id_foreign');
            $table->dropForeign('credit_coupons_coupon_id_foreign');
        });
    }
}
