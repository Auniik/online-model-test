<?php

namespace App\Http\Controllers;

use App\Event;
use App\Player;
use App\Work;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addPlayer()
    {
        $events = Event::all();
        $players = Player::query()->latest()->get();
        return view('admin.player.add-player', [
            'players' => $players,
            'events'  => $events,
        ]);
    }

    public function addPlayerPost(Request $request)
    {
        $exists = Player::where('name', $request->name)
            ->where('password', $request->password)
            ->where('player_type', $request->player_type)
            ->first();

        if (!$exists) {
            $player = new Player();
            $player->event_id = $request->event_id;
            $player->name = $request->name;
            $player->password = $request->password;
            $player->player_type = $request->player_type;
            $player->save();
        } else {

        }
        return redirect()->back();
    }

    public function submittedWork(Request $request)
    {
        return view('admin.work.index')->with([
            'works' => Work::query()->latest()->paginate(25)
        ]);
    }
}
