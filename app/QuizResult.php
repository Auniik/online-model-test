<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    protected $table = 'quiz_results';
    protected $guarded = [];

    public function event()
    {
        return $this->hasOne(Event::class,'id','event_id');
    }

    public function player()
    {
        return $this->hasOne(Player::class,'id','player_id');
    }
}
