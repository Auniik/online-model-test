<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_assessments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('quiz_id');
            $table->unsignedBigInteger('participant_id');
            $table->enum('participant_type', ['vip', 'general'])->default('general');
            $table->string('score')->default(0);
            $table->boolean('is_attended')->default(false);
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->timestamps();
            $table->foreign('quiz_id')->references('id')->on('quizzes');
            $table->foreign('participant_id')->references('id')->on('participants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_assessments');
    }
}
