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
            return redirect("/participants/login?to=exams/$exam->id/start");
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

            return redirect('/master');
        }

        return view('front.online-exam.form', [
            'assessment' => $assessment->load('exam', 'participant')
        ]);
    }

    public function store(Request $request, ParticipantAssessment $assessment)
    {
        $assessment->participant()->update(
            $request->only('name', 'school_name', 'class', 'roll', 'sub_district', 'district')
        );

        $assessment->update([
            'start_at' => now(),
        ]);

        $settingSession = [
            "participant-".auth('participant')->id() => [
                'questions' => $assessment->exam
                    ->questions()
                    ->with('CQs', 'MCQs')->get(),
                'assessment' => $assessment->load('exam')
            ]
        ];
        session($settingSession);

        return redirect('/exam-hall');
    }
}
