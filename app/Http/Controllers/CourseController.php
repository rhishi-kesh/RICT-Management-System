<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function addCourse(){
        return view('application.course.course');
    }
    public function viewCourse(){
        return view('application.course.viewCourse');
    }
}
