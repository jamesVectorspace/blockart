<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_logs', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('package_id')->nullable()->index('commission_logs_package_id_idx');
            $table->unsignedBigInteger('subscription_detail_id')->nullable()->index('commission_logs_subscription_detail_id_idx');
            $table->integer('package_subscription_id')->nullable()->index('commission_logs_package_subscription_id_foreign_idx');
            $table->text('data');
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
        Schema::dropIfExists('commission_logs');
    }
}
