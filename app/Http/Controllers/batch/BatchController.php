<?php

namespace App\Http\Controllers\batch;

use App\Http\Controllers\Controller;

class BatchController extends Controller
{
    public function batch(){
        return view('application.batch.batch');
    }
}
