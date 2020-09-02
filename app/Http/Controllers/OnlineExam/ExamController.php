<?php

namespace App\Http\Controllers\OnlineExam;

use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Exam;
use App\Models\OnlineExam\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ExamController extends Controller
{
    public function index(Request $request)
    {
        $exams = Exam::query()
            ->withCount('assignedParticipants', 'questions')
            ->with('subject')
            ->latest();

        if ($request->filled('exam_id')){
            $exams->where('id', $request->exam_id);
        }

        if ($request->filled('subject_id')){
            $exams->where('subject_id', $request->subject_id);
        }


        return view('admin.online-exam.exam.index', [
            'exams' => $exams->paginate(25),
            'selectableExams' => Exam::query()->latest()->pluck('name','id'),
            'subjects' => Subject::query()->pluck('name', 'id'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.online-exam.exam.create', [
            'subjects' => Subject::query()->get(['name', 'id', 'class'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'name' => 'required|min:3',
            'duration' => ['required', 'regex:/(?:[01]\d|2[0-3]):(?:[0-5]\d):(?:[0-5]\d)/'],
            'status' => 'required|in:active,inactive',
            'competency_score' => 'required|min:0|numeric',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after_or_equal:start_at'
        ]);
        $data = $request->only('description', 'in_homepage', 'class_id', 'is_published');

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('uploads/exams');
        }

        Exam::query()->create(array_merge($attributes, $data));
        return back_with_success(' অনলাইন পরীক্ষা');
    }

    public function show(Exam $exam)
    {
        return view('admin.online-exam.exam.show-modal', [
            'exam' => $exam
        ]);
    }


    /**
     * @param Exam $exam
     * @return Application|Factory|View
     */
    public function edit(Exam $exam)
    {
        return view('admin.online-exam.exam.edit', [
            'subjects' => Subject::query()->get(['name', 'id', 'class']),
            'exam' => $exam
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Exam $exam
     * @return Response
     */
    public function update(Request $request, Exam $exam)
    {
        $attributes = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'name' => 'required|min:3',
            'duration' => ['required', 'regex:/(?:[01]\d|2[0-3]):(?:[0-5]\d):(?:[0-5]\d)/'],
            'status' => 'required|in:active,inactive',
            'competency_score' => 'required|min:0|numeric',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after_or_equal:start_at'
        ]);

        $data = $request->only('description', 'in_homepage', 'class_id', 'is_published');

        if ($request->hasFile('image')) {
            Storage::delete($exam->image);
            $data['image'] = $request->image->store('uploads/exams');
        }

        if (!isset($data['is_published'])) {
            $data['is_published'] = 0;
        }

        $exam->update(array_merge($attributes, $data));

        return updated_response(' অনলাইন  পরীক্ষা');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Exam $exam
     * @return Response
     */
    public function destroy(Exam $exam)
    {
        Storage::delete($exam->image);
        foreach ($exam->questions as $question) {
            $question->CQs()->delete();
            $question->MCQs()->delete();
            Storage::delete($question->file);
        }
        $exam->questions()->delete();
        $exam->assignedParticipants()->delete();

        foreach ($exam->assessments ?? [] as $assessment) {
            foreach ($assessment->answers ?? [] as $answer) {
                foreach ($answer->attachments ?? [] as $attachment) {
                    Storage::delete($attachment->path);
                }
                $answer->attachments()->delete();
            }
            $assessment->answers()->delete();
        }
        $exam->delete();
        return \response([
            'check' => true
        ]);
    }
}
