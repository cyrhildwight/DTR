<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password changed successfully.');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'employee_id' => 'nullable|string|max:255|unique:users,employee_id,' . Auth::id(),
        ]);

        $user = Auth::user();

        // Prevent changing Employee ID if already set
        if ($user->employee_id && $request->filled('employee_id') && $request->employee_id != $user->employee_id) {
            return back()->with('error', 'Employee ID can only be set once and cannot be changed.');
        }

        $user->update($request->only(['name', 'email', 'employee_id']));

        return redirect()->route('home')->with('success', 'Profile updated successfully.');
    }
}

