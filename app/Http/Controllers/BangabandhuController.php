<?php

namespace App\Http\Controllers;

use App\Bangabandhu;
use Illuminate\Http\Request;

class BangabandhuController extends Controller
{
    public function edit()
    {
        return view('admin.bangabandhu.edit-bangabandhu', [
            'bangabandhu' => Bangabandhu::query()->first(),
        ]);
    }

    public function update(Request $request)
    {
        $bangabandhu = Bangabandhu::query()->first();

        if ($request->hasFile('image')) {
            $imageUrl = $request->image->store('uploads/pages');
        } else {
            $imageUrl = $bangabandhu->image;
        }


        $bangabandhu->title = $request->title;
        $bangabandhu->description = $request->description;
        $bangabandhu->image = $imageUrl;
        $bangabandhu->save();
        return back()->withSuccess(' বঙ্গবন্ধুর  তথ্যাদি হালনাগাদ করা হয়েছে !');
    }
}
