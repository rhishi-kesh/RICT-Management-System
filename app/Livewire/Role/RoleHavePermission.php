<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleHavePermission extends Component
{
    public $id, $permission = [];

    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
        $role = ModelsRole::findOrFail($this->id);
        $permissions = ModelsPermission::get();
        $roleWithPermission = DB::table('role_has_permissions')
                                    ->where('role_has_permissions.role_id', $this->role->id)
                                    ->pluck('role_has_permissions.permission_id')
                                    ->all();
        return view('livewire.role.role-have-permission', compact('role','permissions','roleWithPermission'));
    }
    public function addRolePermission(){
        dd($this->permission);
    }
}
