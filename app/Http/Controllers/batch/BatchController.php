<?php

namespace App\Http\Controllers\batch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function batch(){
        return view('application.batch.batch');
    }
}
