<?php

namespace App\Http\Controllers\certificate;

use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CertificateController extends Controller
{
    public function generatePDF()
    {
        $student = Student::where('id', Auth::Guard('student')->user()->id)->first();

        $qrcode = QrCode::format('svg')->size(100)->errorCorrection('H')->generate(route('generatePDF', $student->id));
    
        return view('certificate/certificate', compact('qrcode', 'student'));
    }

    // Download
    public function downloadCertificate()
    {
        $student = Student::where('id', Auth::Guard('student')->user()->id)->first();

        $qrcode = base64_encode(QrCode::format('svg')->size(100)->errorCorrection('H')->generate(route('generatePDF', $student->id)));
    
        $data = [
            'title' => 'Welcome to Online Web Tutor',
            'qrcode' => $qrcode
        ];
        $pdf = PDF::loadView('pdf.certificate-generate', $data, ['studentData' => $student])->setPaper('a4', 'portrait');
        // return $pdf->stream();
        return $pdf->download();
    }
}
