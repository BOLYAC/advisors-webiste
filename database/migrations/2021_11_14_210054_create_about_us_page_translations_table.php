<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsPageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us_page_translations', function (Blueprint $table) {
            $table->id();
            $table->string('about_us_title')->nullable();
            $table->text('about_us_details')->nullable();
            $table->string('a_message_from_the_owners_tile')->nullable();
            $table->text('a_message_from_the_owners_details')->nullable();
            $table->string('our_mission_title')->nullable();
            $table->text('our_mission_details')->nullable();
            $table->string('our_vision_title')->nullable();
            $table->text('our_vision_details')->nullable();
            $table->string('team_title')->nullable();
            $table->text('team_details')->nullable();

            $table->integer('about_us_page_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['about_us_page_id', 'locale']);
            $table->foreign('about_us_page_id')->references('id')->on('about_us_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_us_page_translations');
    }
}
