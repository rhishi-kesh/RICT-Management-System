<?php

namespace App\Livewire\AdminReg;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Registation extends Component
{
    use WithPagination;
    public $name, $email, $password, $Cpassword, $date, $roles = [];

    public function render()
    {
        $users = User::where('role', 1)->paginate(20);
        $allRoles = Role::pluck('name', 'name')->all();
        return view('livewire.admin-reg.registation', compact('users','allRoles'));
    }
    public function insert(){
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|same:Cpassword',
            'date' => 'required',
            'roles' => 'required',
        ]);
        $done = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'dateofbirth' => $this->date,
            'password' => Hash::make($this->password),
            'created_at' => Carbon::now(),
        ]);

        $done->syncRoles($this->roles);

        if($done){
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
}
