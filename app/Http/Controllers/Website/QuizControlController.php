<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use App\Models\Quiz\QuizAssessment;
use Illuminate\Http\Request;

class QuizControlController extends Controller
{

    public function create(Request $request)
    {
        return view('front.quizzes.start', [
            'participant' => Participant::query()->find(session('participant_id')),
            'quiz' => session('quiz'),
            'type' => session('type') ?? 'general',
        ]);
    }

    public function start(Request $request)
    {
        $request->validate([
            'participant.email' =>
                'required_without:participant.mobile_number|nullable|email|unique:participants,email,'.
                $request->participant_id,
            'participant.mobile_number' =>
                'required_without:participant.email|nullable|unique:participants,mobile_number,' . $request->participant_id
        ]);

        $participant = Participant::query()->find($request->participant_id);
        $participant->fill($request->get('participant'))
            ->save();

        $assessment = QuizAssessment::query()->with('quiz')
            ->firstOrCreate($request->only('quiz_id', 'participant_id', 'participant_type'))
            ->load('quiz');

        if($assessment->end_at) {
            return redirect()->route('complete-quiz.render', $assessment);
        };

        $assessment->update([
            'is_attended' => 1,
            'score' => 0,
            'start_at' => now(),
        ]);

        return view('front.quizzes.question', [
            'duration' => $assessment->quiz->duration,
            'participant_type' => $assessment->participant_type,
            'assessment_id' => $assessment->id,
        ]);
    }

}
