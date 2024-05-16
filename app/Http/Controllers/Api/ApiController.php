<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Utils;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    use Utils;
    public function admissionWeb(Request $request){

        //slug Generate
        $searchName = Student::where('name', $request->name)->first('name');
        $slug = '';
        if($searchName) {
            $slug = Str::slug($request->name) . rand();
        } else{
            $slug = Str::slug($request->name);
        }

        //user id and Password generate
        $user_id = $this->generateCode('Student', '202');
        $password = Str::random(8);
        $password_hash = Hash::make($password);

        //image
        $fileName = "";
        if ($request->image) {
            $fileName = $request->image->store('profile', 'public');
        } else {
            $fileName = null;
        }

        //validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'fatherName' => 'required',
            'motherName' => 'required',
            'mobileNumber' => 'required',
            'address' => 'required',
            'email' => 'required|unique:students',
            'gMobile' => 'required',
            'qualification' => 'required',
            'profession' => 'required',
            'course' => 'required',
            'date' => 'required',
            'image' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }else{
            //insert
            $done = Student::insert([
                'student_id' => $user_id,
                'is_fromSite' => 1,
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
                'course_id' => $request->course,
                'profile' => $fileName,
                'created_at' => Carbon::now(),
            ]);

            if($done){
                return response()->json(['status' => 1, 'msg' => 'Admission Successfully Done']);
            }
        }
    }

    public function courses() {
        $allCourses = Course::get();
        return $allCourses;
    }
}
