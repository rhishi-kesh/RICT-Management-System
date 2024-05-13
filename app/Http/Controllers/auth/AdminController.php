<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login(){
        if (!Auth::check()) {
            return view('auth/admin/login');
        }else{
            return redirect()->route('dashboard');
        }
    }
    public function registation() {
        return view('auth/admin/register');
    }
    public function loginPost(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email' => 'Email/Password is invalid',
        ]);
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    public function userView(){
        return view('auth/admin/viewUser');
    }
    public function userEdit($id){
        return view('auth/admin/editUser', compact('id'));
    }
}
