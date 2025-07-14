<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeController extends Controller
{
    public function showTimeIn()
    {
        return view('timein');
    }

    public function handleTimeIn(Request $request)
    {
        // You can save time-in data here
        // Example: Auth::user()->timeLogs()->create(['type' => 'in']);

        return redirect()->route('timeout.view')->with('success', 'Successfully timed in!');
    }

    public function showTimeOut()
    {
        return view('timeout');
    }

    public function handleTimeOut(Request $request)
    {
        // You can save time-out data here
        // Example: Auth::user()->timeLogs()->latest()->update(['timeout' => now()]);

        return redirect()->route('dashboard');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
