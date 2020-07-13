<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizAssessmentAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_assessment_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quiz_question_id');
            $table->unsignedBigInteger('quiz_assessment_id');
            $table->unsignedBigInteger('quiz_option_id');
            $table->timestamps();
            $table->foreign('quiz_question_id')->references('id')->on('quiz_questions');
            $table->foreign('quiz_option_id')->references('id')->on('quiz_question_options');
            $table->foreign('quiz_assessment_id')->references('id')->on('quiz_assessments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_assessment_answers');
    }
}
