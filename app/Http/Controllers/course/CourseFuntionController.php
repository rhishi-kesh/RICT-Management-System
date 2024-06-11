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
        $CourseModule = CourseModule::latest()->paginate(15);
        return view('application.course.courseModule', compact('CourseModule', 'id'));
    }

    public function addCourseModule($id)
    {
        return view('course.courseModule-add', compact('id'));
    }

    public function courseModuleAddPost(Request $request, $id)
    {
        $validated = $request->validate([
            'class_no' => 'required',
            'class_topics' => 'required',
        ]);

        $done = CourseModule::insert([
            'course_id' => $id,
            'class_no' => $request->class_no,
            'class_topics' => $request->class_topics,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('courseModule', $id)->with('success','Course Module Insert Successfull');
    }

    public function courseModuleEdit($id)
    {
        $CourseModule = CourseModule::findOrFail($id);
        return view('course.courseModule-edit', compact('CourseModule', 'id'));
    }

    public function courseModuleEditPost(Request $request, $id)
    {
        $validated = $request->validate([
            'class_no' => 'required',
            'class_topics' => 'required',
        ]);

        $done = CourseModule::where('id', $id)->update([
            'class_no' => $request->class_no,
            'class_topics' => $request->class_topics,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('courseModule', $id)->with('success','Course Module Update Successfull');;
    }

    public function courseModuleDelete($id)
    {
        CourseModule::findOrFail($id)->delete();
        return back()->with('error','Course Module Delete Successfull');
    }

    public function courseFAQ($id)
    {
        return view('application.course.courseFaq', compact('id'));
    }

}
