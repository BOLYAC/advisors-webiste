<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('citizen_status')->default(0);
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->boolean('citizen_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('citizen_status');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('citizen_status');
        });
    }
}
