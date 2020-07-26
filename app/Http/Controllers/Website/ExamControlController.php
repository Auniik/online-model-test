<?php


namespace App\Http\Controllers\Website;


use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\OnlineExam\ParticipantAssessment;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class ExamControlController extends Controller
{

    use Helpers;
    public function index(Request $request)
    {
        $key = "participant-" . auth('participant')->id();
        $session = session($key);


        if (blank($session)) {
            return redirect('/master');
        }

        if ($session['assessment']->participant_id != auth('participant')->id()) {

            return redirect('/master');
        }

        $questions = $session['questions'];

        $questions = $this->paginate($questions,
            3,
            $request->get('page', 1),
            $request->url()
        );
        return view('front.online-exam.playground', [
            'questions' => $questions,
            'assessment' => $session['assessment'],
        ]);
    }



    public function finish(Request $request)
    {
        $id = auth('participant')->id();
        $assessment = ParticipantAssessment::query()
            ->where('participant_id', $id)
            ->first();

        $assessment->update(['end_at', now()]);

        session()->forget([
            "participant-$id"
        ]);

        return redirect('/master');
    }
}
