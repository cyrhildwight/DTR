<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaceCaptureController extends Controller
{
    public function timeIn(Request $request)
    {
        $this->saveFaceCapture('time_in_face', $request);
        return redirect()->route('dtr.timein');
    }

    public function break(Request $request)
    {
        $user = Auth::user();

        // if user already has break_in_face, then it's break out
        if ($user->break_in_face && !$user->break_out_face) {
            $this->saveFaceCapture('break_out_face', $request);
        } else {
            $this->saveFaceCapture('break_in_face', $request);
        }

        return redirect()->route('dtr.break');
    }

    public function timeOut(Request $request)
    {
        $this->saveFaceCapture('time_out_face', $request);
        return redirect()->route('dtr.timeout');
    }

    private function saveFaceCapture($column, $request)
    {
        $user = Auth::user();
        if ($request->has('face_data')) {
            $user->$column = $request->face_data;
            $user->save();
        }
    }

}
