<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class File extends Model
{
    protected $fillable = [
        'uuid',
        'name',
        'file_name',
        'slug',
        'path',
        'is_public',
        'mime_type',
        'mime_subtype',
        'size',
        'user_id',
    ];

    protected $casts = [
        'is_public' => 'boolean',
        'size' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function activityFiles(): HasMany
    {
        return $this->hasMany(ActivityFile::class);
    }

    public function postFiles(): HasMany
    {
        return $this->hasMany(PostFile::class);
    }

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Activity::class, 'activity_files')
            ->withPivot('sort_order')
            ->withTimestamps();
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_files')
            ->withPivot('sort_order')
            ->withTimestamps();
    }
}