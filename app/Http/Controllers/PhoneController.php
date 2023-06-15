<?php

namespace App\Http\Controllers;

class PhoneController extends Controller
{
    public function sendOtp()
    {
        return view('otp.sendotp');
    }
}
