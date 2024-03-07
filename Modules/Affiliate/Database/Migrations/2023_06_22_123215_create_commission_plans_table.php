<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission_plans', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 255);
            $table->decimal('commission', 8, 2)->index();
            $table->integer('level')->nullable()->default(1)->index();
            $table->text('level_commission')->nullable();
            $table->string('commission_type', 10)->index();
            $table->string('match_type', 45)->nullable()->comment('all/one');
            $table->text('rule_groups')->nullable();
            $table->string('apply_to', 45)->nullable();
            $table->string('remaining', 45)->nullable();
            $table->tinyInteger('is_default')->default(0);
            $table->string('status', 45);
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
        Schema::dropIfExists('commission_plans');
    }
}
