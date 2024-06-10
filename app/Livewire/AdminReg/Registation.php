<?php

namespace App\Livewire\AdminReg;

use App\Jobs\SendUserMail;
use App\Mail\UserMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use App\Utils;
use Illuminate\Support\Facades\Mail;

class Registation extends Component
{
    use Utils;
    use WithPagination;
    public $name, $email, $password, $Cpassword, $date, $mobile, $roles = [];

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
            'mobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'roles' => 'required',
        ]);

        $done = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'dateofbirth' => $this->date,
            'mobile' => $this->mobile,
            'password' => Hash::make($this->password),
            'created_at' => Carbon::now(),
        ]);

        $done->syncRoles($this->roles);

        //Mail Data
        $data = [
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=> $this->password,
        ];

        //SMS Message
        $message = 'Rhishi Testing SMS';

        if($done){
            dispatch(new SendUserMail($data, $message, $this->mobile));

            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
}
