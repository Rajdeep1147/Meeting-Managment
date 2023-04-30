<?php 
namespace App\Http\Traits;
use App\Models\student;

trait MyTrait{
    public function createOrder()
    {
        $client = student::all();
        return $client;
    }
}