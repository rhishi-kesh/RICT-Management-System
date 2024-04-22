<?php

namespace App\Livewire\Visitor;

use Livewire\Component;
use App\Models\Visitors;
use Illuminate\Support\Carbon;
use Livewire\WithPagination;



class VisitorList extends Component
{
    public $name, $email, $mobile, $image = null, $isModal = false, $delete_id, $update_id, $oldImage;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];
    use WithPagination;



    public function render()
    {
        $visitor = Visitors::paginate(5);
        return view('livewire.visitor.visitor-list', compact('visitor'));
    }

    public function insert()
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
        ]);
        $done = Visitors::insert([
            'counseling' => $this->counseling,
            'status' => $this->status,
            'name' => $this->status,
            'mobile' => $this->mobile,
            'email' => $this->email,
            'course_name' => $this->course_name,
            'address' => $this->address,
            'amount' => $this->amount,
            'visitor_comment' => $this->visitor_comment,
            'gender' => $this->gender,
            'ref_name' => $this->ref_name,
            'admission_booth_name' => $this->admission_booth_name,
            'admission_booth_number' => $this->admission_booth_number,
            'calling_person' => $this->calling_person,
            'comments' => $this->comments,
            'created_at' => Carbon::now(),
        ]);
        if ($done) {
            $this->resetForm();
            $this->removeModal();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }

    }

    // Update

    // public function ShowUpdateModel($id){
    //     $this->isModal = true;
    //     $data = Student::findOrFail($id);
    //     $this->name = $data->name;
    //     $this->fatherName = $data->fName;
    //     $this->motherName = $data->mName;
    //     $this->mobileNumber = $data->mobile;
    //     $this->address = $data->address;
    //     $this->email = $data->email;
    //     $this->gMobile = $data->guardianMobileNo;
    //     $this->qualification = $data->qualification;
    //     $this->profession = $data->profession;
    //     $this->discount = $data->discount;
    //     $this->paymentType = $data->paymentType;
    //     $this->totalAmount = $data->total;
    //     $this->totalPay = $data->pay;
    //     $this->totalDue = $data->due;
    //     $this->paymentNumber = $data->paymentNumber;
    //     $this->admissionFee = $data->admissionFee;
    //     $this->courseId = $data->course_id;         //relationship
    //     $this->course = Course::get();
    // }


    public function showModal()
    {
        $this->resetForm();
        $this->isModal = true;
    }
    public function removeModal()
    {
        $this->update_id = '';
        $this->isModal = false;
        $this->resetForm();
    }
    public function resetForm()
    {
        $this->reset(['name']);
        $this->reset(['email']);
        $this->reset(['mobile']);
    }

}
