<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('subject_id');
            $table->integer('class_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('competency_score');
            $table->text('image')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->string('duration');
            $table->enum('status', ['active', 'inactive', 'ongoing']);
            $table->boolean('in_homepage')->default(false);
            $table->timestamps();
            $table->foreign('subject_id')->references('id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
