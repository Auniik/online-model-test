<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Support\Facades\Artisan;

class SmashUsersController extends Controller
{
    public function index()
    {
        User::query()->truncate();
    }
}
