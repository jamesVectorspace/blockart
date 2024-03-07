<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('affiliate_user_id')->index('referrals_affiliate_user_id_foreign_idx');
            $table->integer('package_id')->nullable()->index('referrals_package_id_idx');
            $table->unsignedBigInteger('credit_id')->nullable()->index('referrals_credit_id_idx');
            $table->integer('total_click')->index();
            $table->integer('total_purchase')->default(0)->index();
            $table->decimal('sales_amount', 16, 8)->default(0)->index();
            $table->timestamp('created_at')->nullable()->useCurrent();
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
        Schema::dropIfExists('referrals');
    }
}
