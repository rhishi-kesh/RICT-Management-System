<?php

namespace App\Livewire\Counciling;

use App\Models\Councilings;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
class Counciling extends Component
{
    use WithPagination;
    public $name, $courseFee, $update_id, $delete_id;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function render()
    {
        $counciling = Councilings::paginate(10);
        return view('livewire.counciling.counciling', compact('counciling'));
    }

    public function insert(){
        $validated = $this->validate([
            'name' => 'required',
        ]);
        $done = Councilings::insert([
            'name' => $this->name,
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
        $data = Councilings::findOrFail($id);
        $this->update_id = $data->id;
        $this->name = $data->name;
    }
    public function update(){
        $validated = $this->validate([
            'name' => 'required',
        ]);
        $done = Councilings::where('id',$this->update_id)->update([
            'name' => $this->name,
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
        $done = Councilings::findOrFail($this->delete_id)->delete();
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
