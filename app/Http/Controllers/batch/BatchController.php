<?php

namespace App\Http\Controllers\batch;

use App\Http\Controllers\Controller;
use App\Models\Batch;

class BatchController extends Controller
{
    public function batch(){
        return view('application.batch.batch');
    }
    public function myBatchMentor(){
        $batch = Batch::where('mentor_id', auth()->guard('mentor')->user()->id)->latest()->paginate();
        return view('application.batch.myBatchMentor', compact('batch'));
    }
}
