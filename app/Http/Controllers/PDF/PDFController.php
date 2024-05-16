<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Student;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $students = Student::get();
        $data = [
            'title' =>  'Certificate generate',
            'date' => date('m/d/Y'),
            'students' => $students
        ];

        $pdf = PDF::loadView('pdf.generate-pdf', $data);
        return $pdf->download('users-lists.pdf');
    }
}
