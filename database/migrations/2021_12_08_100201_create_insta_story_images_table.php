<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstaStoryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insta_story_images', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('row_no')->nullable();
            $table->string('photo_file')->nullable();
            $table->unsignedInteger('insta_story_id')->index();
            $table->foreign('insta_story_id')->references('id')->on('insta_stories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insta_story_images');
    }
}
