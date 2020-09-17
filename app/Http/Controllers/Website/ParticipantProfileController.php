<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use App\Rules\OldPasswordRule;
use App\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ParticipantProfileController extends Controller
{
    public function show(Participant $participant = null)
    {
        if (!$participant) {
            $participant = auth('participant')->user();
        }
        if (!$participant) {
            return redirect('/participants/login');
        }
        if ($participant->id == auth('participant')->id()) {
            if (!$participant->password && auth('participant')->user()) {
                return view('front.participant.edit', [
                    'participant' => $participant
                ]);
            }
        }


        return view('front.participant.profile', [
            'participant' => $participant,
            'submitted_works' => Work::query()->latest()->where('participant_id', $participant->id)
                ->paginate(2, ['*'], 'works'),
            'quizzes' => $participant->quizzes()->latest()
                ->paginate(2, ['*'], 'quizzes'),
            'exams' => $participant->assessments()->latest()
                ->paginate(2, ['*'], 'exams')
        ]);
    }

    public function edit()
    {
        $participant = auth('participant')->user();
        if (!$participant) {
            return redirect('/participants/login');
        }

        return view('front.participant.edit', [
            'participant' => $participant
        ]);
    }

    public function update(Request $request, Participant $participant)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'school_name' => 'required_with:occupation',
            'class' => 'required_with:occupation|numeric',
            'roll' => 'required_with:occupation|numeric',
            'sub_district' => 'required',
            'district' => 'required',
            'email' => 'email|required_without:mobile_number|nullable|unique:participants,email,'.$participant->id,
            'mobile_number' => [
                'required_without:email',
                'nullable',
                'unique:participants,mobile_number,'.$participant->id,
                'regex:/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/'
            ],
            'division' => 'required',
            'thumbnail' => 'image|max:2048',
            'occupation' => 'required|in:student,job_holder'
        ]);
        if ($request->hasFile('thumbnail')) {
            Storage::delete($participant->thumbnail);
            $attributes['thumbnail'] = $request->thumbnail->store('uploads/profile_pictures');
        }
        $participant->update($attributes);
        return back()->withSuccess(' প্রোফাইল  হালনাগাদ করা হয়েছে !');
    }

    public function passwordChange(Request $request, Participant $participant)
    {
        $rules = [
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ];
        if ( $request->has('old_password')) {
            $rules['old_password'] = ['required', 'min:8', new OldPasswordRule($participant)];
        }
        $request->validate($rules);
        $participant->update([
            'password' => bcrypt($request->password)
        ]);
        return redirect('/participants/profile')->withSuccess('পাসওয়ার্ড সফলভাবে পরিবর্তন করা হয়েছে।');
    }
}
