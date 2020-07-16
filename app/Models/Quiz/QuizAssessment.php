<?php

namespace App\Models\Quiz;

use App\Models\OnlineExam\Participant;
use Illuminate\Database\Eloquent\Model;

class QuizAssessment extends Model
{
    protected $fillable = [
        'quiz_id', 'participant_id', 'participant_type', 'consumed_time', 'score', 'is_attended'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    public function answers()
    {
        return $this->hasMany(QuizAssessmentAnswer::class);
    }

    public function correctCount()
    {
        return $this->answers->sum(function ($answer) {
            return $answer->option->is_correct;
        });
    }

    public function wrongCount()
    {
        return $this->answers->sum(function ($answer) {
            return !$answer->option->is_correct;
        });
    }

}
