<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_pages', function (Blueprint $table) {
            $table->id();
            $table->string('about_us_image')->nullable();
            $table->string('a_message_from_the_owners_image')->nullable();
            $table->string('our_mission_image')->nullable();
            $table->string('our_vision_image')->nullable();
            $table->string('team_image')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->integer('visits')->nullable();
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
        Schema::dropIfExists('about_us_pages');
    }
}
