<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use App\Services\MetaGenerator;
use App\Services\Participant\ParticipantAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ParticipantLoginController extends Controller
{
    /**
     * @var ParticipantAuthService
     */
    private $service;

    /**
     * ParticipantLoginController constructor.
     * @param ParticipantAuthService $service
     */
    public function __construct(ParticipantAuthService $service)
    {
        $this->service = $service;
    }

    public function login()
    {
        if (!auth('participant')->check()) {
            return view('front.participant.login');
        }
        return redirect('/participants/profile');
    }

    public function attempt(Request $request)
    {
        $attributes = $this->service->validate($request);

        $participant = Participant::query()->where($attributes)->first();


        $password = $request->get('password');
        $checked = Hash::check($password, $participant->password);

        if (!$checked) {
            return back()->withInput()->withError('Seems like password you entered is wrong.');
        }
        auth('participant')->loginUsingId($participant->id);

        if ($request->filled('next')) {
            return redirect("/$request->next");
        }

        return redirect()->route('participants.profile');

    }

    public function logout()
    {
         auth('participant')->logout();
         return redirect('/');
    }
}
