<?php

namespace App\Rules;

use App\Models\OnlineExam\Participant;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class OldPasswordRule implements Rule
{
    /**
     * @var Participant
     */
    private $participant;


    public function __construct(Participant $participant)
    {
        $this->participant = $participant;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $password = $this->participant->password;
//        dd(Hash::check($value, $password));
        return Hash::check($value, $password)   ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'ভুল পুরাতন পাসওয়ার্ড  দেয়া হয়েছে !';
    }
}
