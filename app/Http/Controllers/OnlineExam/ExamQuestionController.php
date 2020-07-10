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
        return [
            'written' => $this->service->saveWritten($exam),
            'cq' => $this->service->saveCQ($exam),
            'mcq' => $this->service->saveMCQ($exam),
        ][request('type')];
    }

    public function show(ExamQuestion $question)
    {
        return [
            'written' => $this->service->renderWritten($question),
            'cq' => $this->service->renderCQ($question),
            'mcq' => $this->service->renderMCQ($question),
        ][$question->type];
    }

    public function update(ExamQuestion $question)
    {
        return [
            'written' => $this->service->updateWritten($question),
            'cq' => $this->service->updateCQ($question),
            'mcq' => $this->service->updateMCQ($question),
        ][$question->type];
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
