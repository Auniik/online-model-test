<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizAssessmentAnswer extends Model
{
    protected $fillable = [
        'quiz_question_id', 'quiz_assessment_id', 'quiz_option_id'
    ];

    public function assessment()
    {
        return $this->belongsTo(QuizAssessment::class, 'quiz_assessment_id');
    }
    public function question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }

    public function option()
    {
        return $this->belongsTo(QuizQuestionOption::class, 'quiz_option_id');
    }

    public function isCorrect()
    {
        return $this->option()->where('is_correct', true);
    }
}
