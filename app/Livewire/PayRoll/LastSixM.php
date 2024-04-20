<?php

namespace App\Livewire\PayRoll;

use Livewire\Component;
use App\Models\Student;
use Carbon\Carbon;

class LastSixM extends Component
{
    public $total, $pay, $due, $payment, $isUpdate, $totalAmount, $isModal = false;

    public function updated($payment)
    {
        $npayment = $this->payment ?? 0;

        $student = Student::findOrFail($this->isUpdate);
        $npay = $student->pay ?? 0;
        $ndue = $student->due ?? 0;

        $this->pay = (float) $npay + (float) $npayment;
        $this->due = (float) $ndue - (float) $npayment;
    }
    public function render()
    {
        $students = Student::with('course:id,name')->where('due', '>', 0)->where(
            'created_at', '>=', Carbon::now()->startOfMonth()->subMonth(6)->toDateString()
        )->paginate(15);
        return view('livewire.pay-roll.last-six-m', compact('students'));
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
            'payment' => 'required|numeric',
        ]);

        $done = Student::where('id', $this->isUpdate)->update([
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
        $this->reset(['payment']);
    }
}
