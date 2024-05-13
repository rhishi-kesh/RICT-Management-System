<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function dashboard(){
        // $re =  Http::get('http://test.interiorbangladesh.com/api/course-data');
        return view('application/index');
    }
    public function studentDashboard(){
        return view('application/studentIndex');
    }
    public function mentorDashboard() {
        return view('application/mentorIndex');
    }
}
