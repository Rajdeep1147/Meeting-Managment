<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    public const ACTIVE = 1;

    public const DEACTIVE = 2;

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
