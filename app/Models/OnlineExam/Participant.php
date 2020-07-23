<?php


namespace App\Models\OnlineExam;


use App\Models\Quiz\QuizAssessment;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Participant extends User
{

    use Notifiable;
    protected $guard = 'participant';

    public static function boot(): void
    {
        parent::boot();
        if (!app()->runningInConsole()) {
            static::creating(function ($model){
                $model->fill([
                    'username' => uniqid(Str::slug($model->name, '.')),
                ]);
            });
        }
    }

    protected $fillable = [
        'name', 'username', 'email', 'password', 'mobile_number', 'school_name', 'class', 'roll', 'sub_district',
        'district', 'division'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function assessments()
    {
        return $this->hasMany(ParticipantAssessment::class);
    }
    public function quizzes()
    {
        return $this->hasMany(QuizAssessment::class);
    }

    public function performedCurrentQuiz()
    {
        return !!$this->hasOne(QuizAssessment::class)
            ->whereHas('quiz', function ($quiz) {
                $quiz->where('is_default', 1);
            })->first();
    }
    public function currentAssessment()
    {
        return $this->hasOne(QuizAssessment::class)
            ->whereHas('quiz', function ($quiz) {
                $quiz->where('is_default', 1);
            })->first();
    }

    public function makeUsername()
    {

    }
}
