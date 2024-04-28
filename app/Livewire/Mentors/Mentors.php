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
    public $name, $email, $mobile, $image, $update_id, $isModal = false, $delete_id, $oldimage;
    protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function render()
    {
        $mentors = Mentor::paginate(7);
        return view('livewire.mentors.mentors', compact('mentors'));
    }
    public function insert()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

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
            $this->resetForm();
            $this->removeModal();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $fileName = "";
        $image_path = public_path('storage\\' . $this->oldimage);
        if (!empty($this->image)) {
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $fileName = $this->image->store('mentors', 'public');
        } else {
            $fileName = $this->oldimage;
        }

        $done = Mentor::where('id', $this->update_id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'image' => $fileName
        ]);

        if ($done) {
            $this->update_id = '';
            $this->resetForm();
            $this->removeModal();
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
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
        $this->oldimage = $data->image;

    }
    public function deleteAlert($id)
    {
        $this->delete_id = $id;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent()
    {
        $done = Mentor::findOrFail($this->delete_id);
        $this->oldimage = $done->image;
        $image_path = public_path('storage\\'.$this->oldimage);
        if(File::exists($image_path)){
            File::delete($image_path);
        }
        $done->delete();
        if ($done) {
            $this->update_id = '';
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
        $this->reset(['image']);
    }
}
