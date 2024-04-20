<?php

namespace App\Http\Controllers\admissionBooth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionBoothController extends Controller
{
    public function admissionBooth(){
        return view('application.admissionBooth.admissionBooth');
    }
}
