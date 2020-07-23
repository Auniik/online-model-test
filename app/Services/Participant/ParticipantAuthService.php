<?php


namespace App\Services\Participant;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParticipantAuthService
{

    public function validate(Request $request)
    {
        $rules = [
            'password' => 'min:6|required',
        ];
        $attributes = [];

        if (!!strpos($request->id, '@')) {
            $attributes['email'] = $request->id;
            $rules['email'] = 'email|min:6|exists:participants,email|required';
            $message = ['email' => 'It seems problem with your Email Address.'];
        } else {
            $attributes['mobile_number'] = $request->id;
            $rules['mobile_number'] = 'exists:participants,mobile_number|min:11|required';
            $message = ['mobile_number' => 'It seems problem with your phone number.'];
        }
        Validator::make(
            array_merge(['password' => $request->password], $attributes),
            $rules,
            $message
        )->validate();
        return $attributes;
    }
}
