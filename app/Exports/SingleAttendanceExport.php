<?php

namespace App\Exports;

use App\Models\Attendance;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SingleAttendanceExport implements FromView, ShouldQueue
{

    private $studentId;
    private $batchId;
    public function __construct($batchId, $studentId)
    {
        $this->batchId = $batchId;
        $this->studentId = $studentId;
    }
    public function view(): View
    {
        return view('excel.personAttendance', [
            'attendances' => Attendance::with('students:id,name')->where('batch_id', $this->batchId)->where('student_id', $this->studentId)->get()
        ]);
    }
}
