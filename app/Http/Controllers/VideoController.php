<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    public function index()
    {
        return view('admin.video.index', [
            'videos' => Video::query()->paginate(15)
        ]);
    }


    public function create()
    {
        return view('admin.video.create');
    }


    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'link' => ['required', 'regex:/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&"\'>]+)/'],
        ]);

        preg_match(
            "/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/",
            $attributes['link'],
            $matches
        );
        if ($matches) {
            $attributes['link'] = $matches[1];
            Video::query()->create($attributes);
            return back()->withMessage('ভিডিও যোগ করা হয়েছে');
        }
        return back()->withError(' ভিডিও লিংক ভ্যালিড নয় !');
    }


    public function edit(Video $video)
    {
        return view('admin.video.edit', [
            'video' => $video
        ]);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Video $video)
    {
        $video->delete();
        return response([
            'check' => true
        ]);
    }
}
