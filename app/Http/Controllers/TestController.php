<?php

namespace App\Http\Controllers;

use App\Service\TestInterface;
use Invoice;

class TestController extends Controller
{
    public function __constructor()
    {
        $this->middleware(['guest']);
    }

    public function index(TestInterface $myprovider)
    {
        echo 'Hello';
    }

    public function facadeInfo()
    {
        $test = Invoice::dateFormat();
        $getDate = Invoice::currentDate();

        return $getDate;

    }
}
