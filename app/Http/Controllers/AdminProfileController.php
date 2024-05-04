<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    

    public function  adminProfile()
    {
        return view('application.adminProfile.adminProfile');
    }
    public function editProfile()
    {
        return view('livewire.admin-profile.edit-profile');
    }


}


