<?php

namespace App\Livewire\AdminReg;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class UserView extends Component
{
    public $delete_id, $oldImage;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];
    public function render() {
        $users = User::where('role', 1)->paginate();
        return view('livewire.admin-reg.user-view', compact('users'));
    }
    public function deleteAlert($id){
        $this->delete_id = $id;
        $data = User::findOrFail($this->delete_id);
        $this->oldImage = $data->profile;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent(){
        $done = User::findOrFail($this->delete_id)->delete();
        if($done){
            $image_path = public_path('storage\\' . $this->oldImage);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
}
