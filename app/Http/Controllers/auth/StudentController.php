<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

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
            $request->session()->regenerateotp();
            return redirect('/');
        }
    }
    public function forgetPasswordLoad(){
        return view('auth/studentforget');
    }

    public function verificationList(Request $request){
        try{
        $user = Student::where('email', $request->email)->get();
            if(count($user) > 0){
                return redirect('forget-reset.verification/'.$user->id);
            }else{
                return back()->with('error','Email is not exists!');
            }
        }catch(\Exception $e){
            return view('forget-reset.verification');
        }
    }
    
    public function sendOtp($user)
    {
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

        Mail::send('auth.forgetPasswordMail', ['data'=>$data],function($message) use ($data){ $message->to($data['email'])->subject($data['title']);
        });
    }
    
    public function verification($id)
    {
        $user = Student::where('id',$id)->first();
        if(!$user || $user->is_verified == 1){
            return redirect('/');
        }
        $email = $user->email;
        $this->sendOtp($user);//OTP SEND

        return view('verification',compact('email'));
    }

    public function verifiedOtp(Request $request)
    {
        $user = Student::where('email',$request->email)->first();
        $otpData = PasswordReset::where('otp',$request->otp)->first();
        if(!$otpData){
            return response()->json(['success' => false,'msg'=> 'You entered wrong OTP']);
        }
        else{
            $currentTime = time();
            $time = $otpData->created_at;
            if($currentTime >= $time && $time >= $currentTime - (70+5)){//90 seconds
                Student::where('id',$user->id)->update([
                    'is_verified' => 1
                ]);
                return response()->json(['success' => true,'msg'=> 'Mail has been verified']);
            }
            else{
                return response()->json(['success' => false,'msg'=> 'Your OTP has been Expired']);
            }
        }
    }

    // Resend otp 
    public function resendOtp(Request $request)
    {
        $user = Student::where('email',$request->email)->first();
        $otpData = PasswordReset::where('email',$request->email)->first();

        $currentTime = time();
        $time = $otpData->created_at;

        if($currentTime >= $time && $time >= $currentTime - (70+5)){//90 seconds
            return response()->json(['success' => false,'msg'=> 'Please try after some time']);
        }
        else{

            $this->sendOtp($user);//OTP SEND
            return response()->json(['success' => true,'msg'=> 'OTP has been sent']);
        }
    }

    public function resetPasswordLoad(Request $request)
        {
           $resetData =  PasswordReset::where('otp', $request->otp)->get();

           if(isset($request->otp) && count($resetData) > 0){
                $user = Student::where('email',$resetData[0]['email'])->get();
                   
                return view('forget-reset.resetPassword',compact('user'));
           }else{
                return view('forget-reset.404');
           }
        }

} 
