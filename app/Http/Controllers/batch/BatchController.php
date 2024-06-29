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
        $batch = Batch::query()
                ->with(['attendance', 'course:id,name', 'course.courseModule'])
                ->where('mentor_id', auth()->guard('mentor')->user()->id)
                ->latest()
                ->paginate();

        // dd($batch->attendance);
        return view('application.batch.myBatchMentor', compact('batch'));
    }
}
