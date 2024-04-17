<?php

namespace App\Livewire\PaymentMode;

use App\Models\PaymentMode as PaymentModes;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class PaymentMode extends Component
{
    use WithPagination;
    public $name, $number, $update_id, $isModal = false, $delete_id;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function render()
    {
        $paymentModes = PaymentModes::paginate(10);
        return view('livewire.payment-mode.payment-mode', compact('paymentModes'));
    }
    public function insert(){
        $validated = $this->validate([
            'name' => 'required|unique:payment_modes',
            'number' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
        ]);
        $done = PaymentModes::insert([
            'name' => $this->name,
            'number' => $this->number,
            'created_at' => Carbon::now(),
        ]);
        if($done){
            $this->resetForm();
            $this->removeModal();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
    public function ShowUpdateModel($id){
        $this->isModal = true;
        $data = PaymentModes::findOrFail($id);
        $this->update_id = $data->id;
        $this->name = $data->name;
        $this->number = $data->number;
    }
    public function update(){
        $validated = $this->validate([
            'name' => 'required',
            'number' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
        ]);
        $done = PaymentModes::where('id',$this->update_id)->update([
            'name' => $this->name,
            'number' => $this->number,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->update_id = '';
            $this->resetForm();
            $this->removeModal();
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
        }
    }
    public function deleteAlert($id){
        $this->delete_id = $id;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent(){
        $done = PaymentModes::findOrFail($this->delete_id)->delete();
        if($done){
            $this->update_id = '';
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
    public function showModal(){
        $this->resetForm();
        $this->isModal = true;
    }
    public function removeModal(){
        $this->update_id = '';
        $this->isModal = false;
        $this->resetForm();
    }
    public function resetForm(){
        $this->reset(['name']);
        $this->reset(['number']);
    }
}
