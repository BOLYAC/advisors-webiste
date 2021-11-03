<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->string('users_phone')->nullable();
            $table->string('users_facebook')->nullable();
            $table->string('users_instagram')->nullable();
            $table->string('users_linkedin')->nullable();
            $table->string('users_whatsapp')->nullable();
            $table->string('user_title')->nullable();
            $table->string('photo_file')->nullable();
            $table->boolean('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'users_phone',
                'users_facebook',
                'users_instagram',
                'users_linkedin',
                'users_whatsapp',
                'user_title',
                'photo_file',
                'status'
            ]);
        });
    }
}
