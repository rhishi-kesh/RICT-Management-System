<?php

namespace App\Livewire\Role;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Component
{
    use WithPagination;
    public $name, $update_id, $isRolePermission = false, $delete_id, $role, $permissions = [], $roleID, $permission= [], $roleWithPermission = [];
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function render()
    {
        $roles = ModelsRole::paginate(10);
        return view('livewire.role.role', compact('roles'));
    }
    public function insert(){
        $slug = Str::slug($this->name);
        $validated = $this->validate([
            'name' => 'required|unique:roles',
        ]);
        $done = ModelsRole::create([
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
        $data = ModelsRole::findOrFail($id);
        $this->update_id = $data->id;
        $this->name = $data->name;
    }
    public function update(){
        $validated = $this->validate([
            'name' => 'required|unique:roles,name,' . $this->update_id,
        ]);
        $done = ModelsRole::where('id',$this->update_id)->update([
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
        $done = ModelsRole::findOrFail($this->delete_id)->delete();
        if($done){
            $this->update_id = '';
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
    public function rolePermission($id){
        $this->isRolePermission = true;
        $this->roleID = $id;
        $this->role = ModelsRole::findOrFail($id);
        $this->permissions = ModelsPermission::get();
        $this->roleWithPermission = DB::table('role_has_permissions')
                                    ->where('role_has_permissions.role_id', $this->role->id)
                                    ->pluck('role_has_permissions.permission_id')
                                    ->all();
    }
    public function addRolePermission(){
        $role = ModelsRole::findOrFail($this->roleID);
        $role->syncPermissions($this->permission);
    }
    public function showModal(){
        $this->reset();
    }
}
