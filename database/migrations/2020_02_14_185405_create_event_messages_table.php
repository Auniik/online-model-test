<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('image');
            $table->text('message');
            $table->string('designation');
            $table->string('facebook_link');
            $table->string('twitter_link');
            $table->string('instagram_link');
            $table->boolean('is_team_member')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_messages');
    }
}
