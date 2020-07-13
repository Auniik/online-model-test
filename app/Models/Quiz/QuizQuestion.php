<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = [
        'title', 'meta', 'quiz_id'
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function options()
    {
        return $this->hasMany(QuizQuestionOption::class);
    }

    public function correctOption()
    {
        return $this->options()->where('is_correct', true);
    }
}
