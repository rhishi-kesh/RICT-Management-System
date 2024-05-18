<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function adminProfile()
    {
        return view('application.profile.adminProfile');
    }
    public function studentProfile()
    {
        return view('application.profile.studentProfile');
    }
    public function mentorProfile()
    {
        return view('application.profile.mentorProfile');
    }
}
