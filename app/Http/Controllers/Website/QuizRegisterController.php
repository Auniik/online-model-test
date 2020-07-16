<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizAssessment;
use Illuminate\Http\Request;

class QuizRegisterController extends Controller
{
    public function store(Request $request)
    {
        $participant = Participant::query()
            ->firstOrCreate([
                'name' => $request->name,
                'mobile_number'=> $request->phone
            ]);


        $defaultQuiz = $this->getCurrentQuiz();

        $isAttended = $participant->quizzes
            ->where('quiz_id', $defaultQuiz->id)
            ->where('is_attended', 1);

        if ($isAttended->isNotEmpty()) {
            return back()->withWarning('You already played this quiz');
        }

        return view('front.quizzes.start', [
            'participant' => $participant,
            'quiz' => $defaultQuiz,
            'type' => $request->player_type
        ]);

    }

    public function getCurrentQuiz()
    {
        $defaultQuiz = Quiz::query()->where('is_default', 1)->first();
        if (!$defaultQuiz) {
            return Quiz::query()->latest()->first();
        }
        return $defaultQuiz;
    }


}
