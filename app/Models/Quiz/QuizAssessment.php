<?php

namespace App\Models\Quiz;

use App\Models\OnlineExam\Participant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class QuizAssessment extends Model
{
    protected $fillable = [
        'quiz_id', 'participant_id', 'participant_type', 'start_at', 'end_at', 'score', 'is_attended'
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

    public function getTranslatedParticipantTypeAttribute()
    {
        return [
            'vip' => ' অতিথী',
            'general' => ' সাধারণ'
        ][$this->attributes['participant_type']];
    }

    public function correctCount()
    {
        return $this->answers->sum(function ($answer) {
            return $answer->option->is_correct;
        });
    }

    public function consumedTime()
    {
        if ($to = $this->end_at) {
            $seconds = Carbon::parse($to)->diffInSeconds(Carbon::parse($this->start_at));
            $secs = floor($seconds);
            $minutes = (($secs / 60) % 60);
            $seconds = $secs % 60;
            return "{$minutes}m {$seconds}s";
        }
        return 'N/A';
    }

    public function wrongCount()
    {
        return $this->answers->sum(function ($answer) {
            return !$answer->option->is_correct;
        });
    }

}
