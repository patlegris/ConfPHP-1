<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostTagTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->integer('tag_id')->unsigned()->nullable();
            $table->integer('post_id')->unsigned()->nullable();

            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('CASCADE');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('CASCADE');

            $table->unique(['tag_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropForeign('post_tag_tag_id_foreign');
            $table->dropForeign('post_tag_post_id_foreign');
        });

        Schema::drop('post_tag');
    }
}
