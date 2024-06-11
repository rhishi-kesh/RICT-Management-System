<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class StudentProfile extends Component
{
    use WithFileUploads;
    public $mobile, $name, $email, $date, $id, $password_confirmation, $password, $current_password, $photo, $oldImage , $student;

    public function render() {
        $this->name = Auth::Guard('student')->user()->name;
        $this->email = Auth::Guard('student')->user()->email;
        $this->mobile = auth()->Guard('student')->user()->mobile;
        $this->date = date('m-d-Y', strtotime(auth()->Guard('student')->user()->dateofbirth));
        $this->id = Auth::Guard('student')->user()->id;
        
        return view('livewire.profile.student-profile');
    }
    public function profileUpdate() {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'date' => 'required',
        ]);
        $done = Student::findOrFail(Auth::Guard('student')->user()->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'dateofbirth' => $this->date,
            'updated_at' => Carbon::now(),
        ]);
        if($done){
            $this->dispatch('swal', [
                'title' => 'Information Update Successfull',
                'type' => "success",
            ]);
        }
    }
    public function updateImage() {
        $validated = $this->validate([
            'photo' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:500']
        ]);
        $user = Student::findOrFail(Auth::Guard('student')->user()->id);
        $oldImage = $user->profile;
        $fileName = "";
        $image_path = public_path('storage\\' . $oldImage);
        if(!empty($this->photo)){
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $fileName = $this->photo->store('studentProfile', 'public');
        } else {
            $fileName = $oldImage;
        }
        $done = Student::findOrFail(Auth::Guard('student')->user()->id);
        $done->profile = $fileName;
        $done->updated_at = Carbon::now();
        $done->update();
        if ($done) {
            $this->dispatch('swal', [
                'title' => 'Profile Picture Update Successfull',
                'type' => "success",
            ]);
        }
    }
    public function passwordSubmit() {
        $this->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'same:password_confirmation']
        ]);
        if(Hash::check($this->current_password, Auth::Guard('student')->user()->password)){
            $user_update = Auth::Guard('student')->user();
            $user_update->password = Hash::make($this->password);
            $user_update->update();
            $this->reset();
            $this->dispatch('swal', [
                'title' => 'Password Update Successfull',
                'type' => "success",
            ]);
        }else{
            return back()->with('old','Old Password Not Correct');
        }
    }
}
