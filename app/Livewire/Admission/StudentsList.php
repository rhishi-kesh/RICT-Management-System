<?php

namespace App\Livewire\Admission;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;
use App\Models\PaymentMode;
use App\Models\Course;
use Illuminate\Support\Str;
use Carbon\Carbon;


class StudentsList extends Component
{
    use WithPagination;

    public $name, $fatherName, $motherName, $mobileNumber, $address, $email, $gMobile, $qualification, $profession, $discount, $paymentType, $totalAmount, $totalPay, $totalDue, $paymentNumber, $admissionFee, $courseId, $sortDirection = 'DESC', $sortColumn = 'created_at', $perpage = 30, $search = '', $isModal = false, $course = [];

    public function render()
    {
        $students = Student::with(['course:id,name','pament_mode:id,name','batch:id,name'])
        ->search($this->search)
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate($this->perpage);
        $paymentTypes = PaymentMode::get();

        return view('livewire.admission.students-list',compact('students', 'paymentTypes'));
    }
    public function doSort($column)
    {
        if($this->sortColumn === $column){
            $this->sortDirection = ($this->sortDirection == 'ASC')? 'DESC':'ASC';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirection = 'ASC';
    }
    public function admissionfee($id){
        $student = Student::where('id',$id)->first();
        if($student->admissionFee == 0){
            Student::where('id',$id)->update([
                'admissionFee' => '1',
                'updated_at' => Carbon::now()
            ]);
        }else{
            Student::where('id',$id)->update([
                'admissionFee' => '0',
                'updated_at' => Carbon::now()
            ]);
        }
    }
    public function ShowUpdateModel($id){
        $this->isModal = true;
        $data = Student::findOrFail($id);
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
        $this->admissionFee = $data->admissionFee;
        $this->courseId = $data->course_id;
        $this->course = Course::get();
    }
    public function submit(){
        $slug = Str::slug($this->name);
        $validated = $this->validate([
            'name' => 'required',
            'fatherName' => 'required',
        ]);
        $done = Student::where('id')->update([
            'name' => $this->name,
            'slug' => $slug,
            'fName' => $this->fatherName,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->resetForm();
            $this->removeModal();
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
        }
    }
    public function removeModal(){
        $this->isModal = false;
        $this->resetForm();
    }
    public function resetForm(){
        $this->reset(['name']);
        $this->reset(['fatherName']);
        $this->reset(['motherName']);
        $this->reset(['mobileNumber']);
    }
}



