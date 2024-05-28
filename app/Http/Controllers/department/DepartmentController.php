<?php

namespace App\Http\Controllers\department;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    
    public function department()
    {
        return view('application.department.department');
    }

}
