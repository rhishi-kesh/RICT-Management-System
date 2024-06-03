<?php

namespace App\Http\Controllers\course;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseFuntionController extends Controller
{
    
    public function editCourse($id)
    {
        return view('application.course.editCourse', compact('id'));
    }

}
