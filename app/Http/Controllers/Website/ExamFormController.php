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

        $assessment = ParticipantAssessment::query()
            ->firstOrCreate(
                ['exam_id' => $exam->id],
                ['participant_id' => auth('participant')->id()]
            );

        return view('front.online-exam.form', [
            'assessment' => $assessment->load('exam', 'participant')
        ]);
    }

    public function store(Request $request, ParticipantAssessment $assessment)
    {
        $assessment->participant()->update(
            $request->only('name', 'school_name', 'roll', 'sub_district', 'district')
        );
        $assessment->exam()->update([
            'start_at' => now(),
        ]);


        session([
            'started_at' => now(),
            'duration' => $assessment->exam->duration,
            'questions' => $assessment->exam
                ->questions()
                ->with('CQs', 'MCQs')->get(),
            'assessment' => $assessment->load('exam')
        ]);
        return redirect('/exam-ground');
    }
}
