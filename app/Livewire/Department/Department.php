<?php

namespace App\Livewire\Department;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Models\Department as ModelsDepartment;

class Department extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name, $slug, $image, $delete_id, $update_id, $oldimage;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function render()
    {
        $department = ModelsDepartment::paginate(15);
        return view('livewire.department.department', compact('department'));
    }

    public function insert()
    {
         //slug Generate
         $searchName = ModelsDepartment::where('name', $this->name)->first('name');
         if($searchName){
             $slug = Str::slug($this->name) . rand();
         }else{
             $slug = Str::slug($this->name);
         }

        $validated = $this->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $fileName = "";
        if ($this->image) {
            $fileName = $this->image->store('department', 'public');
        } else {
            $fileName = null;
        }
        $done = ModelsDepartment::insert([
            'name' => $this->name,
            'slug' => $slug,
            'image' => $fileName,
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
        $data = ModelsDepartment::findOrFail($id);
        $this->update_id = $data->id;
        $this->name = $data->name;
        $this->slug = $data->slug;
        $this->oldimage = $data->image;
    }
    public function update()
    {
        $validated = $this->validate([
            'name' => 'nullable',
            'slug' => 'nullable',
            'image' => 'nullable',
        ]);
        $fileName = "";
        $image_path = public_path('storage\\' . $this->oldimage);
        if (!empty($this->image)) {
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $fileName = $this->image->store('department', 'public');
        } else {
            $fileName = $this->oldimage;
        }
        $done = ModelsDepartment::where('id', $this->update_id)->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'image' => $fileName
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
        $done = ModelsDepartment::findOrFail($this->delete_id);
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
                'title' => 'Data Delete Successfull',
                'type' => "error",
            ]);
        }
    }
    public function showModal()
    {
        $this->reset();
    }

}
