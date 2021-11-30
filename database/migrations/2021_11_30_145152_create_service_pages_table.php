<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_pages', function (Blueprint $table) {
            $table->id();
            $table->string('services_image')->nullable();
            $table->string('first_image')->nullable();
            $table->string('second_image')->nullable();
            $table->string('third_image')->nullable();
            $table->string('fourth_image')->nullable();
            $table->string('fifth_image')->nullable();
            $table->string('sixth_image')->nullable();
            $table->string('seventh_image')->nullable();
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
        Schema::dropIfExists('service_pages');
    }
}
