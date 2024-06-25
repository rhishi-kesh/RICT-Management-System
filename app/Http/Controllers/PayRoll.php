<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayRoll extends Controller
{
    public function due()
    {
        return view('application.payRoll.due');
    }
}
