<?php


namespace App\Http\Controllers\Quiz;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class QuizParticipantController extends Controller
{
    public function index(Request $request)
    {
//        $assessments = QuizAssessment::with('participant', 'quiz')
//            ->withCount('answers');
//
//        if ($request->filled('quiz_id')) {
//            $assessments->where('exam_id', $request->exam_id);
//        }
//        if ($request->filled('participant_id')) {
//            $assessments->where('participant_id', $request->participant_id);
//        }
//
//        return view('admin.quiz.assessment.index', [
//            'assessments' => $assessments->paginate(50),
//            'quizzes' => Quiz::query()->latest()->pluck('name', 'id'),
//            'participants' => Participant::query()->latest()->pluck('name', 'id'),
//        ]);
    }


    public function create(Request $request, Quiz $quiz)
    {
        $assignedParticipants = $quiz->assignedParticipants;

        if ($request->filled('participant_type')) {
            $assignedParticipants = $assignedParticipants
                ->where('participant_type', $request->get('participant_type'));
        }

        $assigned = $quiz->assignedParticipants->pluck('participant_id');
        return view('admin.quiz.participant.index', [
            'quiz' => $quiz,
            'assignedParticipants' => $assignedParticipants,
            'participants' => Participant::query()
                ->whereNotIn('id', $assigned)
                ->pluck('name', 'id')
        ]);
    }

    public function store(Request $request, Quiz $quiz)
    {
        DB::transaction(function ()use ($request, $quiz) {
            foreach ($request->get('ids', []) as $id) {
                QuizAssessment::query()
                    ->create([
                        'quiz_id' => $quiz->id,
                        'participant_id' => $id,
                        'participant_type' => $request->participant_type
                    ]);
            }
            $request->validate([
                'email.*' =>
                    'required_without:mobile_number|nullable|distinct|email|unique:participants,email',
                'mobile_number.*' =>
                    'required_without:email|nullable|distinct|unique:participants,mobile_number'
            ]);

            foreach ($request->get('name', []) as $key => $name) {
                $password = '12345678';

                if (optional($request->password)[$key]) {
                    $password = $request->password[$key];
                }
                $participant = Participant::query()->create([
                    'name' => $name,
                    'email' => $request->email[$key],
                    'mobile_number' => $request->mobile_number[$key],
                    'password' => bcrypt($password)
                ]);

                $assess =  QuizAssessment::query()
                    ->create([
                        'quiz_id' => $quiz->id,
                        'participant_id' => $participant->id,
                        'participant_type' => $request->participant_type
                    ]);
            }
        });

        return back_with_success('participant');
    }

    public function destroy(QuizAssessment $id)
    {
        $id->delete();
        return response([
            'check' => true
        ]);
    }


}
