<?php


namespace App\Http\Controllers\OnlineExam;


use App\Http\Controllers\Controller;
use App\Models\OnlineExam\Participant;
use Illuminate\Http\Request;

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
            'email.*' => 'required_without:mobile_number|email|unique:participants,email|distinct',
            'mobile_number.*' => ['required_without:email', 'unique:participants,mobile_number',
                'regex:/(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/'],
            'password.*' => 'nullable|min:6'
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
        $participant->delete();
        return response([
            'check' => true
        ]);
    }
}
