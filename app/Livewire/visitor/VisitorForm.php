<?php

namespace App\Livewire\Visitor;

use App\Jobs\SendVisitorMail;
use Livewire\Component;
use App\Models\Councilings;
use App\Models\Visitors;
use App\Utils;
use App\Models\Course;
use App\Models\AdmissionBooth;
use Carbon\Carbon;
class VisitorForm extends Component
{
    use Utils;
    public $name, $course_name, $amount, $mobile, $address, $email, $visitor_comment, $gender, $ref_name, $admission_booth_name, $calling_person, $comments, $counseling, $status, $course_id;
    public function render() {
        $counciling = Councilings::get();
        $courses = Course::get();
        $admissionBooth = AdmissionBooth::get();
        return view('livewire.visitor.visitor-form', compact('counciling', 'courses', 'admissionBooth'));
    }
    public function submit() {

        $validated = $this->validate([
            'counseling' => 'required',
            'status' => 'nullable',
            'name' => 'required',
            'mobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'email' => 'nullable',
            'course_name' => 'required',
            'address' => 'nullable',
            'amount' => 'nullable',
            'visitor_comment' => 'nullable',
            'gender' => 'nullable',
            'ref_name' => 'nullable',
            'admission_booth_name' => 'nullable',
            'comments' => 'nullable',
        ]);

        $done = Visitors::insert([
            'counseling_id' => $this->counseling,
            'status' => $this->status,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'course_id' => $this->course_name,
            'address' => $this->address,
            'amount' => $this->amount,
            'visitor_comment' => $this->visitor_comment,
            'gender' => $this->gender,
            'ref_name' => $this->ref_name,
            'admission_booth_name' => $this->admission_booth_name,
            'comments' => $this->comments,
            'created_at' => Carbon::now(),
        ]);

        //Mail Data
        $data = [
            'name'=> $this->name,
            'email'=> $this->email,
        ];

        //SMS Message
        $message = 'Rhishi Testing SMS';

        if ($done) {
            dispatch(new SendVisitorMail($data, $message, $this->mobile));
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
}
