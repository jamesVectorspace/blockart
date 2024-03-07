<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCommissionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commission_logs', function (Blueprint $table) {
            $table->foreign(['package_id'])->references(['id'])->on('packages')->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->foreign(['package_subscription_id'])->references(['id'])->on('package_subscriptions')->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->foreign(['subscription_detail_id'])->references(['id'])->on('subscription_details')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commission_logs', function (Blueprint $table) {
            $table->dropForeign('commission_logs_package_id_foreign');
            $table->dropForeign('commission_logs_package_subscription_id_foreign');
            $table->dropForeign('commission_logs_subscription_detail_id_foreign');
        });
    }
}
