<?php

namespace App\Http\Controllers\OnlineExam;

use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Exam;
use App\Models\OnlineExam\ExamQuestion;
use App\Services\OnlineExam\ExamQuestionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExamQuestionController extends Controller
{
    protected $service;
    public function __construct(ExamQuestionService $service)
    {
        $this->service = $service;
    }


    public function index(Request $request, Exam $exam)
    {
        return view('admin.online-exam.exam.questions.index', [
            'exam' => $exam->load('questions')
        ]);
    }

    public function store(Exam $exam)
    {
        $method =  [
            'written' => 'saveWritten',
            'cq' => 'saveCQ',
            'mcq' => 'saveMCQ'
        ][\request('type')];

        return $this->service->$method($exam);
    }

    public function show(ExamQuestion $question)
    {
        $method =  [
            'written' => 'renderWritten',
            'cq' => 'renderCQ',
            'mcq' => 'renderMCQ'
        ][$question->type];

        return $this->service->$method($question);
    }

    public function update(ExamQuestion $question)
    {
        $method =  [
            'written' => 'updateWritten',
            'cq' => 'updateCQ',
            'mcq' => 'updateMCQ'
        ][$question->type];

        return $this->service->$method($question);
    }


    public function destroy(ExamQuestion $question)
    {
        $question->CQs()->delete();
        $question->MCQs()->delete();
        Storage::delete($question->file);
        $question->delete();
        return response([
            'check' => true
        ]);
    }
}
