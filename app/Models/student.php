<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'email',
        'contact',
        'status',
        'pincode',
        'email_verified_by',
        'remember_token'
    ];
    protected $hidden=[
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
