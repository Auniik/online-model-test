<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\ExamQuestion;
use App\Models\OnlineExam\ParticipantAssessment;
use App\Models\OnlineExam\ParticipantAssessmentAnswer as Answer;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class ExamAnswerController extends Controller
{
    public function store(Request $request, ParticipantAssessment $assessment, ExamQuestion $question)
    {
        $request->validate([
            'attachments.*' => 'file|max:5000|mimes:jpeg,bmp,png,jpg,gif,zip,pdf|required_without:answer',
            'answer' => 'required_without:attachments'
        ]);
        $attributes = [
            'participant_assessment_id' => $assessment->id,
            'exam_question_id' => $question->id
        ];
        $flag = DB::transaction(function () use($attributes, $request) {
            $answer = Answer::query()->where($attributes)->first();

            if ($answer) {
                if ($request->has('answer')) {
                    $answer->update(['answer' => $request->answer]);
                }

            } else {
                /** @var Answer $answer */
                $answer = Answer::query()->create(array_merge(
                    $attributes, ['answer' => $request->get('answer', '')]
                ));
            }
            return $this->resolveFiles($answer);
        });
        if ($flag) {
            return back();
        }

        return response([
            'status' => true,
            'message' => 'উত্তর জমা দেয়া হয়েছে ।'
        ]);
    }

    private function resolveFiles(Answer $answer)
    {
        if (\request()->hasFile('attachments')) {

            $fileName = "Answer-File-of-Question-No-" . \request('serial');

            if ($files = \request()->attachments) {
                foreach ($files as $k => $file) {

                    ++$k;
                    $name =  "$fileName-$k." . $file->guessClientExtension();

                    /** @var UploadedFile $file */
                    $path = $file->storeAs("uploads/answers/{$answer->participant_assessment_id}", $name);
                    $answer->attachments()->create([
                        'path' => $path
                    ]);
                }
            }
            return true;
        }
        return false;
    }

}
