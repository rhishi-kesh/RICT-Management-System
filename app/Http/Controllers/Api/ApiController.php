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
use App\Jobs\SendAdmissionMail;
use App\Models\Department;

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

        //Course
        $course = Course::where('id', $request->course)->first();

        //validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'fatherName' => 'required',
            'motherName' => 'required',
            'mobileNumber' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'address' => 'required',
            'email' => 'required|unique:students',
            'gMobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'qualification' => 'required',
            'profession' => 'required',
            'course' => 'required',
            'date' => 'required',
            'image' => 'required',
            'gender' => 'required',
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
                'gender' => $request->gender,
                'admissionFee' => 0,
                'course_id' => $request->course,
                'due' => $course->fee,
                'total' => $course->fee,
                'profile' => $fileName,
                'created_at' => Carbon::now(),
            ]);

            $data = [
                'name'=> $request->name,
                'email'=> $request->email,
                'user_id'=> $user_id,
                'password'=> $password,
            ];

            //SMS Message
            $message = "Rhishi Admission Form Website User ID: $user_id  Password: $password";

            if($done){
                dispatch(new SendAdmissionMail($data, $message, $request->mobileNumber));
                return response()->json(['status' => 1, 'msg' => 'Admission Successfully Done']);
            }
        }
    }

    public function courses() {
        $allCourses = Course::where('is_web', 0)->get();
        return $allCourses;
    }

    public function coursesIsfooter() {
        $allCourses = Course::where('is_web', 0)->where('is_footer', 0)->get();
        return $allCourses;
    }

    public function coursesTopSale() {
        $allCourses = Course::where('is_web', 0)->where('best_selling', 0)->get();
        return $allCourses;
    }

    public function webdepartment() {
        $allDepartments = Department::get();
        return $allDepartments;
    }

    public function singleDepartment($slug) {
        $department = Department::select('id','name')->where('slug',$slug)->first();

        $course = Course::where('is_web', 0)->where('department_id', $department->id)->get();

        return $course;
    }

    public function singleCourse($slug) {
        $course = Course::query()
                    ->with('department', 'courseLearnings', 'courseForThose', 'courseBenefits', 'creativeProject', 'courseModule', 'courseFaq')
                    ->where('slug',$slug)
                    ->where('is_web', '0')
                    ->latest()
                    ->first();
        return $course;
    }
}
