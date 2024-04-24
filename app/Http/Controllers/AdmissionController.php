<?php

namespace App\Http\Controllers;

class AdmissionController extends Controller
{
    public function admission(){
        return view('application.admission.admission');
    }
    public function studentsList(){
        return view('application.admission.studentsList');
    }
}
