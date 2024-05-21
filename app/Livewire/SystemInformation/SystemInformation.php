<?php

namespace App\Livewire\SystemInformation;

use App\Models\SystemInformation as ModelsSystemInformation;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;

class SystemInformation extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $number, $email, $website, $logo, $favicon, $location, $oldLogo, $oldFav, $update_id;
    public function render() {
        $data = ModelsSystemInformation::first();
        $this->update_id = $data->id;
        $this->number = $data->number;
        $this->email = $data->email;
        $this->website = $data->website;
        $this->location = $data->location;
        $this->oldLogo = $data->logo;
        $this->oldFav = $data->min_logo;
        return view('livewire.system-information.system-information');
    }

    public function update() {

        $validated = $this->validate([
            'number' => 'required|regex:/^(?:\+?88)?01[35-9]\d{8}$/',
            'email' => 'required|email',
            'website' => 'required',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
            'favicon' => 'nullable|image|mimes:png,jpg,jpeg|max:1024',
            'location' => 'required'
        ]);

        $logo = "";
        $logoPath = public_path('storage\\' . $this->oldLogo);
        if (!empty($this->logo)) {
            if (File::exists($logoPath)) {
                File::delete($logoPath);
            }
            $logo = $this->logo->store('about/logo', 'public');
        } else {
            $logo = $this->oldLogo;
        }

        $fav = "";
        $favPath = public_path('storage\\' . $this->oldFav);
        if (!empty($this->favicon)) {
            if (File::exists($favPath)) {
                File::delete($favPath);
            }
            $fav = $this->favicon->store('about/fav', 'public');
        } else {
            $fav = $this->oldFav;
        }

        $done = ModelsSystemInformation::where('id', $this->update_id)->update([
            'number' => $this->number,
            'email' => $this->email,
            'website' => $this->website,
            'location' => $this->location,
            'logo' => $logo,
            'min_logo' => $fav,
            'updated_at' => Carbon::now(),
        ]);

        if ($done) {
            $this->dispatch('swal', [
                'title' => 'Data Update Successfull',
                'type' => "success",
            ]);
        }
    }
}
