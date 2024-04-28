<?php

namespace App\Livewire\Course;

use App\Models\Course;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;  
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Gate;

class ViewCourse extends Component
{
    use WithPagination;
    public $name, $courseFee, $update_id, $isModal = false, $delete_id;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];
    public function render()
    {
        $courses = Course::paginate(10);
        return view('livewire.course.view-course', compact('courses'));
    }
    public function insert(){
        // Check if the user has permission to insert courses
        if (Gate::allows('create')) {
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
                $this->resetForm();
                $this->removeModal();
                $this->dispatch('swal', [
                    'title' => 'Data Insert Successfull',
                    'type' => "success",
                ]);
            }
        } else {
            // Handle unauthorized access
            $this->dispatch('swal', [
                'title' => 'Unauthorized',
                'type' => "error",
                'text' => 'You do not have permission to insert courses.',
            ]);
        }
    }
    public function ShowUpdateModel($id){
        $this->isModal = true;
        $data = Course::findOrFail($id);
        $this->update_id = $data->id;
        $this->name = $data->name;
        $this->courseFee = $data->fee;
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
            $this->update_id = '';
            $this->resetForm();
            $this->removeModal();
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
        }
    }
    public function deleteAlert($id){
        $this->delete_id = $id;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent(){
        $done = Course::findOrFail($this->delete_id)->delete();
        if($done){
            $this->update_id = '';
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
    public function showModal(){
        $this->resetForm();
        $this->isModal = true;
    }
    public function removeModal(){
        $this->update_id = '';
        $this->isModal = false;
        $this->resetForm();
    }
    public function resetForm(){
        $this->reset(['name']);
        $this->reset(['courseFee']);
    }
}
