<?php

namespace Bitfuses\Contact\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $fillable = ['name', 'email', 'message'];
}
