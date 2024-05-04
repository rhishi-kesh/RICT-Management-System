<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleController extends Controller
{
    public function role() {
        return view('application.role.role');
    }
    public function roleHavePermission($id) {
        $role = ModelsRole::findOrFail($id);
        $permissions = ModelsPermission::get();
        $group_name  = ModelsPermission::pluck('group')->unique();
        $roleWithPermission = DB::table('role_has_permissions')
                                    ->where('role_has_permissions.role_id', $role->id)
                                    ->pluck('role_has_permissions.permission_id')
                                    ->all();
        return view('application.role.roleHavePermission', compact('role', 'permissions', 'roleWithPermission','group_name'));
    }
    public function permissionOnRolePost(Request $request){
        $role = ModelsRole::findOrFail($request->id);
        $role->syncPermissions($request->permission);
        // return response()->json(['message' => 'Success'], 200);
        return back();
    }
}
