<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('file')->nullable();
            $table->enum('level', ['level_1', 'level_2', 'level_3', 'level_4'])->nullable();
            $table->text('meta')->nullable();
            $table->enum('type', ['cq', 'mcq', 'written']);
            $table->string('remarks')->nullable();
            $table->string('solution')->nullable();
            $table->unsignedBigInteger('exam_id');
            $table->timestamps();
            $table->foreign('exam_id')->references('id')->on('exams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_questions');
    }
}
