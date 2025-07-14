<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dtr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DtrController extends Controller
{
    public function index()
    {
        $dtrs = Dtr::where('user_id', Auth::id())->orderBy('date', 'desc')->get();
        return view('dtr.index', compact('dtrs'));
    }

    public function timeIn()
    {
        $today = Carbon::today()->toDateString();

        $dtr = Dtr::firstOrCreate([
            'user_id' => Auth::id(),
            'date' => $today,
        ]);

        if (!$dtr->time_in) {
            $dtr->update(['time_in' => Carbon::now()->toTimeString()]);
        }

        return redirect()->back()->with('success', 'Time In recorded!');
    }

    public function timeOut()
    {
        $today = Carbon::today()->toDateString();

        $dtr = Dtr::where('user_id', Auth::id())
        ->whereDate('date', '')

                //   ->where('date', $today)
                  ->first();

        if ($dtr && !$dtr->time_out) {
            $dtr->update(['time_out' => Carbon::now()->toTimeString()]);
        }

        return redirect()->back()->with('success', 'Time Out recorded!');
    }
}
