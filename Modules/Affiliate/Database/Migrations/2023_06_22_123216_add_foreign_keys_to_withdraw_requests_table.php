<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToWithdrawRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('withdraw_requests', function (Blueprint $table) {
            $table->foreign(['affiliate_user_id'], 'withdraw_request_affiliate_user_id_foreign')->references(['id'])->on('affiliate_users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('withdrawal_method_id')->references('id')->on('withdrawal_methods')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('withdraw_requests', function (Blueprint $table) {
            $table->dropForeign('withdraw_request_affiliate_user_id_foreign');
            $table->dropForeign('transactions_withdrawal_method_id_foreign');
        });
    }
}
