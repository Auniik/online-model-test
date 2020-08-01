<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use App\Work;

class ParticipantProfileController extends Controller
{
    public function show(Participant $participant = null)
    {
        if (!$participant) {
            $participant = auth('participant')->user();
        }
        if (!$participant) {
            return redirect('/participants/login');
        }

        return view('front.participant.profile', [
            'participant' => $participant,
            'submitted_works' => Work::query()->where('participant_id', $participant->id)->get()
        ]);
    }
}
