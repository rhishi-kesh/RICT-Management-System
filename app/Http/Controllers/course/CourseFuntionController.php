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
    public function courseLearnings($id)
    {
        return view('application.course.courseLearnings', compact('id'));
    }
    public function courseForThose($id)
    {
        return view('application.course.courseForThose', compact('id'));
    }
    public function benefitCourse($id)
    {
        return view('application.course.benefitOfCourse', compact('id'));
    }
    public function addCreativeProject($id)
    {
        return view('application.course.creativeProject', compact('id'));
    }
    public function courseModule($id)
    {
        return view('application.course.courseModule', compact('id'));
    }
    public function courseFAQ($id)
    {
        return view('application.course.courseFaq', compact('id'));
    }


}
