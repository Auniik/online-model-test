<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuestionMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_question_metas', fn (Blueprint $table) => [
            $table->bigIncrements('id'),
            $table->foreignId('quiz_question_id')->constrained(),
            $table->string('title'),
            $table->longText('description'),
            $table->text('image')->nullable(),
            $table->timestamps() ?? ''
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_question_metas');
    }
}
