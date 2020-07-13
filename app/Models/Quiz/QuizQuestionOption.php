<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizQuestionOption extends Model
{
    protected  $fillable = [
        'quiz_question_id', 'value', 'is_correct'
    ];

    public function question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
}
