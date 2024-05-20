<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemInformationController extends Controller
{
    public function systemInformation() {
        return view('application.systemInformation.systemInformation');
    }
}
