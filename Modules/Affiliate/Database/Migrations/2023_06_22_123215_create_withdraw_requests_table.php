<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_requests', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('affiliate_user_id')->index('withdraw_request_affiliate_user_id_foreign_idx');
            $table->integer('withdrawal_method_id')->unsigned()->nullable()->index();
            $table->decimal('amount', 16, 8)->index();
            $table->string('status', 45)->index();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('withdraw_requests');
    }
}
