<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstaStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insta_stories', function (Blueprint $table) {
            $table->id();
            $table->string('photo_file')->nullable();
            $table->boolean('status')->nullable();
            $table->tinyInteger('row_no')->nullable();
            $table->string('link_story')->nullable();
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
        Schema::dropIfExists('insta_stories');
    }
}
