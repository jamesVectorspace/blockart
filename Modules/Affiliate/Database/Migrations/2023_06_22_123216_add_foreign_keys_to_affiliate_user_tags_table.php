<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAffiliateUserTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('affiliate_user_tags', function (Blueprint $table) {
            $table->foreign(['affiliate_tag_id'])->references(['id'])->on('affiliate_tags')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['affiliate_user_id'])->references(['id'])->on('affiliate_users')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('affiliate_user_tags', function (Blueprint $table) {
            $table->dropForeign('affiliate_user_tags_affiliate_tag_id_foreign');
            $table->dropForeign('affiliate_user_tags_affiliate_user_id_foreign');
        });
    }
}
