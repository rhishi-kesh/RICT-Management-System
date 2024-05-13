<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentorController extends Controller
{
    public function mentorLogin(){
        if (!Auth::guard('mentor')->check()) {
            return view('auth/mentor/login');
        }else{
            return redirect()->route('mentorDashboard');
        }
    }
    public function mentorPost(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::guard('mentor')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('mentorDashboard');
        }
        return back()->withErrors([
            'email' => 'Email/Password is invalid',
        ]);
    }
    public function mentorLogout(Request $request){
        if(Auth::guard('mentor')->check())
        {
            Auth::guard('mentor')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('mentorLogin');
        }
    }
}
