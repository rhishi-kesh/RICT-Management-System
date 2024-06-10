<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function course(){
        return view('application.course.course');
    }
    public function manageWebsiteCourse(){
        return view('application.course.manageWebsiteCourse');
    }
}
