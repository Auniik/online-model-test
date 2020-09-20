<?php

namespace App\Models\Quiz;

use App\Models\OnlineExam\Participant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use function GuzzleHttp\Psr7\str;

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
            return optional($answer->option)->is_correct;
        });
    }

    public function consumedTime()
    {
        if ($to = $this->end_at) {

            if ($this->participant_type == 'vip') {
                $seconds = $this->guestTimes()->sum('time');
            } else {
                $seconds = Carbon::parse($to)->diffInSeconds(Carbon::parse($this->start_at));
            }
            return $this->parseConsumedTime($seconds);
        }
        return 'N/A';
    }

    public function getConsumedTimeScoreAttribute()
    {
        if ($to = $this->end_at) {

            if ($this->participant_type == 'vip') {
                $seconds = $this->guestTimes()->sum('time');
            } else {
                $seconds = Carbon::parse($to)->diffInSeconds(Carbon::parse($this->start_at));
            }
            return $seconds;
        }
        return 0;
    }

    public function guestTimes()
    {
        return $this->hasMany(QuizGuestTime::class);
    }

    private function parseConsumedTime($seconds)
    {
        $secs = floor($seconds);
        $minutes = (($secs / 60) % 60);
        $seconds = $secs % 60;
        return "{$minutes}m {$seconds}s";
    }

    public function wrongCount()
    {
        return $this->answers->filter(function ($q) {
            return $q->quiz_option_id;
        })->sum(function ($answer) {
            return !$answer->option->is_correct;
        });
    }
    public function skippedCount()
    {
        return  $this->answers->filter(function ($q) {
            return !$q->quiz_option_id;
        })->count();
    }

}
