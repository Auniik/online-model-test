<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.comments.index', [
            'messages' => Message::query()->latest()->paginate(25)
        ]);
    }
}
