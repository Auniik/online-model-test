<?php

namespace App\Http\Controllers\Admin;

use App\Contract;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ContactController extends Controller
{
    public function edit()
    {
        return view('admin.contact.edit', [
            'contract' => Contract::query()->first(),
        ]);
    }

    public function update(Request $request, Contract $contact)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'description' => '',
            'image' => 'image|max:2048',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        if ($request->has('image')) {
            $attributes['image'] = $request->image->store('uploads/contact');
            Storage::delete($contact->image);
        }
        $contact->update($attributes);
        return back()->withSuccess('যোগাযোগ হালনাগাদ করা হয়েছে!');
    }
}
