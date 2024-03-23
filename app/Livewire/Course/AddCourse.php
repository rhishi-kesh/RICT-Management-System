<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

class AddCourse extends Component
{
    public $name, $courseFee;
    public function render()
    {
        return view('livewire.course.add-course');
    }
    public function submit(){
        $slug = Str::slug($this->name);
        $validated = $this->validate([
            'name' => 'required|unique:courses',
            'courseFee' => 'required|numeric',
        ]);
        $done = Course::insert([
            'name' => $this->name,
            'slug' => $slug,
            'fee' => $this->courseFee,
            'created_at' => Carbon::now(),
        ]);
        if($done){
            $this->resetform();
            session()->flash('success', 'Data Insert Successfull.');
        }
    }
    public function resetform(){
        $this->reset(['name']);
        $this->reset(['courseFee']);
    }
}
