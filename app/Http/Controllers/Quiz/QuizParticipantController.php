<?php


namespace App\Http\Controllers\Quiz;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizAssessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizParticipantController extends Controller
{

    public function create(Request $request, Quiz $quiz)
    {
        $assessments = $quiz->assignedParticipants;

        if ($request->filled('participant_type')) {
            $assessments = $assessments
                ->where('participant_type', $request->get('participant_type'));
        }

        $assessments = $assessments
            ->sortByDesc(fn ($a) => $a->score)
            ->groupBy('score')
            ->map(fn($g) => $g->sortBy(fn ($a) => $a->consumedTimeScore ))
            ->flatten();


        $assigned = $quiz->assignedParticipants->pluck('participant_id');
        return view('admin.quiz.participant.index', [
            'quiz' => $quiz,
            'assignedParticipants' => $assessments,
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
                    ['required_without:email', 'unique:participants,mobile_number',
                        'regex:/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/']
            ]);

            foreach ($request->get('name', []) as $key => $name) {

                $participant = Participant::query()->create([
                    'name' => $name,
                    'email' => $request->email[$key],
                    'mobile_number' => $request->mobile_number[$key],
                    'password' => $request->password[$key] ? bcrypt($request->password[$key]) : null
                ]);

                $assess =  QuizAssessment::query()
                    ->create([
                        'quiz_id' => $quiz->id,
                        'participant_id' => $participant->id,
                        'participant_type' => $request->participant_type
                    ]);
            }
        });

        return back_with_success(' পরীক্ষার্থী');
    }

    public function destroy(QuizAssessment $id)
    {
        $id->delete();
        return response([
            'check' => true
        ]);
    }


}
