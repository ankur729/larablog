<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comment_replies', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('comment_id');
            $table->integer('is_active');
            $table->string('author');
            $table->string('email');
            $table->string('body');
            $table->timestamps();

             $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comment_replies', function (Blueprint $table) {
            //
        });
    }
}
