<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    public const ACTIVE = 1;
    public const DEACTIVE = 2;

    
    public function students() :BelongsTo
    {
        return $this->belongsTo(Student::class,'student_id','id');
    }
    
   public function comments():HasMany
   {
        return $this->hasMany(Comment::class, 'post_id', 'id');
   }

}
