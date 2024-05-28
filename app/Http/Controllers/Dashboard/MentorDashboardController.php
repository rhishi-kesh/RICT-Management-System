<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MentorDashboardController extends Controller
{
    public function mentorDashboard() {
        return view('application/mentorIndex');
    }
}
