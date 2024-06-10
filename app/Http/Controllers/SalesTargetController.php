<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesTargetController extends Controller
{
    public function salesTarget() {
        return view("application.salesTarget.salesTarget");
    }
}
