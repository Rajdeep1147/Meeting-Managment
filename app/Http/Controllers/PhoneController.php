<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function sendOtp()
    {
        return view('otp.sendotp');
    }
}
