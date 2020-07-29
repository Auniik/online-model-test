<?php


namespace App\Http\Controllers\Website;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\OnlineExam\ExamQuestion;
use App\Models\OnlineExam\ParticipantAssessment;
use Illuminate\Http\Request;

class ExamControlController extends Controller
{

    use Helpers;
    public function index(Request $request)
    {
        $key = "participant-" . auth('participant')->id();
        $session = session($key);

        if (blank($session)) {
            return redirect('/')->withWarning('Session finished already');
        }

        $assessment = ParticipantAssessment::query()
            ->with('answers', 'exam')
            ->where('id', $session['assessment_id'])
            ->first();

        if ($assessment->participant_id != auth('participant')->id()) {
            return redirect('/')->withWarning('Something seems wrong');
        }

        $questions = ExamQuestion::with(['CQs', 'MCQs', 'answer' => function($query) use($assessment) {
                $query->where('participant_assessment_id', $assessment->id);
            }])
            ->where('exam_id', $assessment->exam_id)
            ->paginate(3);

        return view('front.online-exam.playground', [
            'questions' => $questions,
            'assessment' => $assessment,
        ]);
    }



    public function finish(Request $request)
    {
        $id = auth('participant')->id();

        ParticipantAssessment::query()
            ->where('id', $request->assessment_id)
            ->where('participant_id', $id)
            ->update(['end_at' => now()]);

        session()->forget([
            "participant-$id"
        ]);

        return redirect('/')->withSuccess('Exam Finished successfully.');
    }
}
