<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_tags', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 60)->index();
            $table->string('slug', 60)->unique('slug_UNIQUE');
            $table->integer('parent_id')->nullable()->index('affiliate_tags_parent_id_foreign_idx');
            $table->text('summary')->nullable();
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
        Schema::dropIfExists('affiliate_tags');
    }
}
