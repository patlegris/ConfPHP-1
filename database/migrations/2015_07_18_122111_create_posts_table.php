<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable()->unsigned();
            $table->string('title');
            $table->string('excerpt', 60);
            $table->text('content');
            $table->string('slug', 100);
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->string('thumbnail_link');
            $table->string('url_site');
            $table->integer('count_comments')->default(0);
            $table->enum('status', ['publish', 'unpublish'])->default('publish');

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');
        });

        Schema::drop('posts');
    }
}
