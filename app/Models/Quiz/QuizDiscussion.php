<?php


namespace App\Models\Quiz;


use Illuminate\Database\Eloquent\Model;

class QuizDiscussion extends Model
{
    protected $table = 'quiz_question_metas';
    protected $guarded = [''];

    public function question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }

}
