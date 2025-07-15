<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\TimeLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

date_default_timezone_set('Asia/Manila');

class DateController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $dtrs = Date::where('user_id', $userId)->get();

        $todayLog = Date::where('user_id', $userId)
                        ->whereDate('time_in', now())
                        ->first();

        $timeIn = $todayLog?->time_in ? Carbon::parse($todayLog->time_in) : null;
        $timeOut = $todayLog?->time_out ? Carbon::parse($todayLog->time_out) : null;

        $status = 'not_timed_in';
        if ($timeIn && !$timeOut) {
            $status = 'timed_in';
        } elseif ($timeIn && $timeOut) {
            $status = 'timed_out';
        }

        $duration = null;
        if ($timeIn && !$timeOut) {
            $duration = now()->diff($timeIn)->format('%H:%I:%S');
        }

        return view('home', compact('dtrs', 'timeIn', 'timeOut', 'status', 'duration'));
    }

    public function timeIn()
    {
        $userId = Auth::id();

        $existing = Date::where('user_id', $userId)
                        ->whereDate('time_in', now())
                        ->first();

        if (!$existing) {
            Date::create([
                'user_id' => $userId,
                'time_in' => now(),
            ]);

            TimeLog::create([
                'user_id' => $userId,
                'time_in' => now(),
            ]);

            return redirect()->route('home')->with('success', 'Time In recorded!');
        }

        return redirect()->route('home')->with('error', 'You have already timed in today.');
    }

    public function timeOut()
    {
        $userId = Auth::id();

        $log = Date::where('user_id', $userId)
                   ->whereDate('time_in', now())
                   ->first();

        $log2 = TimeLog::where('user_id', $userId)
                       ->whereDate('time_in', now())
                       ->first();

        if (!$log || !$log2) {
            return redirect()->route('home')->with('error', 'You need to time in first.');
        }

        if ($log->time_out || $log2->time_out) {
            return redirect()->route('home')->with('error', 'You already timed out today.');
        }

        $now = now();

        $log->update(['time_out' => $now]);
        $log2->update(['time_out' => $now]);

        return redirect()->route('home')->with('success', 'Time Out recorded!');
    }
}


