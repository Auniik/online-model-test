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


    public function submittedWork(Request $request)
    {
        return view('admin.work.index')->with([
            'works' => Work::query()->latest()->paginate(25)
        ]);
    }
}
