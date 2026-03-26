<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostFile extends Model
{
    protected $fillable = [
        'post_id',
        'file_id',
        'sort_order',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }
}
