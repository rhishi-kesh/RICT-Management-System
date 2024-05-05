<?php

namespace App\Livewire\Recycle;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\File;

class StudentsRecycle extends Component
{
    public $delete_id, $oldImage;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];
    public function render()
    {
        $students = Student::onlyTrashed()->paginate(30);
        return view('livewire.recycle.students-recycle', compact('students'));
    }
    public function restoreStudent($id){
        $post = Student::onlyTrashed()->findOrFail($id)->restore();
        $this->dispatch('swal', [
            'title' => 'Data Restore Successfull',
            'type' => "success",
        ]);
    }
    public function deleteStudentAlert($id){
        $this->delete_id = $id;
        $data = Student::onlyTrashed()->findOrFail($id);
        $this->oldImage = $data->image;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent(){
        $done = Student::onlyTrashed()->findOrFail($this->delete_id)->forceDelete();
        $image_path = public_path('storage\\' . $this->oldImage);
        if($done){
            if (!empty($this->oldImage)) {
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
}
