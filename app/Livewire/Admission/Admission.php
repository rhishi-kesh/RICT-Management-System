<?php

namespace App\Livewire\Admission;

use App\Mail\AdmissionMail;
use App\Models\Course;
use App\Models\Student;
use App\Models\PaymentMode;
use Livewire\Component;
use App\Utils;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Admission extends Component
{
    use Utils;
    public $name, $fatherName, $motherName, $mobileNumber, $address, $email, $gMobile, $qualification, $profession, $courseId = null, $discount = null, $paymentType, $totalAmount, $totalPay = null, $totalDue, $paymentNumber, $admissionFee, $classday = [], $date, $courseFee, $paymentTypes = [], $course = [], $allClassDays = [];

    public function updated($discount) {
        $singleCourse = Course::where('id', $this->courseId)->first(['fee']);
        $this->courseFee = $singleCourse->fee ?? 0;
        $discountValue = $this->discount ?? 0;

        // Ensure both $courseFee and $discountValue are interpreted as numeric values
        $this->totalAmount = (float) $this->courseFee - (float) $discountValue;

        $totalAmount = $this->totalAmount ?? 0;
        $totalPay = $this->totalPay ?? 0;
        $this->totalDue = (float) $totalAmount - (float) $totalPay;
    }
    public function updatedCourseId() {
        $this->discount = null;
        $this->totalPay = null;
        $this->totalAmount = $this->courseFee;
        $this->totalDue = $this->courseFee;
    }
    public function mount() {
        $this->paymentTypes = PaymentMode::get();
        $this->course = Course::get();
        $this->allClassDays = ['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday'];
    }
    public function render() {
        return view('livewire.admission.admission');
    }
    public function submit() {
        //slug Generate
        $searchName = Student::where('name', $this->name)->first('name');
        if($searchName){
            $slug = Str::slug($this->name) . rand();
        }else{
            $slug = Str::slug($this->name);
        }

         //user id and slug generate
         $user_id = $this->generateCode('Student', '202');
         $password = Str::random(8);
         $password_hash = Hash::make($password);

         //Multiful ClassDay Upload
         $previousClassday = $this->classday;
         if (is_array($this->classday)) {
             $this->classday = implode(',', $this->classday);
         } else {
             $this->classday = $previousClassday;
         }

        //validation
        $validated = $this->validate([
            'name' => 'required',
            'fatherName' => 'required',
            'motherName' => 'required',
            'mobileNumber' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'address' => 'required',
            'email' => 'nullable|unique:students',
            'gMobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'paymentNumber' => 'nullable|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'qualification' => 'required',
            'profession' => 'required',
            'courseId' => 'required',
            'paymentType' => 'required',
            'totalAmount' => 'required',
            'date' => 'required',
        ]);

        // //insert
        $done = Student::insert([
            'student_id' => $user_id,
            'name' => $this->name,
            'slug' => $slug,
            'fName' => $this->fatherName,
            'mName' => $this->motherName,
            'email' => $this->email,
            'dateofbirth' => $this->date,
            'password' => $password_hash,
            'address' => $this->address,
            'mobile' => $this->mobileNumber,
            'qualification' => $this->qualification,
            'profession' => $this->profession,
            'guardianMobileNo' => $this->gMobile,
            'course_id' => $this->courseId,
            'paymentType' => $this->paymentType,
            'pay' => $this->totalPay,
            'due' => $this->totalDue,
            'total' => $this->totalAmount,
            'paymentNumber' => $this->paymentNumber,
            'admissionFee' => $this->admissionFee,
            'discount' => $this->discount,
            'class_days' => $this->classday,
            'created_at' => Carbon::now(),
        ]);

        //Mail Data
        $data = [
            'name'=> $this->name,
            'email'=> $this->email,
        ];

        //SMS Message
        $message = 'Rhishi Testing SMS';

        if($done){
            $this->sendSMS($this->mobileNumber, $message);
            Mail::to($this->email)->queue(new AdmissionMail($data));
            $this->reset();
            $this->mount();
            $this->dispatch('swal', [
                'title' => 'Data Instert Successfull',
                'type' => "success",
            ]);
        }
    }
}
