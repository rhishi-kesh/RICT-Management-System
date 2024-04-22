<?php

namespace App\Livewire\Visitor;

use Livewire\Component;
use App\Models\Councilings;
use App\Models\Visitors;
use App\Models\Course;
use Carbon\Carbon;


class VisitorForm extends Component
{
    public $name, $course_name, $amount, $mobile, $address, $email, $visitor_comment, $gender, $ref_name, $admission_booth_name,$admission_booth_number, $calling_person, $comments, $call_count, $courseId = null, $counseling, $status;
    public $selectedOption;


    public function render()
    {
        $counciling = Councilings::get();
        $courses = Course::get();
        return view('livewire.visitor.visitor-form', compact('counciling', 'courses'));
    }
  
    public function submit()
    {
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
            'admission_booth_number' => 'nullable',
            'calling_person' => 'required',
            'comments' => 'nullable',
            'call_count' => 'nullable',
        ]);

        $done = Visitors::insert([
            'counseling' => $this->counseling,
            'status' => $this->status,
            'name' => $this->name,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'course_name' => $this->course_name,
            // 'course_id' => $this->courseId,
            'address' => $this->address,
            'amount' => $this->amount,
            'visitor_comment' => $this->visitor_comment,
            'gender' => $this->selectedOption,
            'ref_name' => $this->ref_name,
            'admission_booth_name' => $this->admission_booth_name,
            'admission_booth_number' => $this->admission_booth_number,
            'calling_person' => $this->calling_person,
            'comments' => $this->comments,
            'call_count' => $this->call_count,
            'created_at' => Carbon::now(),
        ]);
        if ($done) {
            $this->resetForm();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
    
    public function resetForm(){
        $this->reset(['counseling']);
        $this->reset(['status']);
        $this->reset(['name']);
        $this->reset(['mobile']);
        $this->reset(['email']);
        $this->reset(['course_name']);
        $this->reset(['address']);
        $this->reset(['amount']);
        $this->reset(['visitor_comment']);
        $this->reset(['selectedOption']);
        $this->reset(['ref_name']);
        $this->reset(['admission_booth_name']);
        $this->reset(['admission_booth_number']);
        $this->reset(['calling_person']);
        $this->reset(['comments']);
        $this->reset(['call_count']);
    }
}
