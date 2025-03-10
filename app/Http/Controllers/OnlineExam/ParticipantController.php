<?php


namespace App\Http\Controllers\OnlineExam;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParticipantController extends Controller
{
    public function index()
    {
        return view('admin.online-exam.participants.index',[
            'participants' => Participant::query()
                ->latest()
                ->withCount('assessments', 'quizzes')
                ->paginate(50)
        ]);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name.*' => 'required',
            'email.*' => 'required_without:mobile_number|email|unique:participants,email|distinct|nullable',
            'mobile_number.*' => ['required_without:email', 'unique:participants,mobile_number', 'nullable',
                'regex:/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/'],
            'password.*' => 'nullable|min:8'
        ]);
        foreach ($attributes['name'] as $key => $name) {
            Participant::query()
                ->create([
                    'name' => $name,
                    'email' => $request->email[$key],
                    'mobile_number' => $request->mobile_number[$key],
                    'password' => bcrypt($request->password[$key])
                ]);
        }

        return back_with_success('participant');
    }

    public function destroy(Participant $participant)
    {
        foreach ($participant->assessments ?? [] as $assessment) {
            foreach ($assessment->answers ?? [] as $answer) {
                foreach ($answer->attachments ?? [] as $attachment) {
                    Storage::delete($attachment->path);
                }
                $answer->attachments()->delete();
                $answer->delete();
            }
        }
        $participant->assessments()->delete();

        foreach ($participant->quizzes as $assessment) {
            $assessment->answers()->delete();
        }

        foreach ($participant->submittedWorks as $work) {
            foreach ($work->file as $file) {
                Storage::delete($file);
            }
        }
        $participant->submittedWorks()->delete();

        $participant->quizzes()->delete();
        $participant->delete();
        return response([
            'check' => true
        ]);
    }
}
