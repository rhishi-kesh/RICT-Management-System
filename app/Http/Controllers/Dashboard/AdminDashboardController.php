<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        // $re =  Http::get('http://test.interiorbangladesh.com/api/course-data');
        return view('application/index');
    }
}
