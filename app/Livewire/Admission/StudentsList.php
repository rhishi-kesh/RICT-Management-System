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
    public $sortDirection = 'DESC', $sortColumn = 'created_at', $perpage = 50, $search = '', $delete_id, $student_status;

    public function render(){
        $students = Student::with(['course:id,name','pament_mode:id,name','batch:id,name'])
        ->search($this->search)
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate($this->perpage);

        return view('livewire.admission.students-list',compact('students'));
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
        $student = Student::where('id', $id)->first();

        if($student->admissionFee == 0){
            $student->update([
                'admissionFee' => '1',
                'updated_at' => Carbon::now()
            ]);
        }else{
            $student->update([
                'admissionFee' => '0',
                'updated_at' => Carbon::now()
            ]);
        }
    }

    public function changeStatus($id) {
        $done = Student::where('id', $id)->update([
            'student_status' => $this->student_status,
            'updated_at' => Carbon::now()
        ]);

        if($done){
            $this->dispatch('swal', [
                'title' => 'Status Update Successful',
                'type' => "success",
            ]);
        }
    }

    public function is_certificate($id){
        $student = Student::where('id', $id)->first();

        if($student->is_certificate == 'no'){
            $student->update([
                'is_certificate' => 'yes',
                'updated_at' => Carbon::now()
            ]);
        }else{
            $student->update([
                'is_certificate' => 'no',
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
