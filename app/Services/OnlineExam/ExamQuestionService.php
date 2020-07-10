<?php


namespace App\Services\OnlineExam;


use App\Models\OnlineExam\Exam;
use App\Models\OnlineExam\ExamQuestion;
use Illuminate\Support\Facades\Storage;

class ExamQuestionService
{
    /**
     * @var Exam
     */
    private $exam;
    private $question;

    public function __construct(Exam $exam)
    {
        $this->exam = $exam;
    }

    public function setModel(Exam $exam)
    {
        $this->exam = $exam;
        return $this;
    }

    public function createQuestion($keys)
    {
        $attributes = request()->only(...$keys);
        if (request()->hasFile('file')) {
            $attributes['file'] = request()->file->store('uploads/exams/questions');
        }
        return $this->exam->questions()->create($attributes);
    }

    public function saveWritten(Exam $exam)
    {
        $this->setModel($exam)
            ->createQuestion(['title', 'description', 'remarks', 'type']);
        return back_with_success('question');
    }

    public function saveCQ(Exam $exam)
    {
        $question = $this->setModel($exam)
            ->createQuestion(['title', 'description', 'type']);

        foreach (request('name') as $key => $title) {
            /** @var ExamQuestion $question */
            $question->CQs()->create([
                'title' => $title,
                'level' => request('level')[$key],
                'max_remarks' => request('max_remarks')[$key],
            ]);
        }
        return back_with_success('question');
    }

    public function saveMCQ(Exam $exam)
    {
        $question = $this->setModel($exam)
            ->createQuestion(['title', 'description', 'type', 'level', 'solution']);

        foreach (request('value') as $key => $value) {
            /** @var ExamQuestion $question */
            $question->MCQs()->create([
                'value' => $value,
                'is_correct' => request('is_correct') == $key,
            ]);
        }
        return back_with_success('question');
    }

    public function renderWritten(ExamQuestion $question)
    {
        return view('admin.online-exam.exam.questions.show.written', [
            'question' => $question
        ]);
    }

    public function renderCQ(ExamQuestion $question)
    {
        return view('admin.online-exam.exam.questions.show.cq-modal', [
            'question' => $question,
            'cqs' => $question->CQs
        ]);
    }

    public function renderMCQ(ExamQuestion $question)
    {
        return view('admin.online-exam.exam.questions.show.mcq-modal', [
            'question' => $question,
            'options' => $question->MCQs
        ]);
    }

    public function updateWritten(ExamQuestion $question)
    {
//        dd(request()->all());
        $this->question = $question;
        $this->updateQuestion(['title', 'description', 'remarks', 'type']);
        return updated_response('question');
    }

    public function updateQuestion($keys)
    {
        $attributes = request()->only(...$keys);
        if (request()->hasFile('file')) {
            Storage::delete($this->question->file);
            $attributes['file'] = request()->file->store('uploads/exams/questions');
        }
        $this->question->update($attributes);
    }

    public function updateCQ(ExamQuestion $question)
    {
        $this->question = $question;
        $this->updateQuestion(['title', 'description', 'type']);
        foreach ($question->CQs as $key => $cq) {
            $cq->update([
                'title' => request('name')[$key],
                'max_remarks' => request('max_remarks')[$key],
            ]);
        }
        return updated_response('question');
    }

    public function updateMCQ(ExamQuestion $question)
    {
        $this->question = $question;
        $this->updateQuestion(['title', 'description', 'type', 'level', 'solution']);
        foreach ($question->MCQs as $key => $MCQ) {
            $MCQ->update([
                'value' => request('value')[$key],
                'is_correct' => request('is_correct') == $key,
            ]);
        }
        return updated_response('question');
    }
}
