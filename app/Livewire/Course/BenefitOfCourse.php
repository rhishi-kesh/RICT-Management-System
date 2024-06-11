<?php

namespace App\Livewire\Course;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\BenefitsOfCourse;
use Illuminate\Support\Facades\File;

class BenefitOfCourse extends Component
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
        $courseBenefit = BenefitsOfCourse::where('course_id', $this->course_id)->latest()->paginate(15);
        return view('livewire.course.benefit-of-course', compact('courseBenefit'));
    }
    public function insert()
    {
        $validated = $this->validate([
            'learnings' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $fileName = "";
        if ($this->image) {
            $fileName = $this->image->store('benefitsOfCourse', 'public');
        } else {
            $fileName = null;
        }
        $done = BenefitsOfCourse::insert([
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
        $this->reset('learnings');
        $this->reset('image');
        $data = BenefitsOfCourse::findOrFail($id);
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
            $fileName = $this->image->store('benefitsOfCourse', 'public');
        } else {
            $fileName = $this->oldimage;
        }
        $done = BenefitsOfCourse::where('id', $this->update_id)->update([
            'content' => $this->learnings,
            'image' => $fileName,
            'updated_at' => Carbon::now()
        ]);
        if ($done) {
            $this->reset('learnings');
            $this->reset('image');
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
        $done = BenefitsOfCourse::findOrFail($this->delete_id);
        $this->oldimage = $done->image;
        $image_path = public_path('storage\\'.$this->oldimage);
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $done->delete();
        if ($done) {
            $this->update_id = '';
            $this->reset('learnings');
            $this->reset('image');
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
