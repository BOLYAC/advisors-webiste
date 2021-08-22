<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFloorProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_floors', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('project_id')->index();
            $table->string('floor_title')->nullable();
            $table->string('floor_full')->nullable();
            $table->integer('floor_price')->nullable();
            $table->string('floor_currency')->nullable();
            $table->integer('floor_size')->nullable();
            $table->integer('floor_bedrooms')->nullable();
            $table->integer('floor_bathrooms')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('floor_projects');
    }
}
