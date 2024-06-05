<?php
namespace App\Livewire\Course;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Mentor;
use Livewire\Component;
use App\Models\Department;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class ViewCourse extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name, $courseFee, $description, $duration, $lecture, $mentor_id, $department_id, $project, $image, $video, $oldimage, $update_id, $delete_id;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function render()
    {
        $departments = Department::get();
        $courses = Course::paginate(10);

        return view('livewire.course.view-course', compact('courses', 'departments'));
    }
    public function insert()
    {
        //slug Generate
        $searchName = Course::where('name', $this->name)->first('name');
        if($searchName){
            $slug = Str::slug($this->name) . rand();
        }else{
            $slug = Str::slug($this->name);
        }

        $validated = $this->validate([
            'name'  => 'required|unique:courses',
            'courseFee'   => 'required|numeric',
            'description' => 'required',
            'duration'  => 'required',
            'lecture'   => 'required',
            'project'   => 'nullable',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'video'     => 'nullable',
            'department_id' => 'required',
        ]);

        $fileName = "";
        if ($this->image) {
            $fileName = $this->image->store('courses', 'public');
        } else {
            $fileName = null;
        }
        $done = Course::insert([
            'name' => $this->name,
            'slug' => $slug,
            'fee' => $this->courseFee,
            'description' => $this->description,
            'duration' => $this->duration,
            'lecture' => $this->lecture,
            'project' => $this->project,
            'thumbnail' => $fileName,
            'video' => $this->video,
            'department_id' => $this->department_id,
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
    public function deleteAlert($id)
    {
        $this->delete_id = $id;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent()
    {
        $done = Course::findOrFail($this->delete_id);
        $this->oldimage = $done->image;
        $image_path = public_path('storage\\'.$this->oldimage);
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $done = Course::findOrFail($this->delete_id)->delete();
        if ($done) {
            $this->update_id = '';
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
}
