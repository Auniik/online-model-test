<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCqQuestionMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cq_question_metas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('max_remarks')->nullable();
            $table->enum('level', ['level_1', 'level_2', 'level_3', 'level_4']);
            $table->unsignedBigInteger('exam_question_id');
            $table->timestamps();
            $table->foreign('exam_question_id')->references('id')->on('exam_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cq_question_metas');
    }
}
