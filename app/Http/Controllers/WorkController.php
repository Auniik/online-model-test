<?php

namespace App\Http\Controllers;

use App\Work;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function addWork()
    {
        if (!auth('participant')->check()) {
            return redirect('/participants/login?next=submit-work');
        }
        return view('front.work.submit-work');
    }

    public function newWork(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $request->validate([
                'title' => 'required|min:3',
                'work_type' => 'required',
                'file.*' => 'required|max:20480|mimes:jpeg,bmp,png,mp4,jpg,gif,zip,pdf',
            ]);

            $fileUrl = [];
            foreach ($request->file('file', []) as $file) {
                $fileUrl[] = $file->store('/uploads/works');
            }

            $work = new Work();
            $work->title        = $request->title;
            $work->work_type    = $request->work_type;
            $work->description  = $request->description;
            $work->file         = json_encode($fileUrl);
            $work->link         = $request->link;
            $work->participant_id = auth('participant')->id();
            $work->save();


            return redirect()->back()->withSuccess(' সৃজনশীল কাজ সফলভাবে সাবমিট করা হয়েছে');
        });


    }
    public function deleteSubmitWork($id){
       $work  = Work::query()->find($id);

        $files = $work->file;


        $work->delete();

        foreach ($files as $file)
            if (Storage::exists($file)) {
                Storage::delete($file);
            }

        return redirect('/admin/submitted-work')->withSuccess(' সৃজনশীল কাজ মুছে ফেলা হয়েছে');
    }
}
