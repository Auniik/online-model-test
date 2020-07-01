<?php

namespace App\Http\Controllers;

use App\Event;
use App\QuizResult;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if (!empty($request->event_id) && $request->event_id!='all') {
            $result = QuizResult::where('event_id', $request->event_id)->get();
        } else {
            $result = QuizResult::get();
        }
        return view('admin.result.index')->with([
            'events' => Event::all(),
            'result' => $result
        ]);
    }

    public function getEventByResultId($resultID)
    {
        $results = QuizResult::where('event_id', $resultID)->get();
        return json_encode($results);
    }
}