<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayRoll extends Controller
{
    public function due()
    {
        return view('application.payRoll.due');
    }
    public function lastMonth()
    {
        return view('application.payRoll.lastMonth');
    }
    public function lastThreeM()
    {
        return view('application.payRoll.lastThreeM');
    }
    public function lastSixM()
    {
        return view('application.payRoll.lastSixM');
    }
}
