<?php

namespace App\Livewire\Admission;

use App\Models\Batch;
use App\Models\Course;
use App\Models\PaymentMode;
use App\Models\Student;
use Livewire\Component;
use App\Exports\StudentDownload as ExportsStudentDownload;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class StudentDownload extends Component
{
    public $startDate, $endDate, $batchId, $courseID, $gender, $paymentType, $admissionFee, $certificate, $status, $admission, $students = [];
    public function render()
    {
        $batch = Batch::get();
        $paymentTypes = PaymentMode::get();
        $course = Course::get();
        return view('livewire.admission.student-download', compact('batch', 'paymentTypes', 'course'));
    }

    public function genarate() {
        $validated = $this->validate([
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        $endDate = Carbon::parse($this->endDate)->endOfDay();

        if (empty($this->batchId)) {
            $this->batchId = null;
        }
        if (empty($this->courseID)) {
            $this->courseID = null;
        }
        if (empty($this->gender)) {
            $this->gender = null;
        }
        if (empty($this->paymentType)) {
            $this->paymentType = null;
        }
        if ($this->admissionFee != 0 && $this->admissionFee != 1) {
            $this->admissionFee = null;
        }
        if ($this->admission != 0 && $this->admission != 1) {
            $this->admission = null;
        }
        if (empty($this->certificate)) {
            $this->certificate = null;
        }
        if (empty($this->status)) {
            $this->status = null;
        }

        $this->students = Student::query()
                            ->with(['course:id,name', 'batch:id,name', 'pament_mode:id,name'])
                            ->whereBetween('created_at', [$this->startDate, $endDate])
                            ->when($this->batchId !== null, function ($query) {
                                return $query->where('batch_id', $this->batchId);
                            })
                            ->when($this->courseID !== null, function ($query) {
                                return $query->where('course_id', $this->courseID);
                            })
                            ->when($this->gender !== null, function ($query) {
                                return $query->where('gender', $this->gender);
                            })
                            ->when($this->paymentType !== null, function ($query) {
                                return $query->where('paymentType', $this->paymentType);
                            })
                            ->when($this->admissionFee !== null, function ($query) {
                                return $query->where('admissionFee', $this->admissionFee);
                            })
                            ->when($this->certificate !== null, function ($query) {
                                return $query->where('is_certificate', $this->certificate);
                            })
                            ->when($this->status !== null, function ($query) {
                                return $query->where('student_status', $this->status);
                            })
                            ->when($this->admission !== null, function ($query) {
                                return $query->where('is_fromSite', $this->admission);
                            })
                            ->get();
    }

    public function download() {
        return Excel::download(new ExportsStudentDownload($this->students), 'students.xlsx');
    }
}
