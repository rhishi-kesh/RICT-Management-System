<?php

namespace App\Livewire\Permission;

use App\Models\Course;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Permission extends Component
{
    use WithPagination;
    public $name, $update_id, $isModal = false, $delete_id;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];
    public function render()
    {
        $permissions = ModelsPermission::paginate(10);
        return view('livewire.permission.permission', compact('permissions'));
    }
    public function insert(){
        $slug = Str::slug($this->name);
        $validated = $this->validate([
            'name' => 'required|unique:permissions',
        ]);
        $done = ModelsPermission::create([
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
        $data = ModelsPermission::findOrFail($id);
        $this->update_id = $data->id;
        $this->name = $data->name;
    }
    public function update(){
        $validated = $this->validate([
            'name' => 'required|unique:permissions,name,' . $this->update_id,
        ]);
        $done = ModelsPermission::where('id',$this->update_id)->update([
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
        $done = ModelsPermission::findOrFail($this->delete_id)->delete();
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
