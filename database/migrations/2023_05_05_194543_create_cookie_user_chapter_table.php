<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCookieUserChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cookie_user_chapter', function (Blueprint $table) {
            $table->id();
            $table->text('user_token');
            $table->bigInteger('chapter_id')->unsigned()->index();
            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->bigInteger('story_id')->unsigned()->index();
            $table->foreign('story_id')->references('id')->on('stories')->onDelete('cascade');
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
        Schema::dropIfExists('cookie_user_chapter');
    }
}
