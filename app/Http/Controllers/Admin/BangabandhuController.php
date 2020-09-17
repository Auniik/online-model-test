<?php

namespace App\Http\Controllers\Admin;

use App\Bangabandhu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BangabandhuController extends Controller
{
    public function edit()
    {
        return view('admin.bangabandhu.edit', [
            'bangabandhu' => Bangabandhu::query()->first(),
        ]);
    }

    public function update(Request $request)
    {
        $model = Bangabandhu::query()->first();
        $attributes = $request->only('title', 'description');
        if ($request->hasFile('image')) {
            $attributes['image'] = $request->image->store('uploads/pages');
        }
        $model->update($attributes);
        return back()->withSuccess('বঙ্গবন্ধুর তথ্যাদি হালনাগাদ করা হয়েছে!');
    }
}
