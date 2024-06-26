<?php

namespace App\Http\Controllers\notice;

use App\Http\Controllers\Controller;
use App\Jobs\SendNoticeMail;
use App\Models\AdmissionBooth;
use App\Models\Mentor;
use App\Models\Notice;
use App\Models\Student;
use App\Models\Batch;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoticController extends Controller
{
    public function notice() {
        $batch = Batch::select('id', 'name')
        ->withCount('students')
        ->latest()
        ->paginate(20);

        $mentors = Mentor::select('id','name','image')
        ->latest()
        ->get();

        $users = User::select('id','name','profile')
        ->latest()
        ->get();

        $studentWithoutBatch = Student::where('batch_id', 0)->select('id','name','profile')
        ->latest()
        ->get();

        $admissionBooth = AdmissionBooth::select('id','shop_name')
        ->latest()
        ->get();
        return view('application.notice.notice', compact('batch', 'mentors', 'users', 'studentWithoutBatch', 'admissionBooth'));
    }
    public function noticeMentor() {
        $mentors = Mentor::select('id','name')
        ->latest()
        ->get();
        return view('application.notice.noticeMentor', compact('mentors'));
    }

    public function noticeMentorPost(Request $request){
        $validator = Validator::make($request->all(), [
            'message' => 'required',
            'person' => 'required',
        ]);

        // SMS Message
        $message = $request->message;
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }else {
            foreach($request->person as $person){

                $user = Mentor::where('id', $person)->first();

                //Mail Data
                $data = [
                    'message'=> $request->message,
                    'email'=> $user->email,
                ];


                $done = Notice::insert([
                    'user_id' => $user->id,
                    'person' => 'm',
                    'notice' => $request->message,
                    'created_at' => Carbon::now()
                ]);

                if($done){
                    dispatch(new SendNoticeMail($data, $message, $user));
                }
            }
            return response()->json(['status' => 1, 'msg' => 'Notice Send Successful']);
        }
    }

    public function noticeSystemUser() {
        $users = User::select('id','name')
        ->latest()
        ->get();
        return view('application.notice.noticeSystemUser', compact('users'));
    }

    public function noticeSystemUserPost(Request $request){

        $validated = $request->validate([
            'message' => 'required',
            'person' => 'required',
        ]);

        // SMS Message
        $message = $request->message;

        foreach($request->person as $person){

            $user = User::where('id', $person)->first();

            //Mail Data
            $data = [
                'message'=> $request->message,
                'email'=> $user->email,
            ];

            $done = Notice::insert([
                'user_id' => $user->id,
                'person' => 'a',
                'notice' => $request->message,
                'created_at' => Carbon::now()
            ]);

            if($done){
                dispatch(new SendNoticeMail($data, $message, $user));
            }
        }
        return back()->with('success','Notice Send Successful');
    }

    public function noticeStudentWithoutBatch() {
        $students = Student::where('batch_id', 0)->select('id','name')
        ->latest()
        ->get();
        return view('application.notice.noticeStudentWithoutBatch', compact('students'));
    }

    public function noticeStudentWithoutBatchPost(Request $request){

        $validated = $request->validate([
            'message' => 'required',
            'person' => 'required',
        ]);

        // SMS Message
        $message = $request->message;

        foreach($request->person as $person){

            $user = Student::where('id', $person)->first();

            //Mail Data
            $data = [
                'message'=> $request->message,
                'email'=> $user->email,
            ];

            $done = Notice::insert([
                'user_id' => $user->id,
                'person' => 's',
                'notice' => $request->message,
                'created_at' => Carbon::now()
            ]);

            if($done){
                dispatch(new SendNoticeMail($data, $message, $user));
            }
        }
        return back()->with('success','Notice Send Successful');
    }

    public function noticeAdmissionBooth() {
        $admissionBooth = AdmissionBooth::select('id','shop_name')
        ->latest()
        ->get();
        return view('application.notice.noticeAdmissionBooth', compact('admissionBooth'));
    }

    public function noticeAdmissionBoothPost(Request $request){
        $validated = $request->validate([
            'message' => 'required',
            'person' => 'required',
        ]);

        // SMS Message
        $message = $request->message;

        foreach($request->person as $person){

            $user = AdmissionBooth::where('id', $person)->first();

            //Mail Data
            $data = [
                'message'=> $request->message,
                'email'=> $user->email,
            ];

            $done = Notice::insert([
                'user_id' => $user->id,
                'person' => 'b',
                'notice' => $request->message,
                'created_at' => Carbon::now()
            ]);

            if($done){
                dispatch(new SendNoticeMail($data, $message, $user));
            }
        }
        return back()->with('success','Notice Send Successful');
    }

    public function noticeBatch($id) {
        $students = Student::where('batch_id', $id)->select('id','name')
        ->latest()
        ->get();
        $batch = Batch::where('id', $id)->select('id', 'name')->first();
        return view('application.notice.noticeBatch', compact('students', 'batch'));
    }

    public function noticeBatchPost(Request $request){

        $validated = $request->validate([
            'message' => 'required',
            'person' => 'required',
        ]);

        // SMS Message
        $message = $request->message;

        foreach($request->person as $person){

            $user = Student::where('id', $person)->first();

            //Mail Data
            $data = [
                'message'=> $request->message,
                'email'=> $user->email,
            ];


            $done = Notice::insert([
                'user_id' => $user->id,
                'person' => 's',
                'notice' => $request->message,
                'created_at' => Carbon::now()
            ]);

            if($done){
                dispatch(new SendNoticeMail($data, $message, $user));
            }
        }
        return back()->with('success','Notice Send Successful');
    }

    public function allNotice() {
        return view('application.notice.allNotice');
    }

    public function singleANotice($id) {
        $singlenotice = Notice::findOrFail($id);
        return view('application.notice.adminSingleNotice', compact('singlenotice'));
    }

    public function myANotice() {
        $usersNotice = Notice::query()
        ->where('user_id', auth()->user()->id)
        ->where('person', 'a')
        ->latest()
        ->paginate(30);
        return view('application.notice.myAdminNotice', compact('usersNotice'));
    }

    public function myMNotice() {
        $mentorNotice = Notice::query()
        ->where('user_id', auth()->guard('mentor')->user()->id)
        ->where('person', 'm')
        ->latest()
        ->paginate(30);
        return view('application.notice.myMentorNotice', compact('mentorNotice'));
    }

    public function mySNotice() {
        $studentNotice = Notice::query()
        ->where('user_id', auth()->guard('student')->user()->id)
        ->where('person', 's')
        ->latest()
        ->paginate(30);
        return view('application.notice.myStudentNotice', compact('studentNotice'));
    }

    public function AsingleNotice($id) {
        $singlenotice = Notice::findOrFail($id);
        $singlenotice->is_seen = 0;
        $singlenotice->update();
        return view('application.notice.adminSingleNotice', compact('singlenotice'));
    }

    public function SsingleNotice($id) {
        $singlenotice = Notice::findOrFail($id);
        $singlenotice->is_seen = 0;
        $singlenotice->update();
        return view('application.notice.studentSingleNotice', compact('singlenotice'));
    }

    public function MsingleNotice($id) {
        $singlenotice = Notice::findOrFail($id);
        $singlenotice->is_seen = 0;
        $singlenotice->update();
        return view('application.notice.mentorSingleNotice', compact('singlenotice'));
    }
}
