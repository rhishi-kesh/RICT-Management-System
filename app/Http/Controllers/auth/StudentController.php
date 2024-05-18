<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public $email;
    public function studentLogin(){
        if (!Auth::guard('student')->check()) {
            return view('auth/student/login');
        }else {
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
            'email' => 'Student ID/Password is invalid',
        ]);
    }
    public function studentLogout(Request $request){
        if(Auth::guard('student')->check())
        {
            Auth::guard('student')->logout();
            $request->session()->invalidate();
            return redirect('/');
        }
    }

    public function forgotPassword(){

        return view('auth.forgotPassword.student.forgot');
    }

    public function forgotPasswordPost(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        try{

            $user = Student::where('email', $request->email)->first();

            if($user){
                $this->sendOtp($user);
                Session::put('emailVerfy', 'Complete');
                return redirect()->route('student.verify', $user->id);
            }else{
                return back()->with('error', 'Email is not exists!');
            }

        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }

    public function verify($id) {

        if(Session::has('emailVerfy')){
            $user = Student::where('id', $id)->first();
            $this->sendOtp($user);
            return view('auth.forgotPassword.student.verification', compact('user'));
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
        $user = Student::where('email', $request->email)->first();
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
            $user = Student::where('id', $id)->first();
            return view('auth.forgotPassword.student.reset', compact('user'));
        }else{
            return redirect()->route('notFound');
        }
    }

    public function changePasswordPost(Request $request) {
        $request->validate([
            'password'=> 'required|min:8|confirmed:confirm_password'
        ]);

        $done = Student::where('id', $request->id)->update([
            'password' => Hash::make($request->password)
        ]);

        if($done){
            return redirect()->route('studentLogin')->with('passwordChanged', 'Your password has been changed. Enter your student id and password to login.');
        }
    }
}
