<?php

namespace App\Http\Controllers;

use App\EventMessage;
use Illuminate\Http\Request;
use Image;
use App\file;

class EventMessageController extends Controller
{
   public function addEventMessage(){
       $eventmessages = EventMessage::all();
       return view('admin.message.add-event-message',[
           'eventmessages' => $eventmessages,
       ]);
   }

   public function newEventMessage(Request $request){

       $eventMessageImage = $request->file('image');
       $directory       = "event-message-image/";
       $imageName       = $eventMessageImage->getClientOriginalName();
       $eventMessageImage->move($directory,$imageName);
       $imageUrl        = $directory.$imageName;

       $eventmessage = new EventMessage();
       $eventmessage->name          = $request->name;
       $eventmessage->designation   = $request->designation;
       $eventmessage->image         = $imageUrl;
       $eventmessage->message       = $request->message;
       $eventmessage->is_team_member  = isset($request->is_team_member) ? 1 : 0;
       $eventmessage->save();
       return redirect('add-event-message')->with('message','Data save successfully');
   }
   public function editEventMessage($id)
   {
       return view('admin.message.edit-event-message',[
           'eventmessage' => EventMessage::query()->find($id),
       ]);
   }
   public function updateEventMessage(Request $request){
       $eventmessage = EventMessage::query()->find($request->id);
       if ($eventMessageImage = $request->file('image'))
       {
           if (file_exists($eventmessage->image))
           {
               unlink($eventmessage->image);
           }
           $directory      = "event-message-image/";
           $imageName      = $eventMessageImage->getClientOriginalName();
           $imageUrl       = $directory.$imageName;
           Image::make($eventMessageImage)->resize(600, 600)->save($imageUrl);
       }
       else {
           $imageUrl = $eventmessage->image;
       }
       $eventmessage->name          = $request->name;
       $eventmessage->designation   = $request->designation;
       $eventmessage->image         = $imageUrl;
       $eventmessage->message       = $request->message;
       $eventmessage->is_team_member  = isset($request->is_team_member) ? 1 : 0;
       $eventmessage->save();
       return redirect('add-event-message')->with('message','Data Update successfully');
   }
   public function deleteEventMessage($id){
       $eventmessage = EventMessage::find($id);
       $eventmessage->delete();
       return redirect('add-event-message')->with('message','Data Delete successfully');
   }
}
