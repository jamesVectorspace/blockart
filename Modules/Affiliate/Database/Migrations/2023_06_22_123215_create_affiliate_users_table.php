<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_users', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('user_id')->unique('user_id_UNIQUE');
            $table->integer('form_id')->default('1');
            $table->text('content')->nullable();
            $table->string('identifier')->nullable()->unique('identifier_UNIQUE');
            $table->decimal('revenue', 16, 8)->default(0)->index();
            $table->decimal('net_commission', 16, 8)->default(0)->index();
            $table->decimal('paid_amount', 16, 8)->default(0)->index();
            $table->string('status', 10)->index();
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
        Schema::dropIfExists('affiliate_users');
    }
}
