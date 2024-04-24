<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentorsController extends Controller
{
    public function mentors()
    {
        return view('application.mentors.mentors');
    }
}
