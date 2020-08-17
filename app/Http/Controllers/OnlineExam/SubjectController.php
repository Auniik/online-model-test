<?php

namespace App\Http\Controllers\OnlineExam;

use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::query()->withCount('exams')->get();
        return view('admin.online-exam.subject.index', ['subjects' => $subjects]);
    }

    public function store(Request $request)
    {
        Subject::create($request->only('name', 'code', 'class', 'status'));
        return back_with_success('বিষয়');
    }

    public function show($id)
    {
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Subject $subject
     * @return void
     */
    public function update(Request $request, Subject $subject)
    {
        $subject->update($request->all());
        return updated_response('বিষয়');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return response([
            'check' => true
        ]);
    }
}
