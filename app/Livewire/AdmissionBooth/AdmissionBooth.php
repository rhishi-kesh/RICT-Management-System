<?php

namespace App\Livewire\AdmissionBooth;

use App\Models\AdmissionBooth as AdmissionBooths;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
class AdmissionBooth extends Component
{
    use WithPagination;
    public $name, $number, $email, $shopName, $update_id, $delete_id;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function render()
    {
        $members = AdmissionBooths::paginate(10);
        return view('livewire.admission-booth.admission-booth', compact('members'));
    }
    public function insert(){
        $validated = $this->validate([
            'name' => 'required',
            'number' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'email' => 'required|unique:admission_booths',
            'shopName' => 'required',
        ]);
        $done = AdmissionBooths::insert([
            'name' => $this->name,
            'number' => $this->number,
            'email' => $this->email,
            'shop_name' => $this->shopName,
            'created_at' => Carbon::now(),
        ]);
        if($done){
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
    public function ShowUpdateModel($id){
        $data = AdmissionBooths::findOrFail($id);
        $this->update_id = $data->id;
        $this->name = $data->name;
        $this->number = $data->number;
        $this->email = $data->email;
        $this->shopName = $data->shop_name;
    }
    public function update(){
        $validated = $this->validate([
            'name' => 'required',
            'number' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'email' => 'required',
            'shopName' => 'required',
        ]);
        $done = AdmissionBooths::where('id',$this->update_id)->update([
            'name' => $this->name,
            'number' => $this->number,
            'email' => $this->email,
            'shop_name' => $this->shopName,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->update_id = '';
            $this->reset();
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
        $done = AdmissionBooths::findOrFail($this->delete_id)->delete();
        if($done){
            $this->update_id = '';
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
    public function showModal(){
        $this->reset();
    }
}
