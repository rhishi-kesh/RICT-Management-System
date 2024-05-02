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
    public  $name, $course_name, $amount, $mobile, $address, $email, $visitor_comment, $gender, $ref_name, $admission_booth_name,$admission_booth_number, $calling_person, $comments, $counseling, $status, $increment, $isModal = false, $courses = [], $counciling = [], $admissionBooth = [];

    public function render()
    {
        return view('livewire.visitor.update-visitor');
    }
    public function mount($id) {
        $visitors = Visitors::findOrFail($id);
        $this->counseling = $visitors->counseling;
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
        $this->admission_booth_name = $visitors->admission_booth_name;
        $this->admission_booth_number = $visitors->admission_booth_number;
        $this->calling_person = $visitors->calling_person;
        $this->comments = $visitors->comments;
        $this->courses = Course::get();
        $this->counciling = Councilings::get();
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
            'increment' => 'nullable',
        ]);
        $done = Visitors::where('id')->update([
            'counseling' => $this->counseling,
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
            'admission_booth_number' => $this->admission_booth_number,
            'calling_person' => $this->calling_person,
            'comments' => $this->comments,
            'call_count' => $this->increment,
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
