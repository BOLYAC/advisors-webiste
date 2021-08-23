<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqQuestionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_question_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('faq_question_id')->unsigned();
            $table->string('locale')->index();
            $table->string('title')->nullable();
            $table->text('details')->nullable();

            $table->unique(['faq_question_id', 'locale']);
            $table->foreign('faq_question_id')->references('id')->on('faq_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq_question_translations');
    }
}
