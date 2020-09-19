<?php


namespace App\Models\Quiz;


use Illuminate\Database\Eloquent\Model;

class QuizGuestTime extends Model
{
    protected $fillable = [
        'quiz_assessment_id', 'quiz_question_id', 'time'
    ];

    public function question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }

    public function assessment()
    {
        return $this->belongsTo(QuizAssessment::class, 'quiz_assessment_id');
    }
}
