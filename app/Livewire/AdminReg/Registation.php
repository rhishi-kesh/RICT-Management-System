<?php

namespace App\Livewire\AdminReg;

use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Registation extends Component
{
    use WithPagination;
    public $name, $email, $password, $Cpassword, $update_id, $isModal = false, $delete_id;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function render()
    {
        $users = User::paginate(20);
        return view('livewire.admin-reg.registation', compact('users'));
    }
    public function insert(){
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|same:Cpassword',
        ]);
        $done = User::insert([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
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
        $data = User::findOrFail($id);
        $this->update_id = $data->id;
        $this->name = $data->name;
        $this->email = $data->email;
    }
    public function update(){
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $done = User::where('id',$this->update_id)->update([
            'name' => $this->name,
            'email' => $this->email,
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
        $done = User::findOrFail($this->delete_id)->delete();
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
        $this->reset(['email']);
        $this->reset(['password']);
        $this->reset(['Cpassword']);
    }
}
