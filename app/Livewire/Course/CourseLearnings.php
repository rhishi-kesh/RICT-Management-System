<?php

namespace App\Livewire\Course;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Models\CourseLearnings as CourseLearning;

class CourseLearnings extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $learnings, $image, $delete_id, $update_id, $oldimage, $course_id;

    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function mount($id)
    {
        $this->course_id = $id;
        $this->delete_id = $id;
    }

    public function render()
    {
        $courseLearning = CourseLearning::paginate(15);
        return view('livewire.course.course-learnings', compact('courseLearning'));
    }

    public function insert()
    {
        $validated = $this->validate([
            'learnings' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $fileName = "";
        if ($this->image) {
            $fileName = $this->image->store('learnings', 'public');
        } else {
            $fileName = null;
        }
        $done = CourseLearning::insert([
            'course_id' => $this->course_id,
            'content' => $this->learnings,
            'image' => $fileName,
            'created_at' => Carbon::now(),
        ]);
        if ($done) {
            $this->reset('learnings');
            $this->reset('image');
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
    public function ShowUpdateModel($id)
    {
        $this->reset();
        $data = CourseLearning::findOrFail($id);
        $this->update_id = $data->id;
        $this->learnings = $data->content;
        $this->oldimage = $data->image;
    }
    public function update()
    {
        $validated = $this->validate([
            'learnings' => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $fileName = "";
        $image_path = public_path('storage\\' . $this->oldimage);
        if (!empty($this->image)) {
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $fileName = $this->image->store('Learnings', 'public');
        } else {
            $fileName = $this->oldimage;
        }
        $done = CourseLearning::where('id', $this->update_id)->update([
            'content' => $this->learnings,
            'image' => $fileName,
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
        $done = CourseLearning::findOrFail($this->delete_id);
        $this->oldimage = $done->image;
        $image_path = public_path('storage\\'.$this->oldimage);
        if(File::exists($image_path)){
            File::delete($image_path);
        }
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
        $this->reset('image');
        $this->reset('learnings');
    }


}
