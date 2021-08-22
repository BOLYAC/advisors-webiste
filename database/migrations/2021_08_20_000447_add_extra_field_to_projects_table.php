<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFieldToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('payment_type')->nullable();
            $table->string('gps_map')->nullable();
            $table->string('brochure_file')->nullable();
            $table->string('project_size')->nullable();
            $table->string('project_bedrooms')->nullable();
            $table->string('project_bathrooms')->nullable();
            $table->string('garage_number')->nullable();
            $table->string('garage_size')->nullable();
            $table->string('project_size_min')->nullable();
            $table->string('project_size_max')->nullable();
            $table->boolean('active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'payment_type', 'gps_map', 'brochure_file', 'project_size',
                'project_bedrooms', 'garage_number', 'garage_size', 'project_bathrooms',
                'active', 'project_size_min', 'project_size_max'
            ]);
        });
    }
}
