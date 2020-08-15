<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParticipantRegisterController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request)
    {
        if (!auth('participant')->check()) {
            return view('front.participant.register');
        }

        return redirect()->route('participants.profile');
    }


    public function register(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'min:3|required',
            'email' => 'email|unique:participants,email|required_without:mobile_number|nullable',
            'mobile_number' => ['unique:participants,mobile_number', 'required_without:email', 'nullable', 'regex:/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/'],
            'password' => 'min:8|required'
        ]);
        $attributes['password'] = bcrypt($request->password);
        DB::transaction(function () use ($attributes){
            $participant = Participant::query()->create($attributes);
            auth('participant')->loginUsingId($participant->id);
        });
        $check = auth('participant')->check();

        if (!$check) {
            return redirect('/');
        }
        if ($request->next) {
            return redirect("/" . $request->next);
        }
        return redirect()->route('participants.profile');
    }
}
