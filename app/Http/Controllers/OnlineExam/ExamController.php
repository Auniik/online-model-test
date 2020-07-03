<?php

namespace App\Http\Controllers\OnlineExam;

use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Exam;
use App\Models\OnlineExam\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ExamController extends Controller
{
    public function index()
    {
        return view('admin.online-exam.exam.index', [
            'exams' => Exam::query()->latest()->get()
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
            'duration' => 'required',
            'status' => 'required|in:active,inactive'
        ]);
        $data = $request->only('description', 'start_at', 'in_homepage', 'class_id');

        if ($request->hasFile('image')) {
            $data['image'] = $request->image->store('uploads/exams');
        }

        Exam::query()->create(array_merge($attributes, $data));
        return back_with_success('Exam');
    }

    /**
     * Display the specified resource.
     *
     * @param Exam $exam
     * @return Response
     */
    public function show(Exam $exam)
    {
        //
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
            'duration' => 'required',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->only('description', 'start_at', 'in_homepage', 'class_id');

        if ($request->hasFile('image')) {
            Storage::delete($exam->image);
            $data['image'] = $request->image->store('uploads/exams');
        }

        $exam->update(array_merge($attributes, $data));

        return updated_response('Exam');
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
        $exam->delete();
        return \response([
            'check' => true
        ]);
    }
}
