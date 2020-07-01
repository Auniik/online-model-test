<?php

namespace App\Http\Controllers;

use App\Event;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function addQuestion()
    {
        $questions = Question::all();
        return view('admin.question.add-question', [
            'events'    => Event::all(),
            'questions' => $questions,
        ]);
    }

    public function newQuestion(Request $request)
    {

        foreach ($request->question as $item) {
            $question = new Question();
            $question->event_id = $request->event_id;
            $question->title = $item['title'];
            $question->write_answer = $item['write_answer'];
            $question->wrong_answer_one = $item['wrong_answer_one'];
            $question->wrong_answer_two = $item['wrong_answer_two'];
            $question->wrong_answer_three = $item['wrong_answer_three'];
            $question->save();
        }
        return redirect('add-question')->with('message', 'Question Successfully Save');

    }

    public function getEventByQuestionId($questionID)
    {
        $questions = Question::where('event_id', $questionID)->get();
        return json_encode($questions);
    }

    public function edit($id)
    {
        $events = Event::all();
        return view('admin.question.edit')->with([
            'question' => Question::find($id),
            'events'   => $events,
        ]);
    }

    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        $question->title = $request->title;
        $question->write_answer = $request->write_answer;
        $question->wrong_answer_one = $request->wrong_answer_one;
        $question->wrong_answer_two = $request->wrong_answer_two;
        $question->wrong_answer_three = $request->wrong_answer_three;
        $question->save();
        return redirect('add-question')->with('message', 'Question Successfully Save');
    }

    public function deleteQuestion($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect('add-question')->with('message', 'Question Successfully Delete');

    }
}
