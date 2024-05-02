<?php

namespace App\Livewire\AdminReg;

use App\Models\User;
use Livewire\Component;

class UserView extends Component
{
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];
    public $delete_id;

    public function render() {
        $users = User::where('role', 1)->paginate();
        return view('livewire.admin-reg.user-view', compact('users'));
    }
    public function deleteAlert($id){
        $this->delete_id = $id;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent(){
        $done = User::findOrFail($this->delete_id)->delete();
        if($done){
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
}
