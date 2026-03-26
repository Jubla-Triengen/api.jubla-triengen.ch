<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'published_at',
        'short_description',
        'long_description',
        'image_id',
        'user_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function postFiles(): HasMany
    {
        return $this->hasMany(PostFile::class);
    }

    public function files(): BelongsToMany
    {
        return $this->belongsToMany(File::class, 'post_files')
            ->withPivot('sort_order')
            ->withTimestamps();
    }
}
