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
            $table->unsignedBigInteger('quiz_option_id')->nullable();
            $table->timestamps();
            $table->foreign('quiz_question_id')
                ->references('id')
                ->on('quiz_questions')
                ->onDelete('cascade');
            $table->foreign('quiz_option_id')
                ->references('id')
                ->on('quiz_question_options')
                ->onDelete('cascade');
            $table->foreign('quiz_assessment_id')
                ->references('id')
                ->on('quiz_assessments')
                ->onDelete('cascade');
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
