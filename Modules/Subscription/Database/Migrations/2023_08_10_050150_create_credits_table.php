<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->index()->nullable()->comment('creator id');
            $table->string('name', 100);
            $table->string('code', 65);
            $table->decimal('price', 16, 8)->default(0);
            $table->integer('sort_order')->nullable();
            $table->string('plans', 1000)->nullable();
            $table->string('features', 1000)->nullable();

            $table->string('status', 45)->index()->comment('Active / Inactive');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credits');
    }
}
