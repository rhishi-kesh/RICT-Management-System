<?php

namespace App\Livewire\Course;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\CourseModule as CourseModules;

class CourseModule extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $class_no, $class_topics, $delete_id, $update_id, $oldimage, $course_id;

    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function mount($id)
    {
        $this->course_id = $id;
        $this->delete_id = $id;
    }

    public function render()
    {
        $CourseModule = CourseModules::paginate(15);
        return view('livewire.course.course-module', compact('CourseModule'));
    }
    public function insert()
    {
        $validated = $this->validate([
            'class_no' => 'required',
            'class_topics' => 'nullable',
        ]);
        $done = CourseModules::insert([
            'course_id' => $this->course_id,
            'class_no' => $this->class_no,
            'class_topics' => $this->class_topics,
            'created_at' => Carbon::now(),
        ]);
        if ($done) {
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
    public function ShowUpdateModel($id)
    {
        $this->reset();
        $data = CourseModules::findOrFail($id);
        $this->update_id = $data->id;
        $this->class_no = $data->class_no;
    }
    public function update()
    {
        $validated = $this->validate([
            'class_no' => 'nullable',
        ]);
        $done = CourseModules::where('id', $this->update_id)->update([
            'class_no' => $this->class_no,
            'updated_at' => Carbon::now()
        ]);
        if ($done) {
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
        }
    }
    public function deleteAlert($id)
    {
        $this->delete_id = $id;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent()
    {
        $done = CourseModules::findOrFail($this->delete_id);
        $done->delete();
        if ($done) {
            $this->update_id = '';
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
    public function showModal()
    {
        $this->reset('class_no');
    }


}
