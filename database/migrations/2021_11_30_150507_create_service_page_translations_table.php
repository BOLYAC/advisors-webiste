<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_page_translations', function (Blueprint $table) {
            $table->id();
            $table->string('first_title')->nullable();
            $table->text('first_details')->nullable();
            $table->string('second_title')->nullable();
            $table->text('second_details')->nullable();
            $table->string('third_title')->nullable();
            $table->text('third_details')->nullable();
            $table->string('fourth_title')->nullable();
            $table->text('fourth_details')->nullable();
            $table->string('fifth_title')->nullable();
            $table->text('fifth_details')->nullable();
            $table->string('sixth_title')->nullable();
            $table->text('sixth_details')->nullable();
            $table->string('seventh_title')->nullable();
            $table->text('seventh_details')->nullable();

            $table->integer('service_page_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['service_page_id', 'locale']);
            $table->foreign('service_page_id')->references('id')->on('service_pages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_page_translations');
    }
}
