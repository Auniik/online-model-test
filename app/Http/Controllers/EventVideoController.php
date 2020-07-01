<?php

namespace App\Http\Controllers;

use App\EventVideo;
use Illuminate\Http\Request;

class EventVideoController extends Controller
{
    public function addEventViedo(){
        $eventvideos = EventVideo::all();
        return view('admin.eventvideo.add-event-video',[
            'eventvideos' => $eventvideos,
        ]);
    }
    public function newEventVideo(Request $request){

        $eventVideoImage = $request->file('image');
        $directory = "event-video/";
        $imageName = $eventVideoImage->getClientOriginalName();
        $eventVideoImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;

        $eventvideo = new EventVideo();
        $eventvideo->image = $imageUrl;
        $eventvideo->title = $request->title;
        $eventvideo->short_description = $request->short_description;
        $eventvideo->link = $request->link;
        $eventvideo->status = $request->status;
        $eventvideo->save();
        return redirect('add-event-video')->with('message','Slider Save Successfully');
    }
    public function editEventVideo($id){
        $eventvideo = EventVideo::find($id);
        return view('admin.eventvideo.edit-event-video',[
            'eventvideo' => $eventvideo,
        ]);
    }
    public function updateEventVideo(Request $request){
        $eventvideo = EventVideo::find($request->id);
        if ($eventVideoImage = $request->file('image'))
        {
            if (file_exists($eventVideoImage->image))
            {
                unlink($eventvideo->image);
            }
            $directory      = "event-message-image/";
            $imageName      = $eventVideoImage->getClientOriginalName();
            $imageUrl       = $directory.$imageName;
            Image::make($eventVideoImage)->resize(600, 600)->save($imageUrl);
        }
        else {
            $imageUrl = $eventvideo->image;
        }
        $eventvideo->image = $imageUrl;
        $eventvideo->title = $request->title;
        $eventvideo->short_description = $request->short_description;
        $eventvideo->link = $request->link;
        $eventvideo->status = $request->status;
        $eventvideo->save();
        return redirect('add-event-video')->with('message','Slider Save Successfully');
    }

}
