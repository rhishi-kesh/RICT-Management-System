<?php

namespace App\Livewire\Admission;

use App\Models\Course;
use App\Models\Student;
use App\Models\PaymentMode;
use Illuminate\Support\Str;
use Livewire\Component;
use Carbon\Carbon;

class StudentListEdit extends Component
{
    public $name, $fatherName, $motherName, $mobileNumber, $address, $email, $gMobile, $qualification, $gender, $profession, $courseId = null, $discount = null, $paymentType, $totalAmount, $totalPay = null, $totalDue, $paymentNumber, $classday = [], $date, $courseFee, $course = [], $paymentTypes = [], $update_slug;
    public function updated($discount)
    {
        $singleCourse = Course::where('id', $this->courseId)->first(['fee']);
        $this->courseFee = $singleCourse->fee ?? 0;
        $discountValue = $this->discount ?? 0;

        // Ensure both $courseFee and $discountValue are interpreted as numeric values
        $this->totalAmount = (float) $this->courseFee - (float) $discountValue;

        $totalAmount = $this->totalAmount ?? 0;
        $totalPay = $this->totalPay ?? 0;
        $this->totalDue = (float) $totalAmount - (float) $totalPay;
    }
    public function updatedCourseId()
    {
        $this->discount = null;
        $this->totalPay = null;
        $this->totalAmount = $this->courseFee;
        $this->totalDue = $this->courseFee;
    }
    public function mount($slug){
        $data = Student::where('slug', $slug)->first();
        $this->update_slug = $slug;
        $this->name = $data->name;
        $this->fatherName = $data->fName;
        $this->motherName = $data->mName;
        $this->mobileNumber = $data->mobile;
        $this->address = $data->address;
        $this->email = $data->email;
        $this->gMobile = $data->guardianMobileNo;
        $this->qualification = $data->qualification;
        $this->profession = $data->profession;
        $this->discount = $data->discount;
        $this->paymentType = $data->paymentType;
        $this->totalAmount = $data->total;
        $this->totalPay = $data->pay;
        $this->totalDue = $data->due;
        $this->paymentNumber = $data->paymentNumber;
        $this->courseId = $data->course_id;
        $this->date = $data->dateofbirth;
        $this->classday = $data->class_days;
        $this->gender  = $data->gender;
        $this->course = Course::get();
        $this->paymentTypes = PaymentMode::get();
    }
    public function render()
    {
        return view('livewire.admission.student-list-edit');
    }
    public function submit() {
        //slug Generate
        $searchName = Student::where('name', $this->name)->first('name');
        if($searchName){
            $slug = Str::slug($this->name) . rand();
        }else{
            $slug = Str::slug($this->name);
        }

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
            'email' => 'nullable|unique:students,name,' . $this->update_slug,
            'gMobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'qualification' => 'required',
            'profession' => 'required',
            'courseId' => 'required',
            'paymentType' => 'required',
            'totalAmount' => 'required',
            'gender'    => 'required',
            'date' => 'required',
        ]);

        // //insert
        $done = Student::where('slug', $this->update_slug)->update([
            'name' => $this->name,
            'slug' => $slug,
            'fName' => $this->fatherName,
            'mName' => $this->motherName,
            'email' => $this->email,
            'dateofbirth' => $this->date,
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
            'discount' => $this->discount,
            'class_days' => $this->classday,
            'gender' => $this->gender,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->dispatch('swal', [
                'title' => 'Data Updated Successfull',
                'type' => "success",
            ]);
            return redirect()->route('studentsList');
        }
    }
}
