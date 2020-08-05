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
            'submitted_works' => Work::query()->latest()->where('participant_id', $participant->id)
                ->paginate(2, ['*'], 'works'),
            'quizzes' => $participant->quizzes()->latest()
                ->paginate(2, ['*'], 'quizzes'),
            'exams' => $participant->assessments()->latest()
                ->paginate(2, ['*'], 'exams')
        ]);
    }
}
