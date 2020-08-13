<?php

namespace App\Http\Controllers;

use App\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ContractController extends Controller
{
    public function edit()
    {
        return view('admin.contact.edit-contact', [
            'contract' => Contract::query()->first(),
        ]);
    }

    public function update(Request $request, Contract $contact)
    {
        $request->validate([
            'image' => 'image|max:2048',
            'title' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);
        if ($request->has('image')) {
            $imageUrl = $request->image->store('uploads/contact');
            Storage::delete($contact->image);
        } else {
            $imageUrl = $contact->image;
        }

        $contact->title = $request->title;
        $contact->description = $request->description;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->image = $imageUrl;
        $contact->save();
        return back()->withSuccess('Contact updated successfully!');
    }
}
