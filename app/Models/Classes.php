<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public const BookingAvailable = 1;

    public const BookingFull = 0;

    protected $fillable = [
        'name',
        'class_timing',
        'class_date',
        'number_of_students',
        'status',
    ];
}
