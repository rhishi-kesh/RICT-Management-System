<?php

namespace App\Livewire\Admission;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Student;
use App\Models\PaymentMode;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StudentsList extends Component
{
    use WithPagination;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];
    public $name, $fatherName, $motherName, $mobileNumber, $address, $email, $gMobile, $qualification, $profession, $discount, $paymentType, $totalAmount, $totalPay, $totalDue, $paymentNumber, $admissionFee, $courseId, $sortDirection = 'DESC', $sortColumn = 'created_at', $perpage = 30, $search = '', $course = [], $delete_id;

    public function render(){
        $students = Student::with(['course:id,name','pament_mode:id,name','batch:id,name'])
        ->search($this->search)
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate($this->perpage);
        $paymentTypes = PaymentMode::get();

        return view('livewire.admission.students-list',compact('students', 'paymentTypes'));
    }
    public function doSort($column){
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
    public function deleteAlert($id){
        $this->delete_id = $id;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent(){
        $done = Student::findOrFail($this->delete_id)->delete();
        if($done){
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
}



