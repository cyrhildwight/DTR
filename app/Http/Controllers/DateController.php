<?php

namespace App\Http\Controllers;

use App\Models\Date;
use Illuminate\Support\Facades\Auth;

class DateController extends Controller
{
    public function index()
    {
        $dtrs = Date::where('user_id', Auth::id())->get();
        return view('dtr.index', compact('dtrs'));
    }

    public function timeIn()
    {
        $dtr = auth()->user()
            ->dates()
            ->whereDate('time_in', now())
            ->first();

        if (!$dtr) {
            $dtr = auth()->user()
                ->dates()
                ->create([
                    'time_in' => now()
                ]);

            return redirect()->back()->with('success', 'Time In recorded!');
        }

        return redirect()->back()->with('error', 'Already timed in');
    }

    public function timeOut()
    {
        $dtr = auth()->user()
            ->dates()
            ->whereDate('time_in', now())
            ->first();

        if (!$dtr) {
            return redirect()->back()->with('error', 'Not yet timed in');
        }

        $dtr->update([
            'time_out' => now()
        ]);

        return redirect()->back()->with('success', 'Time Out recorded!');
    }
}
