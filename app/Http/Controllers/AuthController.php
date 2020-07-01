<?php

namespace App\Http\Controllers;

use App\User;
use App\News;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        $news = News::orderBy('id','desc')->take(10)->get();
        return view('front.user.login',[
            'news'          => $news,
        ]);
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email'    => 'email|required',
            'password' => 'required'
        ]);

        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
            'role'     => 'user'
        ];
        if (auth()->attempt($credentials)) {
            if($request->redirect){
                return redirect($request->redirect);
            }
            return redirect()->route('user.profile');
        }
        return redirect()->back()->with([
            'danger' => 'Sorry, Wrong credentials'
        ]);
    }

    public function register()
    {
        return view('front.user.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'email'    => 'email|required',
            'name'     => 'required',
            'password' => 'required|confirmed'
        ]);

        $userExists = User::where('email', $request->email)->first();
        if ($userExists) {
            return redirect()->back()->with([
                'danger' => 'User Already exists.'
            ]);
        }

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'user';
            $user->save();

            return redirect()->route('user.login')->with([
                'success' => 'Registration Successfull. Please login with your credentials.'
            ]);
        } catch (\Exception $exception) {
            return redirect()->back()->with([
                'danger' => $exception->getMessage()
            ]);
        }


    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('user.login');
    }
}