<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;

class SmashUsersController extends Controller
{
    public function index()
    {
        User::query()->truncate();
    }
}
