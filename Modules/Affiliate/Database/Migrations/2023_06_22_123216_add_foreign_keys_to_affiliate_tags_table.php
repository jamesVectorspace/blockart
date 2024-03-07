<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAffiliateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_tags', function (Blueprint $table) {
            $table->foreign(['parent_id'])->references(['id'])->on('affiliate_tags')->onUpdate('SET NULL')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_tags', function (Blueprint $table) {
            $table->dropForeign('affiliate_tags_parent_id_foreign');
        });
    }
}
