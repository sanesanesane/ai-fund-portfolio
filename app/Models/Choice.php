<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Choice extends Model
{
    use SoftDeletes;

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
