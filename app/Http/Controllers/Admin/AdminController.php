<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Work;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function submittedWork(Request $request)
    {
        return view('admin.work.index')->with([
            'works' => Work::query()
                ->with('book')
                ->latest()
                ->paginate(25)
        ]);
    }
}
