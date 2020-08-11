<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Exam;
use App\Models\OnlineExam\ParticipantAssessment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamFormController extends Controller
{
    public function index(Request $request, Exam $exam)
    {
        if (!auth('participant')->check()) {
            return redirect("/participants/login?ref=exam&id={$exam->id}");
        }

        $attributes = [
            'exam_id' => $exam->id,
            'participant_id' => auth('participant')->id()
        ];
        $assessment = ParticipantAssessment::query()
            ->where($attributes)
            ->first();

        if (!$assessment) {
            $assessment = ParticipantAssessment::query()
                ->create($attributes);
        }


        if ($assessment->end_at) {
            return redirect('/');
        }

        if ($assessment->start_at) {
            /** @var ParticipantAssessment $assessment */
            $endAt = $assessment->possibleEndTime();

            if ($endAt->gt(now())) {
                return redirect()->route('exams.ground');
            }

            return redirect('/');
        }

        return view('front.online-exam.form', [
            'assessment' => $assessment->load('exam', 'participant')
        ]);
    }

    public function store(Request $request, ParticipantAssessment $assessment)
    {
        $request->validate([
            'school_name' => 'required',
            'class' => 'required|numeric',
            'roll' => 'required|numeric',
            'sub_district' => 'required',
            'district' => 'required',
        ]);
        $assessment->participant()->update(
            $request->only('name', 'school_name', 'class', 'roll', 'sub_district', 'district')
        );

        $assessment->update([
            'start_at' => now(),
        ]);

        $setAssessment = [
            "participant-".auth('participant')->id() => [
                'assessment_id' => $assessment->id,
            ]
        ];
        session($setAssessment);

        return redirect('/exam-hall');
    }
}
