<?php

namespace App\Http\Controllers\course;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\CourseModule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function addCourseModule($id)
    {
        $course_id = Course::select('id')->get();
        return view('course.courseModule-add', compact('course_id', 'id'));
    }


    public function courseModuleAddPost(Request $request)
    {
        $validated = $request->validate([
            'class_no' => 'required',
            'class_topics' => 'required',
        ]);
        $done = CourseModule::insert([
            'course_id' => $request->course_id,
            'class_no' => $request->class_no,
            'class_topics' => $request->class_topics,
            'created_at' => Carbon::now(),
        ]);
        if ($done) {
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
        return redirect()->route('courseModule');

    }


    public function courseModuleEdit()
    {
        return view('course.courseModule-edit');
    }

}
