<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRegController extends Controller
{
    public function registation() {
        return view('auth/adminRegister');
    }
}
