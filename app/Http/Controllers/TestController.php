<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\TestInterface;
use Invoice;
use Carbon\Carbon;
use App\Models\User;
use Mail;
use App\Mail\ExceptionOccured;


class TestController extends Controller
{
    public function __constructor()
    {
        $this->middleware(['guest']);
    }

    public function index(TestInterface $myprovider)
    {
        echo "Hello";
    }

    public function facadeInfo()
    {
        $test = Invoice::dateFormat();
        $getDate = Invoice::currentDate();
            return $getDate;
           
    }

   
}
