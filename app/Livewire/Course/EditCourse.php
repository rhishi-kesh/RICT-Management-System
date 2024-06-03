<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Livewire\Component;
use App\Models\Department;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class EditCourse extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name, $courseFee, $description, $duration, $lecture, $mentor_id, $department_id, $project, $image, $video, $is_active, $is_footer, $best_selling, $date, $oldimage,$update_id, $delete_id;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];


    public function render()
    {
        $departments = Department::get();
        $courses = Course::paginate(10);

        return view('livewire.course.edit-course', compact('departments', 'courses'));
    }

    public function mount($id)
    {
        $data = Course::where('id', $id)->first();
        $this->update_id = $data->id;
        $this->name = $data->name;
        $this->courseFee = $data->fee;
        $this->description = $data->description;
        $this->duration = $data->duration;
        $this->lecture = $data->lecture;
        $this->project = $data->project;
        $this->department_id = $data->department_id;
        $this->video = $data->video;
        $this->oldimage = $data->thumbnail;
    }
    public function update()
    {
        $validated = $this->validate([
            'name'  => 'required',
            'courseFee'   => 'required|numeric',
            'description' => 'nullable',
            'duration'  => 'required',
            'lecture'   => 'nullable',
            'project'   => 'nullable',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'video'     => 'nullable',
            'department_id' => 'nullable'
        ]);
        $fileName = "";
        $image_path = public_path('storage\\' . $this->oldimage);
        if (!empty($this->image)) {
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $fileName = $this->image->store('courses', 'public');
        } else {
            $fileName = $this->oldimage;
        }
        $done = Course::where('id', $this->update_id)->update([
            'name' => $this->name,
            'fee' => $this->courseFee,
            'description' => $this->description,
            'duration' => $this->duration,
            'lecture' => $this->lecture,
            'project' => $this->project,
            'thumbnail' => $fileName,
            'video' => $this->video,
            'department_id' => $this->department_id
        ]);
        if ($done) {
            $this->update_id = '';
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
        }
    }


}
