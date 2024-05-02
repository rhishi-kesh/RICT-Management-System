<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function role() {
        return view('application.role.role');
    }
    public function roleHavePermission($id) {
        return view('application.role.roleHavePermission', compact('id'));
    }
}
