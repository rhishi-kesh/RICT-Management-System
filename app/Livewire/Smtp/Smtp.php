<?php

namespace App\Livewire\Smtp;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Smtp as ModelsSmtp;

class Smtp extends Component
{
    public $driver, $host, $port, $username, $password, $encryption, $from_address, $from_name, $update_id;
    public function render() {
        $data = ModelsSmtp::first();
        $this->update_id = $data->id;
        $this->driver = $data->driver;
        $this->host = $data->host;
        $this->port = $data->port;
        $this->username = $data->username;
        $this->password = $data->password;
        $this->encryption = $data->encryption;
        $this->from_address = $data->from_address;
        $this->from_name = $data->from_name;
        return view('livewire.smtp.smtp');
    }
    public function update() {

        $validated = $this->validate([
            'driver' => 'required',
            'host' => 'required',
            'port' => 'required',
            'username' => 'required',
            'password' => 'required',
            'encryption' => 'required',
            'from_address' => 'required',
            'from_name' => 'required',
        ]);

        $done = ModelsSmtp::where('id', $this->update_id)->update([
            'driver' => $this->driver,
            'host' => $this->host,
            'port' => $this->port,
            'username' => $this->username,
            'password' => $this->password,
            'encryption' => $this->encryption,
            'from_address' => $this->from_address,
            'from_name' => $this->from_name,
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
