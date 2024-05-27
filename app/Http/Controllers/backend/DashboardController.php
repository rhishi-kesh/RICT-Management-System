<?php

namespace App\Http\Controllers\backend;

use App\Models\Student;
use Barryvdh\DomPDF\PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DashboardController extends Controller
{
    public function dashboard(){
        // $re =  Http::get('http://test.interiorbangladesh.com/api/course-data');
        return view('application/index');
    }
    public function studentDashboard()
    {
        return view('application.profile.studentProfile');
    }
}
