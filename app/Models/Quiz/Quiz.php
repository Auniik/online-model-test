<?php

namespace App\Models\Quiz;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = [
        'name', 'description', 'image', 'date', 'date', 'is_default', 'is_published'
    ];

    protected $dates = [
        'date'
    ];

    public function questions()
    {
        return $this->hasMany(QuizQuestion::class);
    }
}
