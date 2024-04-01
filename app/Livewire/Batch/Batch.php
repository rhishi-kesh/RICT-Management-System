<?php

namespace App\Livewire\Batch;

use App\Models\Batch as Batchs;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Batch extends Component
{
    use WithPagination;
    public $name, $update_id, $isModal = false, $delete_id;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function render()
    {
        $courses = Batchs::paginate(10);
        return view('livewire.batch.batch', compact('courses'));
    }
    public function insert(){
        $validated = $this->validate([
            'name' => 'required|unique:batches',
        ]);
        $done = Batchs::insert([
            'name' => $this->name,
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
        $data = Batchs::findOrFail($id);
        $this->update_id = $data->id;
        $this->name = $data->name;
    }
    public function update(){
        $validated = $this->validate([
            'name' => 'required',
        ]);
        $done = Batchs::where('id',$this->update_id)->update([
            'name' => $this->name,
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
        $done = Batchs::findOrFail($this->delete_id)->delete();
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
    }
}
