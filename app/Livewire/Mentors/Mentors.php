<?php

namespace App\Livewire\Mentors;

use Livewire\Component;
use App\Models\Mentor;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class Mentors extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name, $email, $mobile, $image, $delete_id, $update_id, $oldimage;
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
            'email' => 'required|email|unique:mentor',
            'mobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $fileName = "";
        if ($this->image) {
            $fileName = $this->image->store('mentors', 'public');
        } else {
            $fileName = null;
        }
        $password = Str::random(8);
        $password_hash = bcrypt($password);
        $done = Mentor::insert([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'image' => $fileName,
            'password' => $password_hash,
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
        $data = Mentor::findOrFail($id);
        $this->update_id = $data->id;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->mobile = $data->mobile;
        $this->oldimage = $data->image;
    }
    public function update()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'image' => 'nullable',
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
        $done = Mentor::findOrFail($this->delete_id);
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
        $this->reset();
    }
}
