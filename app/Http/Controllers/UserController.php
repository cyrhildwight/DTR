<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Display list of all users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show time logs of a specific user
    public function show(User $user)
    {
        $timeLogs = $user->timeLogs()->latest()->get();
        return view('users.show', compact('user', 'timeLogs'));
    }
}
