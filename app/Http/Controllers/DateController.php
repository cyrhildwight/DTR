<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class DateController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Fetch all logs for the user
        $dtrs = Date::where('user_id', $userId)->get();

        // Fetch today's log
        $todayLog = Date::where('user_id', $userId)
                        ->whereDate('time_in', now())
                        ->first();

        // Safely parse as Carbon
        $timeIn = $todayLog?->time_in ? Carbon::parse($todayLog->time_in) : null;
        $timeOut = $todayLog?->time_out ? Carbon::parse($todayLog->time_out) : null;

        // Live duration if no timeout yet
        $duration = null;
        if ($timeIn && !$timeOut) {
            $duration = now()->diff($timeIn)->format('%H:%I:%S');
        }

        return view('home', compact('dtrs', 'timeIn', 'timeOut', 'duration'));
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

            return redirect()->back()->with('success', 'Time In recorded!');
        }

        return redirect()->back()->with('error', 'You have already timed in today.');
    }

    public function timeOut()
    {
        $userId = Auth::id();

        $log = Date::where('user_id', $userId)
                   ->whereDate('time_in', now())
                   ->first();

        if (!$log) {
            return redirect()->back()->with('error', 'You need to time in first.');
        }

        if ($log->time_out) {
            return redirect()->back()->with('error', 'You have already timed out today.');
        }

        $log->update(['time_out' => now()]);

        return redirect()->back()->with('success', 'Time Out recorded!');
    }
}
