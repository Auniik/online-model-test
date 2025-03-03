<?php

namespace App\Http\Controllers\OnlineExam;

use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Exam;
use App\Models\OnlineExam\Participant;
use App\Models\OnlineExam\ParticipantAssessment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ParticipantAssessmentController extends Controller
{
    public function index(Request $request)
    {
        $assessments = ParticipantAssessment::with('participant', 'exam')
            ->latest()
            ->withCount('answers');


        if ($request->filled('exam_id')) {
            $assessments->where('exam_id', $request->exam_id);
        }
        if ($request->filled('participant_id')) {
            $assessments->where('participant_id', $request->participant_id);
        }
        if ($request->filled('participated')) {
            $clause = $request->get('participated') ? 'whereNotNull' : 'whereNull';
            $assessments->$clause('participant_assessments.start_at');
        }

        if ($request->filled('competent')) {
            $operator = $request->get('competent') ? '>=' : '<=';
            $assessments->join('exams', 'exams.id', '=', 'participant_assessments.exam_id')
                ->whereHas('answers',
                    fn(Builder $builder) => $builder->having(DB::raw('SUM(remarks)'), $operator, DB::raw('competency_score'))
                );
        }


        return view('admin.online-exam.exam.assessment.index', [
            'assessments' => $assessments->paginate(\request('per_page', 25)),
            'exams' => Exam::query()->latest()->pluck('name', 'id'),
            'participants' => Participant::query()->latest()->pluck('name', 'id'),
        ]);
    }


    public function create(Exam $exam)
    {
        $assigned = $exam->assignedParticipants->pluck('participant_id');
        return view('admin.online-exam.exam.participants.index', [
            'exam' => $exam->load('assignedParticipants.participant')->loadCount('questions'),
            'participants' => Participant::query()
                ->whereNotIn('id', $assigned)
                ->pluck('name', 'id')
        ]);
    }

    public function store(Request $request, Exam $exam)
    {
        foreach ($request->get('ids', []) as $id) {
            $exam->assignedParticipants()->create([ 'participant_id' => $id ]);
        }
        foreach ($request->get('participants', []) as $participant) {
            if (Str::length($participant) > 2){
                $participant = Participant::query()->create([
                    'name' => $participant
                ]);
                $exam->assignedParticipants()->create([ 'participant_id' => $participant->id ]);
            }
        }
        return back_with_success(' পরীক্ষার্থী');
    }

    public function destroy(ParticipantAssessment $id)
    {
        $id->delete();
        return response([
            'check' => true
        ]);
    }
}
