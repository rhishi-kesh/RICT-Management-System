<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StudentDownload implements FromView, ShouldQueue
{
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function view(): View
    {
        return view('excel.studentDownload', [
            'students' => $this->data,
        ]);
    }
}
