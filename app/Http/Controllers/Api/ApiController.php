<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Utils;

class ApiController extends Controller
{
    use Utils;
    public function admission(Request $request){

        //slug Generate
        $searchName = Student::where('name', $request->name)->first('name');
        $slug = '';
        if($searchName) {
            $slug = Str::slug($request->name) . rand();
        } else{
            $slug = Str::slug($request->name);
        }

        //user id and slug generate
        $user_id = $this->generateCode('Student', '202');
        $password = Str::random(8);
        $password_hash = bcrypt($password);

        //validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'fatherName' => 'required',
            'motherName' => 'required',
            'mobileNumber' => 'required',
            'address' => 'required',
            'email' => 'nullable|unique:students',
            'gMobile' => 'required',
            'qualification' => 'required',
            'profession' => 'required',
            'courseId' => 'required',
            'date' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }else{
            //insert
            $done = Student::insert([
                'student_id' => $user_id,
                'name' => $request->name,
                'slug' => $slug,
                'fName' => $request->fatherName,
                'mName' => $request->motherName,
                'email' => $request->email,
                'dateofbirth' => $request->date,
                'password' => $password_hash,
                'address' => $request->address,
                'mobile' => $request->mobileNumber,
                'qualification' => $request->qualification,
                'profession' => $request->profession,
                'guardianMobileNo' => $request->gMobile,
                'course_id' => $request->courseId,
                'created_at' => Carbon::now(),
            ]);

            if($done){
                return response()->json(['status' => 1, 'msg' => 'Admission Successfully Done']);
            }
        }
    }
}
