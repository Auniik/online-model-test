<?php


namespace App\Models\OnlineExam;


use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name', 'description', 'code', 'class', 'status'
    ];

    protected $appends = ['translated_name'];

    public function getTranslatedNameAttribute()
    {
        return trans('default')[config('exam.classes')[$this->class]];
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }
}
