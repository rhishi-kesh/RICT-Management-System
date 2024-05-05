<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function  adminProfile()
    {
        return view('application.profile.adminProfile');
    }
    public function userProfile()
    {
        return view('application.profile.userProfile');
    }
}
