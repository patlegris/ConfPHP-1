<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->string('email');
            $table->string('slug', 100);
            $table->text('message');
            $table->string('status');
            $table->string('spam');

            $table->timestamps();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_post_id_foreign');
        });

        Schema::drop('comments');
    }
}