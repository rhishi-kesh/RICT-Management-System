<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login() {
        if (!Auth::check()) {
            return view('auth/admin/login');
        }else{
            return redirect()->route('dashboard');
        }
    }
    public function registation() {
        return view('auth/admin/register');
    }
    public function loginPost(Request $request) {
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
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    public function userView() {
        return view('auth/admin/viewUser');
    }
    public function userEdit($id) {
        return view('auth/admin/editUser', compact('id'));
    }

    public function forgotPassword() {

        return view('auth.forgotPassword.admin.forgot');
    }

    public function forgotPasswordPost(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        try{

            $user = User::where('email', $request->email)->first();

            if($user){
                $this->sendOtp($user);
                Session::put('emailVerfy', 'Complete');
                return redirect()->route('admin.verify', $user->id);
            }else{
                return back()->with('error', 'Email is not exists!');
            }

        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function verify($id) {

        if(Session::has('emailVerfy')){
            $user = User::where('id', $id)->first();
            $this->sendOtp($user);
            return view('auth.forgotPassword.admin.verification', compact('user'));
        } else{
            return redirect()->route('notFound');
        }
    }

    public function verifyPost(Request $request) {

        $validator = Validator::make($request->all(), [
            'otp' => 'required|numeric',
        ]);

        $otpData = PasswordReset::where('otp', $request->otp)->where('email', $request->email)->first();
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }else{
            if(!$otpData){
                return response()->json(['success' => false, 'msg' => 'You entered wrong OTP']);
            }
            else{
                $currentTime = time();
                $time = $otpData->created_at;
                if($currentTime >= $time && $time >= $currentTime - (70+5)){
                    Session::put('otpVerfy', 'Complete');
                    return response()->json(['success' => true, 'msg' => 'OK']);
                }
                else{
                    return response()->json(['success' => false, 'msg' => 'Your OTP has been Expired']);
                }
            }
        }
    }

    public function sendOtp($user) {
        $otp = rand(100000,999999);
        $time = time();
        PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
            'email' => $user->email,
            'otp' => $otp,
            'created_at' => $time
            ]
        );
        $data['email'] = $user->email;
        $data['title'] = 'Password Reset';
        $data['body'] = 'Your OTP is:- '.$otp;

        Mail::send('mail.forgetPasswordMail', ['data'=>$data],function($message) use ($data){ $message->to($data['email'])->subject($data['title']);
        });
    }

    public function resendOtp(Request $request) {
        $user = User::where('email', $request->email)->first();
        $otpData = PasswordReset::where('email',$request->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (70+5)){
            return response()->json(['success' => false, 'msg' => 'Please try after some time']);
        }
        else{
            $this->sendOtp($user);
            return response()->json(['success' => true, 'msg' => 'OTP has been sent']);
        }
    }

    public function changePassword($id) {

        if(Session::has('otpVerfy')){
            $user = User::where('id', $id)->first();
            return view('auth.forgotPassword.admin.reset', compact('user'));
        }else{
            return redirect()->route('notFound');
        }
    }

    public function changePasswordPost(Request $request) {
        $request->validate([
            'password'=> 'required|min:8|confirmed:confirm_password'
        ]);

        $done = User::where('id', $request->id)->update([
            'password' => Hash::make($request->password)
        ]);

        if($done){
            return redirect()->route('login')->with('passwordChanged', 'Your password has been changed. Enter your email and password to login.');
        }
    }
}
