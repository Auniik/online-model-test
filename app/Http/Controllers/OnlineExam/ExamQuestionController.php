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
        switch (request('type')) {
            case 'written': {
                return $this->service->saveWritten($exam);
                break;
            }
            case 'cq': {
                return $this->service->saveCQ($exam);
                break;
            }
            case 'mcq': {
                return $this->service->saveMCQ($exam);
                break;
            }
        }
        return;
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
