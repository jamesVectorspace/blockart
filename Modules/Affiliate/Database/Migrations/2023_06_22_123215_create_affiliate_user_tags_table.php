<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliateUserTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliate_user_tags', function (Blueprint $table) {
            $table->bigInteger('affiliate_user_id')->index('affiliate_user_tags_affiliate_user_id_foreign_idx');
            $table->integer('affiliate_tag_id')->index('affiliate_user_tags_affiliate_tag_id_foreign_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affiliate_user_tags');
    }
}
