<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use App\Models\Quiz\Quiz;
use App\Services\Participant\ParticipantAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class QuizRegisterController extends Controller
{
    /**
     * @var ParticipantAuthService
     */
    private $service;

    /**
     * QuizRegisterController constructor.
     * @param ParticipantAuthService $service
     */
    public function __construct(ParticipantAuthService $service)
    {
        $this->service = $service;
    }


    public function store(Request $request)
    {
        $participant = $this->getParticipant($request);

        if (!$participant) {
            return back()->withWarning('You are not yet assigned to current quiz.');
        }

        auth('participant')->login($participant);

        $defaultQuiz = $this->getCurrentQuiz();

        $isAttended = $participant->quizzes
            ->where('quiz_id', $defaultQuiz->id)
            ->where('is_attended', 1);

        if ($isAttended->isNotEmpty()) {
            return back()->withWarning('You already played this quiz');
        }

        session([
            'participant_id' => $participant->id,
            'quiz' => $defaultQuiz,
            'type' => $request->player_type ?? 'general'
        ]);
        return redirect()->route('quiz-assessment.create');
    }


    public function getParticipant($request)
    {
        if (auth('participant')->check()) {
            return auth('participant')->user();
        }
        if ($request->player_type == 'general') {
            return $this->getGeneralParticipant($request);
        }
        if ($request->player_type == 'vip') {
            return $this->getVIPParticipant($request);
        }
        return false;
    }

    public function getCurrentQuiz()
    {
        $defaultQuiz = Quiz::query()->where('is_default', 1)->first();
        if (!$defaultQuiz) {
            return Quiz::query()->latest()->first();
        }
        return $defaultQuiz;
    }

    private function getVIPParticipant(Request $request)
    {
        $attributes = $this->service->validate($request);

        $participant = Participant::query()->where($attributes)->first();

        if (!$participant) {
            return false;
        }

        $password = $request->password;
        $checked = Hash::check($password, $participant->password);

        if (!$checked) {
            return false;
        }
        return $participant;

    }

    private function getGeneralParticipant(Request $request)
    {
        $request->validate([
            'phone' => 'required_without:email',
            'email' => 'required_without:phone'
        ]);
        $participant = Participant::query()
            ->where('mobile_number', $request->get('phone'));

        if ($request->filled('email')) {
            $participant->orWhere('email', $request->get('email'));
        }
        $participant = $participant->first();

        if (!$participant) {
            return Participant::query()
                ->create([
                    'name' => $request->name,
                    'mobile_number' => $request->phone,
                    'email' => $request->email,
                    'password' => bcrypt(12345678)
                ]);
        }

        return $participant;


    }


}
