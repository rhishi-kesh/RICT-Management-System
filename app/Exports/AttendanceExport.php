<?php

namespace App\Exports;

use App\Models\Attendance;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AttendanceExport implements FromView
{
    private $date;
    private $batchId;
    public function __construct($date, $batchId)
    {
        $this->date = $date;
        $this->batchId = $batchId;
    }

    public function view(): View
    {
        return view('excel.attendance', [
            'attendances' => Attendance::with('students:id,name')->where('batch_id', $this->batchId)->where('date', $this->date)->get()
        ]);
    }
}
