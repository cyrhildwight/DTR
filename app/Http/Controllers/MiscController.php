<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscController extends Controller
{
    public function showImage(Request $request)
    {
        $data = urldecode($request->input('data'));
        if (!$data) {
            abort(404);
        }

        return view('misc.image', ['data' => $data]);
    }
}
