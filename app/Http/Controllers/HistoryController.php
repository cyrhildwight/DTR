<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\TimeLog;

class HistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $timeLogs = TimeLog::where('user_id', $user->id)
                           ->orderBy('created_at', 'desc')
                           ->get();

        return view('history', compact('timeLogs'));
    }
}
