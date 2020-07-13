<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Event;
use App\Question;
use App\QuizResult;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $question = Question::query()
            ->where('event_id', Event::where('status', 1)->latest()->first()->id)
            ->first();
//        return $question;
        $data = [$question->write_answer, $question->wrong_answer_one, $question->wrong_answer_two, $question->wrong_answer_three];
        //echo '<pre>';
        ////print_r($data);
        //$rand_key = shuffle($data);
        //print_r($rand_key);
        // echo '</pre>';
        //exit();

        return view('front.quiz.new-quiz', [
            'question' => $question,

        ]);
    }

    public function startQuiz()
    {
        $active_event = Event::where('status', 1)->first();

        session(['quiz_time'=>$active_event->quiz_time]);
        session(['quiz_question' => '']);
        session(['start_quiz' => true]);
        return view('front.quiz.start',[
            'active_event' => $active_event,
        ]);
    }

    public function nextQuestion(Request $request)
    {
        $active_event = Event::where('status', 1)->first();
        session(['event_id' => $active_event->id]);
        if (!(session('quiz_question'))) {
            session(['quiz_question' => []]);
        }
        if (session('start_quiz') == false) {
            return response()->json('COMPLETE', 200);
        }
        if (count(session('quiz_question')) >= $active_event->no_of_questions) {
            $correct_answers = Answer::where('event_id', session('event_id'))
                ->where('player_id', session('player_id'))
                ->where('is_correct', 1)
                ->count();
            $total_time = Answer::where('event_id', session('event_id'))
                ->where('player_id', session('player_id'))
                ->sum('time_taken');
            $result = new QuizResult();
            $result->player_id = session('player_id');
            $result->event_id = session('event_id');
            $result->total_question = $active_event->no_of_questions;
            $result->correct = $correct_answers;
            $result->total_time = $total_time;
            $result->incorrect = $result->total_question - $correct_answers;
            $result->points = $correct_answers * 10;
            $result->save();
            if ($request->ajax()) {
                return response()->json('COMPLETE', 200);
            }
            return redirect()->route('quiz.complete')->with([
                'success' => 'Thank you for your participation. Soon we will let you know the result'
            ]);
        }
        $question = Question::where('event_id', $active_event->id)->whereNotIn('id', session('quiz_question'))->first();
        $ids = session('quiz_question');
        $ids[] = $question->id;
        session(['quiz_question' => $ids]);
        $answers = [
            $question->write_answer,
            $question->wrong_answer_one,
            $question->wrong_answer_two,
            $question->wrong_answer_three,
        ];
        shuffle($answers);
        $ans = array_search($question->write_answer, $answers);
        session(['answer' => ($ans + 1)]);
        session(['start_time' => time()]);
        return view('front.quiz.new-question')->with([
            'question' => $question,
            'a'        => $answers
        ]);
    }

    public function complete(Request $request)
    {
        session()->forget(['payer_id', 'quiz_question', 'start_quiz', 'event_id']);
        return view('front.quiz.complete')->with([
            'success' => 'Thank you for your participation. Soon we will let you know the result'
        ]);
    }

    public function submitAnswer(Request $request)
    {
        $answer = new Answer();
        $answer->event_id = session('event_id');
        $answer->player_id = session('player_id');
        $answer->question_id = $request->question_id;
        $answer->answer = $request->answer_id;
        $answer->time_taken = (time() - session('start_time')) / 60;
        $answer->is_correct = session('answer') == $request->answer_id ? 1 : 0;
        $answer->save();

        return response()->json('SUCCESS', 200);
    }

    public function getNewQuestion($data1, $data2, $data3, $data4)
    {
        $answer = new Answer();
        $answer->event_id = $data1;
        $answer->player_id = $data2;
        $answer->question_id = $data3;
        $answer->answer = $data4;
        $answer->save();

        $question = [
            'id'       => 1,
            'question' => 'বঙ্গবন্ধু কত সালে এবং কিভাবে আনুষ্ঠানিকভাবে রাজনীতিতে অভিষিক্ত হন ?',
            'one'      => '১৯৪২ সালে; গোপালগঞ্জ মিশনারি স্কুল ছাত্রলীগে যোগদানের মাধ্যমে।',
            'two'      => '১৯৪২ সালে; গোপালগঞ্জ মিশনারি স্কুল ছাত্রলীগে যোগদানের মাধ্যমে।',
            'three'    => '১৯৪২ সালে; গোপালগঞ্জ মিশনারি স্কুল ছাত্রলীগে যোগদানের মাধ্যমে।',
            'four'     => '১৯৪২ সালে; গোপালগঞ্জ মিশনারি স্কুল ছাত্রলীগে যোগদানের মাধ্যমে।',
        ];
        return json_encode($question);
    }
}
