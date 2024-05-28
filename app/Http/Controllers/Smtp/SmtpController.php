<?php

namespace App\Http\Controllers\Smtp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmtpController extends Controller
{
    public function smtpSettings() {
        return view('application.smtp.smtp');
    }
}
