<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Models\TimeLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\User;

date_default_timezone_set('Asia/Manila');

class DateController extends Controller
{
    protected $user;

    protected $log;

    public function __construct()
    {
        $this->user = auth()->user();

        $this->log = $this->user->dates()
            ->whereDate('time_in', now())
            ->first();
    }

    public function index()
    {
        return view('home', [
            'user'      => $this->user,
            'todaysLog' => $this->log,
        ]);
    }

    public function break()
    {
        if (!$this->log) {
            return redirect()->route('home')->with('error', 'You need to time in first.');
        }


        if (empty($this->log->break_in)) {
            $this->log->break_in = now();
            $this->log->save();

            return redirect()->route('home')->with('success', 'Break started!');
        }

        $this->log->break_out = now();
        $this->log->save();

        return redirect()->route('home')->with('success', 'Break ended!');
    }

    public function timeIn()
    {
        // condition para dili sigeg balik og time in
        if (!empty($this->log->time_in)) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have already timed in today.',
            ]);
        }

        $this->log = $this->user->dates()->firstOrCreate([
            'time_in' => now(),
            'time_in_image' => request()->input('face_data', null),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Time In recorded!',
            'log' => $this->log,
        ]);
    }

    public function timeOut()
    {
        // condition para dili sigeg balik og time in
        if (!empty($this->log->time_out)) {
            return response()->json([
                'status' => 'error',
                'message' => 'You have already timed out today.',
            ]);
        }

        $this->log->time_out = now();
        $this->log->save();

        $requiredHours = $this->user->hour ?? 0;
        $timeIn = $this->log->time_in;
        $timeOut = $this->log->time_out ?? now();
        $breakIn = $this->log->break_in;
        $breakOut = $this->log->break_out;

        if ($requiredHours > 0 && $timeIn) {
            // Total allowed time in seconds
            $totalSeconds = $requiredHours * 3600;

            // Calculate total session time
            $workedSeconds = Carbon::parse($timeOut)->diffInSeconds(Carbon::parse($timeIn));

            // If break_in and break_out are set, subtract break duration
            if ($breakIn && $breakOut) {
                $breakSeconds = Carbon::parse($breakOut)->diffInSeconds(Carbon::parse($breakIn));
                $workedSeconds = max($workedSeconds - $breakSeconds, 0);
            }

            // Calculate remaining time in seconds
            $remainingSeconds = max($totalSeconds - $workedSeconds, 0);

            // Convert to hours (decimal)
            $remainingHours = round($remainingSeconds / 3600, 2);

            // Save to user
            $this->user->remaining_hours = $remainingHours;
            $this->user->save();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Time Out recorded!',
            'log' => $this->log,
        ]);
    }

    public function history()
    {

        $dtrs = $this->user->dates()
            ->orderByDesc('time_in')
            ->get();

        return view('history', compact('dtrs'));
    }


    public function users()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    public function userHistory($id)
    {
        $user = User::findOrFail($id);
        $dtrs = $user->dates()->orderByDesc('time_in')->get();

        $totalHoursWorked = 0;
        foreach ($dtrs as $dtr) {
            $totalHoursWorked += $dtr->diffInHours();
        }

        $requiredHours = $user->hour ?? 8;

        $remainingHours = round(max($requiredHours - $totalHoursWorked, 0), 2);
        $user->remaining_hours = $remainingHours;

        return view('user_history', compact('user', 'dtrs', 'totalHoursWorked', 'requiredHours'));
    }
}
