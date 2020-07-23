<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;

class ParticipantProfileController extends Controller
{
    public function show()
    {
        return view('front.participant.profile', [
            'participant' => auth('participant')->user()
        ]);
    }
}
