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
            'participants' => Participant::query()->paginate(50)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Participant::query()
            ->create(\request()->all());
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
