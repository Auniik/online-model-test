<?php

namespace App\Http\Controllers;

use App\Event;
use App\Question;
use Illuminate\Http\Request;
use Image;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addEvent()
    {
        $events = Event::all();
        return view('admin.event.add-event', [
            'events' => $events,
        ]);
    }

    public function newEvent(Request $request)
    {

        $eventImage = $request->file('image');
        $directory = "event-image/";
        $imageName = $eventImage->getClientOriginalName();
        $eventImage->move($directory, $imageName);
        $imageUrl = $directory . $imageName;

        $event = new Event();
        $event->title = $request->title;
        $event->date = $request->date;
        $event->no_of_questions = $request->no_of_questions;
        $event->image = $imageUrl;
        $event->description = $request->description;
        $event->quiz_time = $request->quiz_time;
        $event->status = $request->status;
        $event->save();
        return redirect('/add-event')->with('message', 'Data Save Successfully');
    }

    public function editEvent($id)
    {
        return view('admin.event.edit-event')->with([
            'event' => Event::find($id)
        ]);
    }

    public function updateEvent(Request $request, $id)
    {
        $event = Event::find($id);
        $event->title = $request->title;
        $event->date = $request->date;
        $event->no_of_questions = $request->no_of_questions;

        if ($request->file('image')) {
            $eventImage = $request->file('image');
            $directory = "event-image/";
            $imageName = $eventImage->getClientOriginalName();
            $eventImage->move($directory, $imageName);
            $imageUrl = $directory . $imageName;
            $event->image = $imageUrl;
        }
        $event->description = $request->description;
        $event->quiz_time = $request->quiz_time;
        $event->status = $request->status;
        $event->save();
        return redirect()->route('add-event')->with('message', 'Data Updated Successfully');
    }


    public function deleteEvent($id){
        $event =  Event::find($id);
        $event->delete();
        Question::where('event_id',$id)->delete();
        QuizResult::where('event_id',$id)->delete();
        return redirect()->route('add-event')->with('message', 'Data Successfully Delete');
    }
}
