<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizGuestTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_guest_times', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_assessment_id');
            $table->foreignId('quiz_question_id');
            $table->string('time')->default(0);
            $table->timestamps();

            $table->foreign('quiz_assessment_id')->references('id')->on('quiz_assessments')->onDelete('cascade');
            $table->foreign('quiz_question_id')->references('id')->on('quiz_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_guest_times');
    }
}
