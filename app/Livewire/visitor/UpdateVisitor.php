<?php

namespace App\Livewire\Visitor;

use Livewire\Component;
use App\Models\Visitors;
use App\Models\Course;
use App\Models\Councilings;
use App\Models\AdmissionBooth;
use Illuminate\Support\Carbon;

class UpdateVisitor extends Component
{
    public $name, $visitor_id, $course_name, $amount, $mobile, $address, $email, $visitor_comment, $gender, $ref_name, $admission_booth_name, $calling_person, $comments, $counseling, $status, $isModal = false, $courses = [], $councilings = [], $admissionBooth = [];

    public function render()
    {
        return view('livewire.visitor.update-visitor');
    }
    public function mount($id) {
        $visitors = Visitors::findOrFail($id);
        $this->visitor_id = $visitors->id;
        $this->counseling = $visitors->counseling_id;
        $this->status = $visitors->status;
        $this->name = $visitors->name;
        $this->mobile = $visitors->mobile;
        $this->email = $visitors->email;
        $this->course_name = $visitors->course_id;
        $this->address = $visitors->address;
        $this->amount = $visitors->amount;
        $this->visitor_comment = $visitors->visitor_comment;
        $this->gender = $visitors->gender;
        $this->ref_name = $visitors->ref_name;
        $this->calling_person = $visitors->calling_person;
        $this->admission_booth_name = $visitors->admission_booth_name;
        $this->comments = $visitors->comments;
        $this->courses = Course::get();
        $this->councilings = Councilings::get();
        $this->admissionBooth = AdmissionBooth::get();
    }
    public function submit(){
        $validated = $this->validate([
            'counseling' => 'required',
            'status' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'nullable',
            'course_name' => 'required',
            'address' => 'required',
            'amount' => 'nullable',
            'visitor_comment' => 'nullable',
            'gender' => 'nullable',
            'ref_name' => 'nullable',
            'admission_booth_name' => 'nullable',
            'comments' => 'nullable',
        ]);
        $done = Visitors::findOrFail($this->visitor_id)->update([
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
            'calling_person' => $this->calling_person,
            'comments' => $this->comments,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
            return redirect()->route('visitor');
        }
    }
}
