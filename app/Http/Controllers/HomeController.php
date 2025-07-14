<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use App\Models\TimeLog;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

     
        $log = TimeLog::where('user_id', $user->id)
                      ->whereDate('created_at', now()->toDateString())
                      ->first();

        $status = 'not_timed_in';
        if ($log && $log->time_in && !$log->time_out) {
            $status = 'timed_in';
        } elseif ($log && $log->time_in && $log->time_out) {
            $status = 'timed_out';
        }

        return view('home', compact('status'));
    }

    public function timeIn()
    {
        $user = Auth::user();

        $existing = TimeLog::where('user_id', $user->id)
                           ->whereDate('created_at', now()->toDateString())
                           ->first();

        if (!$existing) {
            TimeLog::create([
                'user_id' => $user->id,
                'time_in' => now(),
            ]);
        }

        return redirect()->route('home')->with('message', 'Time In recorded.');
    }

    public function timeOut()
    {
        $user = Auth::user();

        $log = TimeLog::where('user_id', $user->id)
                      ->whereDate('created_at', now()->toDateString())
                      ->first();

        if ($log && !$log->time_out) {
            $log->update(['time_out' => now()]);
        }

        return redirect()->route('home')->with('message', 'Time Out recorded.');
    }
}

