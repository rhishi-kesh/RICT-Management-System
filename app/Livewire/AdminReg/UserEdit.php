<?php

namespace App\Livewire\AdminReg;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{
    public $name, $email, $password, $Cpassword, $roles = [], $newRoles = [], $allRoles, $update_id;
    public function mount($id){
        $data = User::where('role',1)->where('id', $id)->first();
        $this->update_id = $id;
        $this->name = $data->name;
        $this->email = $data->email;
        $perviousRoles = $this->roles;
        if(is_array($this->roles)){
            $this->roles = $data->roles->pluck('name', 'name')->all();
        }else{
            $this->roles = $perviousRoles;
        }
        $this->allRoles = Role::pluck('name', 'name')->all();
    }
    public function render()
    {
        return view('livewire.admin-reg.user-edit');
    }
    public function update(){
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,name,' . $this->update_id,
        ]);
        $user = User::findOrFail($this->update_id);
        $done = $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'updated_at' => Carbon::now(),
        ]);

        $user->syncRoles($this->roles);
        if($done){
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
            return redirect()->route('userView');
        }
    }
}
