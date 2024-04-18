<?php

namespace App\Livewire\Mentors;

use Livewire\Component;
use App\Models\Mentor;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File; 

class Mentors extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name, $email, $mobile, $image = null, $isModal = false, $delete_id, $update_id, $oldImage;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function render()
    {
        $mentors = Mentor::paginate(15);
        return view('livewire.mentors.mentors', compact('mentors'));
    }

    public function insert()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:mentor',
            'mobile' => 'required|numeric',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // image insert
        $fileName = "";
        if ($this->image) {
            $fileName = $this->image->store('mentors', 'public');
        } else {
            $fileName = null;
        }
        $done = Mentor::insert([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'image' => $fileName,
            'created_at' => Carbon::now(),
        ]);
        if ($done) {
            $this->image = null;
            $this->resetForm();
            $this->removeModal();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
    public function ShowUpdateModel($id)
    {
        $this->isModal = true;
        $data = Mentor::findOrFail($id);
        $this->update_id = $data->id;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->mobile = $data->mobile;
        $this->oldImage = $data->image;
    }
    public function update()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'image' => 'nullable',
        ]);

        $fileName2 = "";
        $image_path = public_path('storage\\' . $this->oldImage);
        if (!empty($this->image)) {
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $fileName2 = $this->image->store('mentors', 'public');   
        } else {
            $fileName2 = $this->oldImage;
        }
        $done = Mentor::where('id', $this->update_id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'image' => $fileName2
        ]);

        if ($done) {
            $this->image = null;
            $this->resetForm();
            $this->removeModal();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }

    public function showModal()
    {
        $this->resetForm();
        $this->isModal = true;
    }
    public function removeModal()
    {
        $this->update_id = '';
        $this->isModal = false;
        $this->resetForm();
    }
    public function resetForm()
    {
        $this->reset(['name']);
        $this->reset(['email']);
        $this->reset(['mobile']);
    }
    // Delete
    public function deleteAlert($id){
        $this->delete_id = $id;
        $data = Mentor::findOrFail($id);
        $this->oldImage = $data->image;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent(){
        $done = Mentor::findOrFail($this->delete_id)->delete();
        $image_path = public_path('storage\\' . $this->oldImage);
        if (!empty($this->oldImage)) {
            if (File::exists($image_path)) {
                File::delete($image_path);
            }  
        }
        if($done){
            $this->update_id = '';
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
}
