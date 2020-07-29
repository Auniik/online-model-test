<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Work;

class ParticipantProfileController extends Controller
{
    public function show()
    {
        $participant = auth('participant')->user();
        return view('front.participant.profile', [
            'participant' => $participant,
            'submitted_works' => Work::query()->where('participant_id', $participant->id)->get()
        ]);
    }
}
