<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use App\Models\Quiz\Quiz;
use App\Models\Quiz\QuizAssessment;
use App\Services\Participant\ParticipantAuthService;
use Illuminate\Http\RedirectResponse;
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
        $quiz = $this->getCurrentQuiz();
        if (!$quiz) {
            return back()->withWarning('বর্তমানে কোন কুইজ চললমান নেই');
        }

        $participant = $this->getParticipant($request, $quiz);

        if ($participant instanceof RedirectResponse) {
            return $participant;
        }

        $assessment = $participant->quizzes()
            ->where('quiz_id', $quiz->id)
            ->first();

        if ($assessment && $assessment->is_attended) {
            return back()->withWarning('আপনি কুইজটি ইতিমধ্যে একবার খেলেছেন ।');
        }

        auth('participant')->login($participant);

        $type = 'general';
        if ($request->has('player_type')) {
            $type = $request->player_type;
        }
        if ($assessment) {
            $type = $assessment->participant_type;
        }

        session([
            'participant_id' => $participant->id,
            'quiz' => $quiz,
            'type' => $type
        ]);
        return redirect()->route('quiz-assessment.create');
    }


    public function getParticipant($request, $quiz)
    {
        if (auth('participant')->check()) {
            return auth('participant')->user();
        }
        if ($request->player_type == 'general') {
            return $this->getGeneralParticipant($request);
        }
        if ($request->player_type == 'vip') {
            return $this->getVIPParticipant($request, $quiz);
        }
        return back()->withWarning('দুঃখিত, চলমান কুইজে এখনও আপনাকে অতিথী হিসেবে যুক্ত করা হয়নি!');
    }

    public function getCurrentQuiz()
    {
        return Quiz::query()->where('is_default', 1)->first();
    }

    private function getVIPParticipant(Request $request, $quiz)
    {
        $attributes = $this->service->validate($request);

        $participant = Participant::query()->where($attributes)->first();

        if (!$participant) {
            return back()->withWarning('পরীক্ষার্থী খুজে পাওয়া যায়নি !');
        }

        $assessment = QuizAssessment::query()
            ->where('participant_id', $participant->id)
            ->where('participant_type', 'vip')
            ->where('quiz_id', $quiz->id)
            ->first();

        if (!$assessment) {
            return back()->withWarning('আপনাকে  এখনও  বর্তমান কুইজে  যুক্ত করা হয়নি !');
        }

        $password = $request->password;
        $checked = Hash::check($password, $participant->password);

        if (!$checked) {
            return back()->withWarning('আপনি ভুল পাসওয়ার্ড দিয়েছেন!');
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
            return Participant::query()->create([
                'name' => $request->name,
                'mobile_number' => $request->phone,
                'email' => $request->email,
                'password' => null
            ]);
        }

        return $participant;


    }


}
