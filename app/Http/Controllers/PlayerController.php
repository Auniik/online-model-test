<?php

namespace App\Http\Controllers;

use App\Event;
use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    public function newPlayer(Request $request)
    {
        $event_id = Event::where('status',1)->latest()->first()->id;
        if($request->player_type=='general'){
            $player_exists = Player::where('event_id', $event_id)
                ->where('player_type','general')
                ->where('phone', $request->phone)
                ->first();

            if (!empty($player_exists)) {
                return redirect()->back()->with([
                    'warning' => 'You already played this quiz'
                ]);
            } else {
                $player = new Player();
                $player->event_id = $event_id;
                $player->name = $request->name;
                if($request->phone) {
                    $player->phone = $request->phone;
                }
                $player->player_type = $request->player_type;
                $player->save();
                session(['player_id' => $player->id]);
                session(['player_type' => $request->player_type]);

                return redirect()->route('start.quiz')
                    ->with([
                        'success' => 'Your registration successfully complete. Enjoy your quiz'
                    ]);
            }
        }else{
            //dd('1');
            $player_exists = Player::query()
                ->where('event_id', $event_id)
                ->where('player_type','vip')
                ->where('name',$request->name)
                ->where('password',$request->password)
                ->first();

            //dd($player_exists);


            if ($player_exists==null || empty($player_exists)) {
                return redirect()->back()->with([
                    'warn' => 'No User found'
                ]);
            } else {

                if($player_exists->status==0){
                    return redirect()->back()->with([
                        'warn' => 'You already played the quiz'
                    ]);
                }

                session(['player_id' => $player_exists->id]);

                Player::where('id',$player_exists->id)->update(['status'=>0]);

                return redirect()->route('start.quiz')
                    ->with([
                        'success' => 'Your registration successfully complete. Enjoy your quiz'
                    ]);
            }
        }

    }
}
