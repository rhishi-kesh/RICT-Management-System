<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ViewCourse extends Component
{
    use WithPagination;
    public $name, $courseFee, $update_id;
    public $isEdit = false;
    public function render()
    {
        $courses = Course::paginate(10);
        return view('livewire.course.view-course', compact('courses'));
    }
    public function delete($id){
        $done = Course::findOrFail($id)->delete();
        if($done){
            session()->flash('error', 'Data Delete Successfull');
        }
    }
    public function update(){
        $slug = Str::slug($this->name);
        $validated = $this->validate([
            'name' => 'required',
            'courseFee' => 'required|numeric',
        ]);
        $done = Course::where('id',$this->update_id)->update([
            'name' => $this->name,
            'slug' => $slug,
            'fee' => $this->courseFee,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->resetform();
            $this->remove();
            session()->flash('success', 'Data Insert Successfull.');
        }
    }
    public function edit($id){
        $this->isEdit = true;
        $data = Course::findOrFail($id);
        $this->update_id = $data->id;
        $this->name = $data->name;
        $this->courseFee = $data->fee;
    }
    public function remove(){
        $this->isEdit = false;
        $this->resetform();
    }
    public function resetform(){
        $this->reset(['name']);
        $this->reset(['courseFee']);
    }
}
