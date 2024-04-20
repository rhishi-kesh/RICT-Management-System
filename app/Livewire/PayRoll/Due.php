<?php

namespace App\Livewire\PayRoll;

use Livewire\Component;
use App\Models\Student;
use Carbon\Carbon;


class Due extends Component
{
    public $total, $pay, $due, $newPay, $paydue, $isUpdate, $totalAmount, $isModal = false;

    public function render()
    {
        $students = Student::with('course:id,name')->where('due', '>', 0)->paginate(15);
        return view('livewire.pay-roll.due', compact('students'));
    }
    public function ShowUpdateModel($id){
        $this->isModal = true;
        $student = Student::findOrFail($id);
        $this->total = $student->total;
        $this->pay = $student->pay;
        $this->due = $student->due;
        $this->isUpdate = $student->id;
    }
    public function addDue()
    {
        $validated = $this->validate([
            'total' => 'required|numeric',
            'pay' => 'required|numeric',
            'due' => 'required|numeric',
            'paydue' => 'required|numeric',
        ]);

        $this->pay = $this->pay + $this->paydue;
        $this->due = $this->due - $this->paydue;

        $done = Student::where('id', $this->isUpdate)->update([
            'total' => $this->total,
            'pay' => $this->pay,
            'due' => $this->due,
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
        $this->reset(['total']);
        $this->reset(['pay']);
        $this->reset(['due']);
        $this->reset(['paydue']);
    }

}
