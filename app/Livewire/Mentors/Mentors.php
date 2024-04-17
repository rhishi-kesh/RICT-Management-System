<?php

namespace App\Livewire\Mentors;

use Livewire\Component;
use App\Models\Mentor;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Spatie\Backtrace\File;

class Mentors extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name, $email, $mobile, $image, $update_id, $isModal = false, $delete_id;
    // protected $listeners = ['deleteConfirm' => 'deleteStudent'];

    public function render()
    {
        $mentors = Mentor::paginate(6);
        return view('livewire.mentors.mentors', compact('mentors'));
    }

    public function insert()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|numeric',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        // image parat
        $fileName = "";
        if($this->image){
            $fileName = $this->image->store('mentors','public');
        }else{
            $fileName = null;
        }
        // $done = Mentor::create([
        //     'title' => $this->title,
        //     'subtitle' => $this->subtitle,
        //     'writer_name' => $this->writer_name,
        //     'image' => $fileName
        // ]);

        $done = Mentor::insert([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'image' => $fileName,
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
        $this->reset(['email']);
        $this->reset(['mobile']);
    }

    
}
