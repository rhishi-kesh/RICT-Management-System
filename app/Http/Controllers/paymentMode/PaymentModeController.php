<?php

namespace App\Http\Controllers\paymentMode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentModeController extends Controller
{
    public function paymentMode(){
        return view('application.paymentMode.paymentMode');
    }
}
