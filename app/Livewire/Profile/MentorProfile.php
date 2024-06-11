<?php

namespace App\Livewire\Profile;

use App\Models\Mentor;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MentorProfile extends Component
{
    use WithFileUploads;
    public $name, $email, $mobile, $date, $id, $password_confirmation, $password, $current_password, $photo, $oldImage;

    public function mount() {
        $this->name = auth()->Guard('mentor')->user()->name;
        $this->email = auth()->Guard('mentor')->user()->email;
        $this->mobile = auth()->Guard('mentor')->user()->mobile;
        $this->date = date('Y-m-d', strtotime(auth()->Guard('mentor')->user()->dateofbirth));
        $this->id = auth()->Guard('mentor')->user()->id;
    }
    public function render()
    {
        return view('livewire.profile.mentor-profile');
    }
    public function profileUpdate() {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'date' => 'required',
        ]);
        $done = Mentor::findOrFail($this->id)->update([
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
    public function passwordSubmit() {
        $this->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'same:password_confirmation']
        ]);
        if(Hash::check($this->current_password, Auth::Guard('mentor')->user()->password)){
            $user_update = Auth::Guard('mentor')->user();
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
    public function updateImage() {
        $validated = $this->validate([
            'photo' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:500']
        ]);
        $user = Mentor::findOrFail(Auth::Guard('mentor')->user()->id);
        $oldImage = $user->image;
        $fileName = "";
        $image_path = public_path('storage\\' . $oldImage);
        if(!empty($this->photo)){
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $fileName = $this->photo->store('mentors', 'public');
        } else {
            $fileName = $oldImage;
        }
        $done = Mentor::findOrFail(Auth::Guard('mentor')->user()->id);
        $done->image = $fileName;
        $done->updated_at = Carbon::now();
        $done->update();
        if ($done) {
            $this->dispatch('swal', [
                'title' => 'Profile Picture Update Successfull',
                'type' => "success",
            ]);
        }
    }
}
