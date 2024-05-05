<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function studentLogin(){
        if (!Auth::guard('student')->check()) {
            return view('auth/studentlogin');
        }else{
            return redirect()->route('studentDashboard');
        }
    }
    public function StudentPost(Request $request){
        $credentials = $request->validate([
            'student_id' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::guard('student')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('studentDashboard');
        }
        return back()->withErrors([
            'email' => 'Email/Password is invalid',
        ]);
    }
    public function studentLogout(Request $request){
        if(Auth::guard('student')->check())
        {
            Auth::guard('student')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
    }
}
