<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    protected $fillable = [
        'slug',
        'title',
        'start_date',
        'end_date',
        'short_description',
        'long_description',
        'image_id',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    public function activityFiles(): HasMany
    {
        return $this->hasMany(ActivityFile::class);
    }

    public function files(): BelongsToMany
    {
        return $this->belongsToMany(File::class, 'activity_files')
            ->withPivot('sort_order')
            ->withTimestamps();
    }
}
