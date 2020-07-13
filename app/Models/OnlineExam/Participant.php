<?php


namespace App\Models\OnlineExam;


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
                    'password' => bcrypt(12345678),
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

    public function makeUsername()
    {

    }
}
