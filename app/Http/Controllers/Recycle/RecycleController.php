<?php

namespace App\Http\Controllers\Recycle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RecycleController extends Controller
{
    public function recycleStudent(){
        return view('application.recycle.recycleStudent');
    }
}
