<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantAssessmentAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participant_assessment_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('participant_assessment_id');
            $table->unsignedBigInteger('exam_question_id');
            $table->longText('answer')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
            $table->foreign('participant_assessment_id')
                ->references('id')
                ->on('participant_assessments')
                ->onDelete('cascade');
            $table->foreign('exam_question_id')
                ->references('id')
                ->on('exam_questions')
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
        Schema::dropIfExists('participant_assessment_answers');
    }
}
