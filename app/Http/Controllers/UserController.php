<?php

namespace App\Http\Controllers;


use App\User;
use App\Work;
use Image;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile()
    {
        return view('front.user.profile')->with([
            'works' => Work::where('email',auth()->user()->email)->get()
        ]);
    }

    public function profileEdit()
    {
        return view('front.user.profile_edit');
    }

    public function profileUpdate(Request $request)
    {
        $user = User::find(auth()->user()->id);
        
        
        if ( $userImage  = $request->file('image'))
        {
            if (file_exists($user->image))
            {
                unlink($user->image);
            }
            $directory      = "user-image/";
            $imageName      = $userImage->getClientOriginalName();
            $imageUrl       = $directory.$imageName;
            Image::make($userImage)->resize(200, 200)->save($imageUrl);
        }
        else {
            $imageUrl = $user->image;
        }
        
        
        $user->name = $request->name;
        $user->image = $imageUrl;
        $user->email = $request->email;
        $user->location = $request->location;
        $user->occupation = $request->occupation;
        $user->birthday = $request->birthday;
        $user->contact = $request->contact;
        $user->save();
        return redirect()->route('user.profile');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'confirmed|required'
        ]);
        $user = User::find(auth()->user()->id);
        if(password_verify($request->current_password,$user->password)){
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('user.profile')->with([
                'success'=>'password updated successfully'
            ]);
        }
        return redirect()->back()->with([
            'error'=>'current password doesnot patch'
        ]);


    }
}