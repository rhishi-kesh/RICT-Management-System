<?php

namespace App\Livewire\PayRoll;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Str;
use Carbon\Carbon;


class Due extends Component
{
    public $discount, $total,$pay, $due,$paydue, $isModal = false;
    public $totalAmount;

    public function updated()
    {
        $CourseDue = Student::where('id')->first(['fee']);
        $this->totalAmount = $CourseDue->fee ?? 0;
        $discountValue = $this->discount ?? 0;

        // Ensure both $totalAmount and $discountValue are interpreted as numeric values
        $this->totalAmount = (float) $this->totalAmount - (float) $discountValue;

        $totalAmount = $this->totalAmount ?? 0;
        $totalPay = $this->totalPay ?? 0;
        $this->totalDue = (float) $totalAmount - (float) $totalPay;
    }


    public function render()
    {
        $students = Student::all();
        return view('livewire.pay-roll.due', compact('students'));
    }
      // Update
    public function ShowUpdateModel($id){
        $this->isModal = true;
        $student = Student::findOrFail($id);
        $this->total = $student->total;
        $this->pay = $student->pay;
        $this->due = $student->due;
    }
    public function submitDue()
    {
        $validated = $this->validate([
            'total' => 'required|numeric',
            'pay' => 'required|numeric',
            'due' => 'required|numeric',
            'paydue' => 'required|numeric',
        ]);
    
        $done = Student::where('id')->submitDue([
            'total' => $this->total,
            'pay' => $this->pay,
            'due' => $this->due,
            'paydue' => $this->paydue,
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
    }

}
