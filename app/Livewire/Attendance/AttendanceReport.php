<?php

namespace App\Livewire\Attendance;

use App\Models\Batch;
use App\Models\Student;
use App\Models\Attendance;
use Livewire\Component;

class AttendanceReport extends Component
{
    public $batchId, $studentId, $attendance = [];

    public function updatedBatchId() {
        $this->studentId = null;
        $this->attendance = [];
    }

    public function render()
    {
        $batch = Batch::query()
                ->select('id', 'name')
                ->latest()
                ->get();
        $student = Student::query()
                ->select('id', 'name', 'student_id', 'batch_id')
                ->where('batch_id', $this->batchId)
                ->whereNot('batch_id', 0)
                ->latest()
                ->get();
        return view('livewire.attendance.attendance-report', compact('batch', 'student'));
    }


    public function genarate() {

        $validated = $this->validate([
            'batchId' => 'required',
            'studentId' => 'required',
        ]);

        $this->attendance = Attendance::query()
                    ->where('batch_id', $this->batchId)
                    ->where('student_id', $this->studentId)
                    ->get();
    }
}
