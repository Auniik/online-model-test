<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMcqQuestionOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mcq_question_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value');
            $table->text('file')->nullable();
            $table->boolean('is_correct')->default(false);
            $table->unsignedBigInteger('exam_question_id');
            $table->timestamps();
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
        Schema::dropIfExists('mcq_question_options');
    }
}
