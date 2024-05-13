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
    public $name, $email, $mobile, $image, $delete_id, $update_id, $oldImage;
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
            'mobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // image insert
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
            $this->image = null;
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
        $this->oldImage = $data->image;
    }
    public function update()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
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
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Data Insert Successfull',
                'type' => "success",
            ]);
        }
    }
    public function deleteAlert($id){
        $this->delete_id = $id;
        $data = Mentor::findOrFail($id);
        $this->oldImage = $data->image;
        $this->dispatch('confirmDeleteAlert');
    }
    public function deleteStudent(){
        $done = Mentor::findOrFail($this->delete_id)->delete();
        $image_path = public_path('storage\\' . $this->oldImage);
        if($done){
            if (!empty($this->oldImage)) {
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $this->update_id = '';
            $this->dispatch('deleteSuccessFull', [
                'title' => 'Data Deleted Successfull',
                'type' => "success",
            ]);
        }
    }
    public function showModal()
    {
        $this->reset();
    }
}
