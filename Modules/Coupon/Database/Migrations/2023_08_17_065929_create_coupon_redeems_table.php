<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponRedeemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupon_redeems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('coupon_id')->nullable()->index();
            $table->string('coupon_code')->nullable();
            $table->bigInteger('user_id')->nullable()->index();
            $table->integer('subscription_detail_id')->nullable()->index();
            $table->string('user_name')->nullable();
            $table->unsignedBigInteger('package_id')->nullable()->index();
            $table->string('package_type')->nullable();
            $table->decimal('discount_amount', 16, 8)->index();
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
            $table->timestamp('created_at')->useCurrent();
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
        Schema::dropIfExists('coupon_redeems');
    }
}
