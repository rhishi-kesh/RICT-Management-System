<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Carbon\Carbon;
use Livewire\Component;

class ManageWebsiteCourse extends Component
{
    public function render()
    {
        $courses = Course::paginate(10);
        return view('livewire.course.manage-website-course', compact('courses'));
    }

    public function showOnWebsite($id){
        $course = Course::findOrFail($id);

        if($course->is_web == 0){
            $course->update([
                'is_web' => 1,
                'updated_at' => Carbon::now()
            ]);
        }else{
            $course->update([
                'is_web' => 0,
                'updated_at' => Carbon::now()
            ]);
        }
    }

    public function ShowOnWebsiteFooter($id){
        $course = Course::findOrFail($id);

        if($course->is_footer == 0){
            $course->update([
                'is_footer' => 1,
                'updated_at' => Carbon::now()
            ]);
        }else{
            $course->update([
                'is_footer' => 0,
                'updated_at' => Carbon::now()
            ]);
        }
    }

    public function bestSelling($id){
        $course = Course::findOrFail($id);

        if($course->best_selling == 0){
            $course->update([
                'best_selling' => 1,
                'updated_at' => Carbon::now()
            ]);
        }else{
            $course->update([
                'best_selling' => 0,
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
