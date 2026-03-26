<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    protected $fillable = [
        'slug',
        'event_date',
        'cover_image_id',
        'name',
        'description',
        'password',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];

    public function coverImage(): BelongsTo
    {
        return $this->belongsTo(Image::class, 'cover_image_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }
}
